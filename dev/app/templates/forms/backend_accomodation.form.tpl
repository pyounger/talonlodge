{extends file='layouts/backend.form.tpl'} 

{block name='title'}
{if $cpf_is_edit}
{capture name='page_title'}{t}backend.accomodation.editing_accomodation{/t}{/capture}
{else}
{capture name='page_title'}{t}backend.accomodation.adding_accomodation{/t}{/capture}
{/if}
{$smarty.capture.page_title}
{/block}

{block name='content_init'}
{capture name='is_upload_form'}Any value here :){/capture}

{$cpf_breadcrumb=[
	[t('backend.accomodation.accomodation'), cpf_link(['controller' => $cpf_controller])],
	[$smarty.capture.page_title]
	]}

	{capture name='back_url'}{link controller=$cpf_controller}{/capture}

	{capture name='validation_rules'}
	rules: {
	title: { required: true },
	description: { ck_not_empty: true },
	one_bedroom_description: { ck_not_empty: true },
	two_bedroom_description: { ck_not_empty: true },
	{if !$cpf_is_edit}
	main_image: { required: true },
	one_bedroom_image: { required: true },
	two_bedroom_image: { required: true },
	{/if}
	one_bedroom_popup_description: { ck_not_empty: true },
	two_bedroom_popup_description: { ck_not_empty: true }
},
messages: {
title: { required: '{t}backend.accomodation.required_title{/t}' },
description: { ck_not_empty: '{t}backend.accomodation.required_description{/t}' },
one_bedroom_description: { ck_not_empty: '{t}backend.accomodation.required_one_bedroom_description{/t}' },
two_bedroom_description: { ck_not_empty: '{t}backend.accomodation.required_two_bedroom_description{/t}'},
{if !$cpf_is_edit}
main_image: { required: '{t}backend.accomodation.required_main_image{/t}'},
one_bedroom_image: { required: '{t}backend.accomodation.required_one_bedroom_image{/t}'},
two_bedroom_image: { required: '{t}backend.accomodation.required_two_bedroom_image{/t}'},
{/if}
one_bedroom_popup_description: { ck_not_empty: '{t}backend.accomodation.required_one_bedroom_popup_description{/t}'},
two_bedroom_popup_description: { ck_not_empty: '{t}backend.accomodation.required_two_bedroom_popup_description{/t}'}
}
{/capture}
{cpf_validator rules=$smarty.capture.validation_rules}

{/block}

{block name='content'}
{cpf_input_helper type='text' field='title' class="span9"}
<div class="control-group">
	<div class="row">
		<div class="span4" style="padding-left: 10px;">
			<label for="description" class="">Description:</label>
		</div>
		<div class="span5">
			<div id="counter">
				<div class="barcount">
					<div class="bar bluebar"></div>
				</div><!-- end barcount -->
				<div id="count"></div>
				<p>350 Characters Maximum</p>				
			</div><!-- end counter -->						
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="controls">
		<div style="width: 720px;">
			{ckeditor BasePath="static/javascript/backend/ckeditor/" InstanceName='description' height="{$height|default:"150"}px" toolbar="CPFDefault" Value=$description loadJS=true language=$cpf_lang}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="main_image">{t}tables.accomodation.main_image{/t}:</label>
	<div class="controls">
		<input type="file" id="main_image" name="main_image" class="input-file" />
	</div>
	{if $main_image}
	<div class="controls">
		<img src="{$attachment_url}{$main_image}" />
	</div>
	{/if}
</div>
{cpf_input_helper type='text' field='main_image_alt' class="span13"}

