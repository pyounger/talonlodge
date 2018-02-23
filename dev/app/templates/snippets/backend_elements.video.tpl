{include file='includes/common.ui/common.youtube.video.iframe.tpl'}
{function name='cpf_youtube_video_iframe'}{/function}

<div class="page-element page-element-video" id="pe-video-{$video->id}">
	<div class="c">
        {cpf_youtube_video_iframe youtube_id=$video->service_id}
	</div>
	<div class="f">
        <a href="{link controller='backend_videos' action='edit' id=$video->id page_id=$page->id}"><i class="icon-edit"></i></a>
        <a href="{link controller='backend_pages' action='move_element_up' id=$video->id page_id=$page->id page_placeholder=$placeholder type='videos'}"><i class="icon-arrow-up"></i></a>
        <a href="{link controller='backend_pages' action='move_element_down' id=$video->id page_id=$page->id page_placeholder=$placeholder type='videos'}"><i class="icon-arrow-down"></i></a>
        <a href="{link controller='backend_videos' action='delete' id=$video->id page_id=$page->id page_placeholder=$placeholder}"><i class="icon-remove"></i></a>
    </div>
</div>