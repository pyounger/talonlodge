{extends file='layouts/backend.table.tpl'} 

{block name='title'}Участники{/block}

{block name='content_init'}

	{$cpf_breadcrumb=[
		[t('Участники'), '']
	]}

	{if $cpf_rights->has_rights($cpf_controller, 'add')}
		{capture name="common_actions"}
		{/capture}
	{/if}

{/block}

{block name='content_filter'}
    <form class="well form-search" action="{link controller=$cpf_controller action='search'}" method="post" >
        <label for>Поиск</label>
        <select name="field" class="span2">
            {foreach $cpf_orders as $key=>$order}
                <option value="{$key}" {if ($field == $key)}selected="selected"{/if}>{cpf_title class='App_Model_User' field=$key}</option>
            {/foreach}
        </select>
        <input type="text" class="input-medium " name="search" value="{$search}" />
        <label for>&nbsp;Дата регистрации</label>
        <label for>c
        <input type="text" class="span2" id="date_from" name="date_from" value="{$date_from}" />
        </label>
        <label for>по</label>
        <input type="text" class="span2" id="date_to" name="date_to" value="{$date_to}" />
        <button type="submit" class="btn btn-primary">Поиск</button>
        <a href="{link controller=$cpf_controller}" class="btn">Сброс</a>
        <script type="text/javascript">
        {literal}
            $(function(){
            $('#date_from').datepicker({ defaultDate: +1 });
            $('#date_from').datepicker('option', $.datepicker.regional['ru']);
            $('#date_to').datepicker({ defaultDate: +1 });
            $('#date_to').datepicker('option', $.datepicker.regional['ru']);
            });
        {/literal}
        </script>
    </form>
{/block}

{block name='content_top'}
	{if !empty($cpf_entities)}
		{cpf_th field='id'}
		{cpf_th field='login'}
		{cpf_th field='name'}
		{cpf_th field='datetime'}
		{cpf_th field='birthday'}
		{cpf_th field='sex'}
		{cpf_th field='codes_count'}
		{cpf_th field='prizes_count'}
		{if $cpf_rights->has_rights($cpf_controller, 'delete') || $cpf_rights->has_rights($cpf_controller, 'edit')}
			{cpf_th title=t('Actions')}
		{/if}
	{/if}
{/block}

{block name='content'}
	{foreach $cpf_entities as $user}
		<tr class="{cycle values=',alternate'}">
			<td>{$user->id}</td>
			<td>
				{if $cpf_rights->has_rights($cpf_controller, 'view')}
					<a href="{link controller="backend_users" action="view" id=$user->id}">{$user->login}</a>
				{else}		
					{$user->login}
				{/if}
			</td>
			<td>{$user->getFullName()}</td>
			<td>{$user->datetime|datetime_format:$cpf_langs.$cpf_lang.timestamp_format}</td>
            <td>{$user->birthday|date_format:$cpf_langs.$cpf_lang.date_format}</td>
            <td style="text-align:center">{if $user->sex == 1}м{elseif $user->sex == 2}ж{/if}</td>
			<td style="text-align:center">{$user->codes_count|default:0}</td>
			<td style="text-align:center">{$user->prizes_count|default:0}</td>

			{if $cpf_rights->has_rights('backend_users', 'view')}
				<td>
                    <a class="btn btn-small btn-info" href="{link controller=$cpf_controller action='view' id=$user->id}"><i class="icon-info-sign icon-white"></i> Просмотр</a>
				</td>
			{/if}
		</tr>
	{/foreach}
{/block}	