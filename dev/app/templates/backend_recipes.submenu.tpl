	<ul class="nav nav-pills">
		<li role="presentation"{if $cpf_controller == 'backend_recipes'} class="active"{/if}><a href="{link controller='backend_recipes'}">Recipes</a></li>
		<li role="presentation"{if $cpf_controller == 'backend_recipecategories' && (!$type || $type == 'meal')} class="active"{/if}><a href="{link controller='backend_recipecategories' type='meal'}">Meal Types</a></li>
		<li role="presentation"{if $cpf_controller == 'backend_recipecategories' && $type == 'fish'} class="active"{/if}><a href="{link controller='backend_recipecategories' type='fish'}">Fish Types</a></li>
		<li role="presentation"{if $cpf_controller == 'backend_recipecategories' && $type == 'technique'} class="active"{/if}><a href="{link controller='backend_recipecategories' type='technique'}">Techniques</a></li>
	</ul>
