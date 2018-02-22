{extends file='layouts/frontend.tpl'}

{block name='title'}{$page->seo_title}{/block}
{block name='keywords'}{$page->seo_keywords}{/block}
{block name='description'}{$page->seo_description}{/block}

{block name='content'}
    {include file=$template_name}
{/block}
