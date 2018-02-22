{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.email_templates.editing_template{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.email_templates.adding_template{/t}{/capture}
	{/if}
	{$smarty.capture.page_title}
{/block}

{block name='content_init'}

	{$cpf_breadcrumb=[
		[t('backend.email_templates.email_templates'), cpf_link(['controller' => $cpf_controller])],
		[$smarty.capture.page_title]
	]}

	{capture name='back_url'}{link controller=$cpf_controller action='default'}{/capture}

	{capture name='validation_rules'}
		rules: {
			title: { required: true }
		},
		messages: {
			title: { required: '{t}backend.navigation.required_title{/t}' }
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}
	{cpf_input_helper type="text" field="title"}
	{cpf_input_helper type="text" field="subject" class="span9"}
    {cpf_input_helper type="ck_editor" field="body" class="extended" loadJS="true" height=600}
{/block}

{block name='content_bottom'}
{*
    "Submit" and "Cancel" button
*}
<div class="form-actions">
    {cpf_button title=t('backend.common.preview') class='btn-success' icon='zoom-in icon-white' url=cpf_link(['controller' => $cpf_controller, 'action' => 'view', 'id' => $id]) target="_blank"}
    {if $cpf_is_edit}
        {cpf_submit title=t('backend.common.save') icon='plus-sign'}
        {cpf_submit title=t('backend.common.save_and_continue') icon='check' id="form-apply"}
    {else}
        {cpf_submit title=t('backend.common.save') icon='plus-sign'}
        {cpf_submit title=t('backend.common.save_and_continue') icon='check' id="form-apply"}
    {/if}
    {cpf_button title=t('backend.common.cancel') icon='ban-circle' url=$smarty.capture.back_url}
</div>
{/block}