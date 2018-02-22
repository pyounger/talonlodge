{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.blocks.editing_block{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.blocks.adding_block{/t}{/capture}
	{/if}
	{$smarty.capture.page_title}
{/block}

{block name='content_init'}
	{$cpf_breadcrumb=[
		[t('backend.pages.pages'), cpf_link(['controller' => 'backend_pages', 'action' => 'view', 'id' => $page->id])],
		[$smarty.capture.page_title]
	]}

	{capture name='back_url'}{link controller='backend_pages' action='view' id=$page->id}{/capture}

	{capture name='validation_rules'}
		rules: {
			content: { ck_not_empty: true }
		},
		messages: {
			content: { ck_not_empty: '{t}backend.blocks.required_content{/t}' }
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}
    {cpf_input_helper type='ck_editor' field='content' loadJS=true}
    {cpf_input_helper type='text' field='classname'}
    {cpf_input_helper type='hidden' field='page_id'}
    {cpf_input_helper type='hidden' field='page_placeholder'}
{/block}
