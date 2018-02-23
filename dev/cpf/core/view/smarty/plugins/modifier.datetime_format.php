<?php
/**
 * Smarty date format function
 * 
 * @package CPF
 * @subpackage SmartyPlugins
 */

function smarty_modifier_datetime_format($date, $format)
{
	if (isset($date))
	{
		return date_format($date, $format);
	}
}
?>
