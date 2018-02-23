<?php
class App_Controller_Backend_Pages extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_Page';

    /*
        Actions
    */
    public function action_default()
    {
        $this->_assign_pages();
    }

    public function action_view()
    {
        $this->entity_view();
    }
    protected function entity_view_callback($entity)
    {
        $entity->layout = $this->outlet->load('App_Model_Layout', $entity->layout_id);

        $content_types = $this->config->value('APP.CONTENT.CONTENT_TYPES');
        $page_content = array();
        $data = json_decode($entity->content, true);

        // collect ids
        $ids = array();
        $values = array();
        $placeholders = array();
        $existed_placeholders = array();

        foreach ($content_types as $ctype)
        {
            $ids[$ctype] = array();
            $values[$ctype] = array();
            $placeholders[$ctype] = array();
        }

        if (is_array($data) && count($data) > 0)
        {
            foreach ($data as $placeholder => $contents)
            {
                foreach ($contents as $value)
                {
                    $ids[$value['type']][] = $value['id'];
                    $values[$value['type']][$value['id']] = '';
                    $placeholders[$value['type']][$value['id']] = $placeholder;
                }
                $existed_placeholders[] = $placeholder;
                $page_content[$placeholder] = array();
            }
            // load blocks
            if (count($ids['blocks']) > 0)
            {
                $blocks = $this->outlet->from('App_Model_Block')->where(sprintf('id IN (%s)', implode(',', $ids['blocks'])))->find();
                foreach ($blocks as $block) {
                    $this->assign('block', $block);
                    $this->assign('page', $entity);
                    $this->assign('placeholder', $placeholders['blocks'][$block->id]);
                    $content = $this->view->fetch('snippets/backend_elements.block.tpl');
                    $values['blocks'][$block->id] = $content;
                }
            }
            // load images
            if (count($ids['images']) > 0)
            {
                $images = $this->outlet->from('App_Model_Photo')->where(sprintf('id IN (%s)', implode(',', $ids['images'])))->find();
                foreach ($images as $image) {
                    $this->assign('image', $image);
                    $this->assign('page', $entity);
                    $this->assign('placeholder', $placeholders['images'][$image->id]);
                    $content = $this->view->fetch('snippets/backend_elements.image.tpl');
                    $values['images'][$image->id] = $content;
                }
            }
            // load videos
            if (count($ids['videos']) > 0)
            {
                $videos = $this->outlet->from('App_Model_Video')->where(sprintf('id IN (%s)', implode(',', $ids['videos'])))->find();
                foreach ($videos as $video) {
                    $this->assign('video', $video);
                    $this->assign('page', $entity);
                    $this->assign('placeholder', $placeholders['videos'][$video->id]);
                    $content = $this->view->fetch('snippets/backend_elements.video.tpl');
                    $values['videos'][$video->id] = $content;
                }
            }
            // load galleries
            if (count($ids['galleries']) > 0)
            {
                $galleries = $this->outlet->from('App_Model_Gallery')->where(sprintf('id IN (%s)', implode(',', $ids['galleries'])))->find();
                foreach ($galleries as $gallery) {
                    $images = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($gallery->id))->orderBy('priority')->limit(3)->find();
                    $this->assign('gallery', $gallery);
                    $this->assign('images', $images);
                    $this->assign('page', $entity);
                    $this->assign('placeholder', $placeholders['galleries'][$gallery->id]);
                    $content = $this->view->fetch('snippets/backend_elements.gallery.tpl');
                    $values['galleries'][$gallery->id] = $content;
                }
            }

            // final assign
            foreach ($data as $placeholder => $contents)
            {
                $temp = array();
                foreach ($contents as $value)
                {
                    $temp[] = $values[$value['type']][$value['id']];
                }
                $this->assign('entity', $entity);
                $this->assign('placeholder', $placeholder);
                $this->assign('content', implode('', $temp));
                $placeholder_content = $this->view->fetch('snippets/backend_elements.placeholder.tpl');
                $page_content[$placeholder] = $placeholder_content;
            }
        }

        $diff = array_diff(json_decode($entity->layout->placeholders, true), $existed_placeholders);

        foreach ($diff as $placeholder)
        {
            $this->assign('entity', $entity);
            $this->assign('placeholder', $placeholder);
            $this->assign('content', '');
            $placeholder_content = $this->view->fetch('snippets/backend_elements.placeholder.tpl');
            $page_content[$placeholder] = $placeholder_content;
        }

        $entity->data = $page_content;
    }

    public function action_add()
    {
        $this->_assign_pages('pages');
        $this->_assign_layouts();
        $this->entity_add();
    }

    public function action_edit()
    {
        $this->_assign_pages('pages');
        $this->_assign_layouts();
        $this->entity_edit();
    }

    public function action_delete()
    {
        if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->load($this->model, (int)$id)))
        {
            // collect data
            $tree = new App_Model_PageTree();
            $node = $tree->find_first('id', $entity->id);
            $data = array(
                'pages' => array(),
                'images' => array(),
                'videos' => array(),
                'blocks' => array()
            );
            $this->_collect_subpages_data($node, $data);

            // delete blocks
            if (count($data['blocks']) > 0)
                $this->outlet->query(sprintf('DELETE FROM `blocks` WHERE `id` IN (%s)', implode(',', $data['blocks'])));
            // delete videos
            if (count($data['videos']) > 0)
                $this->outlet->query(sprintf('DELETE FROM `videos` WHERE `id` IN (%s)', implode(',', $data['videos'])));
            // delete images with files
            if (count($data['images']) > 0)
            {
                foreach ($data['images'] as $id)
                {
                    $photo = $this->outlet->load('App_Model_Photo', $id);
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

                }
                $this->outlet->query(sprintf('DELETE FROM `photos` WHERE `id` IN (%s)', implode(',', $data['photos'])));
            }
            // delete pages with files
            if (count($data['pages']) > 0)
            {
                $this->outlet->query(sprintf('DELETE FROM `pages` WHERE `id` IN (%s)', implode(',', $data['pages'])));
            }

            $this->clear_cache();
            // log
            $this->log_delete($entity);

            $this->messenger->info(t('backend.common.record_deleted'));
            $this->redirect_backend($this->request->controller);
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }

    private function _collect_subpages_data($node, &$data)
    {
        $data['pages'][] = $node->data->id;
        $content = json_decode($node->data->content, true);
        if (is_array($content) && count($content) > 0)
            foreach ($content as $placeholder => $contents)
                foreach ($contents as $c)
                    $data[$c['type']][] = $c['id'];
        foreach ($node->nodes as $nnode)
            $this->_collect_subpages_data($nnode, $data);
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

    public function action_slideshow()
    {
        if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->load($this->model, (int)$id)))
        {
            $slideshow = $this->outlet->from('App_Model_Gallery')->where('page_id = ?', array($entity->id))->findOne();
            if (is_null($slideshow))
                $this->redirect_backend('backend_galleries', 'add', array('page_id' => $entity->id, 'type_id' => 3));
            else
                $this->redirect_backend('backend_galleries', 'view', array('id' => $slideshow->id));
            return;
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }

    public function action_gallery_delete()
    {
        if (($id = $this->request->param('id')) !== FALSE && ($page_id = $this->request->param('page_id')) !== FALSE && ($page_placeholder = $this->request->param('page_placeholder')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', $page_id)))
        {
            $content = json_decode($page->content, true);
            $new_content = array();
            foreach ($content[$page_placeholder] as $k => $cph)
            {
                if (!($cph['type'] == 'galleries' && $cph['id'] == $id))
                {
                    $new_content[] = $cph;
                }
                $content[$page_placeholder] = $new_content;
                $page->content = json_encode($content);
                $this->outlet->save($page);
            }
            $this->redirect_backend('backend_pages', 'view', array('id' => $page->id));
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }

    /* page element */
    public function action_move_element_up()
    {
        if (($id = $this->request->param('id')) !== FALSE && ($page_id = $this->request->param('page_id')) !== FALSE && ($page_placeholder = $this->request->param('page_placeholder')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', $page_id)) && ($type = $this->request->param('type')) !== FALSE)
        {
            $content = json_decode($page->content, true);
            if (isset($content[$page_placeholder]))
            {
                $index = -1;
                foreach ($content[$page_placeholder] as $k => $cph)
                {
                    if ($cph['id'] == $id && $cph['type'] == $type)
                        $index = $k;
                }
                if ($index > 0 && $index <= count($content[$page_placeholder])-1)
                {
                    $new_content = array();
                    foreach ($content[$page_placeholder] as $k => $cph)
                    {
                        if ($k == $index-1)
                        {
                            $new_content[] = $content[$page_placeholder][$index];
                        }
                        elseif ($k == $index)
                        {
                            $new_content[] = $content[$page_placeholder][$index-1];
                        }
                        else
                        {
                            $new_content[] = $cph;
                        }
                    }
                    $content[$page_placeholder] = $new_content;
                    $page->content = json_encode($content);
                    $this->outlet->save($page);
                }
            }
            $this->redirect_backend('backend_pages', 'view', array('id' => $page->id));
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }

    public function action_move_element_down()
    {
        if (($id = $this->request->param('id')) !== FALSE && ($page_id = $this->request->param('page_id')) !== FALSE && ($page_placeholder = $this->request->param('page_placeholder')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', $page_id)) && ($type = $this->request->param('type')) !== FALSE)
        {
            $content = json_decode($page->content, true);
            if (isset($content[$page_placeholder]))
            {
                $index = -1;
                foreach ($content[$page_placeholder] as $k => $cph)
                {
                    if ($cph['id'] == $id && $cph['type'] == $type)
                        $index = $k;
                }
                if ($index >= 0 && $index < count($content[$page_placeholder])-1)
                {
                    $new_content = array();
                    foreach ($content[$page_placeholder] as $k => $cph)
                    {
                        if ($k == $index+1)
                        {
                            $new_content[] = $content[$page_placeholder][$index];
                        }
                        elseif ($k == $index)
                        {
                            $new_content[] = $content[$page_placeholder][$index+1];
                        }
                        else
                        {
                            $new_content[] = $cph;
                        }
                    }
                    $content[$page_placeholder] = $new_content;
                    $page->content = json_encode($content);
                    $this->outlet->save($page);
                }
            }
            $this->redirect_backend('backend_pages', 'view', array('id' => $page->id));
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }

    /*
        Private
    */
    private function _assign_pages($name = 'cpf_entities')
    {
        $elements = new App_Model_PageTree();
        $this->assign($name, $elements->tree->list);
    }

    private function _assign_layouts()
    {
        $layouts = $this->outlet->from('App_Model_Layout')->where('is_template = 0')->orderBy('is_default DESC, title ASC')->find();
        $this->assign('layouts', App_Utils_Form::bind_select($layouts, 'id', 'title'));
    }

}
?>