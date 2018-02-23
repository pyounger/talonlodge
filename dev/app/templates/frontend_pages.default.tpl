{extends file='layouts/frontend.tpl'}



{block name='title'}{$page->seo_title}{/block}

{block name='keywords'}{$page->seo_keywords}{/block}

{block name='description'}{$page->seo_description}{/block}



{block name='content'}

	<!-- <h2>{$template_name}</h2> -->

	{include file=$template_name}

{/block}

