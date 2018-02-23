<?php /* Smarty version Smarty-3.0.8, created on 2016-09-19 14:18:15
         compiled from "/home2/talonlod/public_html/dev/app/templates/controls/menu_custom/main_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100206842657e06427ab7a25-45618350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08e2b99fbb4c7929bc93ab731467fb6d4cbeb801' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/controls/menu_custom/main_menu.tpl',
      1 => 1474323490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100206842657e06427ab7a25-45618350',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_replace')) include '/home2/talonlod/public_html/dev/cpf/libs/smarty/plugins/modifier.replace.php';
?>

	<?php $_smarty_tpl->tpl_vars['iteration'] = new Smarty_variable(0, null, null);?>

	<?php $_smarty_tpl->tpl_vars['counter'] = new Smarty_variable($_smarty_tpl->getVariable('iteration')->value, null, null);?>

	

	<?php $_smarty_tpl->tpl_vars['temp_filename'] = new Smarty_variable('', null, null);?>

	<?php $_smarty_tpl->tpl_vars['temp_text'] = new Smarty_variable('', null, null);?>



	<?php if (count($_smarty_tpl->getVariable('elements')->value)>1){?>



		<?php  $_smarty_tpl->tpl_vars['node'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('elements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['node']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['node']->iteration=0;
 $_smarty_tpl->tpl_vars['node']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu']['iteration']=0;
if ($_smarty_tpl->tpl_vars['node']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['node']->key => $_smarty_tpl->tpl_vars['node']->value){
 $_smarty_tpl->tpl_vars['node']->iteration++;
 $_smarty_tpl->tpl_vars['node']->index++;
 $_smarty_tpl->tpl_vars['node']->first = $_smarty_tpl->tpl_vars['node']->index === 0;
 $_smarty_tpl->tpl_vars['node']->last = $_smarty_tpl->tpl_vars['node']->iteration === $_smarty_tpl->tpl_vars['node']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu']['first'] = $_smarty_tpl->tpl_vars['node']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['menu']['last'] = $_smarty_tpl->tpl_vars['node']->last;
?>

			

			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['first']){?>
    <div class="h-content-navigation-left">
  <div class="h-content-navigation-right">
        <div class="h-content-navigation-center">
      <div class="mobile-menu"><i class="fa fa-bars"></i> Menu</div>
      <ul class="mob-menu-small">
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/about/">ABOUT US</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/our-story/">Our History</a></li>
                <li><a href="http://www.talonlodge.com/location/">Location</a></li>
                <li><a href="http://www.talonlodge.com/people/">People</a></li>
              </ul>
        </li>
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/difference/">DIFFERENCE</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/talon-service/">Talon Service</a></li>
                <li><a href="http://www.talonlodge.com/alaska-adventure/">Alaska Adventure</a></li>
                <li><a href="http://www.talonlodge.com/lodge-accommodations/">Lodge & Accommodation</a></li>
              </ul>
        </li>
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/fishing/">ALASKA FISHING</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/sport-fishing/">Sport Fishing</a></li>
                <li><a href="http://www.talonlodge.com/freshwater-fishing/">Fresh Water Fishing</a></li>
                <li><a href="http://www.talonlodge.com/fishing-calendar/">Fishing Calendar</a></li>
                <li><a href="http://www.talonlodge.com/guides-and-gear/">Guides and Gear</a></li>
              </ul>
        </li>
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/cuisine-events/">CUISINE & EVENTS</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/chef-series/">Chef Series</a></li>
                <li><a href="http://www.talonlodge.com/winemaker-series/">Winemaker Series</a></li>
                <li><a href="http://www.talonlodge.com/recipe-finder/">Recipes</a></li>
              </ul>
        </li>
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/spa/">SPA</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/alaskas-only-open-air-massage-pavilion/">Alaska's Only Open Air Massage Pavilion</a></li>
                <li><a href="http://www.talonlodge.com/treatment-menu/">Treatment Menu</a></li>
              </ul>
        </li>
            <li><a href="http://www.talonlodge.com/brochure/">BROCHURE REQUEST</a></li>
            <li><a href="http://www.talonlodge.com/gallery/">PHOTO GALLERY</a></li>
            <li><a href="http://www.talonlodge.com/rates/">Rates</a></li>
            <li><a href="http://www.talonlodge.com/faq/">Faq</a></li>
            <li><a href="http://www.talonlodge.com/contacts/">Contac Us</a></li>
          </ul>
      <ul class="main-menu-big">
            <?php }?>
            
            
            
            <?php $_smarty_tpl->tpl_vars['item'] = new Smarty_variable($_smarty_tpl->getVariable('node')->value->data, null, null);?>
            
            
            
            <?php if ($_smarty_tpl->getVariable('item')->value->level==1){?>
            
            
            
            <?php $_smarty_tpl->tpl_vars['iteration'] = new Smarty_variable($_smarty_tpl->getVariable('iteration')->value+1, null, null);?>
            <li class="b-menu-<?php echo $_smarty_tpl->getVariable('iteration')->value;?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['iteration']==2){?> first<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['last']){?> last<?php }?>"> <a href="<?php if ($_smarty_tpl->getVariable('item')->value->type=='page'){?><?php if ($_smarty_tpl->getVariable('item')->value->slug){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_page','slug'=>$_smarty_tpl->getVariable('item')->value->slug),$_smarty_tpl);?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->getVariable('item')->value->url;?>
<?php }?>"<?php if ($_smarty_tpl->getVariable('item')->value->target=='_blank'){?> target="_blank"<?php }?><?php if ($_smarty_tpl->getVariable('bg')->value&&$_smarty_tpl->getVariable('item')->value->filename){?>style="background-image: url('<?php echo cpf_config('APP.NAVIGATION.URL');?>
<?php echo $_smarty_tpl->getVariable('item')->value->filename;?>
')"<?php }?> id="b-menu-<?php echo $_smarty_tpl->getVariable('iteration')->value;?>
" rel="b-submenu-<?php echo $_smarty_tpl->getVariable('iteration')->value;?>
">
              
              <?php if ($_smarty_tpl->getVariable('control_frontend_menu_em')->value==1){?><em><?php echo $_smarty_tpl->getVariable('item')->value->title;?>
</em><?php }else{ ?><?php echo $_smarty_tpl->getVariable('item')->value->title;?>
<?php }?> </a> </li>
            <?php $_smarty_tpl->tpl_vars['counter'] = new Smarty_variable($_smarty_tpl->getVariable('iteration')->value, null, null);?>
            
            <?php ob_start(); ?>submenu_<?php echo $_smarty_tpl->getVariable('iteration')->value;?>
<?php  Smarty::$_smarty_vars['capture']['submenu_name']=ob_get_clean();?>
            
            
            
            <?php $_smarty_tpl->tpl_vars['temp_filename'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->filename, null, null);?>
            
            <?php $_smarty_tpl->tpl_vars['temp_text'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->attributes_array['text'], null, null);?>
            
            
            
            <?php }elseif($_smarty_tpl->getVariable('item')->value->level==2){?>
            
            
            
            <?php ob_start(); ?>submenu_<?php echo $_smarty_tpl->getVariable('iteration')->value;?>
<?php  Smarty::$_smarty_vars['capture']['submenu_name']=ob_get_clean();?>
            
            <?php ob_start(); ?>
            <li <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['last']){?> class="last"<?php }?>> <a rel="<?php echo $_smarty_tpl->getVariable('item')->value->filename;?>
" href="<?php if ($_smarty_tpl->getVariable('item')->value->type=='page'){?><?php if ($_smarty_tpl->getVariable('item')->value->slug){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_page','slug'=>$_smarty_tpl->getVariable('item')->value->slug),$_smarty_tpl);?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->getVariable('item')->value->url;?>
<?php }?>"<?php if ($_smarty_tpl->getVariable('item')->value->attributes){?> <?php echo smarty_modifier_replace($_smarty_tpl->getVariable('item')->value->attributes,'&quot;','"');?>
<?php }?><?php if ($_smarty_tpl->getVariable('item')->value->target=='_blank'){?> target="_blank"<?php }?><?php if ($_smarty_tpl->getVariable('bg')->value&&$_smarty_tpl->getVariable('item')->value->filename){?>style="background-image: url('<?php echo cpf_config('APP.NAVIGATION.URL');?>
<?php echo $_smarty_tpl->getVariable('item')->value->filename;?>
')"<?php }?>>
              
              <?php echo $_smarty_tpl->getVariable('item')->value->title;?>
 </a> </li>
            <?php  $_smarty_tpl->append(Smarty::$_smarty_vars['capture']['submenu_name'], ob_get_contents()); Smarty::$_smarty_vars['capture']['default']=ob_get_clean();?>
            <?php }?>
            
            
            
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['last']){?>
          </ul>
    </div>
      </div>
</div>
<?php }?>

													

		<?php }} ?>

		

		

		<?php if ($_smarty_tpl->getVariable('counter')->value>0){?>

			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('counter')->value+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['name'] = 'sub';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sub']['total']);
?>

				<?php $_smarty_tpl->tpl_vars['iteration'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['sub']['index'], null, null);?>

				<?php ob_start(); ?>submenu_<?php echo $_smarty_tpl->getVariable('iteration')->value;?>
<?php  Smarty::$_smarty_vars['capture']['submenu_name']=ob_get_clean();?>

				

				<?php $_smarty_tpl->tpl_vars['temp'] = new Smarty_variable($_smarty_tpl->getVariable((Smarty::$_smarty_vars['capture']['submenu_name']))->value, null, null);?>

				

				<?php if (count($_smarty_tpl->getVariable('temp')->value)>0){?>				

					<?php ob_start(); ?>filename_<?php echo $_smarty_tpl->getVariable('iteration')->value;?>
<?php  Smarty::$_smarty_vars['capture']['file_name']=ob_get_clean();?>

					<?php $_smarty_tpl->tpl_vars['filename'] = new Smarty_variable($_smarty_tpl->getVariable((Smarty::$_smarty_vars['capture']['file_name']))->value, null, null);?>



					<?php ob_start(); ?>text_<?php echo $_smarty_tpl->getVariable('iteration')->value;?>
<?php  Smarty::$_smarty_vars['capture']['text']=ob_get_clean();?>

					<?php $_smarty_tpl->tpl_vars['text'] = new Smarty_variable($_smarty_tpl->getVariable((Smarty::$_smarty_vars['capture']['text']))->value, null, null);?>
                <div class="b-slidedown b-submenu-<?php echo $_smarty_tpl->getVariable('iteration')->value;?>
" style="display: none;">
  <div class="b-nipple"></div>
  <div class="b-slidedown-inner">
                    <div class="b-slidedown-inner-l">
      <div class="b-slidedown-inner-r">
                        <div class="b-about-us-inner"> <?php if ($_smarty_tpl->getVariable('filename')->value){?> <a href="#" class="b-slidedown-submenu-image"><img src="<?php echo cpf_config('APP.NAVIGATION.URL');?>
<?php echo $_smarty_tpl->getVariable('filename')->value;?>
" width="193" height="118" alt=""><span class="overlay"></span></a>
          <input type="hidden" class="image-cache" value="<?php echo $_smarty_tpl->getVariable('filename')->value;?>
" />
          <?php }?> <ul<?php if (!$_smarty_tpl->getVariable('filename')->value){?> class="wide"<?php }?>> <?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('temp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?><?php echo $_smarty_tpl->tpl_vars['t']->value;?>
<?php }} ?>
          </ul>
        </div>
                       
                      </div>
    </div>
                  </div>
  <div class="b-slidedown-bottom-l">
                    <div class="b-slidedown-bottom-r">
      <div class="b-slidedown-bottom-c"></div>
    </div>
                  </div>
</div>
<?php }?>



			<?php endfor; endif; ?>

		<?php }?>



	<?php }?> 
<script type="text/javascript">

        $(document).ready(function(){

            var prefix = '<?php echo cpf_config('APP.NAVIGATION.URL');?>
';

            $('.b-slidedown-inner ul li a').bind('mouseover', function(){

                var rel = $(this).attr('rel');

                if (rel.length > 0)

                    $(this).closest('.b-slidedown').find('.b-slidedown-submenu-image img').attr('src', prefix + rel);

            });

            $('.b-slidedown-inner ul li a').bind('mouseout', function(){

                var rel = $(this).closest('.b-slidedown').find('.image-cache').val();

                if (rel.length > 0)

                    $(this).closest('.b-slidedown').find('.b-slidedown-submenu-image img').attr('src', prefix + rel);

            });

            

            $('.mobile-menu').click(function(){

                $(this).next('ul').slideToggle(300);

            });

            $('.toggle-mob-sub').click(function(){

                $(this).parents('.has-mob-sub').children('ul.mob-sub').slideToggle(300);

            });

        });

    </script>