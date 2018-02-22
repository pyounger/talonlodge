<div class="page-element page-element-gallery" id="pe-gallery-{$gallery->id}">
	<div class="c">
        <div><span class="label label-info">Gallery {$gallery->title}</span></div>
        <div class="i">
        {foreach from=$images item=image name='glrs'}
            {$image->decodeVersions()}
            <div class="g-{$smarty.foreach.glrs.iteration}">
                <img src="{cpf_config('APP.PHOTOS.URLS.BACKEND')}{$image->versions.backend_thumb.filename}" width="{$image->versions.backend_thumb.width}" height="{$image->versions.backend_thumb.height}" alt="{$image->title}">
            </div>
        {/foreach}
        </div>
	</div>
	<div class="f">
        <a href="{link controller='backend_galleries' action='view' id=$gallery->id page_id=$page->id}"><i class="icon-edit"></i></a>
        <a href="{link controller='backend_pages' action='move_element_up' id=$gallery->id page_id=$page->id page_placeholder=$placeholder type='galleries'}"><i class="icon-arrow-up"></i></a>
        <a href="{link controller='backend_pages' action='move_element_down' id=$gallery->id page_id=$page->id page_placeholder=$placeholder type='galleries'}"><i class="icon-arrow-down"></i></a>
        <a href="{link controller='backend_pages' action='gallery_delete' id=$gallery->id page_id=$page->id page_placeholder=$placeholder}"><i class="icon-remove"></i></a>
    </div>
</div>