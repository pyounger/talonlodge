{*
	Pager for backend UI
	
	@param 	string 	$direct_url 		Url for paging
	@param 	string 	$hide_direct 		Hide direct links, show only next and previous links
	@param 	string 	$delta 				Number of intermediate number, for example, when delta=5: '<<...4 5 6 7 8...>>', default $cpf_pager_delta
	@param 	bool 	$full_list_enabled 	Specifies if full list enabled
    
	all other params are assigned from pager class
*}
{function name='cpf_pager'}

{if !$delta}
	{assign var='delta' value=$cpf_pager_delta}
{/if}

{if $full_list_enabled === NULL}
	{assign var='full_list_enabled' value=$cpf_pager_full_list_enabled}
{/if}


{if $cpf_pager_count > 1 && $cpf_pager_current <= $cpf_pager_count}
<div class="pagination">
    <ul>
{if $cpf_pager_current != 0}
	{if $cpf_pager_current > 2}
        <li class="previous"><a href="{$direct_url|replace:$cpf_pager_fake_page:1}" class="page-changer">&laquo;&nbsp;{t}first{/t}</a></li>
	{/if}
	{if $cpf_pager_current != 1}
        <li class="previous"><a href="{$direct_url|replace:$cpf_pager_fake_page:($cpf_pager_current-1)}" class="page-changer">&laquo;&nbsp;{t}previous{/t}</a></li>
	{/if}
	
	{if !$hide_direct}
	    {if $cpf_pager_current - $delta > 0}
            <li class="disabled"><a href="{$cpf_url_current}#">...</a></li>
	    {/if}
	    
	    {for $i = 1 to $cpf_pager_count}
	    	{if $i@iteration > $cpf_pager_current - $delta && $i@iteration < $cpf_pager_current + $delta}
	    		{if ($i@iteration == $cpf_pager_current)}
                    <li class="active"><a href="{$cpf_url_current}#">{$i@iteration}</a></li>
	    		{else}
                    <li><a href="{$direct_url|replace:$cpf_pager_fake_page:$i@iteration}" class="pager">{$i@iteration}</a></li>
	    		{/if}
	    	{/if}
	    {/for}
	    {if $cpf_pager_count >= $cpf_pager_current + $delta}
            <li class="disabled"><a href="{$cpf_url_current}#">...</a></li>
	    {/if}
	    <li class="disabled"><a href="{$cpf_url_current}#">({t count=$cpf_pager_count plural='total %d pages'}total %d page{/t}, {t count=$cpf_pager_records_count plural='%d records'}%d record{/t})</a></li>
	{else}
        <li class="disabled"><a href="{$cpf_url_current}#">{t 1 = $cpf_pager_current  2=$cpf_pager_count}page %s of %s{/t}</a></li>
	{/if}
	
	{if $cpf_pager_current < $cpf_pager_count}
        <li class="next"><a href="{$direct_url|replace:$cpf_pager_fake_page:($cpf_pager_current+1)}" class="page-changer">{t}next{/t}&nbsp;&raquo;</a></li>
	{/if}
	
	{if $cpf_pager_current < $cpf_pager_count-1}
        <li class="next"><a href="{$direct_url|replace:$cpf_pager_fake_page:$cpf_pager_count}" class="page-changer">{t}last{/t}&nbsp;&raquo;</a></li>
	{/if}
{/if}

{if $full_list_enabled}
    {if $cpf_pager_current != 0}
	   <li><a href="{$direct_url|replace:$cpf_pager_fake_page:0}" class="page-changer">{t}show all{/t}&nbsp;&raquo;</a></li>
    {else}
	   <li><a href="{$direct_url|replace:$cpf_pager_fake_page:1}" class="page-changer">{t}show paged{/t} ({t count=$cpf_pager_count plural='total %d pages'}total %d page{/t}, {t count=$cpf_pager_records_count plural='%d records'}%d record{/t})&nbsp;&raquo;</a></li>
    {/if}
{/if}
</ul>
</div>
{/if}
{/function}