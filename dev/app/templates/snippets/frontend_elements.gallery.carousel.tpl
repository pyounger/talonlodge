<style type="text/css">
    
    .b-privacy-wrapper11 {
    width: 96%;
    margin-left: 20px;
}
.b-privacy-wrapper11 .h-gallery-wrapper {
    margin:  0;
}

.b-privacy-wrapper11 .h-gallery-wrapper div.jcarousel-skin-tango .jcarousel-clip-horizontal {
    width: 100%;
    margin: 0 0 0 5px;
    height: 152px !important;
    overflow: hidden;
}


.b-privacy-wrapper11 .h-gallery-wrapper div.jcarousel-skin-tango .jcarousel-item {
    margin: 0 0 0 1px;
    padding: 4px 0 0 2px;
    width: 196px;
    height: 148px;
    background: transparent url(static/images/frontend/gallery/sprite-gallery-border.png) left -92px no-repeat;
}
.b-privacy-wrapper11 .h-gallery-wrapper div.jcarousel-skin-tango .jcarousel-item img{
    width: 225px;
    height: 100%;
    object-fit: cover;
}

.b-privacy-wrapper11 .h-gallery-wrapper div.jcarousel-skin-tango .jcarousel-prev-horizontal {
    top: 67px;
    left: -10px;
}

.h-gallery-wrapper div.jcarousel-skin-tango .jcarousel-next-horizontal {
    top: 64px;
    }

    .b-privacy-wrapper {
    
    padding:  0;
}
.b-gallery-subheader {
    margin-bottom:  0;
}
</style>

<div class="h-gallery-wrapper">
    <div class="h-gallery">
        <ul id="b-gallery" class="jcarousel-skin-tango">
            {foreach from=$images item=image name='glrs'}
                {$image->decodeVersions()}
                <li> <a rel="gallery" href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}" title="" data-fancybox="group" data-caption="{$image->title}"><img alt="{$image->title}" src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}" width="{$image->versions.thumbnail.width}" height="{$image->versions.thumbnail.height}"/></a></li>
            {/foreach}
        </ul>
    </div>
    <div class="b-gallery-tooltip">
        <div class="b-gallery-tooltip-t">
            <p style="width: auto;"></p>
        </div>
        <div class="b-gallery-tooltip-b"></div>
    </div>
</div>

<div class="scrim" id="gallery-popup" style="visibility: hidden;">
    <div class="scrim-inner">

        <div id="gallery" class="ad-gallery">
            <a id="gallery-close" href="#"><img src="static/images/frontend/gallery/gallery-close.png" width="31" height="31" alt="Close" /></a>
            <div class="ad-image-wrapper">
            </div>
            <div class="ad-controls"></div>
            <div class="ad-nav">
                <div class="ad-thumbs">
                    <ul class="ad-thumb-list">
                    {foreach from=$images item=image name='glrs'}
                        {$image->decodeVersions()}
                        <li>
                            <a href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}">
                                <img alt="{$image->alt|default:$image->title}" src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.gallery_thumb.filename}" class="image{$smarty.foreach.glrs.iteration-1}" width="{$image->versions.gallery_thumb.width}" height="{$image->versions.gallery_thumb.height}" />
                            </a>
                        </li>
                    {/foreach}
                    </ul>
                </div>
            </div>
        </div>
        <div class="b-social-buttons b-social-popup">
            {include file='includes/snippet-social.tpl'}
        </div>
    </div><!-- .scrim-inner -->
</div><!-- #buy-popup .scrim -->

<script type="text/javascript">
	// $(window).load(function(event){
	// 	$().cpfScrim({
	// 		scrim: '#gallery-popup',
	// 		toResizeEl: '#gallery-popup',
	// 		openLinks: '#b-gallery a',
	// 		closeLinks: '#gallery-close',
	// 		showOnLoad: false,
	// 		onShowScrim: function(event){ 
	// 			$('#gallery').animate({ 'margin-top': $(document).scrollTop()+100  }, 300);
	// 		}
	// 	});
	// });
</script>