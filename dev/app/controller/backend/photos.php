<?php

class App_Controller_Backend_Photos extends App_Controller_Base_BackendSmart

{

    public

        $model = 'App_Model_Photo';



    /*

        Actions

    */

    public function action_add()

    {

        if (($id = $this->request->param('id')) !== FALSE && ($table = $this->request->param('table')) !== FALSE && !is_null($parent = $this->outlet->load($table, (int)$id)))

        {

            $this->assign('table', $table);

            if ($table == 'App_Model_Gallery')

            {

                $this->assign('gallery', $parent);

                $this->view->template_name = 'forms/backend_photos.add_2_gallery.tpl';

            }

            elseif ($table == 'App_Model_Page')

            {

                $this->assign('page', $parent);

                if (($page_placeholder = $this->request->param('ph')) !== FALSE)

                {

                    $this->assign('page_placeholder', $page_placeholder);

                }

                $this->view->template_name = 'forms/backend_photos.add_2_page.tpl';

            }

        }

        else

        {

            $this->record_doesnt_exist();

        }

    }



    public function action_edit()

    {

        $this->entity_edit();

    }

    protected function entity_edit_load($entity)

    {

        $versions = json_decode($entity->versions, true);

        $this->assign('versions', $versions);



        // if in slideshow

        if ($entity->gallery_id > 0 &&

            !is_null($gallery = $this->outlet

                                    ->from('App_Model_Gallery')

                                    ->with('App_Model_GalleryType')

                                    ->where('{App_Model_Gallery.id} = ?', array($entity->gallery_id))

                                    ->findOne()) &&

            $gallery->gallerytype->display_type == 'slideshow'

        )

        {

            $this->_assign_slideshow_position();

        }

    }



    public function action_upload_2_gallery()

