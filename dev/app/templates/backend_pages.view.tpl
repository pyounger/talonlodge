{extends file='layouts/backend.view.tpl'}

{block name='title'}
    {capture name='site_title'}{$entity->title}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [t('backend.pages.pages'), cpf_link(['controller' => $cpf_controller])],
        [{$smarty.capture.site_title}, '']
    ]}

    {capture name='back_url'}{link controller=$cpf_controller}{/capture}
    {if $cpf_rights->has_rights($cpf_controller, 'add')}
        {capture name="common_actions"}
            {cpf_button title=t('backend.galleries.add_gallery') icon='plus-sign' url=cpf_link(['controller' => $cpf_controller, 'action' => 'add'])}
        {/capture}
    {/if}

{/block}

{block name='content'}
<div class="row">
    <table class="span7 table-condensed">
        <tr>
            <td><h2>{$entity->title}</h2></td>
        </tr>
        {if $entity->description}
        <tr>
            <td>{$entity->description}</td>
        </tr>
        {/if}
    </table>
</div>
<div class="clearfix"><br /></div>
<div class="well">

        <div style="overflow: hidden">
            <div style="float: right">
                {if $entity->type == 'content'}
                    {capture name='preview'}{link rule='frontend_page' slug=$entity->slug}{/capture}
                {else}
                    {capture name='preview'}{link rule='frontend_index'}{/capture}
                {/if}
                {if !$entity->is_template}
                {cpf_button class="btn-success" icon='zoom-in icon-white' title='Preview' target="_blank" url=$smarty.capture.preview}
                {/if}
            </div>
            <div style="float: left">
                <h3>{t}backend.pages.content{/t}</h3>
            </div>
        </div>

        <div class="page-layout-grid">
            {$entity->layout->grid|page_layout:$entity->data}
        </div>
</div>
{/block}

{block name='content_bottom'}
    {if !$entity->is_template}
<div class="form-actions">
    {capture name='confirm'}{t}backend.common.really_delete{/t}{/capture}
    {if $cpf_rights->has_rights($cpf_controller, 'edit')}
        {cpf_button title=t('backend.pages.edit_page_details') class='btn-success' icon='edit icon-white' url=cpf_link(['controller' => $cpf_controller, 'action' => 'edit', 'id' => $entity->id])}
    {/if}
    {if $cpf_rights->has_rights($cpf_controller, 'delete')}
        {cpf_button title=t('backend.pages.delete_page') class='btn-danger' icon='trash icon-white' url=cpf_link(['controller' => $cpf_controller, 'action' => 'delete', 'id' => $entity->id]) onclick="return confirm('{$smarty.capture.confirm}');"}
    {/if}
</div>
{/if}
{/block}