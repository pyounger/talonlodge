<style type="text/css">

	.b-privacy-wrapper11 {

    width: 100% !important;
    margin-left: -5px !important;
}

</style>
<div class="h-ourstory-wrapper l-center">
	<div class="h-ourstory-container">
		<div class="b-ourstory-l">

			{$page->content['heading']}

			{if $gallery->type_id == 2}

		     	<div class="b-privacy-wrapper11">
				 <div class="b-privacy-l">
				        {$page->content['gallery']} <!-- first gallery for carousel -->
				  </div>
				</div>

			{else if $gallery->type_id == 1} 
      
      			{$page->content['gallery']}
   
    		{else}

			    {include file='snippets/frontend_element.newgallery.tpl' path=$smarty.capture.path width=$glr->cover.width height=$glr->cover.height alt=$glr->alt}

  		    {/if}
            <!-- added to render all types gallery (ParvezAnsari)-->
		</div><!-- /.b-ourstory-l-->
		<div class="b-ourstory-r">
			<div class="h-content-text-inner-sidebar">
				<div class="baltica-plain b-ourstory-sidebar-title-1">
					From Our
				</div>
				<div class="baltica-plain b-ourstory-sidebar-title-2">
					Customers
				</div>
				<div class="h-content-text-inner-sidebar-quote-wrapper">
                {control name="frontend_reviews" cache_ttl=$smarty.const.CPF_CACHE_TIME_NEVER}
				
				<div class="b-ourstory-sidebar-content">{$page->content['sidebar']}</div>
			</div>
			<div class="b-social-buttons ourstory-social">
				{include file='includes/snippet-social.tpl'}
			</div>
			</div><!-- /.h-content-text-inner-sidebar(Parvez) -->
		</div><!-- /.b-ourstory-r-->
	</div><!-- /.h-ourstory-container -->
	<div class="b-ourstory-footer">
		<div class="b-ourstory-footer-l">
			{$page->content['content-left']}
		</div>
		<div class="b-ourstory-footer-r">
			{$page->content['content-right']}
		</div>
	</div>
</div><!-- /.h-ourstory-wrapper l-center -->