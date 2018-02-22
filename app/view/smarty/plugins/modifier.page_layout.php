<?php
/**
 * <samp>page_layout</samp> modifier
 * 
 * @package CPF
 * @subpackage SmartyPlugins
 */

/**
 * Smarty number_format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     page_layout<br>
 * Purpose:
 *
 * @param string $grid Layout grid
 * @return
 */
function smarty_modifier_page_layout($grid, $data)
{
    $output = '';
    $output = str_replace('<table>', '<table class="table table-bordered table-striped">', $grid);

    foreach ($data as $placeholder => $content)
    {
        $placeholder_name = sprintf('{%s}', $placeholder);
        $output = str_replace($placeholder_name, $content, $output);
    }
	return $output;
}
?>
