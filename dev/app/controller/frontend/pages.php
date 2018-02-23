<?php

class App_Controller_Frontend_Pages extends App_Controller_Base_Frontend

{

	public function action_default()

	{

		if ( ($slug = $this->request->param('slug')) !== FALSE && !is_null($page = $this->outlet->from('App_Model_Page')->where('slug = ? AND is_published = 1', array($slug))->findOne()))

		{

             $galleryID = array();

             if ($this->request->param('slug') == "lodge-accommodations") {
			 
				 $decodeIt = $page->content;           // get gallery json data(Parvez)
				 $decodeIt = json_decode($decodeIt);
				 $decodeIt = $decodeIt->{'column-1'};         // access column-1 for id
				 $checkEmptyOrNot = array_filter($decodeIt);

				 if (!empty($checkEmptyOrNot)) {

				 	$galleryID = $decodeIt[0]->id;

				 }

		  }
		  else{

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


				 // echo "<pre>";
				 // print_r($galleryID);
				 // echo "</pre>";
				 // exit();
				
		  }

		   // echo "<pre>";
				 // print_r($galleryID);
				 // echo "</pre>";
				 // exit();

		  //  if ($this->request->param('slug') == "talon-service") {
			 
				//  $decodeIt = $page->content;           // get gallery json data(Parvez)
				//  $decodeIt = json_decode($decodeIt);
				
				//  $decodeIt = $decodeIt->gallery;         // access column-1 for id
				//  $checkEmptyOrNot = array_filter($decodeIt);
 				
				//  if (!empty($checkEmptyOrNot)) {

				//  	$galleryID = $decodeIt[0]->id;	

				//  }

		  // }

		  // if ($this->request->param('slug') == "cuisine-events") {
			 
				//  $decodeIt = $page->content;           // get gallery json data(Parvez)
				//  $decodeIt = json_decode($decodeIt);
				
				//  $decodeIt = $decodeIt->gallery;         // access column-1 for id
				//  // echo "<pre>";
				//  // print_r($decodeIt);
				//  // echo "</pre>";
				//  // exit();
				//  $checkEmptyOrNot = array_filter($decodeIt);
 				
				//  if (!empty($checkEmptyOrNot)) {

				//  	$galleryID = 42; //$decodeIt[0]->id;	
				//  	//print_r($galleryID); exit();

				//  }

		  // }

			$this->_load_page($page);

			// echo "<pre>";
			// 	//print_r($decodeIt->gallery);
			// 	 print_r($galleryID);
			// 	echo "</pre>"; exit();
			
			$this->loadgallery($galleryID);

		}

		else

		{

            //$this->give_404();

			@ob_clean();

			ob_start();

			

			header('HTTP/1.0 404 Not Found');

			header('Status: 404 Not Found'); 

			

			$page = $this->outlet->load('App_Model_Page', 51);

			$page->seo_title = '404 &mdash; Page Not Found';

			$this->_load_page($page);

			$this->assign('is404', true);

		}

	}

	

	private function _load_page($page)

	{

		$page->layout = $this->outlet->load('App_Model_Layout', $page->layout_id);



		// load page slideshow

		$slideshow = $this->load_page_slideshow($page);

		$this->assign('slideshow', $slideshow);



		// load page content

		$page = $this->load_page_content($page);

		$this->assign('page', $page);

		//echo $page->layout->template_name; exit();

		$this->assign('template_name', sprintf('layouts/pages/frontend/%s', $page->layout->template_name));

	}

	private function loadgallery($getDataID)
	{

		if (($id = $getDataID) !== FALSE && !is_null($entity = $this->outlet->from('App_Model_Gallery')->where('{App_Model_Gallery.id} = ?',array((int)$id))->with('App_Model_GalleryType')->findOne()))

                {

                    $temp = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($entity->id))->orderBy('priority ASC')->find();

                    $photos = array();

                    foreach ($temp as $photo)

                    {

                        //$photo->versions = json_decode($photo->versions, true);

                        $photos[] = $photo;

                    }

                    $entity->photos = $photos;

                    // echo "<pre>";
                    // print_r($entity->type_id);
                    // echo "</pre>"; exit();

                    $this->assign('gallery', $entity);

                }


	}

	

	

}

?>