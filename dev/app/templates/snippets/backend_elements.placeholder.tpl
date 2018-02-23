<div class="page-placeholder page-placeholder-{$placeholder}">
	<div class="c">{$content}</div>
	<div class="f">
		<a class="btn btn-primary btn-mini" href="{link controller='backend_blocks' action='add' id=$entity->id ph=$placeholder t=$template}"><i class="icon-plus-sign icon-white"></i><br />{t}backend.pages.add_block{/t}</a>
		<a class="btn btn-primary btn-mini" href="{link controller='backend_photos' action='add' id=$entity->id table='App_Model_Page' ph=$placeholder t=$template}"><i class="icon-plus-sign icon-white"></i><br />{t}backend.pages.add_image{/t}</a>
        <a class="btn btn-primary btn-mini" href="{link controller='backend_galleries' action='choose' page_id=$entity->id  ph=$placeholder t=$template}"><i class="icon-plus-sign icon-white"></i><br />{t}backend.pages.add_gallery{/t}</a>
		<a class="btn btn-primary btn-mini" href="{link controller='backend_videos' action='add' id=$entity->id table='App_Model_Page' ph=$placeholder t=$template}"><i class="icon-plus-sign icon-white"></i><br />{t}backend.pages.add_video{/t}</a>
    </div>
</div>