<?php
class App_Controller_Frontend_Index extends App_Controller_Base_Frontend
{
	public function action_default()
	{
        if (!is_null($page = $this->outlet->from('App_Model_Page')->where('`type` = "component" AND `component` = "main_page"')->findOne()))
        {

            $galleryID = array();

             if ($_SERVER['SERVER_NAME'] == "www.talonlodge.com") {
             
                 $decodeIt = $page->content;           // get gallery json data(Parvez)
                 $decodeIt = json_decode($decodeIt);
                 $decodeIt = isset($decodeIt->gallery) ? $decodeIt->gallery : array();
                 $checkEmptyOrNot = array_filter($decodeIt);
                
                 if (!empty($checkEmptyOrNot)) {

                     for ($i=0 ; $i < count($decodeIt) ; $i++) {
                        $typeka =  $decodeIt[$i]->type;
                        if ($typeka == "galleries") {
                            
                            $galleryID = $decodeIt[$i]->id;
                        }
                     }
                 }

             }

            $this->loadgallery($galleryID);
            $page->layout = $this->outlet->load('App_Model_Layout', $page->layout_id);

            // load page slideshow
            $slideshow = $this->load_page_slideshow($page);
            $this->assign('slideshow', $slideshow);

            // load page content
            $page = $this->load_page_content($page);
            $this->assign('page', $page);

            $this->assign('template_name', sprintf('layouts/pages/frontend/%s', $page->layout->template_name));
        }
	}

    private function loadgallery($getDataID)
    {

        if (($id = $getDataID) !== FALSE && !is_null($entity = $this->outlet->from('App_Model_Gallery')->where('{App_Model_Gallery.id} = ?',array((int)$id))->with('App_Model_GalleryType')->findOne()))

                {

                    $temp = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($entity->id))->orderBy('priority ASC')->find();

                    $photos = array();

                    foreach ($temp as $photo)

                    {

                        $photos[] = $photo;

                    }

                    $entity->photos = $photos;

                    $this->assign('gallery', $entity);

                }

         }

}

?>