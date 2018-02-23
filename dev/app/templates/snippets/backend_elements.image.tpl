<div class="page-element page-element-image" id="pe-image-{$image->id}">
	<div class="c">
        {$image->decodeVersions()}
        <img src="{cpf_config('APP.PHOTOS.URLS.BACKEND')}{$image->versions.backend_thumb.filename}" width="{$image->versions.backend_thumb.width}" height="{$image->versions.backend_thumb.height}" alt="{$image->title}">
        <br />
        <p>{$image->title|default:'&nbsp;'}</p>
	</div>
	<div class="f">
        <a href="{link controller='backend_photos' action='edit' id=$image->id page_id=$page->id}"><i class="icon-edit"></i></a>
        <a href="{link controller='backend_pages' action='move_element_up' id=$image->id page_id=$page->id page_placeholder=$placeholder type='images'}"><i class="icon-arrow-up"></i></a>
        <a href="{link controller='backend_pages' action='move_element_down' id=$image->id page_id=$page->id page_placeholder=$placeholder type='images'}"><i class="icon-arrow-down"></i></a>
        <a href="{link controller='backend_photos' action='delete' id=$image->id page_id=$page->id page_placeholder=$placeholder}"><i class="icon-remove"></i></a>
    </div>
</div>