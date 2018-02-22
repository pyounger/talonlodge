{extends file='layouts/backend.table.tpl'}

{block name='title'}
    {capture name='site_title'}{t}backend.galleries.galleries{/t}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [{$smarty.capture.site_title}, '']
    ]}

    {if $cpf_rights->has_rights($cpf_controller, 'add')}
        {capture name="common_actions"}
            {cpf_button title=t('backend.galleries.add_gallery') icon='plus-sign' url=cpf_link(['controller' => $cpf_controller, 'action' => 'add'])}
        {/capture}
    {/if}
{/block}

{block name='content_filter'}
    {if false && $types|@count > 0}
    <ul class="nav nav-pills">
        {foreach $types as $_type}
        <li{if !$type || $type == $_type.id} class="active"{/if}><a href="#">{$_type.title}</a></li>
        {/foreach}
    </ul>
    {/if}
{/block}

{block name='content_top'}
    {if $cpf_entities|@count > 1}
        {cpf_th field='id' title=t('tables.galleries.id')}
        {cpf_th field='title' title=t('tables.galleries.title')}

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

            {* title *}
            <td>
                {if $item->level > 0}{section loop=$item->level-1 name='dashes'}—{/section} {/if}
                {if $cpf_rights->has_rights($cpf_controller, 'view')}
                    <a href="{link controller=$cpf_controller action="view" id=$item->id}">{$item->title}</a>
                {else}
                    {$item->title}
                {/if}
                <span class="label label-info">{$item->gallerytype->title}</span>
            </td>

            {* actions *}
            {if $show_actions}
                <td>
                    {if $cpf_rights->has_rights($cpf_controller, 'view')}
                        <a href="{link controller=$cpf_controller action='view' id=$item->id}"><i class="icon-th"></i> {t}backend.galleries.items{/t}</a>
                    {/if}
                    {if $cpf_rights->has_rights($cpf_controller, 'edit')}
                        <a href="{link controller=$cpf_controller action='edit' id=$item->id}"><i class="icon-edit"></i> {t}backend.common.edit{/t}</a>
                    {/if}
                    {if $cpf_rights->has_rights($cpf_controller, 'delete')}
                        <a href="{link controller=$cpf_controller action='delete' id=$item->id}" onclick="return confirm('{t}backend.common.really_delete{/t}');"><i class="icon-trash"></i> {t}backend.common.delete{/t}</a>
                    {/if}
                </td>
            {/if}

        </tr>
    {/if}
    {/foreach}
{/block}