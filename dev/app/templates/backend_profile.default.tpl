{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{t}Профиль{/t}
{/block}

{block name='content_init'}
	
	{$cpf_breadcrumb=[
		[t('Профиль'), '']
	]}

	{capture name='back_url'}{link controller='backend_index'}{/capture}	

{/block}

{block name='content_top'}
	{* Disable back button *}
{/block}

{block name='content'}

	<p><b>{$cpf_current_entity->login}</b></p>
	{cpf_input_helper type='text' field='name'}
	{cpf_input_helper type='text' field='surname'}
    <br />
	{cpf_input_helper type='password' field='password' no_value='true'}
	{cpf_input type='password' field='password_c' value='' label=t('Password confirmation')}
	{cpf_input type='comment' value=t('Enter your current password for submitting changes')}
	{cpf_input type='password' field='password_current' label=t('Current password')}

{/block}

{block name='js_init'}
	{capture name='validation_rules'}
		rules:
		{
			name: 'required',
			password_c:
			{
				equalTo: '#password'
			},
			password_current: 'required'
		},
		messages:
		{
			name: '{t}Please, check user\'s name{/t}',
			password_c: '{t}Passwords do not match{/t}',
			password_current: '{t}Current password is empty{/t}'
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}
{/block}
