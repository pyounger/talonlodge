{extends file='layouts/backend.table.tpl'} 

{block name='title'}{/block}

{block name='content_top_top'}
	{* Общие действия *}
	{if $smarty.capture.common_actions}
		{include file='includes/backend.ui/backend.common_actions.tpl' actions=$smarty.capture.common_actions filters=$smarty.capture.common_filters}
	{/if}

	{* Ссылка для пейджинга *}
	{if !$smarty.capture.pager_link}
		{capture name=pager_link}{link controller=$cpf_controller sort=$cpf_order_sort order=$cpf_order_order page=$cpf_pager_fake_page}{/capture}
	{/if}

	{* Пейджинг *}
	{cpf_pager direct_url=$smarty.capture.pager_link}

	{* Форма для групповых операций *}
	<form action="{link controller=$cpf_controller action='group_action'}" method="post">
	
	{* Список записей *}
	{if !empty($cpf_entities)}
		<table summary="{$smarty.capture.table_summary|default:t('backend.common.main_table_onthe_page')}" class="cpf-grid">
			<thead>
				<tr>
	{/if}
{/block}

{block name='content_top'}
	{* Шапка таблицы *}
	{if !empty($cpf_entities)}
		{* Общий чекбокс для операций *}
		<th class="column-checkbox"><input type="checkbox" id="cb_group" name="" value="" /></th>

		{* ID *}
		{if $th_url}
			{if $priority_instead_id}
				{cpf_th field='priority' class="column-id" url=$th_url}
			{else}
				{cpf_th field='id' class="column-id" url=$th_url}
			{/if}
		{else}
			{if $priority_instead_id}
				{cpf_th field='priority' class="column-id"}
			{else}
				{cpf_th field='id' class="column-id"}
			{/if}
		{/if}

		{* Язык *}
		{if !$dont_show_flags}
			<th class="column-language">{t}backend.common.language{/t}</th>
		{/if}
		{* Остальные поля *}
		{foreach $fields as $field}
			{if $th_url}
				{cpf_th field=$field url=$th_url}
			{else}
				{cpf_th field=$field}
			{/if}
		{/foreach}

		{* Колонка фишек *}
		{if $features || $toggle}
			{cpf_th title=t('backend.common.features')}
		{/if}

		{* Колонка действий *}
		{capture name='condition_actions'}
			{foreach from=$actions item='action' name='condition_actions_foreach'}
				$cpf_rights->has_rights($cpf_controller, {$action}){if !$smarty.foreach.condition_actions_foreach.last}||{/if}
			{/foreach}
		{/capture}
		{if $smarty.capture.condition_actions}
			{capture name='actions_class'}w{$actions|@count}i{/capture}
			{cpf_th title=t('backend.common.actions')}
		{/if}
	{/if}
{/block}

