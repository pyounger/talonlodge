<body>
    {extends file='layouts/backend.table.tpl'}



    {block name='title'}

    {capture name='site_title'}{$entity->help|strip_tags|truncate:100}{/capture}

    {t}backend.help.help{/t}: {$smarty.capture.site_title}

    {/block}



    {block name='content_init'}

    {$cpf_breadcrumb=[

    [t('backend.help.help'), cpf_link(['controller' => $cpf_controller])],

    [{$smarty.capture.site_title}, 'Help']

    ]}



    {capture name='back_url'}{link controller=$cpf_controller}{/capture}

    {/block}



    {block name='content_top'}

    {if !empty($cpf_entities)}



    {cpf_th field='id'}



    {cpf_th field='ID' no_link=true}

    {cpf_th field='Heading' no_link=true}

    {cpf_th field='Subheading' no_link=true}

    {cpf_th field='Comment' no_link=true}

    {* cpf_th field='help' no_link=true *}

    {* cpf_th field='ip' no_link=true *}



    {* actions *}

    {$show_actions = true}

    {if $cpf_rights->has_rights($cpf_controller, 'view') ||

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

    {foreach from=$cpf_entities item='item' name='list'}

    <tr class="{cycle values=',alternate'}">

        <td class="span1">{$item->id}</td>

        <td class="span1">{$item->heading}</td>

        <td class="span1">{$item->subheading}</td>

        <td class="span1">{$item->content}</td>

        <td class="span1">{$item->remarks}</td>


        <td>{* $item->ip *}</td>

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

        </td>

        {/if}

    </tr>

    {/foreach}

    {/block}