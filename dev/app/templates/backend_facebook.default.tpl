{extends file='layouts/backend.table.tpl'}

{block name='title'}
    {capture name='site_title'}{t}backend.facebook.reviews{/t}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [{$smarty.capture.site_title}, '']
    ]}

    {if $cpf_rights->has_rights($cpf_controller, 'add')}
        {capture name="common_actions"}
            {cpf_button title=t('backend.facebook.load_reviews') icon='retweet' url=cpf_link(['controller' => $cpf_controller, 'action' => 'load'])}
        {/capture}
    {/if}

{/block}

{block name='content_top'}
    {if !empty($cpf_entities)}

        {cpf_th field='priority'}

        {if $cpf_rights->has_rights($cpf_controller, 'toggle_published')}
            {cpf_th field='is_published' no_link=true}
        {/if}

        {cpf_th field='title' no_link=true}
        {cpf_th field='date' no_link=true}
        {cpf_th field='content' no_link=true}

        {* actions *}
        {$show_actions = false}
        {if $cpf_rights->has_rights($cpf_controller, 'view') ||
            $cpf_rights->has_rights($cpf_controller, 'edit') ||
            $cpf_rights->has_rights($cpf_controller, 'delete') ||
            $cpf_rights->has_rights($cpf_controller, 'up') ||
            $cpf_rights->has_rights($cpf_controller, 'down')}
            {$show_actions = true}
        {/if}
        {if $show_actions}
            {cpf_th title=t('backend.common.actions')}
        {/if}
    {/if}
{/block}

{block name='content'}
    {foreach from=$cpf_entities item='item' name='list'}
    <tr class="{cycle values=',alternate'}">
        {* priority *}
        <td class="span1">{$item->priority}</td>

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
        <td class="span2">
            {if $cpf_rights->has_rights($cpf_controller, 'view')}
                <a href="{link controller=$cpf_controller action="view" id=$item->id}">{$item->title}</a>
            {else}
                {$item->title}
            {/if}
        </td>
        {* date *}
        <td class="span1">{$item->date|datetime_format:$cpf_langs.$cpf_lang.date_format}</td>
        {* content *}
        <td class="span4">{$item->content|strip_tags|truncate:200}</td>
        {* actions *}
        {if $show_actions}
            <td>
                {if $cpf_rights->has_rights($cpf_controller, 'view')}
                    <a href="{link controller=$cpf_controller action='view' id=$item->id}"><i class="icon-info-sign"></i> {t}backend.common.view{/t}</a>
                {/if}
                {if $cpf_rights->has_rights($cpf_controller, 'edit')}
                    <a href="{link controller=$cpf_controller action='edit' id=$item->id}"><i class="icon-edit"></i> {t}backend.common.edit{/t}</a>
                {/if}
                {if $cpf_rights->has_rights($cpf_controller, 'delete')}
                    <a href="{link controller=$cpf_controller action='delete' id=$item->id}" onclick="return confirm('{t}backend.common.really_delete{/t}');"><i class="icon-trash"></i> {t}backend.common.delete{/t}</a>
                {/if}
                {if $cpf_rights->has_rights($cpf_controller, 'up') || $cpf_rights->has_rights($cpf_controller, 'down')}
                    <br /><br />
                    {if $cpf_rights->has_rights($cpf_controller, 'up')}
                        {if !$smarty.foreach.list.first}
                            <a href="{link controller=$cpf_controller action='up' id=$item->id}"><i class="icon-arrow-up"></i> {t}backend.common.move_up{/t}</a>
                        {/if}
                    {/if}
                    {if $cpf_rights->has_rights($cpf_controller, 'down')}
                        {if !$smarty.foreach.list.last}
                            <a href="{link controller=$cpf_controller action='down' id=$item->id}"><i class="icon-arrow-down"></i> {t}backend.common.move_down{/t}</a>
                        {/if}
                    {/if}
                {/if}
            </td>
        {/if}
    </tr>
    {/foreach}
{/block}