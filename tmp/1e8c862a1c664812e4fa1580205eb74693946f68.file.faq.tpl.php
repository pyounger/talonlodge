<?php /* Smarty version Smarty-3.0.8, created on 2016-10-04 07:50:47
         compiled from "/home2/talonlod/public_html/app/templates/layouts/pages/frontend/faq.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34635560757f3cfd79ad136-80178617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e8c862a1c664812e4fa1580205eb74693946f68' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/pages/frontend/faq.tpl',
      1 => 1475595860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34635560757f3cfd79ad136-80178617',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="h-faq-wrapper l-center">
    <?php echo $_smarty_tpl->getVariable('page')->value->content['heading'];?>

	<div class="h-faq-container">
		<div class="b-faq-l">
            <?php echo $_smarty_tpl->getVariable('page')->value->content['content'];?>

		</div>
		<div class="b-faq-r">
			<div class="b-round-button">
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_reservation'),$_smarty_tpl);?>
">
					<em>Click Here to Make Reservation</em>
				</a>
			</div>
			
			<div class="b-faq-button-r">
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_reservation'),$_smarty_tpl);?>
" class="b-faq-button-l">
					More Information
				</a>
			</div>
			<div class="b-social-buttons">
				<?php $_template = new Smarty_Internal_Template('includes/snippet-social.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			</div>
		</div>
	</div>
</div>