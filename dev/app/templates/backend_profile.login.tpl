{extends file='layouts/backend.tpl'} 
{block name='title'}
	{capture name='page_title'}Authorization{/capture}
	{$smarty.capture.page_title}
{/block}
{block name='content_top'}
	{* Disable back button *}
	<div class="row">
		<div class="span6 offset2">
{/block}
	
{block name='content'}
    <form action="{$cpf_url_current}" method="post" id="cpf-page-form" class="well">
        <h3>{$smarty.capture.page_title}</h3>
        <br />
        {include file='includes/backend.ui/backend.validator.errors.tpl'}
        {cpf_input type='text' label=t('Login') field='login' value=$login class='field_login'}
        {cpf_input type='password' label=t('Password') field="password" value=$password class="field_login"}
        {cpf_input type='checkbox' label=t('Remember me') field="remember" value=$remember no_border=true}
        <br />
        <button class="btn btn-primary" type="submit">Login</button>
        <a href="{$cpf_root_url}" class="btn">Back to the website</a>
    </form>
{/block}

{block name='content_bottom'}
		</div>
	</div>
{/block}

{block name='content_init'}
	{capture name='validation_rules'}
		rules:
		{
			login: 'required',
			password: 'required'
		},
		messages:
		{
			login: '{t}Please, check login{/t}',
			password: '{t}Please, check password{/t}'
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}
{/block}