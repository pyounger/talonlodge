<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 13:08:41
         compiled from "/home2/talonlod/public_html/dev/app/templates/layouts/pages/frontend/sitemap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130895748856393069baafa6-13071897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdde79a010a3dd07f8bf5048ead069f5fd4881e7' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/pages/frontend/sitemap.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130895748856393069baafa6-13071897',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="b-sitemap-wrapper l-center">
    <?php if ($_smarty_tpl->getVariable('is404')->value){?><h1>Can't find what you're looking for?<br /><small>Try our site map</small></h1><?php }else{ ?><?php echo $_smarty_tpl->getVariable('page')->value->content['heading'];?>
<?php }?>
	<div class="b-sitemap-l">
        <?php echo $_smarty_tpl->getVariable('page')->value->content['column-1'];?>

	</div>
	<div class="b-sitemap-c">
        <?php echo $_smarty_tpl->getVariable('page')->value->content['column-2'];?>

	</div>
	<div class="b-sitemap-r">
        <?php echo $_smarty_tpl->getVariable('page')->value->content['column-3'];?>

	</div>
</div>