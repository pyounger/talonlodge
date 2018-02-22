{extends 'layouts/frontend.tpl'}

{block name='content'}






{print_r($pages)}









<div class="b-gallery-wrapper l-center">

	<h1 class="baltica-plain">{$gallery->title}</h1>

	<div class="b-gallery-header">

		<div class="b-gallery-subheader">

        {$gallery->description}

		</div>

		<div class="b-gallery-social">

			{include file='includes/snippet-social.tpl'}

		</div>

	</div>

	<div class="b-gallery-photos small-gallery-photo">

        {foreach from=$gallery->photos item=image name='glrs'}

        {*$image->title*}

            {$i = $smarty.foreach.glrs.iteration}

            {if ($i-1) % 4 == 0 }

            <div class="b-gallery-photos-i">

            {/if}

            <div class="b-gallery-inside-photo{if $i % 4 == 0} b-gallery-inside-photo-last{/if}">

                {$image->decodeVersions()}

                <!-- <h2>{$image->title}</h2> -->

                <div class="b-gallery-inside-image-border">

                    <a rel="gallery" href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}" title="" data-fancybox="group" data-caption="{$image->title}"><img alt="{$image->title}" src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.thumbnail.filename}" width="{$image->versions.thumbnail.width}" height="{$image->versions.thumbnail.height}"/></a>

                </div>

            </div>

            {if ($i) % 4 == 0 || $smarty.foreach.glrs.last}

            </div>

            {/if}

        {/foreach}

	</div><!-- /.b-gallery-photos -->

	

	<!-- Popup -->

	<div id="popup-gallery-block">



	</div>

	<!-- /Popup -->

</div>



<style type="text/css">



    .ad-image-description {

    position: absolute;

    }

    .ad-image-description .ad-description-title {

    display: block;

    }

    .b-gallery-subheader p {
    text-align:  justify;
  
}

.b-gallery-subheader {
    margin-bottom: 30px;
}

.b-gallery-photos.small-gallery-photo {
    margin-bottom: 30px;
}

.b-gallery-inside-image-border {
	    position: relative;
}

.b-gallery-inside-image-border a:after
{
	 content: "\f00e";
    position: absolute;
    font-family: fontawesome;
    z-index: 99;
    color: #fff;
    width: 20px;
    height: 20px;
    font-size: 18px;
    right: 5px;
    bottom: 5px;
      -webkit-transition: all .5s ease;
     -moz-transition: all .5s ease;
      -ms-transition: all .5s ease;
          transition: all .5s ease;
}

.b-gallery-inside-photo {
    float: left;
    width: 189px;
    margin: 0 0px 0px 0;
    height: 123px;
}
.b-gallery-photos-i {
    overflow: unset !important;
}

.b-gallery-inside-image-border a:hover:after {
     -ms-transform: scale(1.5); 
    -webkit-transform: scale(1.5); 
    transform: scale(1.5); 
    transition-duration: .5s;
}


</style>



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

                        {foreach from=$gallery->photos item=image name='glrs'}

						<li>

                            <a rel="gallery" href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}" title=""><img alt="{$image->title}" src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.thumbnail.filename}" width="{$image->versions.thumbnail.width}" height="{$image->versions.thumbnail.height}"/></a>

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

	// 		openLinks: '.b-gallery-photos a',

	// 		closeLinks: '#gallery-close',

	// 		showOnLoad: false,

	// 		onShowScrim: function(event){ 

	// 			$('#gallery').animate({ 'margin-top': $(document).scrollTop()+100  }, 300);

	// 		}

	// 	});

	// });

</script>

{/block}