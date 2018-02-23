{extends file='layouts/backend.view.tpl'}

{block name='title'}
    {capture name='site_title'}{$entity->first_name} {$entity->last_name}{/capture}
    {capture name='site_title_s'}{t}Contact Us Messages{/t}{/capture}
    {$smarty.capture.site_title_s}: {$smarty.capture.site_title}
{/block}

{block name='content_init'}
    {$cpf_breadcrumb=[
        [{$smarty.capture.site_title_s}, cpf_link(['controller' => $cpf_controller])],
        [{$smarty.capture.site_title}, '']
    ]}

    {capture name='back_url'}{link controller=$cpf_controller}{/capture}
{/block}

{block name='content'}
    <div class="row">
        <table class="span7 table-condensed">
            <tr>
                <td>First name: {$entity->first_name}</td>
            </tr>
            <tr>
                <td>Last name: {$entity->last_name}</td>
            </tr>
            <tr>
                <td>E-mail: <a href="mailto:{$entity->email}">{$entity->email}</a></td>
            </tr>
            <tr>
                <td>Phone: {$entity->phone}</td>
            </tr>
            <tr>
                <td>Fax: {$entity->fax}</td>
            </tr>
            <tr>
                <td>Country: {$entity->country}</td>
            </tr>
            <tr>
                <td>City: {$entity->city}</td>
            </tr>
            <tr>
                <td>State: {$entity->state}</td>
            </tr>
            <tr>
                <td>Postal/Zip: {$entity->postal}</td>
            </tr>
            <tr>
                <td>Arrival Date: {$entity->arrival_date}</td>
            </tr>
            <tr>
                <td>Departure Date: {$entity->departure_date}</td>
            </tr>
            <tr>
                <td>No. Adults: {$entity->adults|default:0}</td>
            </tr>
            <tr>
                <td>No. Children: {$entity->children|default:0}</td>
            </tr>
            <tr>
                <td>How did you hear about us: {$entity->how_did_you_hear}</td>
            </tr>
            <tr>
                <td>No. times you have been to Maui before: {$entity->no_of_times}</td>
            </tr>
            <tr>
                <td>Comments: {$entity->comments}</td>
            </tr>
        </table>
    </div>
{/block}
