<?php
class App_Controller_Backend_Banners extends App_Controller_Base_BackendSmart
{
    protected $model = 'App_Model_Banner';

    public function __construct()
    {
        parent::__construct();
        $this->attachment_path = $this->config->value('APP.BANNERS.PATH');
        $this->attachment_url = $this->config->value('APP.BANNERS.URL');
        $this->has_attach = true;
        $this->attach_field = 'filename';
    }

    public function action_default()
    {
        $this->load_entities();
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
        $path = App_Utils_Image::get_path($entity->filename, $this->attachment_path);
        @unlink($path);
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

    protected function upload_attachment($entity, $file)
    {
        $ext = App_Utils_Image::get_extension($file['name']);
        $filename = App_Utils_Image::get_filename($file['name']);
        $path = App_Utils_Image::get_path($filename, $this->attachment_path);
        move_uploaded_file($file['tmp_name'], $path);
        if (!in_array($ext, array('gif', 'swf')))
            App_Utils_Image::resize_image($path, $path, $this->config->value('APP.BANNERS.WIDTH'), $this->config->value('APP.BANNERS.HEIGHT'));
        $field = $this->attach_field;
        $entity->$field = $filename;
        $entity->extension = $ext;
    }
}

class App_Controller_Backend_Banners_Form_Helper extends App_Local_Form_Helper
{
    protected function pre_validate()
    {
        if (isset($this->request->files['filename']))
        {
            $file = $this->request->files['filename'];
            if ($file['error'] !== UPLOAD_ERR_NO_FILE)
            {
                if ($file['error'] === UPLOAD_ERR_OK)
                {
                    if (!in_array($file['type'], $this->config->value('APP.BANNERS.TYPES')))
                    {
                        $this->errors[] = t('backend.banners.upload_correct_file');
                    }
                }
                else
                {
                    $this->errors[] = sprintf('%s: %s', t('backend.banners.upload_error'), $file['error']);
                }
            }
        }
        else
        {
            $this->errors[] = t('backend.banners.required_filename');
        }
    }
}
?>
