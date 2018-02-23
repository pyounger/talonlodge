<div class="b-sitemap-wrapper l-center">
    {if $is404}<h1>Can't find what you're looking for?<br /><small>Try our site map</small></h1>{else}{$page->content['heading']}{/if}
	<div class="b-sitemap-l">
        {$page->content['column-1']}
	</div>
	<div class="b-sitemap-c">
        {$page->content['column-2']}
	</div>
	<div class="b-sitemap-r">
        {$page->content['column-3']}
	</div>
</div>