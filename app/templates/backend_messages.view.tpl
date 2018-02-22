{extends file='layouts/backend.view.tpl'}

{block name='title'}
    {capture name='site_title'}{$entity->message|strip_tags|truncate:100}{/capture}
    {t}backend.messages.messages{/t}: {$smarty.capture.site_title}
{/block}

{block name='content_init'}
    {$cpf_breadcrumb=[
        [t('backend.messages.messages'), cpf_link(['controller' => $cpf_controller])],
        [{$smarty.capture.site_title}, '']
    ]}

    {capture name='back_url'}{link controller=$cpf_controller}{/capture}
{/block}

{block name='content'}
    <div class="row">
        <table class="span7 table-condensed">
            <tr>
                <td><h4>{$entity->datetime|datetime_format:$cpf_langs.$cpf_lang.date_format}</h4></td>
            </tr>
            <tr>
                <td>{$entity->first_name} {$entity->last_name}, <a href="mailto:{$entity->email}">{$entity->email}</a></td>
            </tr>
            <tr>
                <td>{$entity->message}</td>
            </tr>
            {if $entity->ip}
            <tr>
                <td>{$entity->ip}</td>
            </tr>
            {/if}
        </table>
    </div>
{/block}
