<?php /* Smarty version Smarty-3.0.8, created on 2016-11-16 09:20:37
         compiled from "/home2/talonlod/public_html/dev/app/templates/layouts/pages/frontend/articles_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1434993057582ca3754fd9e6-96745726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd27fd1178ef415337e3ab6688b87714c4f7ff770' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/pages/frontend/articles_view.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1434993057582ca3754fd9e6-96745726',
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