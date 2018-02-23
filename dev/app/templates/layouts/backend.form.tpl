{*
	Backend form layout with 'Back', 'Save'/'Add' and 'Cancel' buttons
	
	Captures to use in block 'content_init':
	@param 	string 	$smarty.capture.back_url 		Back URL for 'Back' and 'Cancel' buttons
	@param 	string 	$smarty.capture.action 			Form action, default -- current URL
	@param 	string 	$smarty.capture.summary 		Table summary, default -- defined
	@param 	string 	$smarty.capture.table_class	 	Css class for form table (appended to 'cpf_form' class)
*}
{extends file='layouts/backend.tpl'} 
{block name="extra-scripts"}{/block}
{block name='content_init'}
	{*
		For initialization and client validation
	*}
{/block}

	{block name='content_top'}
		{* 
			Back button
		*}
    {*
		{capture name='back_button'}{cpf_button title=t('backend.common.back') url=$smarty.capture.back_url}{/capture}
		{include file='includes/backend.ui/backend.common_actions.tpl' actions=$smarty.capture.back_button}
		*}
	{/block}

{block name='content_top_bottom'}
	{include file='includes/backend.ui/backend.validator.errors.tpl'}

	<form action="{$smarty.capture.action|default:$cpf_url_current}" method="post" id="cpf-page-form"{if $smarty.capture.is_upload_form} enctype="multipart/form-data"{/if} class="form-horizontal">
        <fieldset>
            <legend>{$smarty.capture.page_title}</legend>

{/block}

{block name='content'}
	{*
		Put content here
	*}
{/block}

{block name='content_bottom_top'}{/block}

	{block name='content_bottom'}
        {*
            "Submit" and "Cancel" button
        *}
        <div class="form-actions">
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

{block name='content_bottom_bottom'}
        </fieldset>
    </form>
{/block}