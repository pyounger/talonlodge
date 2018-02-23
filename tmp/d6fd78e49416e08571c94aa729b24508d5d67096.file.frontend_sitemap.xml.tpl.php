<?php /* Smarty version Smarty-3.0.8, created on 2016-10-04 22:22:31
         compiled from "/home2/talonlod/public_html/app/templates/frontend_sitemap.xml.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58683496757f49c27cee516-32863219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6fd78e49416e08571c94aa729b24508d5d67096' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_sitemap.xml.tpl',
      1 => 1475595489,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58683496757f49c27cee516-32863219',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home2/talonlod/public_html/cpf/libs/smarty/plugins/modifier.date_format.php';
?><?php echo '<?xml';?> version="1.0" encoding="UTF-8"<?php echo '?>';?>
<?php $_smarty_tpl->tpl_vars['now'] = new Smarty_variable(smarty_modifier_date_format(time(),"%Y-%m-%d"), null, null);?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

		<url>
			<loc><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_index','abs'=>true),$_smarty_tpl);?>
</loc>
			<lastmod><?php echo $_smarty_tpl->getVariable('now')->value;?>
</lastmod>
			<changefreq>daily</changefreq>
			<priority>1.0</priority>
		</url>

		<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
?>
			<?php if ($_smarty_tpl->getVariable('page')->value->type=='content'&&$_smarty_tpl->getVariable('page')->value->slug!=''){?>
			<url>
				<loc><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_page','slug'=>$_smarty_tpl->getVariable('page')->value->slug,'abs'=>true),$_smarty_tpl);?>
</loc>
				<lastmod><?php echo $_smarty_tpl->getVariable('now')->value;?>
</lastmod>
				<changefreq><?php echo $_smarty_tpl->getVariable('pages_changefreq')->value;?>
</changefreq>
				<priority><?php echo $_smarty_tpl->getVariable('pages_priority')->value;?>
</priority>
			</url>
			<?php }?>
		<?php }} ?>
		
</urlset>