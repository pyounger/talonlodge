<?php /* Smarty version Smarty-3.0.8, created on 2017-01-03 11:20:50
         compiled from "/home2/talonlod/public_html/app/templates/includes/frontend.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:589069252586c07a30287f9-28392892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a43d23393a25d8332d2be1d9b338be1fd88c6844' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/frontend.footer.tpl',
      1 => 1483474845,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '589069252586c07a30287f9-28392892',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="h-content-footer l-min-width">

    <div class="h-content-footer-i l-center">

        <div class="h-content-footer-left">

            <?php echo $_smarty_tpl->getVariable('tpl')->value->content['video_tour'];?>


        </div>

        <div class="h-content-footer-center">

            <a class="gallery-link" href="#testube"><img alt="" src="static/images/frontend/temp/video-temp1.jpg" /></a>

            <div style="display:none" id="testube">

             <!--  <iframe id ="new_if" width="100%" height="600" src="https://www.youtube.com/embed/ax58N3gqZj4?autoplay=0&loop=1&playlist=ax58N3gqZj4" frameborder="0" allowfullscreen></iframe> -->

             <iframe id ="new_if" width="100%" height="600" src="https://player.vimeo.com/video/185136883?title=0&byline=0&portrait=0" frameborder="0" allowfullscreen></iframe>


            <!--  <iframe src="https://player.vimeo.com/video/185136883?title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <p><a href="https://vimeo.com/185136883">Alaska Adventure at Talon Lodge</a> from <a href="https://vimeo.com/user44624171">Talon Lodge &amp; Spa</a> on <a href="https://vimeo.com">Vimeo</a>.</p> -->


         </div>

     </div>

     <div class="h-content-footer-right">

        <div class="content-footer-button">

            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_brochure'),$_smarty_tpl);?>
" class="b-button">

                <span><em>Request a Talon Lodge Brochure</em></span>

            </a>

        </div>

        <div class="h-content-footer-right-text">

            <div class="h-content-footer-right-text-left">

                <?php echo $_smarty_tpl->getVariable('tpl')->value->content['brochure_text'];?>


            </div>

            <div class="h-content-footer-right-image">

                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_brochure'),$_smarty_tpl);?>
">

                    <img src="static/images/frontend/main/content-sub-footer.png" width="101" height="123" alt=""/>

                </a>

            </div>

        </div>

    </div>

</div>

</div>

</div><!-- /.h-content -->



<div class="b-footer l-min-width">		



    <div class="b-footer-menu">

        <div class="l-center">

            <div class="b-footer-menu-i">

                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>"frontend_menu",'key'=>'footer-menu'),$_smarty_tpl);?>


            </div><!-- /.b-footer-menu-i -->

        </div><!-- /l-center -->

    </div><!-- /.b-footer-menu -->



    <div class="b-footer-content l-center">

        <div class="b-footer-content-left">

            <?php echo $_smarty_tpl->getVariable('tpl')->value->content['footer_copyright'];?>


        </div>

        <div class="b-footer-content-center b-footer-text">

            <?php echo $_smarty_tpl->getVariable('tpl')->value->content['faq_left'];?>


        </div>

        <div class="b-footer-content-right b-footer-text">

            <?php echo $_smarty_tpl->getVariable('tpl')->value->content['faq_right'];?>


        </div>

    </div><!-- /.b-footer-content -->



    <div class="b-footer-footer"></div>



</div><!-- /.b-footer -->

<div class="b-header__top mobile-header-top">

    <div class="b-header__social">

        <form id="searchbox_006300182637952144805:-sx4hsnrkuk" action="http://www.google.com/cse" class="b-search-form">

            <div class="align-center">

                <input type="hidden" name="cx" value="006300182637952144805:-sx4hsnrkuk" />

                <input type="hidden" name="cof" value="FORID:0" />

                <input type="hidden" name="ie" value="utf-8" />

                <input type="hidden" name="oe" value="utf-8" />

                <input name="siteurl" type="hidden" value="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" />

                <input name="ref" type="hidden" value="talonlodge.com/" />

                <input name="q" type="text" placeholder="Search"/>

                <button type="submit" name="sa"></button>

            </div>

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

        <div class="blank"></div>

    </div>

</div>