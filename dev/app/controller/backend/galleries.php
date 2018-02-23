<?php
class App_Controller_Backend_Galleries extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_Gallery';

    /*
        Actions
    */
    public function pre_action()
    {
        foreach ($this->request->params as $key => $value)
        {
            $this->assign('key', $value);
        }
        parent::pre_action();
    }

    public function action_default()
    {
        $types = $this->_assign_types();
        $this->_assign_galleries();
        $this->assign('type', $types[0]->id);
    }

    public function action_choose()
    {
        if (($page_id = $this->request->param('page_id')) !== FALSE && ($page_placeholder = $this->request->param('ph')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', $page_id)))
        {
            $this->assign('page_id', $page_id);
            // update page content json
            $content = json_decode($page->content, true);
            $ids = array();
            if (isset($content[$page_placeholder]))
            {
                foreach ($content[$page_placeholder] as $cph)
                {
                    if ($cph['type'] == 'galleries')
                    {
                        $ids[] = $cph['id'];
                    }
                }
            }

            $this->assign('galleries_ids', $ids);
            $this->_assign_galleries();

            if ($this->request->is_post)
            {
                if ($galleries = $this->request->post('galleries'))
                {
                    $update = array();
                    if (is_array($content) && count($content) > 0)
                    {
                        foreach ($content as $placeholder => $values)
                        {
                            foreach ($values as $cph)
                            {
                                if ($cph['type'] == 'galleries')
                                {
                                    if (in_array($cph['id'], $galleries))
                                    {
                                        $update[$placeholder][] = $cph;
                                    }
                                }
                                else
                                {
                                    $update[$placeholder][] = $cph;
                                }
                            }
                        }
                    }

                    foreach ($galleries as $id)
                    {
                        if (!in_array($id, $ids))
                        {
                            $temp = array(
                                'type' => 'galleries',
                                'id' => $id,
                            );
                            $update[$page_placeholder][] = $temp;
                        }
                    }
                    $page->content = json_encode($update);
                    $this->outlet->save($page);
                    $this->redirect_backend('backend_pages', 'view', array('id' => $page_id));
                }
            }
        }
        else
        {
            $this->give_404();
        }
    }

    public function action_view()
    {
        if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->from($this->model)->where('{App_Model_Gallery.id} = ?',array((int)$id))->with('App_Model_GalleryType')->findOne()))
        {
            $temp = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($entity->id))->orderBy('priority ASC')->find();
            $photos = array();
            foreach ($temp as $photo)
            {
                $photo->versions = json_decode($photo->versions, true);
                $photos[] = $photo;
            }
            $entity->photos = $photos;
            $this->assign('entity', $entity);
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }

    public function action_add()
    {
        $this->_assign_galleries('galleries');
        $this->_assign_types();
        $this->entity_add();
    }

    protected function entity_add_callback($entity) {
        $this->_save_settings($entity);
    }


    public function action_edit()
    {
        $this->_assign_galleries('galleries');
        $this->_assign_types();
        $this->entity_edit();
    }
    protected function entity_edit_callback($entity) {
        $this->outlet->query(sprintf('UPDATE {App_Model_Gallery} SET `type_id` = %d WHERE id = %d', $this->request->post('type_id'), $entity->id));
        $this->_save_settings($entity);
    }
    protected function entity_edit_load($entity) {
        $this->_load_settings($entity);
    }

    public function action_delete()
    {
        $this->entity_delete($this->request->param('id'));
    }


    public function action_toggle_published()
    {
        $this->entity_toggle_published();
    }

    public function action_up()
    {
        $this->entity_up();
    }

    public function action_down()
    {
        $this->entity_down();
    }

    public function action_refresh_images()
    {
        if (
                ($id = $this->request->param('id')) !== FALSE
                &&
                !is_null($entity = $this->outlet->from($this->model)
                                                ->where('{App_Model_Gallery.id} = ?', array((int)$id))
                                                ->with('App_Model_GalleryType')
                                                ->findOne())
                &&
                ($type = $this->request->param('type')) !== FALSE
        )
        {
            $gallery_type_settings = json_decode($entity->gallerytype->image_settings, true);
            if (in_array($type, array_keys($gallery_type_settings)))
            {
                $setting = $gallery_type_settings[$type];
                $temp = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($entity->id))->find();
                $photos = array();
                foreach ($temp as $photo)
                {
                    $photo->versions = json_decode($photo->versions, true);
                    //if (in_array($type, array_keys($photo->versions)))
                    //{
                        $original = isset($photo->versions['original']) ? $photo->versions['original'] : (isset($photo->versions['fullscreen']) ? $photo->versions['fullscreen'] : null);
                    d($original);
                        if (!is_null($original))
                        {
                            //delete previous image
                            $d = $photo->versions[$type];
                            @unlink(App_Utils_Image::get_path($d['filename'], $this->config->value('APP.PHOTOS.URLS.FRONTEND')));
                            @unlink(App_Utils_Image::get_path($d['filename'], $this->config->value('APP.PHOTOS.URLS.BACKEND')));

                            $name = App_Utils_Image::get_filename_w_size($photo->filename, $setting['width'], $setting['height']);
                            $path = App_Utils_Image::get_path($original['filename'], $this->config->value('APP.PHOTOS.URLS.FRONTEND'));
                            $path_thumb = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.URLS.FRONTEND'));
                            d($path_thumb);
                            $by_width_only = $setting['resize'] == 'width';
                            $by_height_only = $setting['resize'] == 'height';

							$jpeg_quality = isset($setting['jpeg_quality']) ? $setting['jpeg_quality'] : $this->config->value('APP.PHOTOS.JPEG_QUALITY');
                            App_Utils_Image::resize_image($path, $path_thumb, $setting['width'], $setting['height'], $jpeg_quality, $invert_scaling = true, $by_width_only, $by_height_only);
                            if ($setting['crop'])
                            {
                                App_Utils_Image::crop($path_thumb, $path_thumb, $setting['width'], $setting['height'], 0, 0, $setting['width'], $setting['height'], $this->config->value('APP.PHOTOS.JPEG_QUALITY'));
                            }
                            $photo->versions[$setting['type']] = array(
                                'filename' => $name,
                                'type' => $setting['type'],
                                'width' => $setting['width'],
                                'height' => $setting['height']
                            );
                            d($photo->versions[$setting['type']]);
                            $photo->versions = json_encode($photo->versions);
                            $this->outlet->save($photo);
                        }
                    //}
                    sleep(1);
                }
            }
            exit;
            $this->redirect_after_edit($entity);
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }


    /*
        Private
    */
    private function _assign_galleries($name = 'cpf_entities')
    {
        $elements = new App_Model_GalleryTree();
        $this->assign($name, $elements->tree->list);
    }

    private function _assign_types()
    {
        $types = $this->outlet->from('App_Model_GalleryType')->orderBy('title ASC')->find();
        $this->assign('types', App_Utils_Form::bind_select($types, 'id', 'title'));
        return $types;
        /*
        $types = array();
        foreach ($this->config->value('APP.GALLERIES.TYPES') as $type)
        {
            $temp = $type;
            $temp['title'] = t($temp['title']);
            $types[] = $temp;
        }
        $this->assign('types', $types);
        */
    }

    /* settings */
    private function _load_settings($entity)
    {
        try
        {
            $settings = json_decode($entity->settings, true);
            $video_settings = json_decode($entity->video_settings, true);
            $this->assign('settings', $settings);
            $this->assign('video_settings', $video_settings);
        }
        catch (Exception $e) {}
    }
    protected function entity_delete_callback($entity)
    {
        $photos = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($entity->id))->find();
        foreach ($photos as $photo)
        {
            $versions = json_decode($photo->versions, true);
            foreach ($versions as $version)
            {
                if ($version['type'] == 'backend_thumb' || $version['type'] == 'backend_tiny')
                {
                    $path = App_Utils_Image::get_path($version['filename'], $this->config->value('APP.PHOTOS.PATHES.BACKEND'));
                }
                else
                {
                    $path = App_Utils_Image::get_path($version['filename'], $this->config->value('APP.PHOTOS.PATHES.FRONTEND'));
                }
                @unlink($path);
            }
            $this->outlet->delete('App_Model_Photo', $photo->id);
        }
    }

    private function _save_settings($entity)
    {
        $types = $this->config->value('APP.GALLERIES.DEFAULT_IMAGE_TYPES');
        if (count($types) > 0) // только если типы заданы в конфиге
        {
            // photos
            $settings = array();
            $first_key = array_keys($types);
            $keys_to_find = array_keys($types[$first_key[0]]);

            // videos
            $video_settings = array();
            $video_keys_to_find = array_keys($this->config->value('APP.GALLERIES.VIDEO_SETTINGS'));

            // process
            foreach ($this->request->post as $key => $value)
            {
                $temp = explode('_', $key);
                $id = count($temp) > 1 ? $temp[1] : null;
                if (!is_null($id))
                {
                    $k = $temp[0];
                    if (in_array($k, $keys_to_find))
                    {
                        if (!isset($settings[$id]))
                        {
                            foreach ($keys_to_find as $ktf)
                                $settings[$id][$ktf] = null;
                        }
                        $settings[$id][$k] = $value;
                    }

                    if (in_array($key, $video_keys_to_find))
                    {
                        $video_settings[$key] = $value;
                    }
                }
            }
            $entity->settings = json_encode($settings);
            $entity->video_settings = json_encode($video_settings);
        }
    }
}
?>