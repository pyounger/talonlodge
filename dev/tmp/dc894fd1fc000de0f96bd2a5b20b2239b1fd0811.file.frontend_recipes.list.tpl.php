<?php /* Smarty version Smarty-3.0.8, created on 2015-12-17 08:00:16
         compiled from "/home2/talonlod/public_html/dev/app/templates/frontend_recipes.list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16783132545672ea205d6d73-97780230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc894fd1fc000de0f96bd2a5b20b2239b1fd0811' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/frontend_recipes.list.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16783132545672ea205d6d73-97780230',
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