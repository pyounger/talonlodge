<?php
class App_Controller_Frontend_Banners extends App_Controller_Base_Frontend
{
	public function action_default()
	{
		if (($id = $this->request->param('id')) !== FALSE && !is_null( $banner = $this->outlet->load('App_Model_Banner', (int)$id) ))
		{
			$banner->clicks_count++;
			$this->outlet->save($banner);

			// считаем количество переходов для данного баннера
			$month = date('Y-m-01', time());
			$record = $this->outlet->from('App_Model_BannersVisit')->where('{App_Model_BannersVisit.banner_id} = ? AND {App_Model_BannersVisit.month} = ?', array($id, $month))->findOne();

			if ($record)
			{
				$record->clicks++;
				$this->outlet->save($record);
			}
			else
			{
				$record = new App_Model_BannersVisit();
				$record->banner_id = $id;
				$record->month = new Datetime($month);
				$record->clicks = 1;
				$this->outlet->save($record);
			}

			$this->view = new Cpf_Core_View_Redirect($banner->url);
		}

	}

}
?>