{extends file='layouts/backend.table.tpl'}



{block name='title'}

{capture name='site_title'}{t}backend.accomodation.accomodation{/t}{/capture}

{$smarty.capture.site_title}

{/block}

{block name='content_init'}



{$cpf_breadcrumb=[

    [{$smarty.capture.site_title}, '']

    ]}



    {if $cpf_rights->has_rights($cpf_controller, 'add')}

    {capture name="common_actions"}

    {cpf_button title=t('backend.accomodation.add_accomodation') icon='plus-sign' url=cpf_link(['controller' => $cpf_controller, 'action' => 'add'])}

    {/capture}

    {/if}



    {/block}



    {block name='content_top'}

    {if !empty($cpf_entities)}

    {if $cpf_rights->has_rights($cpf_controller, 'toggle_published')}

    {cpf_th field='is_published' no_link=true}

    {/if}

    {cpf_th field='main_image'}

    {cpf_th field='title'}

    {cpf_th field='description'}

    {if $cpf_rights->has_rights($cpf_controller, 'delete') || $cpf_rights->has_rights($cpf_controller, 'edit')}

    {cpf_th title=t('backend.common.actions')}

    {/if}

    {/if}

    {/block}
    
    {block name='content'}

    {foreach from=$cpf_entities item='item' name='list'}

    <tr class="{cycle values=',alternate'}">

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



        <td><img src="{$attachment_url}{$item->main_image}" width="100" class="thumbnail"/></td>

        <td>

            {if $cpf_rights->has_rights($cpf_controller, 'edit')}

            <a href="{link controller=$cpf_controller action="edit" id=$item->id}">{$item->title}</a>

            {else}

            {$item->title}

            {/if}

        </td>

        <td class="span5">{$item->description|strip_tags|truncate:200}</td>

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