<?php /* Smarty version Smarty-3.0.8, created on 2016-10-04 07:44:38
         compiled from "/home2/talonlod/public_html/app/templates/layouts/pages/frontend/sitemap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106953263257f3ce66a45bc1-19219054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e919110b6ccf19af66187d9ab758bbe6f0e4e1f' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/pages/frontend/sitemap.tpl',
      1 => 1475595866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106953263257f3ce66a45bc1-19219054',
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