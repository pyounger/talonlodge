<?php /* Smarty version Smarty-3.0.8, created on 2015-02-27 03:01:17
         compiled from "/home2/talonlod/public_html/app/templates/layouts/pages/frontend/articles_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177283607654f05c8db5add8-95880718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9dfcf830c82e2a6b54f713636e21594838fb784' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/pages/frontend/articles_view.tpl',
      1 => 1417641696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177283607654f05c8db5add8-95880718',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="h-articles-view-wrapper l-center">
    <?php echo $_smarty_tpl->getVariable('page')->value->content['heading'];?>

	<div class="h-articles-view-container">
		<div class="b-articles-view-l">
            <?php echo $_smarty_tpl->getVariable('page')->value->content['gallery'];?>

			<div class="b-articles-view-subtext">
                <?php echo $_smarty_tpl->getVariable('page')->value->content['gallery-subheader'];?>

			</div>
			<div class="b-articles-view-text">
                <?php echo $_smarty_tpl->getVariable('page')->value->content['gallery-p'];?>

			</div>
		</div>
		<div class="b-articles-view-r">
            <?php echo $_smarty_tpl->getVariable('page')->value->content['content'];?>

		</div>
	</div>
</div>