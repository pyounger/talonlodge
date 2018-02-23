<div class="ourstorySlider{if $images|@count < 9} one-page{/if}">

    <div class="wrapper">

        <ul>

            {foreach from=$images item=image name='glrs'}

                {$i = $smarty.foreach.glrs.iteration}

                {if ($i-1) % 8 == 0 && !$smarty.foreach.glrs.last}

                    <li>

                        <div class="b-ourstory-gallery">

                {/if}

                {if ($i-1) % 4 == 0}

                    <div class="b-ourstory-gallery-i">

                {/if}



                    <div class="b-ourstory-img{if ($i-1) % 4 == 0} first{/if}">

                        {$image->decodeVersions()}

                        <a rel="gallery" href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}"{if $image->atitle} title="{$image->atitle}"{/if}>

							{capture name='path'}{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.thumbnail.filename}{/capture}

							{include file='snippets/frontend_elements.image.tpl' path=$smarty.capture.path width=$image->versions.thumbnail.width height=$image->versions.thumbnail.height alt=$image->alt|default:$image->title}

						</a>

                    </div>



                {if ($i) % 4 == 0}

                    </div>

                {/if}

                {if ($i) % 8 == 0}

                        </div>

                    </li>

                {/if}

            {/foreach}

        </ul>

    </div>

</div>

<div class="b-ourstory-buttons">

    <a href="{link rule='frontend_gallery'}" class="b-ourstory-button-l">

					<span class="b-ourstory-button-r">

						View more

					</span>

    </a>

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

                            <a href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}"{if $image->atitle} title="{$image->atitle}"{/if}>

                                <img alt="{$image->alt|default:$image->title}" src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}" class="image{$smarty.foreach.glrs.iteration-1}" width="133" height="88" />

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

	$(window).load(function(event){

		$().cpfScrim({

			scrim: '#gallery-popup',

			toResizeEl: '#gallery-popup',

			openLinks: '.ourstorySlider a',

			closeLinks: '#gallery-close',

			showOnLoad: false,

			onShowScrim: function(event){ 

				$('#gallery').animate({ 'margin-top': $(document).scrollTop()+100  }, 300);

			}

		});

	});

</script>