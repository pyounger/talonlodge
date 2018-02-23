{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.pages.editing_page{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.pages.adding_page{/t}{/capture}
	{/if}
	{$smarty.capture.page_title}
{/block}

{block name='content_init'}

	{$cpf_breadcrumb=[
		[t('backend.pages.pages'), cpf_link(['controller' => $cpf_controller])],
		[$smarty.capture.page_title]
	]}

	{capture name='back_url'}{link controller=$cpf_controller action='default'}{/capture}

	{capture name='validation_rules'}
		rules: {
			title: { required: true }
		},
		messages: {
			title: { required: '{t}backend.navigation.required_title{/t}' }
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}
    {* default values *}
    {if !$cpf_is_edit}
        {$seo_robots = 'index, follow'}
    {/if}

	{cpf_input_helper type="text" field="title"}
    {* parent_id *}
    {$field = 'parent_id'}
    <div class="control-group">
        <label for="{$field}" class="control-label">{t}tables.pages.{$field}{/t}:</label>
        <div class="controls">
            <select id="{$field}" name="{$field}" class="field {$class}">
                {foreach from=$pages item='page'}
                    <option value="{$page->data->id}"{if $page->data->id == $parent_id} selected="selected"{/if}{if $page->data->id == $id} disabled="disabled"{/if}>
                        {if $page->data->level > 0}{section loop=$page->data->level-1 name='dashes'}—{/section} {/if}{$page->data->title}
                    </option>
                {/foreach}
            </select>
        </div>
    </div>
    {* type *}
    {$field = 'type'}
    <div class="control-group">
        <label for="{$field}" class="control-label">{t}tables.pages.{$field}{/t}:</label>
        <div class="controls">
            <select id="{$field}" name="{$field}" class="field {$class}">
                {foreach from=cpf_config('APP.CONTENT.PAGE_TYPES') item='cptype'}
                    <option value="{$cptype}"{if $type == $cptype} selected="selected"{/if}>{$cptype}</option>
                {/foreach}
            </select>
        </div>
    </div>
    {cpf_input_helper type="slug" field="slug" title_field='title' wr_class="for-content"}
    {* components *}
    {$field = 'component'}
    <div class="control-group for-component">
        <label for="{$field}" class="control-label">{t}tables.pages.{$field}{/t}:</label>
        <div class="controls">
            <select id="{$field}" name="{$field}" class="field {$class}">
                {foreach from=cpf_config('APP.CONTENT.COMPONENTS') key='ckey' item='cvalue'}
                    <option value="{$ckey}"{if $component == $ckey} selected="selected"{/if}>{t}backend.components.{$ckey}{/t}</option>
                {/foreach}
            </select>
        </div>
    </div>
    {* layouts *}
    {cpf_input_helper type="select" field="layout_id" list=$layouts}
    {* route *}
{*
    {cpf_input_helper type="text" field="route_name" wr_class="for-component"}
    {cpf_input_helper type="text" field="route_value" wr_class="for-component"}
*}
	{cpf_input_helper type="checkbox" field="is_published"}
	{cpf_input_helper type="hidden" field="is_template"}

    {* content *}
{*
    </fieldset>
    <fieldset>
        <legend>{t}backend.pages.content{/t}</legend>
        <div class="well"></div>
*}
    {* seo *}
    </fieldset>
    <fiedlset>
        <legend>{t}backend.pages.seo{/t}</legend>
        {*capture name='additional_data'}{cpf_button title='update' id="update_title" url="#"}{/capture*}
        {cpf_input_helper type="text" field="seo_title"}
        {cpf_input_helper type="text" field="seo_robots"}
        {*capture name='additional_data'}</div><div class="controls span6" style="text-align: right"><label></label>{cpf_button title='update' id="update_keywords" url="#"}{/capture*}
        {cpf_input_helper type="textarea" field="seo_keywords"}
        {*capture name='additional_data'}</div><div class="controls span6" style="text-align: right"><label></label>{cpf_button title='update' id="update_description" url="#"}{/capture*}
        {cpf_input_helper type="textarea" field="seo_description"}
{/block}

{block name='js_init'}
    $('#title').keyup(function(event){
        $('#seo_title').val($('#title').val());
    });

    // toggle type
    $('#type').change(toggle_type);
    function toggle_type()
    {
        var type = $('#type').val();
        if (type == 'component')
        {
            $('.for-component').show();
            $('.for-content').hide();
        }
        else
        {
            $('.for-content').show();
            $('.for-component').hide();
        }
    }
    toggle_type();
{/block}