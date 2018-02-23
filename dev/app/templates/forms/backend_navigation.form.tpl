{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.navigation.editing_menu{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.navigation.adding_menu{/t}{/capture}
	{/if}
	{$smarty.capture.page_title}
{/block}

{block name='content_init'}

	{$cpf_breadcrumb=[
		[t('backend.navigation.menu'), cpf_link(['controller' => $cpf_controller])],
		[$smarty.capture.page_title]
	]}

	{capture name='back_url'}{link controller=$cpf_controller action='default'}{/capture}

	{capture name='validation_rules'}
		rules: {
			title: { required: true },
			key: {
				required: true,
				regexp: {$cpf_config_validation.SHORTCUT_REGEXP}
			}
		},
		messages: {
			title: { required: '{t}backend.navigation.required_title{/t}' },
			key: {
				required: '{t}backend.navigation.required_key{/t}',
				regexp: '{t}backend.navigation.invalid_key_format{/t}'
			}
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}
	{cpf_input_helper type="text" field="title"}
    {if $cpf_rights->is_root()}
		{cpf_input_helper type="slug" field="key" title_field='title'}
        {cpf_input_helper type="textarea" field="attributes" }
    {/if}
{/block}