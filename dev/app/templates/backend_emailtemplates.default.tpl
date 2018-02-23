{extends file='layouts/backend.table.tpl'}

{block name='title'}
    {capture name='site_title'}{t}backend.email_templates.email_templates{/t}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [{$smarty.capture.site_title}, '']
    ]}

{/block}

{block name='content_top'}
    {if !empty($cpf_entities)}
        {cpf_th field='id'}
        {cpf_th field='title'}
        {cpf_th field='subject'}
        {if $cpf_rights->has_rights($cpf_controller, 'delete') || $cpf_rights->has_rights($cpf_controller, 'edit')}
            {cpf_th title=t('backend.common.actions')}
        {/if}
    {/if}
{/block}

{block name='content'}
    {foreach from=$cpf_entities item='item' name='list'}
    <tr class="{cycle values=',alternate'}">
        <td>{$item->id}</td>
        <td>
            {if $cpf_rights->has_rights($cpf_controller, 'edit')}
                <a href="{link controller=$cpf_controller action="edit" id=$item->id}">{$item->title}</a>
            {else}
                {$item->title}
            {/if}
        </td>
        <td>{$item->subject}</td>

        {if $cpf_rights->has_rights($cpf_controller, 'view') || $cpf_rights->has_rights($cpf_controller, 'edit' || $cpf_rights->has_rights($cpf_controller, 'delete'))}
            <td>
                <a href="{link controller=$cpf_controller action='edit' id=$item->id}"><i class="icon-edit"></i> {t}backend.common.edit{/t}</a>
                <a href="{link controller=$cpf_controller action='view' id=$item->id}" target="_blank"><i class="icon-zoom-in"></i> {t}backend.common.preview{/t}</a>
            </td>
        {/if}
    </tr>
    {/foreach}
{/block}