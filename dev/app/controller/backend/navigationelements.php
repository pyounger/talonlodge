<?php

class App_Controller_Backend_NavigationElements extends App_Controller_Base_BackendSmart

{

	public

	$model = 'App_Model_NavigationMenuElement',

	$parent_model = 'App_Model_NavigationMenu';



	public function __construct()

	{

		parent::__construct();

		$this->attachment_path = $this->config->value('APP.NAVIGATION.PATH');

		$this->attachment_url = $this->config->value('APP.NAVIGATION.URL');

		$this->has_attach = true;

		$this->attach_field = 'filename';

	}



	/* actions */

	public function action_view()

	{

		if (($id = $this->request->param('id')) !== FALSE && !is_null($menu = $this->outlet->load($this->parent_model, (int)$id)))

		{

			$this->assign('menu', $menu);

            // get tree

			$elements = new App_Model_NavigationMenuElementTree($menu->id, 0);

			$this->assign('cpf_entities', $elements->tree->list);

		}

		else

		{

			$this->record_doesnt_exist();

		}

	}



	public function action_default()

	{

		if (isset($_SESSION['mid']))

		{

			$this->redirect_backend($this->request->controller, 'view', array('id' => (int)$_SESSION['mid']));

		}

	}



	public function action_add()

	{

		if (($id = $this->request->param('mid')) !== FALSE && !is_null($menu = $this->outlet->load($this->parent_model, (int)$id)))

		{

            // store id in session

			$_SESSION['mid'] = $id;



            // assign menu

			$this->assign('menu', $menu);



            // assign pages

			$this->_assign_pages('pages');



            // assign menu elements

			$elements = new App_Model_NavigationMenuElementTree($menu->id);

			$this->assign('elements', $elements->tree->list);



            // assign navigation types

			$this->_assign_types();



            // assign navigation targets

			$this->_assign_targets();



            // add

			$this->entity_add();

		}

		else

		{

			$this->record_doesnt_exist();

		}

	}



	public function action_edit()

	{

		if (($id = $this->request->param('mid')) !== FALSE && !is_null($menu = $this->outlet->load($this->parent_model, (int)$id)))

		{

            // store id in session

			$_SESSION['mid'] = $id;



            // assign menu

			$this->assign('menu', $menu);



            // assign pages

			$this->_assign_pages('pages');



            // assign menu elements

			$elements = new App_Model_NavigationMenuElementTree($menu->id);

			$this->assign('elements', $elements->tree->list);



            // assign navigation types

			$this->_assign_types();



            // assign navigation targets

			$this->_assign_targets();



            // edit

			$this->entity_edit();

		}

		else

		{

			$this->record_doesnt_exist();

		}

	}

	protected function entity_edit_callback($entity)

	{

		if ($entity->type == 'page' && $entity->page_id > 0)

		{

			$page = $this->outlet->load('App_Model_Page', $entity->page_id);

			$entity->slug = $page->slug;

		}

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





	protected function upload_attachment($entity, $file)

	{

		$ext = App_Utils_Image::get_extension($file['name']);

		$filename = App_Utils_Image::get_filename($file['name']);

		$path = App_Utils_Image::get_path($filename, $this->attachment_path);

		$r = move_uploaded_file($file['tmp_name'], $path);





		if (!is_null($menu = $this->outlet->load('App_Model_NavigationMenu', $entity->menu_id)) && $menu->attributes)

		{

			$attributes = htmlspecialchars_decode(html_entity_decode($menu->attributes, ENT_QUOTES));

			$attributes = json_decode($attributes);

			if ($attributes->image_width && $attributes->image_height && $attributes->image_width > 0 && $attributes->image_height > 0)

			{

				App_Utils_Image::resize_image($path, $path, $attributes->image_width, $attributes->image_height, $this->config->value('APP.PHOTOS.JPEG_QUALITY'), isset($attributes->invert_scaling));

			}

			if ($attributes->crop)

			{

				App_Utils_Image::crop($path, $path, $attributes->image_width, $attributes->image_height, 0, 0, $attributes->image_width, $attributes->image_height, $this->config->value('APP.PHOTOS.JPEG_QUALITY'));

			}

		}

		$field = $this->attach_field;

		$entity->$field = $filename;

		$entity->ext = $ext;

	}



    /*

        Private

    */

        private function _assign_pages($name = 'cpf_entities')

        {

        	$elements = new App_Model_PageTree();

        	$this->assign($name, $elements->tree->list);

        }



        private function _assign_types()

        {

        	$types = array();

        	foreach ($this->config->value('APP.NAVIGATION.TYPES') as $type)

        	{

        		$temp = $type;

        		$temp['title'] = t($temp['title']);

        		$types[] = $temp;

        	}

        	$this->assign('types', $types);

        }



        private function _assign_targets()

        {

        	$targets = array();

        	foreach ($this->config->value('APP.NAVIGATION.TARGETS') as $target)

        	{

        		$temp = $target;

        		$temp['title'] = t($temp['title']);

        		$targets[] = $temp;

        	}

        	$this->assign('targets', $targets);

        }



    }

    ?>