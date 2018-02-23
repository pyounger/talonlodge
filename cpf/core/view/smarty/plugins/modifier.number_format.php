<?php
/**
 * <samp>number_format</samp> modifier
 * 
 * @package CPF
 * @subpackage SmartyPlugins
 */

/**
 * Smarty number_format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     number_format<br>
 * Purpose:  format strings via number_format
 *
 * @param float $number Number to format
 * @param integer $decimals Numbers after decimal dot
 * @param string $dec_point Symbol of decimal dot
 * @param string $thousands_sep Thousands separator
 * @return
 */
function smarty_modifier_number_format($number, $decimals = 2, $dec_point = ',', $thousands_sep = ' ')
{
	return number_format($number, $decimals, $dec_point, $thousands_sep);
}

?>
