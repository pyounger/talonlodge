{extends file='layouts/backend.form.tpl'} 



{block name='title'}

	{if $cpf_is_edit}

		{capture name='page_title'}{t}Edit Testing Category{/t}{/capture}

	{else}

		{capture name='page_title'}{t}New Testing Category{/t}{/capture}

	{/if}

	{$smarty.capture.page_title}

{/block}



{block name='content_init'}



	{$cpf_breadcrumb=[

		[t('Testings'), cpf_link(['controller' => $cpf_controller])],

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

	{cpf_input_helper type="select" field="type" list=$types value=$type}

	{cpf_input_helper type="text" field="title"}

	{cpf_input_helper type="slug" field="slug" title_field='title'}

	{if !$cpf_is_edit}

		{$is_published = true}

	{/if}

	{cpf_input_helper type="checkbox" field="is_published"}

{/block}