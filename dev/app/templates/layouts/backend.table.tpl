{*
	Backend table layout
	
	Captures to use in block 'content_init':
	
	@param 	array 	$cpf_entities 						List of entities	
	@param 	string 	$smarty.capture.common_actions 		Common actions content
	@param 	string 	$smarty.capture.pager_link 			Link for paging (default provided)
	@param 	string 	$smarty.capture.table_summary 		Table summary (default provided)
*}
{extends file='layouts/backend.tpl'} 

{block name='content_top_top'}
	{if $smarty.capture.common_actions}
		{include file='includes/backend.ui/backend.common_actions.tpl' actions=$smarty.capture.common_actions}
	{/if}

	{if !$smarty.capture.pager_link}
		{capture name=pager_link}{link controller=$cpf_controller sort=$cpf_order_sort order=$cpf_order_order page=$cpf_pager_fake_page}{/capture}
	{/if}

	{cpf_pager direct_url=$smarty.capture.pager_link full_list_enabled=false}

	{if !empty($cpf_entities)}
		<table summary="{$smarty.capture.table_summary|default:t('Main table on the page')}" class="table table-striped">
			<thead>
				<tr>
	{/if}
{/block}

{block name='content_filter'}{/block}

{block name='content_top'}
	{*
		Table heading
	*}
{/block}

{block name='content_top_bottom'}
			</tr>
		</thead>
	<tbody>	
{/block}

{block name='content'}
	{* 
		Table rows 
	*}
{/block}

{block name='content_bottom'}
	{if !empty($cpf_entities)}
		</tbody>
			</table>
	
	{cpf_pager direct_url=$smarty.capture.pager_link full_list_enabled=false}
	
	{else}
		<div class="cpf-no-data">{t}No matching records found{/t}</div>
	{/if}
{/block}