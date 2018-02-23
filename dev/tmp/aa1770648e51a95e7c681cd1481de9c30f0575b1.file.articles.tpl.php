<?php /* Smarty version Smarty-3.0.8, created on 2015-01-21 15:58:39
         compiled from "/home2/talonlod/public_html/app/templates/layouts/pages/frontend/articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132136357654c04b3f475568-83183136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa1770648e51a95e7c681cd1481de9c30f0575b1' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/pages/frontend/articles.tpl',
      1 => 1417641695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132136357654c04b3f475568-83183136',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="h-articles-wrapper l-center">
    <?php echo $_smarty_tpl->getVariable('page')->value->content['heading'];?>

	<div class="h-articles-container">
		<div class="b-articles-i">
            <?php echo $_smarty_tpl->getVariable('page')->value->content['column-1'];?>

		</div>
		<div class="b-articles-i b-articles-i-margin">
            <?php echo $_smarty_tpl->getVariable('page')->value->content['column-2'];?>

		</div>
		<div class="b-articles-i b-articles-i-margin">
            <?php echo $_smarty_tpl->getVariable('page')->value->content['column-3'];?>

		</div>
	</div>
</div>