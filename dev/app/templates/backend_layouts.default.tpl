{extends file='layouts/backend.table.tpl'}

{block name='title'}
    {capture name='site_title'}{t}backend.layouts.layouts{/t}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [{$smarty.capture.site_title}, '']
    ]}

    {if $cpf_rights->has_rights($cpf_controller, 'add')}
        {capture name="common_actions"}
            {cpf_button title=t('backend.layouts.add_layout') icon='plus-sign' url=cpf_link(['controller' => $cpf_controller, 'action' => 'add'])}
        {/capture}
    {/if}

{/block}

{block name='content_top'}
    {if $cpf_entities|@count > 1}
        {cpf_th field='id'}
        {cpf_th field='title'}
        {cpf_th field='template_name'}
        {cpf_th field='is_default'}

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
    {foreach $cpf_entities as $item}
        <tr class="{cycle values=',alternate'}">

            {* id *}
            <td>{$item->id}</td>

            {* title *}
            <td class="span4">
                {if $cpf_rights->has_rights($cpf_controller, 'edit')}
                    <a href="{link controller=$cpf_controller action="edit" id=$item->id}">{$item->title}</a>
                {else}
                    {$item->title}
                {/if}
            </td>

            {* template_name *}
            <td class="span3">
                {$item->template_name}
            </td>

            <td>
                {if $item->is_default}<i class="icon-ok"></i>{/if}
            </td>

            {* actions *}
            {if $show_actions}
                <td>
                    {if $cpf_rights->has_rights($cpf_controller, 'edit')}
                        <a href="{link controller=$cpf_controller action='edit' id=$item->id}"><i class="icon-edit"></i> {t}backend.common.edit{/t}</a>
                    {/if}
                    &nbsp;
                    {if $cpf_rights->has_rights($cpf_controller, 'delete')}
                        <a href="{link controller=$cpf_controller action='delete' id=$item->id}" onclick="return confirm('{t}backend.common.really_delete{/t}');"><i class="icon-trash"></i> {t}backend.common.delete{/t}</a>
                    {/if}
                </td>
            {/if}

        </tr>
    {/foreach}
{/block}