{block name='content'}
	{* Цикл по всем записям *}
	{foreach from=$cpf_entities item="entity" name="entities"}
		{foreach from=$langs key="lang" item="lang_value"}
			{* Чередуем раскраску строк *}
			{math equation="x % 2" x=$smarty.foreach.entities.iteration assign=odd}
			<tr class="row-{$entity->id} {if $odd == 1}alternate{/if}" rel="row-{$entity->id}">

				{* Для каждой многоязычной строки выводим чекбоксы для групповых операций и ID *}
				{if $lang == cpf_config('LANGS.DEFAULT')}
				<td rowspan="{$langs_count}">
					{* if $is_sortable}
						<div class="cpf-grid-sortable-handler"><span class="ui-icon ui-icon-grip-dotted-vertical"></span></div>
						<span class="priority-value" style="display: none;">{$entity->priority}</span>
						<div class="checkbox-wrapper"><input style="border: none" type="checkbox" id="items[]" name="items[]" value="{$entity->id}" class="cb_group" maxlength="255" value="1"/></div>
					{else}
						<div class="checkbox-wrapper unsortable"><input style="border: none" type="checkbox" id="items[]" name="items[]" value="{$entity->id}" class="cb_group" maxlength="255" value="1"/></div>
					{/if *}
					<div class="checkbox-wrapper unsortable"><input style="border: none" type="checkbox" id="items[]" name="items[]" value="{$entity->id}" class="cb_group" maxlength="255" value="1"/></div>
				</td>
				{* Возможность опубликовать/скрыть запись и ID *}
				<td rowspan="{$langs_count}">
					{* Если возможность публикации не скрыта *}
					{if !$hide_publish}
						{$action = 'toggle_published'}
						{if $entity->is_published}
							{$icon = 'publish'}
							{$action_title = 'backend.common.unpublish'}
						{else}
							{$icon = 'unpublish'}
							{$action_title = 'backend.common.publish'}
						{/if}
						<div class="icons w2i">
							{cpf_icon 
								icon=$icon 
								title=t($action_title) 
								url=cpf_link(['controller' => $cpf_controller, 'action' => $action, 'id' => $entity->id])
								confirm=''}
							{if $priority_instead_id}{$entity->priority}{else}{$entity->id}{/if}
						</div>
					{else}
						{if $priority_instead_id}{$entity->priority}{else}{$entity->id}{/if}
					{/if}
				</td>
				{/if}
				{* Показываем язык :) *}
				{if !$dont_show_flags}
					<td>flag{*{cpf_flag lang=$lang}*}</td>
				{/if}

				{* Выводим все остальные поля *}
				{foreach $fields as $field}
					{$value = $entity->$field}

					{if $lang == cpf_config('LANGS.DEFAULT')}
						{* Непереводимые записи занимают несколько строк *}
						{if !in_array($field, $model->has_translations)}
							<td rowspan="{$langs_count}"{if $wrap} class="wrap"{/if}>
						{else}
							<td{if $wrap} class="wrap"{/if}>
						{/if}
					{else}
						{* Для каждого перевода своя строка *}
						{if in_array($field, $model->has_translations)}
							<td{if $wrap} class="wrap"{/if}>
						{/if}
					{/if}

					{* Не выводим одноязычные поля для многоязычных строк *}
					{if $lang == cpf_config('LANGS.DEFAULT') || in_array($field, $model->has_translations)}
						{* Проверим, не является ли поле ссылкой на присоединенную сущность *}
						{if isset($joined) && isset($joined.$field) && isset($joined.$field.id_field) && isset($entity->$joined.$field.id_field) && in_array($field, $joined)}{$join = true}{else}{$join = false}{/if}
						{* Проверим, не является ли поле ссылкой на вложенные сущности *}
						{if isset($inner) && isset($inner.$field) && isset($inner.$field.id_field) && in_array($field, $inner)}{$in = true}{else}{$in = false}{/if}
						{* Поле title всегда является ссылкой на редактирование элемента *}
						{if $field == 'title' && $cpf_rights->has_rights($cpf_controller, 'edit')}
							<a href="{link controller=$cpf_controller action='edit' id=$entity->id}">
								{if in_array($field, $model->has_translations)}
									{if $truncate && in_array($field, $truncate)}
										{$value|truncate:$truncate_size}
									{else}
										{$value}
									{/if}
								{else}
									{if $truncate && in_array($field, $truncate)}
										{$value|truncate:$truncate_size}
									{else}
										{$value}
									{/if}
								{/if}
							</a>
						{elseif $field == 'photo'}
							{if isset($entity->photo)}
								<img src="{$photo_url}{$entity->photo}" height="50" />
							{/if}
						{elseif $field == 'date'}
							{* Для даты модификатор языка не нужен *}
							{$value|datetime_format:$cpf_langs.$cpf_lang.timestamp_format}
						{else}
							{* Модификатор языка для многоязычных полей *}
							{if in_array($field, $model->has_translations)}
								{$val = $value|strip_tags}
							{else}
								{$val = $value|strip_tags}
							{/if}

							{* Проверяем поле на обрезание :) *}
							{if $truncate && in_array($field, $truncate)}
								{$val = $val|truncate:$truncate_size}
							{/if}

							{* Выводим значение *}
							{if $join}
								<a href="{$joined.$field.url|replace:'-999':$entity->$joined.$field.id_field}">{$val}</a>
							{elseif $in}
								<a href="{$inner.$field.url|replace:'-999':$entity->$inner.$field.id_field}">{$val}</a>
							{else}
								{$val}
							{/if}
						{/if}
					</td>
					{/if}
				{/foreach}

				{* Колонка фишек *}
				{if ($features || $toggle) && $lang == cpf_config('LANGS.DEFAULT')}
					<td rowspan="{$langs_count}">
						{if $features || $toggle}
							{$fc = $features|@count}
							{$tc = $toggle|@count}
							<div class="icons w{$fc+$tc}i">
						{/if}
						{if $features}
							{foreach $features as $feature}
								{* Название действия *}
								{capture name='feature_title'}backend.common.{$feature}{/capture}

								{* Вывод иконки (если есть права) *}
								{capture name="feature_count"}{$feature}_count{/capture}
								{$feature_count = $smarty.capture.feature_count}
								{capture name='feature_icon'}{if $entity->$feature_count && $entity->$feature_count > 0}{$feature}{else}{$feature}-inactive{/if}{/capture}
								{if $cpf_rights->has_rights($cpf_controller, $feature)}
									{cpf_icon 
										icon=$smarty.capture.feature_icon
										title=t($smarty.capture.feature_title) 
										url=cpf_link(['controller' => $cpf_controller, 'action' => $feature, 'id' => $entity->id])
										confirm=''}
								{/if}
							{/foreach}
						{/if}
						{if $toggle}
							{foreach $toggle as $togg}
								{* Название действия *}
								{capture name='togg_title'}backend.common.{$togg.action}{/capture}

								{* Вывод иконки (если есть права) *}
								{capture name='togg_icon'}{if $entity->$togg.field && $entity->$togg.field > 0}{$togg.icon}{else}{$togg.icon}-inactive{/if}{/capture}
								{if $cpf_rights->has_rights($cpf_controller, $togg.action)}
									{cpf_icon 
										icon=$smarty.capture.togg_icon
										title=t($smarty.capture.togg_title) 
										url=cpf_link(['controller' => $cpf_controller, 'action' => $togg.action, 'id' => $entity->id])
										confirm=''}
								{/if}
							{/foreach}
						{/if}
						{if $features || $toggle}
							</div>
						{/if}
					</td>
				{/if}
				{* Колонка действий *}
				{if $smarty.capture.condition_actions}
					<td>
						{* Ширина равна количеству действий *}
						<div class="icons w{$actions|@count}i">
							{foreach $actions as $action}
								{* Название действия *}
								{capture name='action_title'}backend.common.{$action}{/capture}
								{$confirm = ''}
								{$restrict = false}
								{if isset($restrict_delete) && in_array($action, array_keys($restrict_delete)) && $entity->$restrict_delete[$action] > 0}
									{$restrict = true}
								{/if}
								{if $action == 'delete'}
									{* Для удаления нужно подтверждение *}
									{$confirm = t('backend.common.really_delete')}
								{elseif $action == 'to_trash'}
									{* Для корзины тоже нужно подтверждение *}
									{$confirm = t('backend.common.really_to_trash')}
								{elseif $action == 'send'}
									{* И для отправки писем *}
									{$confirm = t('backend.news.really_send')}
								{/if}
								
								{* Вывод иконки (если есть права) *}
								{if $cpf_rights->has_rights($cpf_controller, $action) && !$restrict}
									{* Удаление, в корзину, восстановление, сортировку, отправку писем в строке переводов не показываем *}
									{if !(in_array($action, ['delete','to_trash', 'restore', 'up', 'down', 'send']) && $lang != cpf_config('LANGS.DEFAULT'))}
										{if !($action == 'up' && $smarty.foreach.entities.first) && !($action == 'down' && $smarty.foreach.entities.last)}
										{$action_url = cpf_link(['controller' => $cpf_controller, 'action' => $action, 'id' => $entity->id])}
										{capture name='action_url'}{if $lang != cpf_config('LANGS.DEFAULT')}{$action_url}?lang={$lang}{else}{$action_url}{/if}{/capture}
											{if $action == 'send' && $entity->is_sent}
											{cpf_icon 
												icon='nomail'
												title=t('backend.news.news_already_sent')}
											{else}
											{cpf_icon 
												icon=$action
												title=t($smarty.capture.action_title) 
												url=$smarty.capture.action_url
												confirm=$confirm}
											{/if}
										{/if}
									{/if}
								{/if}
							{/foreach}
						</div>
					</td>
				{/if}
			</tr>
		{/foreach}
	{/foreach}
{/block}

{block name='content_bottom'}
	{if !empty($cpf_entities)}
		</tbody>
			</table>
			{* Групповые операции *}
			{*include file="snippets/backend_entities.view_group_actions.tpl" actions=$group_actions*}
			{* Пейджинг *}
			{cpf_pager direct_url=$smarty.capture.pager_link}
	{else}
		<div class="information">{t}backend.common.no_matching_records{/t}</div>
	{/if}

	{* Сортировка колонок *}
	{* if $is_sortable}
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".cpf-grid tbody").tableDnD();
		});
	</script>
	{/if *}
	<script type="text/javascript">
		jQuery(document).ready(function($) {		
			$(".cpf-grid tbody tr").hover(
				function(){
					var rel = $(this).attr('rel');
					$('.cpf-grid tbody tr.' + rel + ' td').addClass('hover');
				}, 
				function(){
					var rel = $(this).attr('rel');
					$('.cpf-grid tbody tr.' + rel + ' td').removeClass('hover');
				}
			);
		});
	</script>
	{* Закрываем форму для групповых операций *}
	</form>
{/block}
