{extends file='layouts/backend.table.tpl'}

{block name='title'}
    {capture name='site_title'}{t}backend.pages.pages{/t}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [{$smarty.capture.site_title}, '']
    ]}

    {if $cpf_rights->has_rights($cpf_controller, 'add')}
        {capture name="common_actions"}
            {cpf_button title=t('backend.pages.add_page') icon='plus-sign' url=cpf_link(['controller' => $cpf_controller, 'action' => 'add'])}
        {/capture}
    {/if}

{/block}

{block name='content_top'}
    {if $cpf_entities|@count > 1}
        {cpf_th field='id' title=t('tables.pages.id')}
        {cpf_th field='type' title=t('tables.pages.is_published')}
        {cpf_th field='type' title=t('tables.pages.type')}
        {cpf_th field='title' title=t('tables.pages.title')}

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

            {* page type *}
            <td>{if $item->type == 'component'}<i class="icon-th-large"></i>{elseif $item->type == 'content'}<i class="icon-file"></i>{/if}</td>

            {* title *}
            <td class="span5">
                {if $item->level > 0}{section loop=$item->level-1 name='dashes'}—{/section} {/if}
                {if $cpf_rights->has_rights($cpf_controller, 'view')}
                    <a href="{link controller=$cpf_controller action="view" id=$item->id}">{$item->title}</a>
                {else}
                    {$item->title}
                {/if}
            </td>

            {* actions *}
            {if $show_actions}
                <td>
                    <a href="{link controller=$cpf_controller action='view' id=$item->id}"><i class="icon-list-alt"></i> {t}tables.pages.content{/t}</a>
                    &nbsp;
                    <a href="{link controller=$cpf_controller action='slideshow' id=$item->id}"><i class="icon-picture"></i> {t}backend.pages.slideshow{/t}</a>
                    &nbsp;
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
    {/if}
    {/foreach}
{/block}