<?php /* Smarty version Smarty-3.0.8, created on 2018-01-11 09:33:26
         compiled from "/home2/talonlod/public_html/app/templates/snippets/frontend_elements.image.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17879937275a57adf6dadf20-08931576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42551f3825ef440dff352d22b053c2a8b75e19b1' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/snippets/frontend_elements.image.tpl',
      1 => 1515695545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17879937275a57adf6dadf20-08931576',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style type="text/css">
	.bc:after{
		content: " " !important;
	}
</style>
<table class="bordered-table">
	<tr>
		<td class="corners blt">&nbsp;</td>
		<td class="top-bottom bt">&nbsp;</td>
		<td class="corners brt">&nbsp;</td>
	</tr>
	<tr class="img">
		<td class="left-right bl">&nbsp;</td>
		<td class="bc"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
" width="<?php echo $_smarty_tpl->getVariable('width')->value;?>
" height="<?php echo $_smarty_tpl->getVariable('height')->value;?>
" alt="<?php echo $_smarty_tpl->getVariable('alt')->value;?>
" /></td>
		<td class="left-right br">&nbsp;</td>
	</tr>
	<tr>
		<td class="corners blb">&nbsp;</td>
		<td class="top-bottom bb">&nbsp;</td>
		<td class="corners brb">&nbsp;</td>
	</tr>
</table>