    {

        $result = 1;

        $url = '';

        $thumb_url = '';

        $errors = array();

        if (($id = $this->request->param('id')) !== FALSE && !is_null($gallery = $this->outlet->load('App_Model_Gallery', (int)$id)))

        {

            try

            {

                $type = $this->outlet->load('App_Model_GalleryType', $gallery->type_id);

                $settings = json_decode($type->image_settings, true);

                if (!is_array($settings))

                {

                    $settings = array();

                }

                foreach ($this->request->files as $file)

                {

                    $result = 0;

                    $versions = array();

                    if ($file['error'][0] !== UPLOAD_ERR_NO_FILE && !in_array($file['type'][0],$this->config->value('APP.GALLERIES.DEFAULT_IMAGE_TYPES.original') ))

                    {

                        /*

                         * 0. move file to the tmp path

                         * 1. save backend thumbnail

                         * 2. check if is need to save original

                         * 3. save fullscreen version

                         * 4. save thumbnail version

                         * 5. TODO: save custom versions

                         */

                        // 0. move file

                        $temp_path = App_Utils_Image::get_path($file['name'][0], $this->config->value('APP.PHOTOS.PATHES.TEMP'));

                        if (move_uploaded_file($file['tmp_name'][0], $temp_path))

                        {



                            // 1. backend_thumb

                            if ($this->config->value('APP.GALLERIES.STORE_ORIGINAL_IMAGE'))

                            {

                                $settings = array_merge(array($this->config->value('APP.GALLERIES.DEFAULT_IMAGE_TYPES.original')), $settings);

                            }

                            $settings = array_merge(array($this->config->value('APP.GALLERIES.DEFAULT_IMAGE_TYPES.backend_thumb')), $settings);

                            $settings = array_merge(array($this->config->value('APP.GALLERIES.DEFAULT_IMAGE_TYPES.backend_tiny')), $settings);

                            // save each image

                            foreach ($settings as $setting)

                            {

                                $width = $setting['width'];

                                $height = $setting['height'];

                                $name = App_Utils_Image::get_filename_w_size($file['name'][0], $width, $height);

                                if ($setting['type'] == 'backend_thumb' || $setting['type'] == 'backend_tiny')

                                {

                                    $path = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.PATHES.BACKEND'));

                                    if ($setting['type'] == 'backend_tiny')

                                    {

                                        $thumb_url = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.URLS.BACKEND'));

                                    }

                                    elseif ($setting['type'] == 'fullscreen')

                                    {

                                        $url = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.URLS.BACKEND'));

                                    }

                                }

                                else

                                {

                                    $path = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.PATHES.FRONTEND'));

                                }

                                $by_width_only = $setting['resize'] == 'width';

                                $by_height_only = $setting['resize'] == 'height';



                                if ((is_null($width) && is_null($height) && $setting['type'] == 'original') || $setting['resize'] == 'none')

                                {

                                    @copy($temp_path, $path);

                                }

                                else

                                {

                                    App_Utils_Image::resize_image($temp_path, $path, $width, $height, $this->config->value('APP.PHOTOS.JPEG_QUALITY'), $invert_scaling = true, $by_width_only, $by_height_only);

                                    if ($setting['crop'])

                                    {

                                        App_Utils_Image::crop($path, $path, $width, $height, 0, 0, $width, $height, $this->config->value('APP.PHOTOS.JPEG_QUALITY'));

                                    }

                                }

                                $versions[$setting['type']] = array(

                                    'filename' => $name,

                                    'type' => $setting['type'],

                                    'width' => $setting['width'],

                                    'height' => $setting['height']

                                );

                            }

                        }

                        else

                        {

                            d('error for the '.$file['tmp_name'][0].' in'.$path);

                            $result = 0;

                        }



                        if (count($versions) > 0)

                        {

                            // create photo

                            $photo = new $this->model();

                            $photo->versions = json_encode($versions);

                            $photo->filename = $file['name'][0];

                            $photo->type = $file['type'][0];

                            $photo->extension = App_Utils_Image::get_extension($file['name'][0]);

                            $photo->datetime = new DateTime();

                            $photo->gallery_id = $gallery->id;

                            // priority

                            $stmt = $this->outlet->query(sprintf('SELECT MAX({%1$s.priority}) AS `m` FROM {%1$s} WHERE `gallery_id` = %2$d', $this->model, $gallery->id));

                            $max_priority = $stmt->fetch(PDO::FETCH_ASSOC);

                            $photo->priority = intval($max_priority['m']) + 1;

                            // save

                            $this->outlet->save($photo);



                            $result = 1;

                            $info = new stdClass();

                            $info->name = $photo->filename;

                            $info->size = $file['size'][0];

                            $info->type = $file['type'][0];

                            $info->url = $url;

                            $info->thumbnail_url = $thumb_url;

                            $info->delete_url = $this->router->link(CPF_URL_ROUTER_DEFAULT_RULE, array('controller' => $this->request->controller, 'action' => 'delete', 'id' => $photo->id));

                            $info->delete_type = 'DELETE';

                        }

                    }

                }

            }

            catch (Exception $e){

                $result = 0;

                d($e);

            }



            if ($result == 1)

            {

                $this->_update_gallery_cover($id);



                if (isset($info))

                    echo json_encode(array($info));

            }

            else

            {

                $errors = array('error' => 'Some error occured');

                echo json_encode(array($errors));

            }

        }

        else

        {

            $errors = array('error' => 'Gallery not found');

            echo json_encode(array($errors));

        }



        exit;

    }



    public function action_upload_2_page()

