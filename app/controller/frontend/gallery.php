<?php
class App_Controller_Frontend_Gallery extends App_Controller_Base_Frontend
{
	public function action_default()
	{
        if (!is_null($page = $this->outlet->from('App_Model_Page')->where('`type` = "component" AND `component` = "gallery"')->findOne()))
        {
            $page->layout = $this->outlet->load('App_Model_Layout', $page->layout_id);

            // load page slideshow
            $slideshow = $this->load_page_slideshow($page);
            $this->assign('slideshow', $slideshow);

            // load page content
            $page = $this->load_page_content($page);
            $this->assign('page', $page);

            $this->assign('template_name', sprintf('layouts/pages/frontend/%s', $page->layout->template_name));

            $this->view->template_name = 'frontend_pages.default.tpl';

            if (($id = 17) !== FALSE && !is_null($entity = $this->outlet->from('App_Model_Gallery')->where('{App_Model_Gallery.id} = ?',array((int)$id))->with('App_Model_GalleryType')->findOne()))

                {

                    $temp = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($entity->id))->orderBy('priority ASC')->find();

                    $photos = array();

                    foreach ($temp as $photo)

                    {

                        $photo->versions = json_decode($photo->versions, true);

                        $photos[] = $photo;

                    }

                    $entity->photos = $photos;

                    $this->assign('gallery', $entity);

                }
        }
        else
        {
            $this->give_404();
        }
	}

    public function action_view()
    {
        if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->from('App_Model_Gallery')->where('{App_Model_Gallery.id} = ?',array((int)$id))->with('App_Model_GalleryType')->findOne()))
        {
            $temp = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($entity->id))->orderBy('priority ASC')->find();
            $photos = array();
            foreach ($temp as $photo)
            {
                $photo->versions = json_decode($photo->versions, true);
                $photos[] = $photo;
            }
            $entity->photos = $photos;
            $this->assign('gallery', $entity);
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }
}
?>