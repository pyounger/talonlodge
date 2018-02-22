{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.twitter.editing_review{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.twitter.adding_review{/t}{/capture}
	{/if}
	{$smarty.capture.page_title}
{/block}

{block name='content_init'}
	{$cpf_breadcrumb=[
		[t('backend.twitter.reviews'), cpf_link(['controller' => $cpf_controller])],
		[$smarty.capture.page_title]
	]}

	{capture name='back_url'}{link controller=$cpf_controller}{/capture}

	{capture name='validation_rules'}
		rules: {
			title: { required: true },
			key: { required: true },
			content: { required: true }
		},
		messages: {
			title: { required: '{t}backend.twitter.required_title{/t}' },
			key: { required: '{t}backend.twitter.required_key{/t}' },
			content: { required: '{t}backend.twitter.required_content{/t}' }
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}
	{cpf_input_helper type='text' field='title'}
	{cpf_input_helper type='text' field='key'}
    {cpf_input_helper type='textarea' field='content'}
    {cpf_input_helper type='checkbox' field='is_published'}
{/block}
