<?php /* Smarty version Smarty-3.0.8, created on 2016-09-23 08:41:10
         compiled from "/home2/talonlod/public_html/dev/app/templates/controls/frontend_reviews.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84774287857e55b26958824-33219121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ddd24601e716b371917c2789dd70316ac107cef' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/controls/frontend_reviews.tpl',
      1 => 1474648865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84774287857e55b26958824-33219121',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/home2/talonlod/public_html/dev/cpf/libs/smarty/plugins/modifier.truncate.php';
?>﻿<?php $_smarty_tpl->tpl_vars["ta"] = new Smarty_variable($_smarty_tpl->getVariable('control_frontend_reviews_tripadvisor')->value, null, null);?>
<?php $_smarty_tpl->tpl_vars["fb"] = new Smarty_variable($_smarty_tpl->getVariable('control_frontend_reviews_facebook')->value, null, null);?>
<?php $_smarty_tpl->tpl_vars["tw"] = new Smarty_variable($_smarty_tpl->getVariable('control_frontend_reviews_twitter')->value, null, null);?>
<?php if (count($_smarty_tpl->getVariable('ta')->value)>0||count($_smarty_tpl->getVariable('fb')->value)>0||count($_smarty_tpl->getVariable('tw')->value)>0){?>
    <div class="h-content-text-inner-sidebar-quote-wrapper">
		<div class="tripadvicer_wrap">
        <div class="b-content-text-inner-sidebar-quote-t">
			<div class="review-list tripadvisor">
				<div class="b-quote-header"></div>
				<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ta')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
					<div class="b-quote-separator"></div>
					<div class="b-quote-text ">
						— <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('r')->value->content),100,'...');?>

					</div>
				<?php }} ?>
				<div class="h-quote-link" class="tipadvisor">
					<a href="http://www.tripadvisor.com/ShowUserReviews-g60966-d1553334-r124208168-Talon_Lodge_Spa-Sitka_Alaska.html">> See All Reviews</a>
				</div>
			</div>
			<div class="review-list facebook" style="display:none;">
				<div class="b-quote-header"></div>
				<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fb')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
					<div class="b-quote-separator"></div>
					<div class="b-quote-text ">
						— <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('r')->value->content),100,'...');?>

					</div>
				<?php }} ?>
				<div class="h-quote-link" class="facebook">
					<a href="http://www.facebook.com/TalonLodge?ref=ts">> See All Reviews</a>
				</div>
			</div>
			<div class="review-list twitter" style="display:none;">
				<div class="b-quote-header"></div>
				<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tw')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
					<div class="b-quote-separator"></div>
					<div class="b-quote-text ">
						— <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('r')->value->content),100,'...');?>

					</div>
				<?php }} ?>
				<div class="h-quote-link" class="twitter">
					<a href="http://twitter.com/talonlodge">> See All Reviews</a>
				</div>
			</div>
        </div>
		<div class="b-content-text-inner-sidebar-quote-b">
			<ul class="b-reviews-menu">
				<?php if (count($_smarty_tpl->getVariable('ta')->value)>0){?>
				<li><a rel="tripadvisor" href="#" class="active">TripAdvisor</a></li>
				<?php }?>
				<?php if (count($_smarty_tpl->getVariable('fb')->value)>0){?>
				<li class="separator">/</li>
				<li><a rel="facebook" href="#">Facebook</a></li>
				<?php }?>
				<?php if (count($_smarty_tpl->getVariable('tw')->value)>0){?>
				<li class="separator">/</li>
				<li><a rel="twitter" href="#">Twitter</a></li>
				<?php }?>
			</ul>
		</div>
        </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function(){
            var active = 'tripadvisor';
            $('.b-reviews-menu a').click(function(){
                $('.b-reviews-menu a').removeClass('active');
                $(this).addClass('active');
                var rel = $(this).attr('rel');
                $('.review-list.'+active).fadeOut(300, function(){
                    $('.review-list.'+rel).fadeIn(300, function(){
                        active = rel;
                    });
                });
                return false;
            });
        });
	</script>
<?php }?>