    {

        $result = 1;

        $url = '';

        $thumb_url = '';

        $errors = array();

        if (($id = $this->request->param('id')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', (int)$id)) && ($page_placeholder = $this->request->param('page_placeholder')) !== FALSE)

        {

            try

            {

                $settings = array();

                foreach ($this->request->files as $file)

                {

                    $result = 0;

                    $versions = array();

                    if ($file['error'][0] !== UPLOAD_ERR_NO_FILE)

                    {

                        /*

                         * 0. move file to the tmp path

                         * 1. save backend thumbnail

                         * 2. check if is need to save original

                         * 3. save fullscreen version

                         * 4. save thumbnail version

                         * 5. TODO: save custom versions

                         */

                        // 0. move file

                        $temp_path = App_Utils_Image::get_path($file['name'][0], $this->config->value('APP.PHOTOS.PATHES.TEMP'));

                        if (move_uploaded_file($file['tmp_name'][0], $temp_path))

                        {

                            // 1. backend_thumb

                            if ($this->config->value('APP.GALLERIES.STORE_ORIGINAL_IMAGE'))

                            {

                                $settings = array_merge(array($this->config->value('APP.GALLERIES.DEFAULT_IMAGE_TYPES.original')), $settings);

                            }

                            $settings = array_merge(array($this->config->value('APP.GALLERIES.DEFAULT_IMAGE_TYPES.backend_thumb')), $settings);

                            $settings = array_merge(array($this->config->value('APP.GALLERIES.DEFAULT_IMAGE_TYPES.backend_tiny')), $settings);

                            // load page layout

                            $layout = $this->outlet->load('App_Model_Layout', $page->layout_id);

                            $layout_settings = json_decode($layout->settings, true);

                            if (isset($layout_settings))

                            {

                                if (isset($layout_settings[$page_placeholder]) && isset($layout_settings[$page_placeholder]['images']))

                                {

                                    $settings = array_merge(array($layout_settings[$page_placeholder]['images']), $settings);

                                }

                                elseif (isset($layout_settings['all']) && isset($layout_settings['all']['images']))

                                {

                                    $settings = array_merge(array($layout_settings['all']['images']), $settings);

                                }

                            }



                            // save each image

                            foreach ($settings as $setting)

                            {

                                $width = $setting['width'];

                                $height = $setting['height'];

                                $name = App_Utils_Image::get_filename_w_size($file['name'][0], $width, $height);

                                if (!isset($setting['type']))

                                {

                                    $setting['type'] = 'custom';

                                }



                                if ($setting['type'] == 'backend_thumb' || $setting['type'] == 'backend_tiny')

                                {

                                    $path = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.PATHES.BACKEND'));

                                    if ($setting['type'] == 'backend_tiny')

                                    {

                                        $thumb_url = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.URLS.BACKEND'));

                                    }

                                    elseif ($setting['type'] == 'fullscreen')

                                    {

                                        $url = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.URLS.BACKEND'));

                                    }

                                }

                                else

                                {

                                    $path = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.PATHES.FRONTEND'));

                                }

                                $by_width_only = $setting['resize'] == 'width';

                                $by_height_only = $setting['resize'] == 'height';

								$invert_scaling = $setting['resize'] == 'width' || $setting['resize'] == 'height' || $setting['type'] == 'backend_thumb' || $setting['type'] == 'backend_tiny';



								$dimensions = $setting;

								

                                if (is_null($width) && is_null($height) && $setting['type'] == 'original')

                                {

                                    @copy($temp_path, $path);

                                }

                                else

                                {

                                    $dimensions = App_Utils_Image::resize_image($temp_path, $path, $width, $height, $this->config->value('APP.PHOTOS.JPEG_QUALITY'), $invert_scaling, $by_width_only, $by_height_only);

                                    if ($setting['crop'] == 'true')

                                    {

                                        App_Utils_Image::crop($path, $path, $width, $height, 0, 0, $width, $height, $this->config->value('APP.PHOTOS.JPEG_QUALITY'));

                                    }

                                }



                                $versions[$setting['type']] = array(

                                    'filename' => $name,

                                    'type' => $setting['type'],

                                    'width' => $dimensions['width'],

                                    'height' => $dimensions['height']

                                );

                            }

                        }

                        else

                        {

                            d('error for the '.$file['tmp_name'][0].' in'.$path);

                            $result = 0;

                        }



                        if (count($versions) > 0)

                        {

                            $page_photos = array();



                            // create photo

                            $photo = new $this->model();

                            $photo->versions = json_encode($versions);

                            $photo->filename = $file['name'][0];

                            $photo->type = $file['type'][0];

                            $photo->extension = App_Utils_Image::get_extension($file['name'][0]);

                            $photo->datetime = new DateTime();



                            // save

                            $this->outlet->save($photo);



                            // update page content json

                            $content = json_decode($page->content, true);

                            $content[$page_placeholder][] = array(

                                "type" => "images",

                                "id" => $photo->id

                            );

                            $page->content = json_encode($content);

                            $this->outlet->save($page);



                            $result = 1;

                            $info = new stdClass();

                            $info->name = $photo->filename;

                            $info->size = $file['size'][0];

                            $info->type = $file['type'][0];

                            $info->url = $url;

                            $info->thumbnail_url = $thumb_url;

                            $info->delete_url = $this->router->link(CPF_URL_ROUTER_DEFAULT_RULE, array('controller' => $this->request->controller, 'action' => 'delete', 'id' => $photo->id));

                            $info->delete_type = 'DELETE';

                        }

                    }

                }

            }

            catch (Exception $e){

                $result = 0;

                d($e);

            }



            if ($result == 1)

            {

                if (isset($info))

                    echo json_encode(array($info));

            }

            else

            {

                $errors = array('error' => 'Some error occured');

                echo json_encode(array($errors));

            }

        }

        exit;

    }



    protected function redirect_after_edit($entity, $filter_params = null)

    {

        if (isset($this->request->post['form-apply']))

        {

            $this->redirect_backend_back();

        }

        else

        {

            if (!is_null($entity->gallery_id))

                $this->redirect_backend('backend_galleries', 'view', array('id' => $entity->gallery_id));

            elseif (($page_id = $this->request->param('page_id')) !== FALSE)

                $this->redirect_backend('backend_pages', 'view', array('id' => $page_id));

            else

                $this->redirect_after_form($entity, $filter_params);

        }

    }



    public function action_delete()

    {

        if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->load($this->model, (int)$id)))

        {

            $this->outlet->delete($this->model, $entity->id);

            if ($entity->gallery_id > 0)

            {

                $this->_update_gallery_cover($entity->gallery_id);

            }

            // custom method

            try

            {

                $versions = json_decode($entity->versions, true);

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



                // update page content json

                if (($page_id = $this->request->param('page_id')) !== FALSE && ($page_placeholder = $this->request->param('page_placeholder')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', $page_id)))

                {

                    $content = json_decode($page->content, true);

                    $new_content = array();

                    if (isset($content[$page_placeholder]))

                    {

                        foreach ($content[$page_placeholder] as $cph)

                        {

                            if (($cph['type'] == 'images' && $cph['id'] != $entity->id) || $cph['type'] != 'images')

                                $new_content[] = $cph;

                        }

                        $content[$page_placeholder] = $new_content;

                    }

                    $page->content = json_encode($content);

                    $this->outlet->save($page);

                }



            }

            catch (Exception $e){}

            $this->clear_cache();



            // log

            $this->log_delete($entity);



            if (!$this->request->is_ajax)

            {

                $this->redirect_backend_back($this->request->controller);

                return;

            }

            else

            {

                exit;

            }

        }

        return;

    }



    public function action_ajax_move()

    {

        $this->ajax_move();



        if (($ids = $this->request->post('ids')) !== FALSE)

        {

			$ids = explode('-', $ids);

            $id = (int)$ids[0];

            $photo = $this->outlet->load('App_Model_Photo', $id);

            if (!is_null($photo) && $photo->gallery_id > 0)

            {

                $this->_update_gallery_cover($photo->gallery_id);

            }

        }

    }





    public function action_up()

    {

        $this->entity_up();

    }



    public function action_down()

    {

        $this->entity_down();

    }





    public function action_clear_temp()

    {

        $pathes = array(

            array(

                'dir' => $this->config->value('APP.PHOTOS.PATHES.TEMP'),

                'type' => 'temp'

            )

        );



        $count = 0;

        foreach ($pathes as $p)

        {

            $d = dir($p['dir']);

            while ($entry = $d->read())

            {

                if ($entry != '.' && $entry != '..' && $entry != '.svn' && $entry != '.htaccess')

                {

                    $path = App_Utils_Image::get_path($entry, $this->config->value('APP.PHOTOS.PATHES.TEMP'));

                    if (filemtime($path) < strtotime('-1 hour'))

                    {

                        d($path);

                        @unlink($path);

                        $count++;

                    }

                    else

                    {

                        printf('fresh file %s', $path);

                    }

                }

            }

            $d->close();

        }

        return $count;

    }



    /*

        Private

    */

    private function _update_gallery_cover($id = null)

    {

        if (!is_null($id))

        {

            $gallery = $this->outlet->from('App_Model_Gallery')->where('{App_Model_Gallery.id} = ?', array((int)$id))->with('App_Model_GalleryType')->findOne();

            if (!is_null($gallery))

            {

                $gallery_type_settings = json_decode($gallery->gallerytype->image_settings, true);

                if (isset($gallery_type_settings['cover_image']))

                {

                    $setting = $gallery_type_settings['cover_image'];

                    $first_photo = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($gallery->id))->orderBy('priority ASC')->findOne();

                    if (!is_null($first_photo))

                    {

                        $first_photo->versions = json_decode($first_photo->versions, true);

                        $original = isset($first_photo->versions['original']) ? $first_photo->versions['original'] : (isset($first_photo->versions['fullscreen']) ? $first_photo->versions['fullscreen'] : null);

                        if (!is_null($original))

                        {

                            // delete previous cover

                            $cover = json_decode($gallery->cover, true);

                            if (isset($cover['filename']))

                            {

                                $path = App_Utils_Image::get_path($cover['filename'], $this->config->value('APP.PHOTOS.URLS.FRONTEND'));

                                @unlink($path);

                            }

                            // create new cover

                            $name = App_Utils_Image::get_filename_w_size($first_photo->filename, $setting['width'], $setting['height']);

                            $path = App_Utils_Image::get_path($original['filename'], $this->config->value('APP.PHOTOS.URLS.FRONTEND'));

                            $path_thumb = App_Utils_Image::get_path($name, $this->config->value('APP.PHOTOS.URLS.FRONTEND'));

                            $by_width_only = $setting['resize'] == 'width';

                            $by_height_only = $setting['resize'] == 'height';



                            App_Utils_Image::resize_image($path, $path_thumb, $setting['width'], $setting['height'], $this->config->value('APP.PHOTOS.JPEG_QUALITY'), $invert_scaling = true, $by_width_only, $by_height_only);

                            if ($setting['crop'])

                            {

                                App_Utils_Image::crop($path_thumb, $path_thumb, $setting['width'], $setting['height'], 0, 0, $setting['width'], $setting['height'], $this->config->value('APP.PHOTOS.JPEG_QUALITY'));

                            }

                            $gallery->cover = array(

                                'filename' => $name,

                                'type' => $setting['type'],

                                'width' => $setting['width'],

                                'height' => $setting['height']

                            );

                            $gallery->cover = json_encode($gallery->cover);

                            $this->outlet->save($gallery);

                        }



                    }

                }

            }

        }

    }



    private function _assign_slideshow_position()

    {

        $v = array('top', 'middle', 'bottom');

        $h = array('left', 'center', 'right');

        $positions = array(array('id'=>'', 'value' => ''));

        foreach ($v as $_v)

            foreach ($h as $_h)

                $positions[] = array('id' => $_v.'-'.$_h, 'title' => t('backend.photos.'.$_v.'_'.$_h));

        $this->assign('slideshow_positions', $positions);

    }

}

?>