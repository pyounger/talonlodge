<?php
/**
 * Concrete implementation of Smarty view  
 * 
 * @package app-start
 * @subpackage View
 */
class App_View_Smarty extends Cpf_Core_View_Smarty
{
	/**
	 * Shows statistics in the end of the page
	 * 
	 * @return void
	 */
	public function post_render()
	{
		$time = microtime(true) - CPF_START_TIME;

		$this->assign('cpf_stat_generated_in', $time);

		$this->assign('cpf_stat_memory_usage', memory_get_usage());
		$this->assign('cpf_stat_memory_peak_usage', memory_get_peak_usage());

		$this->assign('cpf_stat_db_query_count', Outlet::getInstance()->getConnection()->getPDO()->get_query_count());
		$this->assign('cpf_stat_db_exec_time', Outlet::getInstance()->getConnection()->getPDO()->get_exec_time_ms());

		$this->assign('cpf_stat_translations_count', Cpf_Core_Translate_Manager::get_instance()->translation_count);
		
		if ($this->config->value('CACHE.STORAGE') != 'null')
		{
			$this->assign('cpf_stat_cache_get_count', Cpf_Core_Cache_Manager::get_instance()->get_count);
			$this->assign('cpf_stat_cache_set_count', Cpf_Core_Cache_Manager::get_instance()->set_count);
			$this->assign('cpf_stat_cache_storage_name', Cpf_Core_Config::get_instance()->value('CACHE.STORAGE'));			
		}

		if (CPF_PROFILER_ENABLED)
		{
			pp(print_r(get_included_files(), true));
		}

		$this->display($this->config->value('VIEW.SMARTY.STAT_FOOTER_TEMPLATE'));
		parent::post_render();
	}
}
?>