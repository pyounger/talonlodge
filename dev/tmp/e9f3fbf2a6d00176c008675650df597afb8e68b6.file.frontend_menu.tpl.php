<?php /* Smarty version Smarty-3.0.8, created on 2015-01-21 06:42:20
         compiled from "/home2/talonlod/public_html/app/templates/controls/frontend_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51922138154bfc8dc40d505-67884660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9f3fbf2a6d00176c008675650df597afb8e68b6' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/controls/frontend_menu.tpl',
      1 => 1417641642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51922138154bfc8dc40d505-67884660',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_replace')) include '/home2/talonlod/public_html/cpf/libs/smarty/plugins/modifier.replace.php';
?><?php $_smarty_tpl->tpl_vars['menu'] = new Smarty_variable($_smarty_tpl->getVariable('control_frontend_menu_menu')->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['elements'] = new Smarty_variable($_smarty_tpl->getVariable('control_frontend_menu_elements')->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['level'] = new Smarty_variable($_smarty_tpl->getVariable('control_frontend_menu_level')->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['em'] = new Smarty_variable($_smarty_tpl->getVariable('control_frontend_menu_em')->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['bg'] = new Smarty_variable($_smarty_tpl->getVariable('control_frontend_menu_bg')->value, null, null);?>

<?php if ($_smarty_tpl->getVariable('control_frontend_menu_custom_layout')->value){?>
	<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('control_frontend_menu_custom_layout')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php }else{ ?>
	<?php if (count($_smarty_tpl->getVariable('elements')->value)>1){?>
		<ul>
			<?php  $_smarty_tpl->tpl_vars['node'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('elements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['node']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['node']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu']['iteration']=0;
if ($_smarty_tpl->tpl_vars['node']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['node']->key => $_smarty_tpl->tpl_vars['node']->value){
 $_smarty_tpl->tpl_vars['node']->iteration++;
 $_smarty_tpl->tpl_vars['node']->last = $_smarty_tpl->tpl_vars['node']->iteration === $_smarty_tpl->tpl_vars['node']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu']['last'] = $_smarty_tpl->tpl_vars['node']->last;
?>
				<?php $_smarty_tpl->tpl_vars['item'] = new Smarty_variable($_smarty_tpl->getVariable('node')->value->data, null, null);?>
				<?php if ($_smarty_tpl->getVariable('item')->value->level>0&&(!$_smarty_tpl->getVariable('level')->value||($_smarty_tpl->getVariable('level')->value&&$_smarty_tpl->getVariable('item')->value->level==$_smarty_tpl->getVariable('level')->value))){?>
					<li<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['iteration']==2){?> class="first"<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['last']){?> class="last"<?php }?>>
						<a href="<?php if ($_smarty_tpl->getVariable('item')->value->type=='page'){?><?php if ($_smarty_tpl->getVariable('item')->value->slug){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_page','slug'=>$_smarty_tpl->getVariable('item')->value->slug),$_smarty_tpl);?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->getVariable('item')->value->url;?>
<?php }?>"<?php if ($_smarty_tpl->getVariable('item')->value->attributes){?> <?php echo smarty_modifier_replace($_smarty_tpl->getVariable('item')->value->attributes,'&quot;','"');?>
<?php }?><?php if ($_smarty_tpl->getVariable('item')->value->target=='_blank'){?> target="_blank"<?php }?><?php if ($_smarty_tpl->getVariable('bg')->value&&$_smarty_tpl->getVariable('item')->value->filename){?>style="background-image: url('<?php echo cpf_config('APP.NAVIGATION.URL');?>
<?php echo $_smarty_tpl->getVariable('item')->value->filename;?>
')"<?php }?>>
							<?php if ($_smarty_tpl->getVariable('control_frontend_menu_em')->value==1){?><em><?php echo $_smarty_tpl->getVariable('item')->value->title;?>
</em><?php }else{ ?><?php echo $_smarty_tpl->getVariable('item')->value->title;?>
<?php }?>
						</a>
					</li>
				<?php }?>
			<?php }} ?>
		</ul>
	<?php }?>
<?php }?>