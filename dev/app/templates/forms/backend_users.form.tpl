{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{t}Edit user{/t}
	{else}
		{t}Add user{/t}
	{/if}
{/block}

{block name='content_init'}

	{if $cpf_is_edit}
		{$cpf_breadcrumb=[
			[t('User administration'), cpf_link(['controller' => 'backend_users'])],
			[t('Edit user'), '']	
		]}
	{else}
		{$cpf_breadcrumb=[
			[t('User administration'), cpf_link(['controller' => 'backend_users'])],
			[t('Add user'), '']	
		]}
	{/if}

	{capture name='back_url'}{link controller=$cpf_controller}{/capture}	
{/block}


{block name='content'}
	{if $cpf_is_edit}
		{cpf_input_helper type='textonly' field='id'}
	{/if}
	{cpf_input_helper type='text' field='login'}
	{cpf_input_helper type='text' field='name'}	
	{cpf_input_helper type='select' field='group_id' list=$groups}
	{if $cpf_is_edit}
		{cpf_input type='comment' value=t("Leave passwords fields empty if you don't want to change password")}
	{/if}
	{cpf_input_helper type='password' field='password' no_value='true'}
	{cpf_input type='password' field='password_c' value='' label=t('Password confirmation')}
{/block}

{block name='js_init'}
	{capture name='validation_rules'}
	{if $cpf_is_edit}
		rules: {
			name: 'required',
			login: 'required',
			password_c:
			{
				equalTo: '#password'
			}
		},
		messages:
		{
			login: '{t}Please, check user's login{/t}',
			name: '{t}Please, check user's name{/t}',
			password_c: '{t}Passwords do not match{/t}'
		}
	{else}
		rules:
		{
			name: 'required',
			login:
			{
				required: true,
				remote : '{link controller=$cpf_controller action="check_login"}'
			},
			password: 'required',
			password_c:
			{
				required: true,
				equalTo: '#password'
			}
		},
		messages:
		{
			login:
			{
				required: '{t}Please, check user's login{/t}',
				remote: '{t}Such login already exists, please try another one{/t}'
			},
			name: '{t}Please, check user's name{/t}',
			password: '{t}Please, check password{/t}',
			password_c:
			{
				required: '{t}Please, check password confirmation{/t}',
				equalTo: '{t}Passwords do not match{/t}'
			}
		},
		onkeyup: function(element)
		{ /* prevent from firing on keyup */
        	if ((element.name in this.submitted || element == this.lastElement) && element.name != "login" )
			{
                this.element(element);
        	}
  		}
	{/if}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}
{/block}


