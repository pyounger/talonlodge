{extends file='layouts/backend.table.tpl'}

{block name='title'}
    {capture name='site_title'}{t}backend.banners.banners{/t}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [{$smarty.capture.site_title}, '']
    ]}

    {if $cpf_rights->has_rights($cpf_controller, 'add')}
        {capture name="common_actions"}
            {cpf_button title=t('backend.banners.add_banner') icon='plus-sign' url=cpf_link(['controller' => $cpf_controller, 'action' => 'add'])}
        {/capture}
    {/if}

{/block}

{block name='content_top'}
    {if !empty($cpf_entities)}
        {cpf_th field='id'}
        {cpf_th field='title'}
        {cpf_th field='url'}
        {cpf_th field='start_date'}
        {cpf_th field='finish_date'}
        {cpf_th field='shows_count'}
        {cpf_th field='clicks_count'}
        {if $cpf_rights->has_rights($cpf_controller, 'delete') || $cpf_rights->has_rights($cpf_controller, 'edit')}
            {cpf_th title=t('backend.common.actions')}
        {/if}
    {/if}
{/block}

{block name='content'}
    {foreach from=$cpf_entities item='item' name='list'}
    <tr class="{cycle values=',alternate'}">
        <td>{$item->id}</td>
        {*<td><a href="#" class="thumbnail"><img src="{$attachment_url}{$item->filename}" width="{cpf_config('APP.UPLOADS.BACKEND.PREVIEW.WIDTH')}" height="{cpf_config('APP.UPLOADS.BACKEND.PREVIEW.HEIGHT')}" alt="" /></a></td>*}
        <td>
            {if $cpf_rights->has_rights($cpf_controller, 'edit')}
                <a href="{link controller=$cpf_controller action="edit" id=$item->id}">{$item->title}</a>
            {else}
                {$item->title}
            {/if}
        </td>
        <td>{$item->url}</td>
        <td>{$item->start_date|datetime_format:$cpf_langs.$cpf_lang.date_format}</td>
        <td>{$item->finish_date|datetime_format:$cpf_langs.$cpf_lang.date_format}</td>
        <td>{$item->shows_count|default:0}</td>
        <td>{$item->clicks_count|default:0}</td>

        {if $cpf_rights->has_rights($cpf_controller, 'view') || $cpf_rights->has_rights($cpf_controller, 'edit' || $cpf_rights->has_rights($cpf_controller, 'delete'))}
            <td>
                <a href="{link controller=$cpf_controller action='edit' id=$item->id}"><i class="icon-edit"></i> {t}backend.common.edit{/t}</a>
                <a href="{link controller=$cpf_controller action='delete' id=$item->id}" onclick="return confirm('{t}backend.common.really_delete{/t}');"><i class="icon-remove"></i> {t}backend.common.delete{/t}</a>
                <br /><br />
                {if !$smarty.foreach.list.first}
                    <a href="{link controller=$cpf_controller action='up' id=$item->id}"><i class="icon-arrow-up"></i> {t}backend.common.move_up{/t}</a>
                {/if}
                {if !$smarty.foreach.list.last}
                    <a href="{link controller=$cpf_controller action='down' id=$item->id}"><i class="icon-arrow-down"></i> {t}backend.common.move_down{/t}</a>
                {/if}
            </td>
        {/if}
    </tr>
    {/foreach}
{/block}