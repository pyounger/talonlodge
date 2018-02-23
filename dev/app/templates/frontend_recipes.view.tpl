{extends file='layouts/frontend.tpl'}

{block name='description'}{/block}
{block name='keywords'}{/block}
{block name='title'}{$recipe->title}{/block}

{block name='content'}
	<!-- Recipe view page -->
	{include file='frontend_recipes.item.tpl'}
{/block}
{block name='js_init'}
{/block}
