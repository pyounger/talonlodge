	<div class="b-recipe__items">
		{foreach $recipes as $recipe}
		<div class="b-recipe__i{if $recipe@iteration %3 == 0} last{/if}">
			<a href="{link rule='frontend_recipes_view' id=$recipe->id slug=$recipe->slug}">
				<table class="bordered-table">
					<tr>
						<td class="corners blt">&nbsp;</td>
						<td class="top-bottom bt">&nbsp;</td>
						<td class="corners brt">&nbsp;</td>
					</tr>
					<tr class="img">
						<td class="left-right bl">&nbsp;</td>
						<td class="bc"><img src="{cpf_config('APP.RECIPES.URL')}{$recipe->filename_thumb}" width="300" height="168" alt="{$recipe->title}" /></td>
						<td class="left-right br">&nbsp;</td>
					</tr>
					<tr>
						<td class="corners blb">&nbsp;</td>
						<td class="top-bottom bb">&nbsp;</td>
						<td class="corners brb">&nbsp;</td>
					</tr>
				</table>
				<span>{$recipe->title}</span>
			</a>
		</div>
		{/foreach}
	</div>