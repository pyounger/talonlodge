<?xml version="1.0" encoding="UTF-8"?>
{$now = $smarty.now|date_format:"%Y-%m-%d"}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

		<url>
			<loc>{link rule='frontend_index' abs=true}</loc>
			<lastmod>{$now}</lastmod>
			<changefreq>daily</changefreq>
			<priority>1.0</priority>
		</url>

		{foreach from=$pages item=page}
			{if $page->type == 'content' && $page->slug != ''}
			<url>
				<loc>{link rule='frontend_page' slug=$page->slug abs=true}</loc>
				<lastmod>{$now}</lastmod>
				<changefreq>{$pages_changefreq}</changefreq>
				<priority>{$pages_priority}</priority>
			</url>
			{/if}
		{/foreach}
		
</urlset>