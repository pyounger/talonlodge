<div class="page-element page-element-block" id="pe-block-{$block->id}">
	<div class="c">{$block->content}</div>
	<div class="f">
        <a href="{link controller='backend_blocks' action='edit' id=$block->id page_id=$page->id t=$template}"><i class="icon-edit"></i></a>
        <a href="{link controller='backend_pages' action='move_element_up' id=$block->id page_id=$page->id page_placeholder=$placeholder type='blocks' t=$template}"><i class="icon-arrow-up"></i></a>
        <a href="{link controller='backend_pages' action='move_element_down' id=$block->id page_id=$page->id page_placeholder=$placeholder type='blocks' t=$template}"><i class="icon-arrow-down"></i></a>
        <a href="{link controller='backend_blocks' action='delete' id=$block->id page_id=$page->id page_placeholder=$placeholder t=$template}"><i class="icon-remove"></i></a>
    </div>
</div>