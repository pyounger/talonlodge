{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.banners.editing_banner{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.banners.adding_banner{/t}{/capture}
	{/if}
	{$smarty.capture.page_title}
{/block}

{block name='content_init'}
	{capture name='is_upload_form'}Any value here :){/capture}

	{$cpf_breadcrumb=[
		[t('backend.banners.banners'), cpf_link(['controller' => $cpf_controller])],
		[$smarty.capture.page_title]
	]}

	{capture name='back_url'}{link controller=$cpf_controller}{/capture}

	{capture name='validation_rules'}
		rules: {
			title: { required: true },
			start_date: { required: true },
			finish_date: { required: true }{if !$cpf_is_edit},
			filename: { required: true }{/if}
		},
		messages: {
			title: { required: '{t}backend.banners.required_title{/t}' },
			start_date: { required: '{t}backend.banners.required_start_date{/t}' },
			finish_date: { required: '{t}backend.banners.required_finish_date{/t}' }{if !$cpf_is_edit},
			filename: { required: '{t}backend.banners.required_filename{/t}'}{/if}
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}
	{cpf_input_helper type='text' field='title'}
	{cpf_input_helper type='text' field='url'}
	{cpf_input_helper type='date' field='start_date'}
	{cpf_input_helper type='date' field='finish_date'}
	{cpf_input_helper type='checkbox' field='is_published'}
    <div class="control-group">
        <label class="control-label" for="filename">{t}tables.banners.filename{/t}:</label>
        <div class="controls">
            <input type="file" id="filename" name="filename" class="input-file" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <p class="help-block">Please upload SWF, JPEG, GIF or PNG files.<br />Required width of a banner is 300px.</p>
            {if $filename}
                {if $extension == 'swf'}
                    <div id="banner-container"></div>
                    {else}
                    <img src="{$attachment_url}{$filename}" />
                {/if}
            {/if}
        </div>
    </div>
    {if $filename && $ext}
        <div class="control-group">
            {if $extension == 'swf'}
                <div id="banner-container"></div>
            {else}
                <img src="{$attachment_url}{$filename}" />
            {/if}
        </div>
    {/if}
{/block}

{block name='js_init'}

	{if $extension == 'swf'}
		var flashvars = {
			clickTAG: '{link rule="frontend_banners" id=$id abs=true}',
		}
 
		var params = {
			wmode: 'opaque'
		}

		var attributes = {
			id: "banner",
			name: "banner"
		}
		
		$('#banner-container').flash({
			swf: '{cpf_config('APP.BANNERS.URL')}{$filename}',
			width: 300,
			height: 250,
			allowFullScreen: true,
			wmode: 'transparent',
			flashvars: flashvars,
			params: params,
			attributes: attributes
		});
	{/if}
    $('#title').syncTranslit({ destination: 'slug' });
{/block}

