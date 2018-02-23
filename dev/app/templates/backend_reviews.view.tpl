{extends file='layouts/backend.view.tpl'}

{block name='title'}
    {capture name='site_title'}{$entity->title}{/capture}
    {t}backend.reviews.review{/t}: {$smarty.capture.site_title}
{/block}

{block name='content_init'}
    {$cpf_breadcrumb=[
        [t('backend.reviews.reviews'), cpf_link(['controller' => $cpf_controller])],
        [{$smarty.capture.site_title}, '']
    ]}

    {capture name='back_url'}{link controller=$cpf_controller}{/capture}
{/block}

{block name='content'}
    <div class="row">
        <table class="span7 table-condensed">
            <tr>
                <td><h2>{$entity->title}</h2></td>
            </tr>
            <tr>
                <td><h5>{$entity->date|datetime_format:$cpf_langs.$cpf_lang.date_format}</h5></td>
            </tr>
            <tr>
                <td>{$entity->content}</td>
            </tr>
        </table>
    </div>
{/block}
