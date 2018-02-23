<?php
/**
 * Smarty random function
 * 
 * @package CPF
 * @subpackage SmartyPlugins
 */

/**
 * Smarty random function
 * 
 * Purpose:  output a random number between $varIn and $varOut:
 *	{random in=$varIn out=$varOut}
 *	If you want to assign the random number to a variable
 *	instead of displaying it, you must write:
 *	{random in=$varIn out=$varOut assign=yourVar}
 *	Where yourVar can be anything. Then you'll get
 *	$yourVar equal to a random number between $varIn and $varOut.
 * @author Philippe Morange
 */
 
function smarty_function_random($params, &$smarty)
{
	extract($params);
	
	srand((double) microtime() * 1000000);
	
	$random_number = rand($in, $out);
	if (isset($assign)) {
		$smarty->assign($assign, $random_number);
	}
	else {
		return $random_number;
	}
}
?>