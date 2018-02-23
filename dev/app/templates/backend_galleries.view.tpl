{extends file='layouts/backend.view.tpl'}

{block name='title'}
    {capture name='site_title'}{$entity->title}{/capture}
    {$smarty.capture.site_title}
{/block}

{block name='content_init'}
    {$cpf_breadcrumb=[
        [t('backend.galleries.galleries'), cpf_link(['controller' => $cpf_controller])],
        [{$smarty.capture.site_title}, '']
    ]}
{/block}

{block name='content_top'}
    {if $page_id}
        {capture name='back_url'}{link controller='backend_pages' action='view' id=$page_id}{/capture}
        {capture name='back_button'}{cpf_button title=t('backend.pages.back_to_the_page') url=$smarty.capture.back_url}{/capture}
        {include file='includes/backend.ui/backend.common_actions.tpl' actions=$smarty.capture.back_button}
    {/if}
{/block}

{block name='content'}
    <div class="row">
        <table class="span7 table-condensed">
            <tr>
                <td><h2>{$entity->title}</h2><span class="label label-info">{$entity->gallerytype->title}</span></td>
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
        <h3>{t}backend.galleries.items{/t}</h3>
        <br />
        {cpf_button class="btn-primary" icon='plus-sign icon-white' title=t('backend.galleries.add_photos') url=cpf_link(['controller' => 'backend_photos', 'action' => 'add', 'id' => $entity->id, 'table' => 'App_Model_Gallery'])}
        {*
        {cpf_button class="btn-primary" icon='plus-sign icon-white' title=t('backend.galleries.add_videos') url=cpf_link(['controller' => 'backend_videos', 'action' => 'add', 'id' => $entity->id])}
        *}

        {if $entity->photos|@count > 0}
            <div class="clearfix">
                <br />
                <ul class="thumbnails gallery-photos">
                    {foreach from=$entity->photos item='item' name='gphotos'}
                        <li class="span2" id="photo-{$item->id}">
                            <div class="thumbnail">
                                <img src="{cpf_config('APP.PHOTOS.URLS.BACKEND')}{$item->versions.backend_thumb.filename}" width="{$item->versions.backend_thumb.width}" height="{$item->versions.backend_thumb.height}" alt="{$item->title}">
                                <br />
                                <p style="text-align: center">{$item->title|default:'&nbsp;'}</p>
                                <div style="text-align: center">
                                    <a href="{link controller='backend_photos' action="edit" id=$item->id}" class="btn btn-success"><i class="icon-edit icon-white"></i></a>
                                    <a target="_blank" href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$item->versions.fullscreen.filename}" class="btn btn-primary"><i class="icon-zoom-in icon-white"></i></a>
                                    <a href="{link controller='backend_photos' action="delete" id=$item->id}" class="btn btn-danger"><i class="icon-remove icon-white"></i></a>

                                    {*
                                    {if !$smarty.foreach.gphotos.first}
                                        <a href="{link controller='backend_photos' action="up" id=$item->id}" class="btn"><i class="icon-arrow-left"></i></a>
                                    {/if}
                                    {if !$smarty.foreach.gphotos.last}
                                        <a href="{link controller='backend_photos' action="down" id=$item->id}" class="btn"><i class="icon-arrow-right"></i></a>
                                    {/if}
                                    *}
                                </div>
								<div style="padding: 3px 0 0 0; text-align: center;">
                                <a target="_blank" href="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$item->versions.original.filename}"><small>original image</small></a>
								</div>
								
                            </div>
                        </li>
                    {/foreach}
                </ul>
            </div>
        {/if}
    </div>

{/block}

{block name='js_init'}
    jQuery(document).ready(function($)
    {
        $(".thumbnails").sortable();
        $(".thumbnails").disableSelection();

        $(".thumbnails").bind('sortstop', function(event, ui) {
            var els = $('.thumbnails li');
            var ids= [];
            jQuery.each(els, function(){
                ids.push(this.id.replace('photo-', ''));
            });
            // send ajax request
                $.ajax({
                    type: "POST",
                    url: '{link controller='backend_photos' action='ajax_move' abs=true}',
                    data: { ids: ids.join('-') },
                    success: function(){}
                });
        });

    });
{/block}