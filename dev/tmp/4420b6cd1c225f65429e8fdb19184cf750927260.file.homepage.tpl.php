<?php /* Smarty version Smarty-3.0.8, created on 2015-01-21 06:57:08
         compiled from "/home2/talonlod/public_html/app/templates/layouts/pages/frontend/homepage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68093001554bfcc546eeeb9-12808553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4420b6cd1c225f65429e8fdb19184cf750927260' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/pages/frontend/homepage.tpl',
      1 => 1417641700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68093001554bfcc546eeeb9-12808553',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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

                <div class="b-content-text-inner-sidebar-footer">
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
                </div>

            </div><!-- /.h-content-text-inner-sidebar -->

        </div><!-- /.h-content-text-inner -->
    </div><!-- /.h-content-text -->

    <?php echo $_smarty_tpl->getVariable('page')->value->content['gallery'];?>


</div><!-- /.h-content-i -->
