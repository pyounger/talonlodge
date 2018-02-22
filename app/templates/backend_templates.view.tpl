{extends file='layouts/backend.view.tpl'}

{block name='title'}
    {capture name='site_title'}Template Edit{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        ["Template", cpf_link(['controller' => $cpf_controller])],
        [{$smarty.capture.site_title}, '']
    ]}


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
                {cpf_button class="btn-success" icon='zoom-in icon-white' title='Preview' target="_blank" url=$smarty.capture.preview}
            </div>
            <div style="float: left">
                <h3>Template Content</h3>
            </div>
        </div>

        <div class="page-layout-grid">
            {$entity->grid|page_layout:$entity->data}
        </div>
</div>
{/block}

{block name='content_bottom'}
<div class="form-actions">
    {capture name='confirm'}{t}backend.common.really_delete{/t}{/capture}
    {if $cpf_rights->has_rights($cpf_controller, 'edit')}
        {cpf_button title=t('backend.pages.edit_page_details') class='btn-success' icon='edit icon-white' url=cpf_link(['controller' => $cpf_controller, 'action' => 'edit', 'id' => $entity->id])}
    {/if}
    {if $cpf_rights->has_rights($cpf_controller, 'delete')}
        {cpf_button title=t('backend.pages.delete_page') class='btn-danger' icon='trash icon-white' url=cpf_link(['controller' => $cpf_controller, 'action' => 'delete', 'id' => $entity->id]) onclick="return confirm('{$smarty.capture.confirm}');"}
    {/if}
</div>
{/block}