<table>
	<tbody>
		<tr>
			<td>{cpf_input_helper type='text' field='url_one' class="span13"}</td>
			<td style="padding: 0 0 0 20px;">{cpf_input_helper type='text' field='url_two' class="span13"}</td>
		</tr>
		<tr>
			<td>{cpf_input_helper type='ck_editor' field='one_bedroom_description' width='450'}</td>
			<td style="padding: 0 0 0 20px;">{cpf_input_helper type='ck_editor' field='two_bedroom_description' width='450'}</td>
		</tr>
		<tr>
			<td>{cpf_input_helper type='text' field='one_bedroom_title' class="span13"}</td>
			<td style="padding: 0 0 0 20px;">{cpf_input_helper type='text' field='two_bedroom_title' class="span13"}</td>
		</tr>
		<tr>
			<td>{cpf_input_helper type='ck_editor' field='one_bedroom_popup_description' width='450'}</td>
			<td style="padding: 0 0 0 20px;">{cpf_input_helper type='ck_editor' field='two_bedroom_popup_description' width='450'}</td>
		</tr>
		<tr>
			<td>{cpf_input_helper type='ck_editor' field='one_popup_image_description' width='450'}</td>
			<td style="padding: 0 0 0 20px;">{cpf_input_helper type='ck_editor' field='two_popup_image_description' width='450'}</td>
		</tr>
		<tr>
			<td>
				<div class="control-group">
					<label class="control-label" for="one_bedroom_image">{t}tables.accomodation.one_bedroom_image{/t}:</label>
					<div class="controls">
						<input type="file" id="one_bedroom_image" name="one_bedroom_image"  enctype="multipart/form-data" class="input-file" />
					</div>
					{if $one_bedroom_image}
					<div class="controls">
						<img src="{$attachment_url}{$one_bedroom_image}" />
					</div>
					{/if}
				</div>
				{cpf_input_helper type='text' field='one_bedroom_image_alt' class="span13"}
			</td>
			<td style="padding: 0 0 0 20px;">
				<div class="control-group">
					<label class="control-label" for="two_bedroom_image">{t}tables.accomodation.two_bedroom_image{/t}:</label>
					<div class="controls">
						<input type="file" id="two_bedroom_image" name="two_bedroom_image" class="input-file" />
					</div>
					{if $two_bedroom_image}
					<div class="controls">
						<img src="{$attachment_url}{$two_bedroom_image}" />
					</div>
					{/if}
				</div>
				{cpf_input_helper type='text' field='two_bedroom_image_alt' class="span13"}
			</td>
		</tr>
		<tr>
			<td>
				<div class="control-group">
					<label class="control-label" for="one_bedroom_small_image">{t}tables.accomodation.one_bedroom_small_image{/t}:</label>
					<div class="controls">
						<input type="file" id="one_bedroom_image" name="one_bedroom_small_image" class="input-file" />
					</div>
					{if $one_bedroom_small_image}
					<div class="controls">
						<img src="{$attachment_url}{$one_bedroom_small_image}" />
					</div>
					{/if}
				</div>
				{cpf_input_helper type='text' field='one_bedroom_small_image_alt' class="span13"}
			</td>
			<td style="padding: 0 0 0 20px;">
				<div class="control-group">
					<label class="control-label" for="two_bedroom_small_image">{t}tables.accomodation.two_bedroom_small_image{/t}:</label>
					<div class="controls">
						<input type="file" id="two_bedroom_image" name="two_bedroom_small_image" class="input-file" />
					</div>
					{if $two_bedroom_small_image}
					<div class="controls">
						<img src="{$attachment_url}{$two_bedroom_small_image}" />
					</div>
					{/if}
				</div>
				{cpf_input_helper type='text' field='two_bedroom_small_image_alt' class="span13"}
			</td>
		</tr>
		<tr>
			<td>{cpf_input_helper type='checkbox' field='one_popup'}</td>
			<td style="padding: 0 0 0 20px;">{cpf_input_helper type='checkbox' field='two_popup'}</td>
		</tr>
	</tbody>
</table>

{cpf_input_helper type='checkbox' field='is_published'}

<!--<div class="control-group">
	<label class="control-label"></label>
	<div class="controls">
		<p class="help-block">Please upload JPEG, GIF or PNG files.<br/></p>			
	</div>
</div>
-->

{*{include file='snippets/backend_seo.form.tpl'}*}
{/block}


{block name='js_init'}
function updateCount() 
{
	var limit = 350;
	var editor = CKEDITOR.instances['description'];
	var almost = editor.getData().replace(/(<([^>]+)>)/ig,"").replace(/\t/g,'').replace(/\n/g,'').replace(/\r/g,'');
	almost = $("<div/>").html(almost).text();
	var main = almost.length *100;
	var value = (main / limit);
	var count = limit - almost.length;
	$('#count').html(almost.length);
	if(almost.length <= limit) {
	jQuery('#count').html(count).removeClass("red");
	jQuery('.bar').animate({ "width": value+'%' }, 1).removeClass("redbar").addClass("bluebar");
} else {
jQuery('#count').html(count).addClass("red");
jQuery('.bar').animate({ "width": '100%' }, 1).removeClass("bluebar").addClass("redbar");
}
}
setInterval(updateCount, 1000);
{/block}