<?php

class App_Controller_Backend_Talonlounge extends App_Controller_Base_BackendSmart

{

/*


	//protected $model = 'App_Model_Accomodation';



	public function __construct()

	{

		parent::__construct();

		$this->attachment_path = $this->config->value('APP.ACCOMODATION.PATH');

		$this->attachment_url = $this->config->value('APP.ACCOMODATION.URL');

		$this->has_attach = true;

		$this->attach_fields = array(

			array(

				'name' => 'main_image',

				'attach_field_delete' => 'delete_filename',

				'width' => 315,

				'height' => 215,

				'resize' => 'width'

				),

			array(

				'name' => 'one_bedroom_image',

				'attach_field_delete' => 'delete_one_bedroom_image',

				'width' => 395,

				'height' => 365,

				'resize' => 'both'

				),

			array(

				'name' => 'two_bedroom_image',

				'attach_field_delete' => 'delete_two_bedroom_image',

				'width' => 395,

				'height' => 365,

				'resize' => 'both'				

				),

			array(

				'name' => 'one_bedroom_small_image',

				'attach_field_delete' => 'delete_one_bedroom_small_image',

				'width' => 123,

				'height' => 100,

				'resize' => 'both'				

				),

			array(

				'name' => 'two_bedroom_small_image',

				'attach_field_delete' => 'delete_two_bedroom_small_image',

				'width' => 123,

				'height' => 100,

				'resize' => 'both'				

				)

			);

	}



	public function action_default()

	{

		$this->load_entities();

	}

	

	public function action_up()

	{

		$this->entity_up();

	}



	public function action_down()

	{

		$this->entity_down();

	}

	

	public function action_add()

	{

		$this->entity_add();

	}



	public function action_edit()

	{

		$this->entity_edit();

	}



	public function action_delete()

	{

		$this->entity_delete($this->request->param('id'));

	}

	protected function entity_delete_callback($entity)

	{

		foreach ($this->attach_fields as $field)

		{

			$field_name = $field['name'];

			$path = App_Utils_Image::get_path($entity->$field_name, $this->attachment_path);

			@unlink($path);

		}

	}



	public function action_toggle_published()

	{

		$this->entity_toggle_published();

	}



	public function action_ajax_move()

	{

		$this->view = new Cpf_Core_View_Json();

		$ids = $this->request->post('ids');

		

		if (isset($ids))

		{

			$minimum = intval($this->request->post('min_priority'));

			$ids = explode('-', $ids);



			$query[] = 'UPDATE `items` SET `priority` = CASE `id`';



			$p = $minimum;

			foreach ($ids as $id)

			{

				$query[] = sprintf('WHEN %d THEN %d', $id, $p);

				$p++;

			}

			$query[] = sprintf('END WHERE `id` IN (%s)', implode(',', $ids));



			$this->outlet->query(implode(' ', $query));

		}

	}

	

	protected function upload_attachment($entity, $file, $field = NULL)

	{

		if (is_null($field))

		{

			$field = $this->attach_field;

		}

		$ext = App_Utils_Image::get_extension($file['name']);

		$filename = App_Utils_Image::get_filename($file['name']);

		$path = App_Utils_Image::get_path($filename, $this->attachment_path);

		$r = move_uploaded_file($file['tmp_name'], $path);

		

		// find settings item by name

		$settings = null;

		foreach ($this->attach_fields as $v)

		{

			if ($v['name'] == $field)

				$settings = $v;

		}

		if (!is_null($settings))

		{

			App_Utils_Image::resize_image($path, $path, $settings['width'], $settings['height'], $this->config->value('APP.PHOTOS.JPEG_QUALITY'), $invert_scaling = ($settings['resize'] == 'width' || $settings['resize'] == 'height'), $settings['resize'] == 'width', $settings['resize'] == 'height');

		}

		

		$entity->$field = $filename;

		$entity->ext = $ext;

	}

	

}



class App_Controller_Backend_Accomodation_Form_Helper extends App_Local_Form_Helper

{

	protected function pre_validate()

	{

		$attach_fields = array('main_image', 'one_bedroom_image', 'two_bedroom_image');

		foreach ($attach_fields as $attach_field)

		{

			if (isset($this->request->files[$attach_field]))

			{

				$file = $this->request->files[$attach_field];

				if ($file['error'] !== UPLOAD_ERR_NO_FILE)

				{

					if ($file['error'] === UPLOAD_ERR_OK)

					{

						if (!in_array($file['type'], $this->config->value('APP.ACCOMODATION.TYPES')))

						{

							$this->errors[] = t('backend.accomodation.upload_correct_file');

						}

					}

					else

					{

						$this->errors[] = sprintf('%s: %s', t('backend.accomodation.upload_error'), $file['error']);

					}

				}

			}

			else

			{

				$this->errors[] = t('backend.accomodation.required_filename');

			}

		}

	}
*/
}

?>