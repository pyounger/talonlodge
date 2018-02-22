{*
	Table header for backend.table.tpl
	
	@param 	array 	$cpf_entities 	List of entities
	
	@param 	string 	$title 			Text-only title, if specified text-only header is rendered
	@param 	string 	$url 			URL for sortable header (default provided)
	@param 	string 	$no_link 		Do not create link
	@param 	string 	$field 			Field name
*}
{function name='cpf_th'}
{if !$title}
	{if !$no_link}
		<th class="th-{$field} {if $field == $cpf_order_sort}sort-current{/if}">
			{capture name='th_arrow'}{if $field == $cpf_order_sort}{if $cpf_order_order == 'desc'}&nbsp;&darr;{else}&nbsp;&uarr;{/if}{/if}{/capture}
			{capture name='th_order_sort'}{if $field == $cpf_order_sort}{if $cpf_order_order == 'desc'}asc{else}desc{/if}{else}asc{/if}{/capture}			
			{capture name='th_url'}
				{if !$url}
					{link controller=$cpf_controller sort=$cpf_order_fake_sort order=$cpf_order_fake_order page=1}
				{else}
					{$url}
				{/if}
			{/capture}			
			<a href="{$smarty.capture.th_url|replace:$cpf_order_fake_order:$smarty.capture.th_order_sort|replace:$cpf_order_fake_sort:$field}">{cpf_title var=$cpf_entities.0 field=$field}</a>{$smarty.capture.th_arrow}			
		</th>
	{else}
		<th>{cpf_title var=$cpf_entities.0 field=$field}</th>
	{/if}
{else}
	<th>{$title}</th>
{/if}
{/function}