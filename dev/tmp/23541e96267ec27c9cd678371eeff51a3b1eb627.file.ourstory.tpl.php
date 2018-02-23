<?php /* Smarty version Smarty-3.0.8, created on 2018-01-03 11:52:03
         compiled from "/home2/talonlod/public_html/dev/app/templates/layouts/pages/frontend/ourstory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14166008675a4d427362e9d8-57020428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23541e96267ec27c9cd678371eeff51a3b1eb627' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/pages/frontend/ourstory.tpl',
      1 => 1515012721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14166008675a4d427362e9d8-57020428',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_debug_print_var')) include '/home2/talonlod/public_html/dev/cpf/libs/smarty/plugins/modifier.debug_print_var.php';
?><style type="text/css">

	.b-privacy-wrapper11 {

    width: 100% !important;
    margin-left: -5px !important;
}

</style>
<div class="h-ourstory-wrapper l-center">

	<div class="h-ourstory-container">

		<div class="b-ourstory-l">

			<?php echo $_smarty_tpl->getVariable('page')->value->content['heading'];?>


			<?php if ($_smarty_tpl->getVariable('gallery')->value->type_id==2){?>

		     	<div class="b-privacy-wrapper11">
				 <div class="b-privacy-l">
				        <?php echo $_smarty_tpl->getVariable('page')->value->content['gallery'];?>
 <!-- first gallery for carousel -->
				  </div>
				</div>

			<?php }elseif($_smarty_tpl->getVariable('gallery')->value->type_id==1){?> 
      
      			<?php echo $_smarty_tpl->getVariable('page')->value->content['gallery'];?>

   
    		<?php }else{ ?>

			    <?php $_template = new Smarty_Internal_Template('snippets/frontend_element.newgallery.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('path',Smarty::$_smarty_vars['capture']['path']);$_template->assign('width',$_smarty_tpl->getVariable('glr')->value->cover['width']);$_template->assign('height',$_smarty_tpl->getVariable('glr')->value->cover['height']);$_template->assign('alt',$_smarty_tpl->getVariable('glr')->value->alt); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

  		    <?php }?>
        <!-- <p><?php echo smarty_modifier_debug_print_var($_smarty_tpl->getVariable('gallery')->value);?>
</p> (Parvez)-->
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