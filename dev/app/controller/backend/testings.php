<?php

class App_Controller_Backend_Testings extends App_Controller_Base_BackendSmart

{

    public

        $model = 'App_Model_Testing';



    public function __construct()

    {

        parent::__construct();

        $this->attachment_path = $this->config->value('APP.TESTINGS.PATH');

        $this->attachment_url = $this->config->value('APP.TESTINGS.URL');

        $this->has_attach = true;

        $this->attach_field = 'filename';

    }



    /* actions */

    public function action_default()

    {

        $this->load_entities();

    }



    public function action_add()

    {

		$this->_assign_categories();

        $this->entity_add();

    }

		protected function entity_add_callback_after($entity)

		{

			$this->_check_categories($entity);

		}

		protected function entity_add_callback($entity)

		{

			$this->_check_categories($entity);

		}

		protected function entity_add_load()

		{

			$this->assign('categories_values', array());

		}



    public function action_edit()

    {

		$this->_assign_categories();

        $this->entity_edit();

    }

		protected function entity_edit_callback($entity)

		{

			$this->_check_categories($entity);

		}

		protected function entity_edit_load($entity)

		{

			$categories = $this->outlet->from('App_Model_TestingsInCategory')->where('testing_id = ?', array($entity->id))->find();

			$result = array();

			foreach ($categories as $category)

			{

				$result[] = $category->category_id;

			}

			$this->assign('categories_values', $result);

		}



    public function action_delete()

    {

        $this->entity_delete($this->request->param('id'));

    }



    public function action_toggle_published()

    {

        $this->entity_toggle_published();

    }





    protected function upload_attachment($entity, $file)

    {

        $ext = App_Utils_Image::get_extension($file['name']);

        $filename = App_Utils_Image::get_filename($file['name']);

        $path = App_Utils_Image::get_path($filename, $this->attachment_path);

        $r = move_uploaded_file($file['tmp_name'], $path);



		$w = $this->config->value('APP.TESTINGS.FULL_WIDTH');

		$h = $this->config->value('APP.TESTINGS.FULL_HEIGHT');

		App_Utils_Image::resize_image($path, $path, $w, $h, $this->config->value('APP.PHOTOS.JPEG_QUALITY'), false, true);

		App_Utils_Image::crop($path, $path, $w, $h, 0, 0, $w, $h, $this->config->value('APP.PHOTOS.JPEG_QUALITY'));



		$filename_parts = explode('.', $filename);

		$filename_parts[count($filename_parts)-2] .= '_thumb';

		$filename_thumb = implode('.', $filename_parts);

        $new_path = App_Utils_Image::get_path($filename_thumb, $this->attachment_path);

		$w = $this->config->value('APP.TESTINGS.WIDTH');

		$h = $this->config->value('APP.TESTINGS.HEIGHT');

		App_Utils_Image::resize_image($path, $new_path, $w, $h, $this->config->value('APP.PHOTOS.JPEG_QUALITY'), 1);

		App_Utils_Image::crop($new_path, $new_path, $w, $h, 0, 0, $w, $h, $this->config->value('APP.PHOTOS.JPEG_QUALITY'));



        $field = $this->attach_field;

        $entity->$field = $filename;

        $entity->filename_thumb = $filename_thumb;

        $entity->ext = $ext;

    }



	private function _assign_categories()

	{

		$categories = $this->outlet->from('App_Model_TestingCategory')->orderBy('type ASC')->find();

		$result = array();

		foreach ($categories as $category)

		{

			if (!isset($result[$category->type]))

				$result[$category->type] = array();

			$result[$category->type][] = array('id' => $category->id, 'title' => $category->title);

		}

		foreach ($result as $key => $value)

		{

			$keyname = sprintf('%s_types', $key);

			$this->assign($keyname, $value);

		}

	}

	

	private function _check_categories($entity)

	{

		if ($this->request->is_post)

		{

			if ($entity->id > 0)

			{

				$this->outlet->query('delete from {App_Model_TestingsInCategory} WHERE testing_id = ?', array($entity->id));

			}

			$fields = array('meal_type', 'fish_type', 'technique_type');

			foreach ($fields as $field)

			{

				if ($this->request->is_post && ($categories = $this->request->post($field)) !== FALSE && is_array($categories))

				{

					if ($entity->id > 0)

					{

						foreach ($categories as $category)

						{

							$c = new App_Model_TestingsInCategory();

							$c->category_id = $category;

							$c->testing_id = $entity->id;

							$this->outlet->save($c);

						}

					}

					$entity->$field = implode(',', $categories);

				}

				else

				{

					$entity->$field = null;

				}

			}

		}

	}



}

?>