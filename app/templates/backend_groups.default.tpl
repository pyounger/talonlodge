{extends file='layouts/backend.table.tpl'} 

{block name='title'}
	{t}Group administration{/t}
{/block}

{block name='content_init'}

	{$cpf_breadcrumb=[
		[t('Group administration')]	
	]}

	{if $cpf_rights->has_rights($cpf_controller, 'add')}
		{capture name="common_actions"}
				{cpf_icon_common icon='add' title=t('Add new group') url=cpf_link(['controller'=>$cpf_controller, 'action' => 'add'])}								
		{/capture}
	{/if}
{/block}

{block name='content_top'}
	{if !empty($cpf_entities)}	
		{cpf_th field='id'}
		{cpf_th field='title'}
		{cpf_th field='users_count'}	
		{if $cpf_rights->has_rights($cpf_controller, 'delete') || $cpf_rights->has_rights($cpf_controller, 'edit')}
			{cpf_th title=t('Actions')}
		{/if}
	{/if}
{/block}

{block name='content'}
	{foreach $cpf_entities as $group}
		<tr class="{cycle values=',alternate'}">
			<td>{$group->id}</td>
	
			<td>
				{if $cpf_rights->has_rights($cpf_controller, 'edit')}
					<a href="{link controller=$cpf_controller action='edit' id=$group->id}">{$group->title}</a>
				{else}		
					{$group->title} 
				{/if}
			</td>
		
			<td>
				{$group->users_count}
			</td>
		
			{if $cpf_rights->has_rights($cpf_controller, 'delete') || $cpf_rights->has_rights($cpf_controller, 'edit')}
				<td>
					<div class="icons w2i">
						{if $cpf_rights->has_rights($cpf_controller, 'edit')}
							{cpf_icon 
								icon='edit' 
								title=t('Edit') 
								url=cpf_link(['controller' => $cpf_controller, 'action' => 'edit', 'id' => $group->id])}
						{/if}
						{if $cpf_rights->has_rights($cpf_controller, 'delete') && !in_array($group->id, $groups_default)}
							{cpf_icon 
								icon='delete' 
								title=t('Delete') 
								url=cpf_link(['controller' => $cpf_controller, 'action' => 'delete', 'id' => $group->id])
								confirm=t('Do you really want to delete &#8220;%s&#8221; group?', $group->title)}
						{/if}
					</div>				
				</td>
			{/if}
		</tr>
	{/foreach}
{/block}