<?php /* Smarty version Smarty-3.0.8, created on 2015-02-11 09:38:39
         compiled from "/home2/talonlod/public_html/app/templates/includes/frontend.header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154574594054dba1af3146e7-54612824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a77d99fdd226ff7b7c4d446f6a80f5c5822d918f' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/frontend.header.tpl',
      1 => 1423679871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154574594054dba1af3146e7-54612824',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<div class="l-subheader">

		<?php if ($_smarty_tpl->getVariable('slideshow')->value){?>
			<div class="b-gallery">
				<div class="b-gallery-container">
					<ul>
                        <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('slideshow')->value->photos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['slide']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value){
 $_smarty_tpl->tpl_vars['slide']->index++;
 $_smarty_tpl->tpl_vars['slide']->first = $_smarty_tpl->tpl_vars['slide']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['slideshow']['first'] = $_smarty_tpl->tpl_vars['slide']->first;
?>
                        <?php echo $_smarty_tpl->getVariable('slide')->value->decodeVersions();?>

						<li<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['slideshow']['first']){?> class="active"<?php }else{ ?> style="display: none"<?php }?>>
                            <img src="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('slide')->value->versions['fullscreen']['filename'];?>
" width="100%" alt="<?php echo (($tmp = @$_smarty_tpl->getVariable('slide')->value->title)===null||$tmp==='' ? $_smarty_tpl->getVariable('slide')->value->alt : $tmp);?>
" class="<?php echo $_smarty_tpl->getVariable('slide')->value->slideshow_position;?>
"/>
                        </li>
                        <?php }} ?>
					</ul>
				</div>
				<div class="l-gallery-absolute">
					<div class="l-center">
						<div class="l-center-layer menu">
							<div class="b-gallery-menu">
								<div class="i">
									<span>
										<ul>
                                            <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('slideshow')->value->photos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['slide']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value){
 $_smarty_tpl->tpl_vars['slide']->index++;
 $_smarty_tpl->tpl_vars['slide']->first = $_smarty_tpl->tpl_vars['slide']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['slideshow']['first'] = $_smarty_tpl->tpl_vars['slide']->first;
?>
											<li class="photo"><a href="#"<?php if ($_smarty_tpl->getVariable('slide')->value->title){?> title="<?php echo $_smarty_tpl->getVariable('slide')->value->title;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('slide')->value->title;?>
</a></li>
                                            <?php }} ?>
										</ul>
									</span>
								</div>
							</div><!-- /.b-gallery-menu -->
						</div>
                        <?php $_smarty_tpl->tpl_vars['positions'] = new Smarty_variable(explode('-',$_smarty_tpl->getVariable('slideshow')->value->photos[0]->slideshow_position), null, null);?>
						<div class="l-center-layer title<?php  $_smarty_tpl->tpl_vars['position'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('positions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['position']->key => $_smarty_tpl->tpl_vars['position']->value){
?> <?php echo $_smarty_tpl->tpl_vars['position']->value;?>
<?php }} ?> shadow" id="gallery-title">
							<div class="b-gallery-title">
								<span><?php echo $_smarty_tpl->getVariable('slideshow')->value->photos[0]->title;?>
</span>
							</div>
						</div><!-- /.title -->
						<div class="l-center-layer subtitle odd" style="display: none;" id="gallery-subtitle">
							<div class="b-gallery-title">
								<span>Imagine...</span>
							</div>
						</div><!-- /.title -->
					</div><!-- /.l-center -->
				</div><!-- /.l-gallery-absolute -->
				
				<div class="b-bottom__gradient">
				
				</div>
			</div><!-- /.b-gallery -->
			<div class="b-subgallery">
				<?php if ($_smarty_tpl->getVariable('slideshow')->value){?>
					<div class="b-content-image">
						<div class="h-image-bottom l-min-width">
							<div class="l-center h-image-bottom-wrapper">
								<div class="b-image-bottom-title h-image-bottom-i">Check Availability</div>
								<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_reservation'),$_smarty_tpl);?>
" method="get" class="order-form">
									<div class="b-image-bottom-datepick h-image-bottom-i">Arriving Between:</div>
									<div class="b-datepick h-image-bottom-i">
										<input type="text" id="between" name="start" value="" />
									</div>
									<div class="b-image-bottom-datepick h-image-bottom-i">And:</div>
									<div class="b-datepick h-image-bottom-i">
										<input type="text" id="and" name="end" value=""/>
									</div>
									<div class="b-image-bottom-datepick h-image-bottom-i">With:</div>
									<div class="b-fake-select">
										<div class="lineForm">
											<select class="sel80" id="adults" name="adults" tabindex="2">
												<option value="1">1 adult</option>
												<option selected="selected" value="2">2 adults</option>
												<option value="3">3 adults</option>
												<option value="4">4 adults</option>
												<option value="5">5 adults</option>
												<option value="6">6 adults</option>
												<option value="7">7 adults</option>
												<option value="8">8 adults</option>
												<option value="9">9 adults</option>
												<option value="10">10 adults</option>
												<option value="11">11 adults</option>
												<option value="12">12 adults</option>
												<option value="13">13 adults</option>
												<option value="14">14 adults</option>
												<option value="15">15 adults</option>
												<option value="16">16 adults</option>
											</select>
										</div>
									</div>
									<div class="h-button-wrapper">
										<button type="submit" class="b-view-button"> 
											View
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php }?>
			</div>
		<?php }?>
		
		<?php if ($_smarty_tpl->getVariable('recipe')->value){?>
			<div class="b-gallery">
				<div class="b-gallery-container">
					<ul>
						<li class="active">
                            <img src="<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('recipe')->value->filename;?>
" width="100%" alt="<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
" />
                        </li>
					</ul>
				</div>
				<div class="b-bottom__gradient">
				</div>
			</div><!-- /.b-gallery -->
			<div class="b-subgallery">
			</div>
		<?php }?>
		
		<div class="b-top__gradient<?php if (!$_smarty_tpl->getVariable('slideshow')->value){?> no-slideshow <?php }?>"></div>
		<div class="l-new-header">
			<div class="l-new-header__inner l-center">
				<div class="b-logo">
					<a href="<?php echo $_smarty_tpl->getVariable('cpf_base_url')->value;?>
"><img src="static/images/frontend/new_layout/header/talonlodge.png" width="155" height="68" alt=""/></a>
				</div>
				<div class="b-header__r">
					<div class="b-header__top">
						<div class="b-header__social">
							<form id="searchbox_006300182637952144805:-sx4hsnrkuk" action="http://www.google.com/cse" class="b-search-form">
								<input type="hidden" name="cx" value="006300182637952144805:-sx4hsnrkuk" />
								<input type="hidden" name="cof" value="FORID:0" />
								<input type="hidden" name="ie" value="utf-8" />
								<input type="hidden" name="oe" value="utf-8" />
								<input name="siteurl" type="hidden" value="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" />
								<input name="ref" type="hidden" value="talonlodge.com/" />
								<input name="q" type="text" placeholder="Search"/>
								<button type="submit" name="sa"></button>
							</form>
							<div class="b-facebook">
								<div class="b-facebook-wrapper">
									<div class="fb-like" data-href="http://www.facebook.com/TalonLodge?ref=ts" data-send="false" data-width="10" data-show-faces="true" layout="button_count"></div>
								</div>
							</div>
							<div class="b-tw-fb">
								<ul>
									<li><a href="https://twitter.com/talonlodge" class="tw" target="_blank"></a></li>
									<li><a href="https://www.facebook.com/TalonLodge" class="fb" target="_blank"></a></li>
									<li><a href="http://www.talonlodge.com/blog/" class="wp" target="_blank"></a></li>
								</ul>
							</div>
						</div>
						<div class="b-header__contacts">
							<div class="b-header__tollfree">
								Toll Free: 800-536-1864
							</div>
							<div class="b-header__links">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>'frontend_menu','key'=>'header-menu','em'=>true),$_smarty_tpl);?>

								<!-- <ul>
									<li><a href="http://wordpress.talonlodge.com/" target="_blank">Blog</a></li>
									<li><a href="http://talonlodge.com/rates/">Rates</a></li>
									<li><a href="http://talonlodge.com/faq/">Faq</a></li>
									<li class="last"><a href="#">Contacts</a></li>
								</ul>
								-->
							</div>
						</div>
					</div>
					<div class="b-header__menu">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>'frontend_menu','key'=>'main-menu','level'=>1,'em'=>true,'custom_layout'=>'controls/menu_custom/main_menu.tpl'),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</div>
		<!--
			<div class="h-content-navigation">
				<div class="l-center">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>'frontend_menu','key'=>'main-menu','level'=>1,'em'=>true,'custom_layout'=>'controls/menu_custom/main_menu.tpl'),$_smarty_tpl);?>

				</div>
			</div>
		--> 								

		</div><!-- /.l-subheader -->
		<div class="h-content <?php if ($_smarty_tpl->getVariable('slideshow')->value){?>slideshow<?php }?>">
			<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='frontend_index'){?>
				<div class="h-content-text-header l-center">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>'frontend_menu','key'=>'main-sections','em'=>true,'bg'=>true),$_smarty_tpl);?>

				</div><!-- /.h-content-text-header -->
			<?php }?>
