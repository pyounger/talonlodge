{extends file='layouts/backend.form.tpl'} 



{block name='title'}

	{if $cpf_is_edit}

		{capture name='page_title'}{t}Edit Testing{/t}{/capture}

	{else}

		{capture name='page_title'}{t}New Testing{/t}{/capture}

	{/if}

	{$smarty.capture.page_title}

{/block}



{block name='content_init'}



	{capture name='is_upload_form'}Any value here :){/capture}



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

	{cpf_input_helper type="text" field="title" class="span8"}

	{cpf_input_helper type="slug" field="slug" title_field='title' class="span8"}

	{cpf_input_helper type="text" field="serves" class="span8"}

	{cpf_input_helper type="text" field="prep_time" class="span8"}

	{cpf_input_helper type="text" field="cook_time" class="span8"}

	{cpf_input type="multiple_select" field="meal_type" list=$meal_types value=$categories_values label=t('tables.testings.meal_type')}

	{cpf_input type="multiple_select" field="fish_type" list=$fish_types value=$categories_values label=t('tables.testings.fish_type')}

	{cpf_input type="multiple_select" field="technique_type" list=$technique_types value=$categories_values label=t('tables.testings.technique_type')}

	{cpf_input_helper type="ck_editor" field="ingredients" loadJS=true}

	{cpf_input_helper type="ck_editor" field="directions"}

	{cpf_input_helper type="ck_editor" field="nutritional"}



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

                <img src="{$attachment_url}{$filename_thumb}" />

            {/if}

        </div>

    </div>

        {if $filename && $ext}

        <div class="control-group">

            {if $extension == 'swf'}

                <div id="banner-container"></div>

                {else}

                <img src="{$attachment_url}{$filename_thumb}" />

            {/if}

        </div>

    {/if}

{/block}