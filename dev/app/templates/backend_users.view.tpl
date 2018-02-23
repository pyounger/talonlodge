{extends file='layouts/backend.table.tpl'} 

{block name='title'}{$user->getFullName()}{/block}

{block name='content_init'}

	{$cpf_breadcrumb=[
        [t('Участники'), cpf_link(['controller' => $cpf_controller])],
        [{$user->getFullName()}, '']
    ]}

	{if $cpf_rights->has_rights($cpf_controller, 'add')}
		{capture name="common_actions"}
		{/capture}
	{/if}

{/block}



{block name='content_top_top'}{/block}
{block name='content_top'}{/block}
{block name='content_bottom'}{/block}

{block name='content'}
<div class="row">
    <div class="span6">
        <h3>Общие данные</h3>
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <td>ID</td>
                <td>{$user->id}</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><a href="mailto:{$user->login}">{$user->login}</a></td>
            </tr>
            <tr>
                <td>Имя</td>
                <td>{$user->getFullName()}</td>
            </tr>
            <tr>
                <td>Пол</td>
                <td>{if $user->sex == 1}м{elseif $user->sex == 2}ж{/if}</td>
            </tr>
            <tr>
                <td>Дата рождения</td>
                <td>{$user->birthday|date_format:$cpf_langs.$cpf_lang.date_format}</td>
            </tr>
            <tr>
                <td>Дата регистрации</td>
                <td>{$user->datetime|datetime_format:$cpf_langs.$cpf_lang.timestamp_format}</td>
            </tr>
            <tr>
                <td>Способ регистрации</td>
                <td>{if $user->provider_id == 1}Вконтакте{elseif $user->provider_id == 2}facebook{else}сайт{/if}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="span6">
    {if !$user->emptyAddress()}
        <h3>Адрес</h3>
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <td colspan="2">{$user->getAddress()}</td>
            </tr>
            <tr>
                <td>Индекc</td>
                <td>{$user->postIndex}</td>
            </tr>
            <tr>
                <td>Город</td>
                <td>{$user->city}</td>
            </tr>
            <tr>
                <td>Улица</td>
                <td>{$user->street}</td>
            </tr>
            <tr>
                <td>Дом/строение</td>
                <td>{$user->house}</td>
            </tr>
            <tr>
                <td>Квартира</td>
                <td>{$user->flat}</td>
            </tr>
			{if $user->phone neq ''}
					<tr>
						<td>Телефон</td>
						<td>{$user->phone}</td>
					</tr>
			{/if}
            </tbody>
        </table>
    {/if}
    </div>
</div><!-- /.row -->

{if $user->codes|@count > 0 || $user->prizes|@count > 0}
<div class="row">
	{if $user->codes|@count > 0}
    <div class="span6">
        <h3>Зарегистрированные коды ({$user->codes|@count})</h3>
		<div style="height: 281px; overflow-x: auto;">
        <table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Дата</th>
					<th>Код</th>
				</tr>
			</thead>
            <tbody>
				{foreach $user->codes as $code}
					<tr>
						<td>{$code->datetime|datetime_format:$cpf_langs.$cpf_lang.timestamp_format}</td>
						<td>{$code->value}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
		</div>
	</div>
	{/if}
	{if $user->prizes|@count > 0}
    <div class="span6">
        <h3>Выигранные призы ({$user->prizes|@count})</h3>
		<div style="height: 281px; overflow-x: auto;">
        <table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Дата</th>
					<th>Приз</th>
					<th>Заказан</th>
				</tr>
			</thead>
            <tbody>
				{foreach $user->prizes as $prize}
					<tr>
						<td>{$prize->id}</td>
						<td>{$prize->datetime|datetime_format:$cpf_langs.$cpf_lang.timestamp_format}</td>
						{capture name='prize_title'}APP.PROMO.PRIZES.{$prize->prize}.DESCRIPTION_SHORT{/capture}
						<td>{cpf_config($smarty.capture.prize_title)}</td>
						<td>{if $prize->is_ordered}{$prize->order_date|datetime_format:$cpf_langs.$cpf_lang.timestamp_format}{else}Не заказан{/if}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
		</div>
	</div>
	{/if}
</div>
{/if}
<br />
<div class="row">
    <div class="span7">
        <h3>Активность</h3>
		<div style="height: 422px; overflow-x: auto;">
        <table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Дата</th>
					<th>Активность</th>
				</tr>
			</thead>
            <tbody>
				{foreach $user->activities as $activity}
					<tr>
						<td>{$activity->datetime|datetime_format:$cpf_langs.$cpf_lang.timestamp_format}</td>
						<td>
						{if $activity->activity == 'LOGIN'}Авторизация
						{elseif $activity->activity == 'LOGOUT'}Завершение сеанса
						{elseif $activity->activity == 'REGISTER'}Регистрация на сайте
						{elseif $activity->activity == 'PRIZE_MAIL_RECEIVE'}E-mail уведомление о выигрыше приза
						{elseif $activity->activity == 'CODE_REGISTRATION'}Регистрация кода
						{elseif $activity->activity == 'PRIZE_ORDER'}Заказ приза
						{elseif $activity->activity == 'PRIZE_WIN'}Выигрыш приза
						{elseif $activity->activity == 'PROFILE_CHANGE'}Изменение личных данных
						{elseif $activity->activity == 'FEEDBACK'}Обращение в обратную связь
						{else}{$activity->activity}
						{/if}
						{if $activity->value} (
							{if $activity->activity == 'PRIZE_ORDER'}{$activity->value}
							{elseif $activity->activity == 'PRIZE_WIN'}{capture name='prize_title'}APP.PROMO.PRIZES.{$prize->prize}.DESCRIPTION_SHORT{/capture}{cpf_config($smarty.capture.prize_title)}
							{else}{$activity->value}{/if}
						){/if}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
		</div>
	</div>

</div>
<div class="clearfix"></div>
{/block}