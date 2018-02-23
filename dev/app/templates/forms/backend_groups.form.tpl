{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{t}Edit group{/t}
	{else}
		{t}Add group{/t}
	{/if}
{/block}

{block name='content_init'}

	{if $cpf_is_edit}
		{$cpf_breadcrumb=[
			[t('Group administration'), cpf_link(['controller' => 'backend_groups'])],
			[t('Edit group'), '']	
		]}
	{else}
		{$cpf_breadcrumb=[
			[t('Group administration'), cpf_link(['controller' => 'backend_groups'])],
			[t('Add group'), '']	
		]}
	{/if}

	{capture name='back_url'}{link controller=$cpf_controller}{/capture}	
{/block}


{block name='content'}

	{if $cpf_is_edit}
		{cpf_input_helper type='textonly' field='id'}
	{/if}
	{cpf_input_helper type='text' field='title'}

{/block}

{block name='js_init'}
	{capture name='validation_rules'}
		rules:
		{
			title: 'required'
		},
		messages:
		{
			title: '{t}Please, check title{/t}'
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}
{/block}