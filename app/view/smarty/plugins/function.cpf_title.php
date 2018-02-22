<?php
/**
 * Returns name of the field for class 
 * 
 * @package app-start
 * @subpackage SmartyPlugins
 */

/**
 * smarty_function_cpf_title()
 * 
 * @param array $params Params, used values are <samp>var=...</samp>, <samp>field=...</samp> and <samp>class=...</samp>
 * @param mixed $smarty Instance of Smarty
 * @return
 */
function smarty_function_cpf_title($params, &$smarty)
{
	
	$class_name = isset($params['class']) ?  $params['class'] : str_replace(array('_OutletProxy', '_ViewModel'), '', get_class($params['var']));
	
	$config = cpf_config('MODEL.OUTLET.CONFIG');

	return t($config['classes'][$class_name]['resources'][$params['field']]);	 
}
?>