<?php
/**
 * Smarty copyright function
 * 
 * @package CPF
 * @subpackage SmartyPlugins
 */

/**
 * Return copyright year range
 * 
 * @param mixed $release_year Year of release
 * @param string $format_1year Format for 1 year, default is: "<release_year>,&nbsp;<current_year>"
 * @param string $format Format for more than 1 year, default is "<release_year>&mdash;<current_year>"
 * @return string Formatted copyright string
 */
function smarty_modifier_copyright($release_year, $format_1year='%s,&nbsp;%s', $format='%s&mdash;%s')
{
	$current_year = intval(date("Y"));
	$release_year = intval($release_year);

	if ($current_year < $release_year)
	{
		return;
	}

	if ($release_year == $current_year)
	{
		return $release_year;
	}

	if (($current_year - $release_year) == 1)
	{
		return sprintf($format_1year, $release_year, $current_year);		
	}

	if ($current_year > $release_year)
	{
		return sprintf($format, $release_year, $current_year);
	}

}
?>
