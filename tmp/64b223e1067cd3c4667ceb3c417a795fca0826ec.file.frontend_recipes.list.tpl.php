<?php /* Smarty version Smarty-3.0.8, created on 2016-10-20 15:57:12
         compiled from "/home2/talonlod/public_html/app/templates/frontend_recipes.list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141511902654bfca5fafa315-95782095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64b223e1067cd3c4667ceb3c417a795fca0826ec' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_recipes.list.tpl',
      1 => 1475595481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141511902654bfca5fafa315-95782095',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<div class="b-recipe__items">
		<?php  $_smarty_tpl->tpl_vars['recipe'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recipes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['recipe']->iteration=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['recipe']->key => $_smarty_tpl->tpl_vars['recipe']->value){
 $_smarty_tpl->tpl_vars['recipe']->iteration++;
?>
		<div class="b-recipe__i<?php if ($_smarty_tpl->tpl_vars['recipe']->iteration%3==0){?> last<?php }?>">
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_recipes_view','id'=>$_smarty_tpl->getVariable('recipe')->value->id,'slug'=>$_smarty_tpl->getVariable('recipe')->value->slug),$_smarty_tpl);?>
">
				<table class="bordered-table">
					<tr>
						<td class="corners blt">&nbsp;</td>
						<td class="top-bottom bt">&nbsp;</td>
						<td class="corners brt">&nbsp;</td>
					</tr>
					<tr class="img">
						<td class="left-right bl">&nbsp;</td>
						<td class="bc"><img src="<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('recipe')->value->filename_thumb;?>
" width="300" height="168" alt="<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
" /></td>
						<td class="left-right br">&nbsp;</td>
					</tr>
					<tr>
						<td class="corners blb">&nbsp;</td>
						<td class="top-bottom bb">&nbsp;</td>
						<td class="corners brb">&nbsp;</td>
					</tr>
				</table>
				<span><?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
</span>
			</a>
		</div>
		<?php }} ?>
	</div>