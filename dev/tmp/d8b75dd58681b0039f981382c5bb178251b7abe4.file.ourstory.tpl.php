<?php /* Smarty version Smarty-3.0.8, created on 2015-01-21 06:49:06
         compiled from "/home2/talonlod/public_html/app/templates/layouts/pages/frontend/ourstory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73087754654bfca72c54cf3-92676049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8b75dd58681b0039f981382c5bb178251b7abe4' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/pages/frontend/ourstory.tpl',
      1 => 1417641701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73087754654bfca72c54cf3-92676049',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="h-ourstory-wrapper l-center">
	<div class="h-ourstory-container">
		<div class="b-ourstory-l">
			<?php echo $_smarty_tpl->getVariable('page')->value->content['heading'];?>

			<?php echo $_smarty_tpl->getVariable('page')->value->content['gallery'];?>

		</div><!-- /.b-ourstory-l-->
		<div class="b-ourstory-r">
			<div class="h-content-text-inner-sidebar">
				<div class="baltica-plain b-ourstory-sidebar-title-1">
					From Our
				</div>
				<div class="baltica-plain b-ourstory-sidebar-title-2">
					Customers
				</div>
				<div class="h-content-text-inner-sidebar-quote-wrapper">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>"frontend_reviews",'cache_ttl'=>@CPF_CACHE_TIME_NEVER),$_smarty_tpl);?>

				
				<div class="b-ourstory-sidebar-content"><?php echo $_smarty_tpl->getVariable('page')->value->content['sidebar'];?>
</div>
			</div>
			<div class="b-social-buttons ourstory-social">
				<?php $_template = new Smarty_Internal_Template('includes/snippet-social.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			</div>
			</div><!-- /.h-content-text-inner-sidebar -->
		</div><!-- /.b-ourstory-r-->
	</div><!-- /.h-ourstory-container -->
	<div class="b-ourstory-footer">
		<div class="b-ourstory-footer-l">
			<?php echo $_smarty_tpl->getVariable('page')->value->content['content-left'];?>

		</div>
		<div class="b-ourstory-footer-r">
			<?php echo $_smarty_tpl->getVariable('page')->value->content['content-right'];?>

		</div>
	</div>
</div><!-- /.h-ourstory-wrapper l-center -->