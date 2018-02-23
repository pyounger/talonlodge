{extends file='layouts/backend.table.tpl'}

{block name='title'}
    {capture name='site_title'}{t}Recipes{/t}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [{$smarty.capture.site_title}, '']
    ]}

    {if $cpf_rights->has_rights($cpf_controller, 'add')}
        {capture name="common_actions"}
            {cpf_button title=t('Add Recipe') icon='plus-sign' url=cpf_link(['controller' => $cpf_controller, 'action' => 'add'])}
        {/capture}
    {/if}

{/block}

{block name='content_top'}
    {if !empty($cpf_entities)}
        {cpf_th field='id'}
        {cpf_th field='title'}
        {cpf_th field='key'}

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

{block name='content_filter'}
	{include file='backend_recipes.submenu.tpl'}
{/block}

{block name='content'}
    {foreach $cpf_entities as $item}
    <tr class="{cycle values=',alternate'}">

        {* id *}
        <td>{$item->id}</td>

        {* title *}
        <td>
            {if $cpf_rights->has_rights('backend_recipes', 'edit')}
                <a href="{link controller='backend_recipes' action="edit" id=$item->id}">{$item->title}</a>
            {else}
                {$item->title}
            {/if}
        </td>

        {* key *}
        <td>{$item->key}</td>

        {* actions *}
        {if $show_actions}
            <td>
                {if $cpf_rights->has_rights($cpf_controller, 'edit')}
                    <a href="{link controller=$cpf_controller action='edit' id=$item->id}"><i class="icon-edit"></i> {t}backend.common.edit{/t}</a>
                {/if}
                {if is_null($item->key) || $cpf_rights->has_rights($cpf_controller, 'delete')}
                    <a href="{link controller=$cpf_controller action='delete' id=$item->id}" onclick="return confirm('{t}backend.common.really_delete{/t}');"><i class="icon-trash"></i> {t}backend.common.delete{/t}</a>
                {/if}
            </td>
        {/if}

    </tr>
    {/foreach}
{/block}