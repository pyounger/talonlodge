{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.facebook.editing_review{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.facebook.adding_review{/t}{/capture}
	{/if}
	{$smarty.capture.page_title}
{/block}

{block name='content_init'}
	{$cpf_breadcrumb=[
		[t('backend.facebook.reviews'), cpf_link(['controller' => $cpf_controller])],
		[$smarty.capture.page_title]
	]}

	{capture name='back_url'}{link controller=$cpf_controller}{/capture}

	{capture name='validation_rules'}
		rules: {
			title: { required: true },
			key: { required: true },
			content: { ck_not_empty: true }
		},
		messages: {
			title: { required: '{t}backend.facebook.required_title{/t}' },
			key: { required: '{t}backend.facebook.required_key{/t}' },
			content: { ck_not_empty: '{t}backend.facebook.required_content{/t}' }
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}
	{cpf_input_helper type='text' field='title'}
	{cpf_input_helper type='text' field='key'}
    {cpf_input_helper type='ck_editor' field='content' loadJS=true}
    {cpf_input_helper type='checkbox' field='is_published'}
{/block}
