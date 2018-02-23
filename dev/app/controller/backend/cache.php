<?php
class App_Controller_Backend_Cache extends App_Controller_Base_Backend
{
	public function action_flush()
	{
		// Cache
		Cpf_Core_Cache_Manager::get_instance()->flush();

		$this->messenger->info(t('All caches were sucessfuly flushed'));
		$this->redirect_backend_back();
	}
}

?>