{*
	Breadcrumb
	
	@param 	array 	$data 		Breadcrumb array
	@param 	bool 	$link_last 	Link last item (default: false)
*}
{function name='cpf_breadcrumb'}
    <ul class="breadcrumb">
	{foreach $data as $item}
    <li>
		{if $item@last && !$link_last}
			{$item.0}
		{else}
			<a href="{$item.1}">{$item.0}</a>
		{/if}
		{if !$item@last}<span class="divider">/</span>{/if}
    </li>
	{/foreach}
	</ul>
{/function}