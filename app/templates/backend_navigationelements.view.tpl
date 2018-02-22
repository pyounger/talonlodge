{extends file='layouts/backend.table.tpl'}

{block name='title'}
    {capture name='site_title'}{$menu->title}{/capture}
    {$smarty.capture.site_title}: {t}backend.navigation.menu_elements{/t}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [t('backend.navigation.menu'), cpf_link(['controller' => 'backend_navigation'])],
        [{$smarty.capture.site_title}, '']
    ]}

    {if $cpf_rights->has_rights($cpf_controller, 'add')}
        {capture name="common_actions"}
            {cpf_button title=t('backend.navigation.add_menu_element') icon='plus-sign' url=cpf_link(['controller' => $cpf_controller, 'action' => 'add', 'mid' => $menu->id])}
        {/capture}
    {/if}

{/block}

{block name='content_top'}
    {if $cpf_entities|@count > 1}
        {cpf_th field='id' title=t('tables.navigation_menu_elements.id')}

        {if $cpf_rights->has_rights($cpf_controller, 'toggle_published')}
            {cpf_th field='is_published' no_link=true title=t('tables.navigation_menu_elements.is_published')}
        {/if}

        {cpf_th field='title' title=t('tables.navigation_menu_elements.title')}

        {* actions *}
        {$show_actions = false}
        {if
            $cpf_rights->has_rights($cpf_controller, 'edit') ||
            $cpf_rights->has_rights($cpf_controller, 'delete')}
            {$show_actions = true}
        {/if}
        {if $show_actions}
            {cpf_th title=t('backend.common.actions')}
        {/if}
    {/if}
{/block}

{block name='content'}
    {foreach $cpf_entities as $node}
    {$item = $node->data}	
    {if $item->level > 0}
        <tr class="{cycle values=',alternate'}">

            {* id *}
            <td>{$item->id}</td>

			{* visibility *}
			{if $cpf_rights->has_rights($cpf_controller, 'toggle_published')}
			<td class="span1">
				{if $item->is_published}
					<a href="{link controller=$cpf_controller action='toggle_published' id=$item->id}" class="icon-eye-open" title="{t}backend.common.unpublish{/t}"></a>
				{else}
					<a href="{link controller=$cpf_controller action='toggle_published' id=$item->id}" class="icon-eye-close" title="{t}backend.common.publish{/t}"></a>
				{/if}
			</td>
			{/if}
			
            {* title *}
            <td>
                {if $item->level > 0}{section loop=$item->level-1 name='dashes'}—{/section} {/if}
                {if $cpf_rights->has_rights($cpf_controller, 'edit')}
                    <a href="{link controller=$cpf_controller action="edit" id=$item->id mid=$menu->id}">{$item->title}</a>
                {else}
                    {$item->title}
                {/if}
            </td>

            {* actions *}
            {if $show_actions}
                <td>
                    {if $cpf_rights->has_rights($cpf_controller, 'edit')}
                        <a href="{link controller=$cpf_controller action='edit' id=$item->id mid=$menu->id}"><i class="icon-edit"></i> {t}backend.common.edit{/t}</a>
                    {/if}
                    {if $cpf_rights->has_rights($cpf_controller, 'delete')}
                        <a href="{link controller=$cpf_controller action='delete' id=$item->id}" onclick="return confirm('{t}backend.common.really_delete{/t}');"><i class="icon-remove"></i> {t}backend.common.delete{/t}</a>
                    {/if}
					{if $cpf_rights->has_rights($cpf_controller, 'up') || $cpf_rights->has_rights($cpf_controller, 'down')}
							{if $cpf_rights->has_rights($cpf_controller, 'up') && !$item->first_on_level}
									<a href="{link controller=$cpf_controller action='up' id=$item->id}"><i class="icon-arrow-up"></i> {t}backend.common.move_up{/t}</a>
							{/if}
							{if $cpf_rights->has_rights($cpf_controller, 'down') && !$item->last_on_level}
									<a href="{link controller=$cpf_controller action='down' id=$item->id}"><i class="icon-arrow-down"></i> {t}backend.common.move_down{/t}</a>
							{/if}
					{/if}					
                </td>
            {/if}

        </tr>
    {/if}
    {/foreach}
{/block}