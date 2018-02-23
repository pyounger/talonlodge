<?php /* Smarty version Smarty-3.0.8, created on 2018-01-11 09:49:08
         compiled from "/home2/talonlod/public_html/app/templates/layouts/pages/frontend/homepage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2125558015a57b1a4a36df6-06118174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4420b6cd1c225f65429e8fdb19184cf750927260' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/pages/frontend/homepage.tpl',
      1 => 1515696540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2125558015a57b1a4a36df6-06118174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style type="text/css">

body.fancybox-active {
    overflow: auto !important;
    margin: 0px !important;
}

.h-content-footer-i.l-center {
    margin-top: 25px;
}
</style>

<div class="h-content-i l-center">
    <div class="h-content-text">

        <div class="h-content-text-inner">
            <div class="h-content-text-inner-wrapper">
                <div class="h-content-text-inner-wrapper-i">
                    <?php echo $_smarty_tpl->getVariable('page')->value->content['heading'];?>

                    <div class="h-content-text-colums">
                        <div class="b-content-text-column column-1">
                            <?php echo $_smarty_tpl->getVariable('page')->value->content['column-1'];?>

                        </div>
                        <div class="b-content-text-column column-2">
                            <?php echo $_smarty_tpl->getVariable('page')->value->content['column-2'];?>

                        </div>
                        <div class="b-content-text-column column-3">
                            <?php echo $_smarty_tpl->getVariable('page')->value->content['column-3'];?>

                        </div>
                        <div class="b-content-text-column column-4">
                            <?php echo $_smarty_tpl->getVariable('page')->value->content['column-4'];?>

                        </div>
                    </div>
                </div>
                <div class="b-spiral"></div>
                <div class="h-content-text-inner-wrapper-i less">
                    <div class="h-content-text-inner-wrapper-i-text-left">
                        <?php echo $_smarty_tpl->getVariable('page')->value->content['footer-left'];?>

                    </div>
                    <div class="h-content-text-inner-wrapper-i-text-right">
                        <div class="text-1">
                            <?php echo $_smarty_tpl->getVariable('page')->value->content['footer-right-1'];?>

                        </div>
                        <div class="text-2">
                            <?php echo $_smarty_tpl->getVariable('page')->value->content['footer-right-2'];?>

                        </div>
                    </div>
                </div>
                <div class="b-spiral"></div>
                <div class="h-content-text-inner-wrapper-footer">
                    <?php echo $_smarty_tpl->getVariable('page')->value->content['reservations'];?>

                </div>
                <div class="b-additional-text">
                    <?php echo $_smarty_tpl->getVariable('page')->value->content['reservations-comments'];?>

                </div>
            </div>
            <div class="h-content-text-inner-sidebar">
                <div class="b-content-text-inner-sidebar-title baltica-plain">
                    <?php echo $_smarty_tpl->getVariable('page')->value->content['sidebar-top'];?>

                </div>

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>"frontend_reviews",'cache_ttl'=>@CPF_CACHE_TIME_NEVER),$_smarty_tpl);?>


                <div class="b-content-text-inner-sidebar-image">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>"frontend_banner",'cache_ttl'=>@CPF_CACHE_TIME_NEVER),$_smarty_tpl);?>

                </div>

                <!-- <div class="b-content-text-inner-sidebar-footer">
                    <div class="h-sidebar-button">
                        <a href="#main-flash" class="b-button">
                            <span><em>Explore the Difference</em></span>
                        </a>
                    </div>
                    <div class="sidebar-footer-image">
                        <a href="#main-flash"><img src="static/images/frontend/sidebar/content-sidebar-footer.png" width="237" height="132" alt=""></a>
                    </div>
                    <div id="main-flash" style="display: none;">
                        <iframe src="static/flash/index.html" width="802" height="602" frameborder="0" scrolling="0"></iframe>
                    </div>
                </div> -->

            </div><!-- /.h-content-text-inner-sidebar -->

        </div><!-- /.h-content-text-inner -->
    </div><!-- /.h-content-text -->

     <!-- added to remove previous gallery(Parvez) -->

</div><!-- /.h-content-i -->

            <?php if ($_smarty_tpl->getVariable('gallery')->value->type_id==2){?>

                <div class="b-privacy-wrapper11">
                 <div class="b-privacy-l">
                        <?php echo $_smarty_tpl->getVariable('page')->value->content['gallery'];?>
 <!-- first gallery for carousel(Parvez) -->
                  </div>
                </div>
      
   
            <?php }else{ ?>

                <?php $_template = new Smarty_Internal_Template('snippets/frontend_element.newgallery.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('path',Smarty::$_smarty_vars['capture']['path']);$_template->assign('width',$_smarty_tpl->getVariable('glr')->value->cover['width']);$_template->assign('height',$_smarty_tpl->getVariable('glr')->value->cover['height']);$_template->assign('alt',$_smarty_tpl->getVariable('glr')->value->alt); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

            <?php }?>
