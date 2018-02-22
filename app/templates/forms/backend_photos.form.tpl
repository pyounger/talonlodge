{extends file='layouts/backend.form.tpl'} 



{block name='title'}

	{if $cpf_is_edit}

		{capture name='page_title'}{t}backend.photos.editing_photo{/t}{/capture}

	{else}

		{capture name='page_title'}{t}backend.banners.adding_photo{/t}{/capture}

	{/if}

	{$smarty.capture.page_title}

{/block}



{block name='content_init'}

	{$cpf_breadcrumb=[

		[t('backend.photos.photos'), cpf_link(['controller' => $cpf_controller])],

		[$smarty.capture.page_title]

	]}

{/block}



{block name='content'}

    <div class="control-group">

        <label></label>

        <div class="controls">

            <span class="thumbnail" style="width: {$versions.backend_thumb.width}px;">

                <img src="{cpf_config('APP.PHOTOS.URLS.BACKEND')}{$versions.backend_thumb.filename}" width="{$versions.backend_thumb.width}" height="{$versions.backend_thumb.height}" alt="{$title}">

            </span>

        </div>

    </div>

	{cpf_input_helper type='text' field='title'}
	

    {*{cpf_input_helper type='ck_editor' field='description' loadJS=true}*}

    {if $slideshow_positions}

        {cpf_input_helper type='select' field='slideshow_position' list=$slideshow_positions}

    {/if}

	{cpf_input_helper type='text' field='alt'}

	{cpf_input_helper type='text' field='atitle'}

	{*cpf_input_helper type='text' field='aurl'*}

	{*cpf_input_helper type='text' field='atarget'*}

{/block}

