<?php
/**
 * Base frontend controller
 * 
 * @package app-start
 * @subpackage Controllers
 * @abstract
 */
abstract class App_Controller_Base_Frontend extends App_Controller_Base_Common
{
    public function pre_action()
    {
        $page = $this->outlet->from('App_Model_Page')->where('is_template = 1')->limit(1)->findOne();
        if (!is_null($page))
        {
            $tpl = $this->load_page_content($page);
            $this->assign('tpl', $page);
        }
        parent::pre_action();
    }

    protected function load_page_slideshow($page)
    {
        $slideshow = $this->outlet->from('App_Model_Gallery')->where('page_id = ?', array($page->id))->findOne();
        if (!is_null($slideshow))
        {
            $photos = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($slideshow->id))->orderBy('priority ASC')->find();
            $slideshow->photos = $photos;
        }
        return $slideshow;
    }

    protected function load_page_content($page)
    {
        $content_types = $this->config->value('APP.CONTENT.CONTENT_TYPES');
        $page_content = array();
        $data = json_decode($page->content, true);

        if ($data && count($data) > 0)
        {
            // collect ids and prepare values
            $ids = array();
            $values = array();
            foreach ($content_types as $ctype)
            {
                $ids[$ctype] = array();
                $values[$ctype] = array();
            }
            foreach ($data as $placeholder => $contents)
            {
                foreach ($contents as $value)
                {
                    $ids[$value['type']][] = $value['id'];
                    $values[$value['type']][$value['id']] = '';
                }
                $page_content[$placeholder] = '';
            }

            // load blocks
            if (count($ids['blocks']) > 0)
            {
                $blocks = $this->outlet->from('App_Model_Block')->where(sprintf('id IN (%s)', implode(',', $ids['blocks'])))->find();
                foreach ($blocks as $block) {
                    $values['blocks'][$block->id] = $block->content;
                }
            }
            // load images
            if (count($ids['images']) > 0)
            {
                $images = $this->outlet->from('App_Model_Photo')->where(sprintf('id IN (%s)', implode(',', $ids['images'])))->find();
                foreach ($images as $image) {
                    $versions = json_decode($image->versions, true);
                    if (isset($versions['custom']))
                    {
                        $this->assign('path', App_Utils_Image::get_path($versions['custom']['filename'], $this->config->value('APP.PHOTOS.URLS.FRONTEND')));
                        $this->assign('width', $versions['custom']['width']);
                        $this->assign('height', $versions['custom']['height']);
                        $this->assign('alt', $image->title);
                        $content = $this->view->fetch('snippets/frontend_elements.image.tpl');
                        $values['images'][$image->id] = $content;
                    }
                }
            }
            // load videos
            if (count($ids['videos']) > 0)
            {
                $videos = $this->outlet->from('App_Model_Video')->where(sprintf('id IN (%s)', implode(',', $ids['videos'])))->find();
                foreach ($videos as $video) {
                            $this->assign('video', $video);
                            $content = $this->view->fetch('snippets/frontend_elements.video.tpl');
                            $values['videos'][$video->id] = $content;
                        }
            }
            // load galleries
            if (count($ids['galleries']) > 0)
            {
                $tree = new App_Model_GalleryTree();
                $galleries = $this->outlet->from('App_Model_Gallery')->with('App_Model_GalleryType')->where(sprintf('{App_Model_Gallery.id} IN (%s)', implode(',', $ids['galleries'])))->find();
                foreach ($galleries as $gallery) {
                    $images = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($gallery->id))->orderBy('priority ASC')->find();
                    $this->assign('images', $images);
                    $this->assign('gallery', $gallery);

                    $template = '';

                    if ($gallery->gallerytype->display_type == 'slider')
                    {
                        $template = 'snippets/frontend_elements.gallery.slider.tpl';
                    }
                    elseif ($gallery->gallerytype->display_type == 'carousel')
                    {
                        $template = 'snippets/frontend_elements.gallery.carousel.tpl';
                    }
                    elseif ($gallery->gallerytype->display_type == 'gallery')
                    {
                        $glr = $tree->find_first('id', $gallery->id);
                        $this->assign('galleries', array_merge(array($glr), $glr->nodes));
                        $template = 'snippets/frontend_elements.gallery.component.tpl';
                    }

                    $values['galleries'][$gallery->id] = $this->view->fetch($template);
                }
            }

            // final assign
            foreach ($data as $placeholder => $contents)
            {
                foreach ($contents as $value)
                {
                    $page_content[$placeholder] .= $values[$value['type']][$value['id']];
                }
            }

            $page->content = $page_content;
        }
        return $page;
    }
}
?>