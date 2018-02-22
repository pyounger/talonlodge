<div class="b-gallery-photos">
    {foreach from=$galleries item='glr' name='glrs'}
        {$glr = $glr->data}
        {$i = $smarty.foreach.glrs.iteration}
        {if ($i-1) % 3 == 0 && !$smarty.foreach.glrs.last}
            <div class="b-gallery-photos-i">
        {/if}
        <div class="b-gallery-photo{if $i % 3 == 0} b-gallery-photo-last{/if}">
            {$glr->decodeCover()}
            <!-- <h2>{$glr->title}</h2> -->
            <div class="b-gallery-image-border">
                <a href="{link rule='frontend_gallery_view' id=$glr->id}"{if $image->atitle} title="{$image->atitle}"{/if}>
                    {capture name='path'}{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$glr->cover.filename}{/capture}
                    {include file='snippets/frontend_elements.image.tpl' path=$smarty.capture.path width=$glr->cover.width height=$glr->cover.height alt=$glr->alt}
                </a>
            </div>
        </div>
        {if ($i) % 3 == 0}
            </div>
        {/if}
    {/foreach}

{*
    {foreach from=$images item=image name='glrs'}
        {$i = $smarty.foreach.glrs.iteration}
        {if ($i-1) % 3 == 0 && !$smarty.foreach.glrs.last}
            <div class="b-gallery-photos-i">
        {/if}
        <div class="b-gallery-photo{if $i % 3 == 0} b-gallery-photo-last{/if}">
            {$image->decodeVersions()}
            <h2>{$image->title}</h2>
            <div class="b-gallery-image-border">
                <a rel="gallery" href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}"{if $image->atitle} title="{$image->atitle}"{/if}><img alt="{$image->alt|default:$image->title}" src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.thumbnail.filename}" width="{$image->versions.thumbnail.width}" height="{$image->versions.thumbnail.height}"/></a>
            </div>
        </div>
        {if ($i) % 3 == 0}
            </div>
        {/if}
    {/foreach}
*}
</div>

{*
{if $images|@count > 0}
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
                                    <img alt="{$image->alt|default:$image->title}" src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.thumbnail.filename}" class="image{$smarty.foreach.glrs.iteration-1}">
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
{/if}
*}