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
                    {$page->content['heading']}
                    <div class="h-content-text-colums">
                        <div class="b-content-text-column column-1">
                            {$page->content['column-1']}
                        </div>
                        <div class="b-content-text-column column-2">
                            {$page->content['column-2']}
                        </div>
                        <div class="b-content-text-column column-3">
                            {$page->content['column-3']}
                        </div>
                        <div class="b-content-text-column column-4">
                            {$page->content['column-4']}
                        </div>
                    </div>
                </div>
                <div class="b-spiral"></div>
                <div class="h-content-text-inner-wrapper-i less">
                    <div class="h-content-text-inner-wrapper-i-text-left">
                        {$page->content['footer-left']}
                    </div>
                    <div class="h-content-text-inner-wrapper-i-text-right">
                        <div class="text-1">
                            {$page->content['footer-right-1']}
                        </div>
                        <div class="text-2">
                            {$page->content['footer-right-2']}
                        </div>
                    </div>
                </div>
                <div class="b-spiral"></div>
                <div class="h-content-text-inner-wrapper-footer">
                    {$page->content['reservations']}
                </div>
                <div class="b-additional-text">
                    {$page->content['reservations-comments']}
                </div>
            </div>

        {* sidebar *}
            <div class="h-content-text-inner-sidebar">
                <div class="b-content-text-inner-sidebar-title baltica-plain">
                    {$page->content['sidebar-top']}
                </div>

            {control name="frontend_reviews" cache_ttl=$smarty.const.CPF_CACHE_TIME_NEVER}

                <div class="b-content-text-inner-sidebar-image">
                {control name="frontend_banner" cache_ttl=$smarty.const.CPF_CACHE_TIME_NEVER}
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
        {* /sidebar *}

        </div><!-- /.h-content-text-inner -->
    </div><!-- /.h-content-text -->

    {*$page->content['gallery']*} <!-- added to remove previous gallery(Parvez) -->

</div><!-- /.h-content-i -->

            {if $gallery->type_id == 2}

                <div class="b-privacy-wrapper11">
                 <div class="b-privacy-l">
                        {$page->content['gallery']} <!-- first gallery for carousel(Parvez) -->
                  </div>
                </div>
      
   
            {else}

                {include file='snippets/frontend_element.newgallery.tpl' path=$smarty.capture.path width=$glr->cover.width height=$glr->cover.height alt=$glr->alt}

            {/if}
