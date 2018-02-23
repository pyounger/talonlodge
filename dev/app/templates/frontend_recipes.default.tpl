{extends file='layouts/frontend.tpl'}

{block name='description'}{/block}
{block name='keywords'}{/block}
{block name='title'}{/block}

{block name='content'}
<div class="h-recipes-wrapper h-faq-wrapper l-center">
	<div class="h-recipe-head">
		<h1>Recipe Finder</h1>
		<p>There's a recipe to satisfy every taste and craving for Alaska seafood. Browse featured recipes of filter your search based on a seafood type.</p>
	</div>
	<div class="h-recipe-container">
		<div class="b-recipe__search">
			<form action="#" method="post">
				<div class="b-search__i">
					<div class="b-fake-select">
						<div class="lineForm">
							<select onchange="loadRecipes" class="recipe_select" id="meal_types" name="meal_types" tabindex="2">
								<option value="">All meal types</option>
								{foreach $meal_types as $_t}
									<option value="{$_t.id}">{$_t.title}</option>
								{/foreach}
							</select>
						</div>
					</div>
				</div>
				<div class="b-search__i">
					<div class="b-fake-select">
						<div class="lineForm">
							<select onchange="loadRecipes" class="recipe_select" id="fish_types" name="fish_types" tabindex="2">
								<option value="">Main Ingredient</option>
								{foreach $fish_types as $_t}
									<option value="{$_t.id}">{$_t.title}</option>
								{/foreach}
							</select>
						</div>
					</div>
				</div>
				<div class="b-search__i">
					<div class="b-fake-select">
						<div class="lineForm">
							<select onchange="loadRecipes" class="recipe_select" id="technique_types" name="technique_types" tabindex="2">
								<option value="">All techniques</option>
								{foreach $technique_types as $_t}
									<option value="{$_t.id}">{$_t.title}</option>
								{/foreach}
							</select>
						</div>
					</div>
				</div>
				<div class="b-search__i">
					<input type="text" value="" id="recipe_search" name="search" placeholder="search"/>
					<button type="submit" class="recipe-search-button"></button>
				</div>
			</form>
			<div style="clear: both;"></div>
		</div>

		<div class="recipes-wrapper">
			{include file='frontend_recipes.list.tpl'}
		</div>
	</div>
</div>
{/block}

{block name='js_init'}
	function loadRecipes()
	{
		$.ajax({
			dataType:	'html',
			type:		'post',
			url:		'{link rule='frontend_recipes'}',
			data:		{
				meal: $('#meal_types').val(),
				fish: $('#fish_types').val(),
				technique: $('#technique_types').val(),
				search: $('#recipe_search').val(),
			},
			success: function(response)
			{
				$('.recipes-wrapper').html(response);
			}
		});
	}
	var params = {
		changedEl: ".lineForm select",
		visRows: 8,
		scrollArrows: true,
		callbackOnChange: loadRecipes
	}
	cuSel(params);
	$('#recipe_search').change(loadRecipes);
	$('.recipe-search-button').click(function(){
		loadRecipes();
		return false;
	});
{/block}
