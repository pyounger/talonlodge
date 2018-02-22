<div class="h-content-footer l-min-width">

    <div class="h-content-footer-i l-center">

        <div class="h-content-footer-left">

            {$tpl->content['video_tour']}

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

            <a href="{link rule='frontend_brochure'}" class="b-button">

                <span><em>Request a Talon Lodge Brochure</em></span>

            </a>

        </div>

        <div class="h-content-footer-right-text">

            <div class="h-content-footer-right-text-left">

                {$tpl->content['brochure_text']}

            </div>

            <div class="h-content-footer-right-image">

                <a href="{link rule='frontend_brochure'}">

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

                {control name="frontend_menu" key='footer-menu'}

            </div><!-- /.b-footer-menu-i -->

        </div><!-- /l-center -->

    </div><!-- /.b-footer-menu -->



    <div class="b-footer-content l-center">

        <div class="b-footer-content-left">

            {$tpl->content['footer_copyright']}

        </div>

        <div class="b-footer-content-center b-footer-text">

            {$tpl->content['faq_left']}

        </div>

        <div class="b-footer-content-right b-footer-text">

            {$tpl->content['faq_right']}

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

                <input name="siteurl" type="hidden" value="{$cpf_url_current}" />

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