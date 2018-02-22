{extends file='layouts/backend.form.tpl'} 

{block name='title'}
	{if $cpf_is_edit}
		{capture name='page_title'}{t}backend.navigation.editing_menu_element{/t}{/capture}
	{else}
		{capture name='page_title'}{t}backend.navigation.adding_menu_element{/t}{/capture}
	{/if}
	{$smarty.capture.page_title} ({$menu->title})
{/block}

{block name='content_init'}
    {capture name='is_upload_form'}Any value here :){/capture}

	{$cpf_breadcrumb=[
		[t('backend.navigation.menu'), cpf_link(['controller' => 'backend_navigation'])],
        [$menu->title, cpf_link(['controller' => $cpf_controller, 'action' => 'view', 'id' => $menu->id])],
		[$smarty.capture.page_title]
	]}

	{capture name='validation_rules'}
		rules: {
			title: { required: true },
			key: {
				required: true,
				regexp: {$cpf_config_validation.SHORTCUT_REGEXP}
			}
		},
		messages: {
			title: { required: '{t}backend.navigation.required_title{/t}' },
			key: {
				required: '{t}backend.navigation.required_key{/t}',
				regexp: '{t}backend.navigation.invalid_key_format{/t}'
			}
		}
	{/capture}
	{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}
	{cpf_input_helper type="text" field="title"}
    {* parent_id *}
    {$field = 'parent_id'}
    <div class="control-group">
        <label for="{$field}" class="control-label">{t}tables.navigation_menu_elements.{$field}{/t}:</label>
        <div class="controls">
            <select id="{$field}" name="{$field}" class="field {$class}">
                {foreach from=$elements item='element'}
                    <option value="{$element->data->id}"{if $element->data->id == $parent_id} selected="selected"{/if}{if $element->data->id == $id} disabled="disabled"{/if}>
                        {if $element->data->level > 0}{section loop=$element->data->level-1 name='dashes'}—{/section} {/if}{$element->data->title}
                    </option>
                {/foreach}
            </select>
        </div>
    </div>
    {* type *}
    {cpf_input_helper type="select" field="type" list=$types}
    {* pages *}
    {$field = 'page_id'}
    <div class="control-group for-page">
        <label for="{$field}" class="control-label">{t}tables.navigation_menu_elements.{$field}{/t}:</label>
        <div class="controls">
            <select id="{$field}" name="{$field}" class="field {$class}">
                {foreach from=$pages item='page'}
                    <option value="{$page->data->id}"{if $page->data->id == $page_id} selected="selected"{/if}{if $page->data->id == $id} disabled="disabled"{/if}>
                        {if $page->data->level > 0}{section loop=$page->data->level-1 name='dashes'}—{/section} {/if}{$page->data->title}
                    </option>
                {/foreach}
            </select>
        </div>
    </div>

    {cpf_input_helper type="text" field="url" wr_class='for-url'}
    {cpf_input_helper type="select" field="target" list=$targets}
    {cpf_input_helper type="textarea" field="attributes"}
    {cpf_input_helper type="checkbox" field="is_published"}
    {cpf_input type="hidden" field="menu_id" value=$menu->id}
    <div class="control-group">
        <label class="control-label" for="filename">{t}tables.navigation_menu_elements.filename{/t}:</label>
        <div class="controls">
            <input type="file" id="filename" name="filename" class="input-file" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <p class="help-block">Please upload JPEG, GIF or PNG files.</p>
            {if $filename}
                <img src="{$attachment_url}{$filename}" />
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
    // toggle type
    $('#type').change(toggle_type);
    function toggle_type()
    {
        var type = $('#type').val();
        if (type == 'page')
        {
            $('.for-url').hide();
            $('.for-page').show();
        }
        else
        {
            $('.for-page').hide();
            $('.for-url').show();
        }
    }
    toggle_type();
{/block}