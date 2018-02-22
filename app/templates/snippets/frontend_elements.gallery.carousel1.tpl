<div class="h-gallery-wrapper">


  
    <div class="owl-carousel">
      {foreach from=$images item=image name='glrs'}
      
      {$image->decodeVersions()}
      <div class="item"><a rel="gallery" href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}"> <img src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.thumbnail.filename}" width="127" height="80" alt="{$image->alt|default:$image->title}"> </a></div>
      {/foreach}
    
  </div>
  
  
  <div class="b-gallery-tooltip">
    <div class="b-gallery-tooltip-t">
      <p></p>
    </div>
    <div class="b-gallery-tooltip-b"></div>
  </div>
</div>
<div class="scrim" id="gallery-popup" style="visibility: hidden;">
  <div class="scrim-inner">
    <div id="gallery" class="ad-gallery"> <a id="gallery-close" href="#"><img src="static/images/frontend/gallery/gallery-close.png" width="31" height="31" alt="Close" /></a>
      <div class="ad-image-wrapper"> </div>
      <div class="ad-controls"></div>
      <div class="ad-nav">
        <div class="ad-thumbs">
          <ul class="ad-thumb-list">
            {foreach from=$images item=image name='glrs'}
            
            {$image->decodeVersions()}
            <li> <a href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.fullscreen.filename}"> <img alt="{$image->alt|default:$image->title}" src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$image->versions.gallery_thumb.filename}" class="image{$smarty.foreach.glrs.iteration-1}" width="{$image->versions.gallery_thumb.width}" height="{$image->versions.gallery_thumb.height}" /> </a> </li>
            {/foreach}
          </ul>
        </div>
      </div>
    </div>
    <div class="b-social-buttons b-social-popup"> {include file='includes/snippet-social.tpl'} </div>
  </div>
  <!-- .scrim-inner --> 
  
</div>
<!-- #buy-popup .scrim --> 

