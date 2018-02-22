{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.galleries.editing_gallery{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.galleries.adding_gallery{/t}{/capture}
	{/if}
	{$smarty.capture.page_title}
{/block}

{block name='content_init'}

	{$cpf_breadcrumb=[
		[t('backend.galleries.galleries'), cpf_link(['controller' => $cpf_controller])],
		[$smarty.capture.page_title]
	]}

	{capture name='back_url'}{link controller=$cpf_controller action='default'}{/capture}

    {$required_types = cpf_config('APP.GALLERIES.REQUIRED_IMAGE_TYPES')}
    {$default_video_settings = cpf_config('APP.GALLERIES.VIDEO_SETTINGS')}
	{capture name='validation_rules'}
		rules: {
			title: { required: true }{if $required_types|@count > 0},{/if}
            {foreach from=$required_types item='itype' name='itypes'}
                width_{$smarty.foreach.itypes.iteration}: { required: true },
                height_{$smarty.foreach.itypes.iteration}: { required: true }{if !$smarty.foreach.itypes.last},{/if}
            {/foreach}
		},
		messages: {
			title: { required: '{t}backend.galleries.required_title{/t}' }{if $required_types|@count > 0},{/if}
            {foreach from=$required_types item='itype' name='itypes'}
                width_{$smarty.foreach.itypes.iteration}: { required: '' },
                height_{$smarty.foreach.itypes.iteration}: { required: '' }{if !$smarty.foreach.itypes.last},{/if}
            {/foreach}
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}

	{cpf_input_helper type="text" field="title"}
    {cpf_input_helper type="select" field="type_id" list=$types}
    {* parent_id *}
    {$field = 'parent_id'}
    <div class="control-group">
        <label for="{$field}" class="control-label">{t}tables.galleries.parent_id{/t}:</label>
        <div class="controls">
            <select id="{$field}" name="{$field}" class="field {$class}">
                {foreach from=$galleries item='gallery'}
                    <option value="{$gallery->data->id}"{if $gallery->data->id == $parent_id} selected="selected"{/if}{if $gallery->data->id == $id} disabled="disabled"{/if}>
                        {if $gallery->data->level > 0}{section loop=$gallery->data->level-1 name='dashes'}—{/section} {/if}{$gallery->data->title}
                    </option>
                {/foreach}
            </select>
        </div>
    </div>
    {cpf_input_helper type="ck_editor" field="description" loadJS=true}
    {cpf_input_helper type="text" field="classname"}
    {cpf_input_helper type="hidden" field="page_id"}

    {* photo settings *}
{*
    </fieldset>
    <fieldset class="accordion" id="accordion-images">
        <legend><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-images" href="#collapse-images">{t}backend.galleries.photo_settings{/t}</a></legend>
        <div id="collapse-images" class="rows collapse">
            <div class="well rows">
                {$use_default = false}
                {if !$settings || $settings|@count == 0}
                    {$use_default = true}
                    {$settings = $required_types}
                {/if}
                {foreach from=$settings item='itype' name='itypes'}
                    {$i = $smarty.foreach.itypes.iteration}
                    {if $use_default}
                        {capture name='config_key'}APP.GALLERIES.DEFAULT_IMAGE_TYPES.{$itype}{/capture}
                        {$setting = cpf_config($smarty.capture.config_key)}
                    {else}
                        {$setting = $itype}
                    {/if}

                    <div class="row form-inline offset" style="padding: 20px">
                        <label>{t}backend.galleries.type{/t}:</label>
                        <input type="text" id="type_{$i}" name="type_{$i}" value="{$setting.type}" class="input span2" readonly="readonly" />
                        <label>{t}backend.galleries.width{/t}:</label>
                        <input type="text" id="width_{$i}" name="width_{$i}" value="{$setting.width}" class="input span1" />
                        <label>{t}backend.galleries.height{/t}:</label>
                        <input type="text" id="height_{$i}" name="height_{$i}" value="{$setting.height}" class="input span1" />
                        <label>{t}backend.galleries.resize{/t}:</label>
                        <select class="select span2" id="resize_{$i}" name="resize_{$i}">
                            {foreach cpf_config('APP.GALLERIES.RESIZE_TYPES') as $type}
                                <option value="{$type}"{if $setting.type == $type} selected="selected"{/if}>{$type}</option>
                            {/foreach}
                        </select>
                        <label class="checkbox"><input type="checkbox" id="crop_{$i}" name="crop_{$i}" value="1"{if $setting.crop} checked="checked"{/if}> {t}backend.galleries.crop{/t}</label>
                        <a class="btn btn-danger offset1"><i class="icon-remove-sign icon-white"></i></a>
                    </div><!-- /.row -->
                {/foreach}
            </div>
        </div>
    </fieldset>
*}
    {* video settings *}
{*
    <fieldset class="accordion" id="accordion-video">
    <legend><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-video" href="#collapse-video">{t}backend.galleries.video_settings{/t}</a></legend>
    <div id="collapse-video" class="rows collapse">
        <div class="well rows">
            {if !$video_settings || $video_settings|@count == 0}
                {$video_settings = $default_video_settings}
            {/if}
                <div class="row form-inline offset" style="padding: 20px">
                    <label>{t}backend.galleries.video_width{/t}:</label>
                    <input type="text" id="video_width" name="video_width" value="{$video_settings.video_width}" class="input span1" />
                    <label>{t}backend.galleries.video_height{/t}:</label>
                    <input type="text" id="video_height" name="video_height" value="{$video_settings.video_height}" class="input span1" />
                </div><!-- /.row -->
        </div>
    </div>
*}
{/block}

{block name='js_init'}
    $(".collapse").collapse()
{/block}

{block name='content_bottom'}
{*
    "Submit" and "Cancel" button
*}
    <div class="form-actions">
        {if $cpf_is_edit}
            {cpf_submit title=t('backend.common.save') icon='plus-sign'}
            {cpf_submit title=t('backend.common.save_and_continue') icon='check' id="form-apply"}
            {cpf_button title=t('backend.galleries.items') icon='th icon-white' url=cpf_link(['controller' => $cpf_controller, 'action' => 'view', 'id' => $id]) class="btn-success"}
        {else}
            {cpf_submit title=t('backend.common.save') icon='plus-sign'}
            {cpf_submit title=t('backend.common.save_and_continue') icon='check' id="form-apply"}
        {/if}
            {cpf_button title=t('backend.common.cancel') icon='ban-circle' url=$smarty.capture.back_url}
    </div>
{/block}

