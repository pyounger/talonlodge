{*
	Backend view layout
	
	Captures to use in block 'content_init':
	@param 	string 	$smarty.capture.back_url 		Back URL for 'Back' and 'Cancel' buttons
	@param 	string 	$smarty.capture.action 			Form action, default -- current URL
	@param 	string 	$smarty.capture.summary 		Table summary, default -- defined
	@param 	string 	$smarty.capture.table_class	 	Css class for form table (appended to 'cpf_form' class)
*}
{extends file='layouts/backend.tpl'}


{block name='content_bottom'}
    <div class="form-actions">
        {capture name='confirm'}{t}backend.common.really_delete{/t}{/capture}
        {if $cpf_rights->has_rights($cpf_controller, 'edit')}
            {cpf_button title=t('backend.common.edit') class='btn-success' icon='edit icon-white' url=cpf_link(['controller' => $cpf_controller, 'action' => 'edit', 'id' => $entity->id])}
        {/if}
        {if $cpf_rights->has_rights($cpf_controller, 'delete')}
            {cpf_button title=t('backend.common.delete') class='btn-danger' icon='trash icon-white' url=cpf_link(['controller' => $cpf_controller, 'action' => 'delete', 'id' => $entity->id]) onclick="return confirm('{$smarty.capture.confirm}');"}
        {/if}
    </div>
{/block}