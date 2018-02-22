{extends file='layouts/backend.tpl'}

{block name='title'}
	{t}Rights management{/t}
{/block}

{block name='content_init'}
		{$cpf_breadcrumb=[
			[t('Rights management'), '']	
		]}
{/block}

{block name='content'}

{include file='includes/backend.ui/backend.validator.errors.tpl'}

{function name='buttons'}
		<tr>
			<td class="noborder" colspan="{$groups_count+2}">
				<div class="buttons" style="width: 300px; margin: 0px auto; padding: 10px 0 0 0;">
					{cpf_submit title=t('Apply changes') }
					{cpf_button title=t('Cancel') url=cpf_link(['controller'=>'backend_index'])}
				</div>
			</td>
		</tr>
{/function}

<form action="{$cpf_url_current}" method="post" id="cpf-page-form">
	<table summary="{t}Main table on the page{/t}" class="table table-stripped">
	<tbody>
		{buttons}
		<tr>
			<th colspan="2">{t}Pages{/t}</th>
			<th colspan="{$groups_count}" style="text-align: center;">{t}Groups{/t}</th>
		</tr>
		{assign var="controller" value='temp'}
		{foreach from=$rights item=r_item key=r_key name="r_foreach"}
			{if $controller != $r_item.controller}
				<tr>
					<th colspan="2"><input type="text" id="controller_{$r_item.controller}" name="controller_{$r_item.controller}" maxlength="255" value="{$controllers_names[$r_item.controller]}" class="rights_input_controller"/></th>
						{foreach from=$groups item=group_item}
							<th width="120">
								<table>
									<tr>
										<td><input type="checkbox" id="cb_group_{$r_item.controller}_{$group_item->id}" name="" value="" /></td>
										<td><label for="cb_group_{$r_item.controller}_{$group_item->id}">{$group_item->title}</label></td>
									</tr>
								</table>
								<script type="text/javascript">
								{literal}
									jQuery(document).ready(function($)
									{
										$().cbtoggle({
											mainElementSelector		: '#cb_group_{/literal}{$r_item.controller}_{$group_item->id}{literal}',
											detailElementsSelector	: '.cb_{/literal}{$r_item.controller}_{$group_item->id}{literal}',
											panelElementSelector	: '.fake'
										});
									});
								{/literal}
								</script>
								<div class="fake"></div>
							</th>
						{/foreach}
				</tr>
				{assign var="controller" value=$r_item.controller}
			{/if}
			<tr>
				<td colspan="2">
					<input type="text" id="{$r_key}" name="{$r_key}" maxlength="255" value="{$r_item.title}" class="rights_input"/>
					<div class="rights_name">({$r_key})</div>
				</td>
			{foreach from=$groups item=group_item}
				<td class="cb-center">
					{if (in_array(array($r_key, $group_item->id), $rights_always_active))}
						<img src="static/images/backend/icons/check.png" width="16" height="16" alt="{t}Default user permission{/t}" title="{t}Default user permission{/t}" />
						<input type="hidden" id="{$r_key}.{$group_item->id}" name="rights[]" value="{$r_key}.{$group_item->id}" />
					{else}
						<input type="checkbox" id="{$r_key}.{$group_item->id}" name="rights[]" value="{$r_key}.{$group_item->id}" class="field_checkbox cb_{$r_item.controller}_{$group_item->id}" 
						{if in_array($group_item->id, $r_item.groups)}
							checked = "checked" 
						{/if}
						/>
					{/if}
				</td>	
			{/foreach}
			</tr>
		{/foreach}
		{buttons}
	</tbody>
	</table>
</form>
{/block}

{block name='js_init'}
{*	validation *}
{capture name=validation_rules}
		rules: {literal}{{/literal}
			{assign var="temp_controller" value="temp_controller"}
			{foreach from=$rights item=r_item key=r_key name="r_foreach"}
				{if $temp_controller != $r_item.controller}
					'controller_{$r_item.controller}': 'required',
					{assign var="temp_controller" value=$r_item.controller}
				{/if}
				'{$r_key}': 'required'{if !$smarty.foreach.r_foreach.last},{/if}
			{/foreach}
		{literal}},
		messages: {{/literal}
			{assign var="temp_controller" value="temp_controller"}
			{foreach from=$rights item=r_item key=r_key name="r2_foreach"}
				{if $temp_controller != $r_item.controller}
					'controller_{$r_item.controller}': '{t}Controller name is not set{/t}',
					{assign var="temp_controller" value=$r_item.controller}
				{/if}
				'{$r_key}': '{t}Action name is not set{/t}'{if !$smarty.foreach.r2_foreach.last},{/if}
			{/foreach}
		{literal}}{/literal}
{/capture}

{* cpf_validator rules=$smarty.capture.validation_rules *}
{/block}