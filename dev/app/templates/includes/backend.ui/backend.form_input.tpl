{*
	Input for use with App_Local_Form_Helper
	
	@param 	string 	$type 		Type of field
	@param 	string 	$field 		Name of field
	@param 	string 	$class 		Additional CSS class(es)	
	@param	bool	$no_border 	Do not draw border
	@param	bool 	$no_value 	Do not set value (useful for password fields)
*}
{function name='cpf_input_helper'}
	{capture name='label'}{cpf_title var=$cpf_current_entity field=$field}{/capture}
	{capture name='value'}{if !$no_value}{${$field}}{/if}{/capture}
	{cpf_input type=$type value=$smarty.capture.value field=$field label=$smarty.capture.label class=$class no_border=$no_border list=$list}
{/function}

{*
	Basic input.
	Types:
		textonly	- use for showing not editiable value
		link		- use for making textonly value as link
		comment		- use for some comment
		text 		- use for text values (MySQL: varchar type)
		slug 		- use for slug (shortcut) values 
		password
		checkbox
		select
		multiple_select
		textarea
		fck_default
		fck_lead
		date
		datetime
		time		

	@param string $type Type of field
	@param string $value Value of the field
	@param string $field Name of field
	@param array $list List for select and multiselect
	@param srting $label Label for the field
	@param string $class Additional CSS class(es)	
	@param bool $no_border Do not draw border
	@param string $title_field Title field for slug input type ('title' by default)
	@param bool $readonly Show field value as readonly
	@param string $additional_data Any additional data for the element
*}
{function name='cpf_input'}
{if $type == 'hidden'}
    <input type="hidden" id="{$field}" name="{$field}" value="{$value}">
{else}
    <div class="control-group{if $wr_class} {$wr_class}{/if}">
        {if $type == 'textonly'}
            <label class="control-label">{$label}</label>
            <div class="controls">
                {$value}
            </div>

        {elseif $type == 'link'}
            <label width="100" class="control-label">{$label}</label>
            <div><a href="{$url}" title="{$value}">{$value}</a></div>

        {elseif $type == 'comment'}
            <div><i>{$value}</i></div>

        {else}
            {if $type != 'checkbox'}
                <label for="{$field}" class="control-label">{$label}:</label>
            {else}
                <label class="control-label"></label>
            {/if}

            <div class="controls">
            {if $type == 'text'}
                    <input type="text" id="{$field}" name="{$field}" maxlength="255" value="{$value}" class="input-file {$class}"/>
            {elseif $type == 'slug'}
                    <input type="text" id="{$field}" name="{$field}" maxlength="255" value="{$value}" class="input-file {$class}"/>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#{if $title_field}{$title_field}{else}title{/if}').syncTranslit({ destination: '{$field}' });
                        });
                    </script>
            {elseif $type == 'password'}
                    <input type="password" id="{$field}" name="{$field}" value="{$value}" class="input-file {$class}"/>
            {elseif $type == 'checkbox'}
                    <label class="checkbox">
                        <input style="border: none" type="checkbox" id="{$field}" name="{$field}"{if $value} checked="checked"{/if} value="1"{if $readonly} disabled="disabled"{/if} />
                        <span>{$label}</span>
                    </label>
            {elseif $type == 'radio'}
                    <label><input type="radio" name="{$field}" value="1" {if $value}checked="checked"{/if} />&nbsp;{if $label_true}{$label_true}{else}{t}Yes{/t}{/if}</label>
                    <label><input type="radio" name="{$field}" value="0" {if !$value}checked="checked"{/if} />&nbsp;{if $label_false}{$label_false}{else}{t}No{/t}{/if}</label>
            {elseif $type == 'select'}
                    <select id="{$field}" name="{$field}" class="field {$class}">
                        {foreach from=$list item=item}
                            <option value="{$item.id}" {if $item.id == $value}selected="selected"{/if}>{$item.title}</option>
                        {/foreach}
                    </select>
            {elseif $type == 'multiple_select'}
                    <select id="{$field}" name="{$field}[]" class="field {$class}" multiple="multiple">
                        {foreach from=$list item=item}
                            <option value="{$item.id}" {if in_array($item.id, $value)}selected="selected"{/if}>{$item.title}</option>
                        {/foreach}
                    </select>
            {elseif $type == 'textarea'}
                    <textarea id="{$field}" class="input-xlarge textarea span6 {$class}" name="{$field}"{if $readonly} readonly="readonly"{/if}>{$value}</textarea>
            {elseif $type == 'fck_default'}
                    {fckeditor BasePath="/static/javascript/fckeditor/" InstanceName=$field Width="100%" Height="300px" ToolbarSet="CPFDefault" Value=$value StylesXmlPath="/static/css/fckeditor/fckstyles.xml" EditorAreaCSS="/static/css/fckeditor/fck_editorarea_cpf.css"}
            {elseif $type == 'fck_lead'}
                    {fckeditor BasePath="/static/javascript/fckeditor/" InstanceName=$field Width="100%" Height="150px" ToolbarSet="CPFLead" Value=$value StylesXmlPath="/static/css/fckeditor/fcklead.xml" EditorAreaCSS="/static/css/fckeditor/fck_editorarea_cpf.css"}
            {elseif $type == 'ck_editor'}
                    <div style="width: 720px;">
                    {capture name='loadJS'}{if $loadJS}true{else}false{/if}{/capture}
                    {ckeditor BasePath="static/javascript/backend/ckeditor/" InstanceName=$field height="{$height|default:"150"}px" toolbar="CPFDefault" Value=$value loadJS=$smarty.capture.loadJS language=$cpf_lang}
                    </div>
            {elseif $type == 'date'}
                {literal}
                    <script type="text/javascript">
                        $(function(){
                            $('#{/literal}{$field}{literal}').datepicker({
                                defaultDate: +1
                            });
                        });
                    </script>
                {/literal}
                <input type="text" id="{$field}" name="{$field}" maxlength="255" value="{$value}" class="small_field" style="float: left; margin-right: 15px"/>
            {elseif $type == 'datetime'}
                {if !$readonly}
                    <input type="text" id="{$field}" name="{$field}" maxlength="255" value="{$value}" class="small_field" style="float: left; margin-right: 15px"/>
                    {assign var="value_time" value=$field|cat:"_time"}
                    <input type="text" id="{$field}_time" name="{$field}_time" maxlength="255" value="{${$value_time}}" class="small_field" style="width: 50px" />
                    {literal}
                    <script type="text/javascript">
                        $(function(){
                            $('#{/literal}{$field}{literal}').datepicker({
                                defaultDate: +1
                            });
                            $('#{/literal}{$field}{literal}').datepicker('option', $.datepicker.regional['{/literal}{$cpf_lang}{literal}']);
                            $('#{/literal}{$field}{literal}').datepicker( "option", "dateFormat", 'dd.mm.yy' );
                            $('#{/literal}{$field}{literal}_time').mask('{/literal}{$cpf_config_validation.TIME.MASK}{literal}');
                        });
                    </script>
                    {/literal}
                {else}{$value} {$value_time}{/if}
            {elseif $type == 'time'}
                <input type="text" id="{$field}_time" name="{$field}_time" maxlength="255" value="{$value_time}" class="small_field" style="width: 50px" />
                {literal}
                <script type="text/javascript">
                    $(function(){
                        $('#{/literal}{$field}{literal}_time').mask('{/literal}{$cpf_config_validation.TIME.MASK}{literal}');
                    });
                </script>
                {/literal}
            {/if}
        {/if}

        {if $additional_data}{$additional_data}{/if}
        </div>
    </div>
{/if}
{/function}