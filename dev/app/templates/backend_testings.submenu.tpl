	<ul class="nav nav-pills">

		<li role="presentation"{if $cpf_controller == 'backend_testings'} class="active"{/if}><a href="{link controller='backend_testings'}">Testings</a></li>

		<li role="presentation"{if $cpf_controller == 'backend_testingcategories' && (!$type || $type == 'meal')} class="active"{/if}><a href="{link controller='backend_testingcategories' type='meal'}">Meal Types</a></li>

		<li role="presentation"{if $cpf_controller == 'backend_testingcategories' && $type == 'fish'} class="active"{/if}><a href="{link controller='backend_testingcategories' type='fish'}">Fish Types</a></li>

		<li role="presentation"{if $cpf_controller == 'backend_testingcategories' && $type == 'technique'} class="active"{/if}><a href="{link controller='backend_testingcategories' type='technique'}">Techniques</a></li>

	</ul>

