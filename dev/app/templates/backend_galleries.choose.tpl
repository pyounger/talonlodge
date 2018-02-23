{extends file='layouts/backend.table.tpl'}

{block name='title'}
    {capture name='site_title'}{t}backend.galleries.galleries{/t}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [{$smarty.capture.site_title}, '']
    ]}
{/block}

{block name='content_top_top'}
    <h3>Select galleries to add</h3>
    <form action="{$cpf_url_current}" method="post">
        {if $smarty.capture.common_actions}
            {include file='includes/backend.ui/backend.common_actions.tpl' actions=$smarty.capture.common_actions}
        {/if}

        {if !$smarty.capture.pager_link}
            {capture name=pager_link}{link controller=$cpf_controller sort=$cpf_order_sort order=$cpf_order_order page=$cpf_pager_fake_page}{/capture}
        {/if}

        {cpf_pager direct_url=$smarty.capture.pager_link full_list_enabled=false}

        {if !empty($cpf_entities)}
            <table summary="{$smarty.capture.table_summary|default:t('Main table on the page')}" class="table table-striped">
                <thead>
                    <tr>
        {/if}
{/block}

{block name='content_top'}
    {if $cpf_entities|@count > 1}
        <th></th>
        {cpf_th field='id' title=t('tables.galleries.id')}
        {cpf_th field='title' title=t('tables.galleries.title')}

    {/if}
{/block}

{block name='content'}
    {foreach $cpf_entities as $node}
    {$item = $node->data}
    {if $item->level > 0}
        <tr class="{cycle values=',alternate'}">

            {* checkbox *}
            <td><input type="checkbox" class="checkbox" name="galleries[]" id="gallery-{$item->id}" value="{$item->id}"{if in_array($item->id, $galleries_ids)} checked="checked"{/if} /></td>

            {* id *}
            <td>{$item->id}</td>

            {* title *}
            <td>
                {if $item->level > 0}{section loop=$item->level-1 name='dashes'}—{/section} {/if}
                    {$item->title}
                    <span class="label label-info">{$item->gallerytype->title}</span>
            </td>

        </tr>
    {/if}
    {/foreach}
{/block}

{block name='content_bottom'}
        {if !empty($cpf_entities)}
        </tbody>
        </table>

            {cpf_submit title=t('backend.galleries.add_to_page') icon='plus-sign icon-white'}
            {cpf_button title=t('backend.common.cancel') icon='ban-circle' url=cpf_link(['controller' => 'backend_pages', 'action' => 'view', 'id' => $page_id])}

        {else}
            <div class="cpf-no-data">{t}No matching records found{/t}</div>
        {/if}
    </form>
{/block}

