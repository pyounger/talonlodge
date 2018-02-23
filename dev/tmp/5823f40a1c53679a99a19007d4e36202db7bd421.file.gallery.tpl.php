<?php /* Smarty version Smarty-3.0.8, created on 2015-01-21 06:43:41
         compiled from "/home2/talonlod/public_html/app/templates/layouts/pages/frontend/gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160937921254bfc92d31ff03-12910710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5823f40a1c53679a99a19007d4e36202db7bd421' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/pages/frontend/gallery.tpl',
      1 => 1417641699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160937921254bfc92d31ff03-12910710',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="b-gallery-wrapper l-center">
	<div class="b-gallery-header">
        <?php echo $_smarty_tpl->getVariable('page')->value->content['heading'];?>

		<div class="b-gallery-subheader">
			<?php echo $_smarty_tpl->getVariable('page')->value->content['subheader'];?>

		</div>
		<div class="b-gallery-social">
			<?php $_template = new Smarty_Internal_Template('includes/snippet-social.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		</div>
	</div>
    <?php echo $_smarty_tpl->getVariable('page')->value->content['content'];?>

</div>
