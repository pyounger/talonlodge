{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.layouts.editing_layout{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.layouts.adding_layout{/t}{/capture}
	{/if}
	{$smarty.capture.page_title}
{/block}

{block name='content_init'}
	{$cpf_breadcrumb=[
		[t('backend.layouts.layouts'), cpf_link(['controller' => $cpf_controller])],
		[$smarty.capture.page_title]
	]}

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
    {cpf_input_helper type='text' field='title'}
    {cpf_input_helper type='text' field='template_name'}
    {cpf_input_helper type='textarea' field='settings'}
    {cpf_input_helper type='textarea' field='placeholders'}
    {cpf_input_helper type='textarea' field='grid'}
    {cpf_input_helper type='checkbox' field='is_default'}
{/block}
