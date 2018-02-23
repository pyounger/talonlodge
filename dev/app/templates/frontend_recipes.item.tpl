<style>
	.b-subgallery
	{
		background: linear-gradient(to bottom,rgba(255,255,255,0) 0%,rgba(255,255,255,0.3) 18%,rgba(255,255,255,.8) 67%,rgba(255,255,255,.9) 80%,rgba(255,255,255,1) 100%) !important;
}

	
</style>

{if $for_pdf}

	<div class="h-recipe-pdf">

		<img src="/{cpf_config('APP.RECIPES.URL')}{$recipe->filename_thumb}" width="100%" alt="{$recipe->title}" />

		<h1>{$recipe->title}</h1>

		<table width="100%" class="xh">

			<tr>

				<td width="33%">

					{if $recipe->serves}

						<p>SERVES <span>{$recipe->serves}</span></p>

					{/if}

				</td>

				<td width="33%">

					{if $recipe->prep_time neq ''}

						<p>PREP TIME <span>{$recipe->prep_time}</span></p>

					{/if}

				</td>

				<td width="33%">

					{if $recipe->cook_time neq ''}

						<p>COOK TIME <span>{$recipe->cook_time}</span></p>

					{/if}

				</td>

			</tr>

		</table>



		<table width="100%" class="yh">

			<tr>

				<td width="50%" valign="top">

					{if $recipe->ingredients}

						<h4>Ingredients</h4>

						{$recipe->ingredients}

					{/if}

				</td>

				<td width="50%" valign="top">

					{if $recipe->directions}

						<h4>Directions</h4>

						{$recipe->directions}

					{/if}

				</td>

			</tr>

			{if $recipe->nutritional}

			<tr>

				<td valign="top">

					<h4>Nutritional Information</h4>

					{$recipe->nutritional}

				</td>

				<td></td>

			</tr>

			{/if}

		</table>

	</div>

{else}

	<div class="h-recipe-view-wrapper h-faq-wrapper l-center">

		<a href="{link rule='frontend_recipes'}" class="recipe-back">&larr;&nbsp;Back to recipe finder</a>

		<h1>{$recipe->title}</h1>

		<div class="b-recipe__info">

			{if $recipe->serves}

			<div class="b-recipe__info-i">

				<p>SERVES <span>{$recipe->serves}</span></p>

			</div>

			{/if}

			{if $recipe->prep_time neq ''}

			<div class="b-recipe__info-i">

				<p>PREP TIME <span>{$recipe->prep_time}</span></p>

			</div>

			{/if}

			{if $recipe->cook_time neq ''}

			<div class="b-recipe__info-i">

				<p>COOK TIME <span>{$recipe->cook_time}</span></p>

			</div>

			{/if}

		</div>



		<div class="h-faq-container">

			<div class="b-faq-l">

				<div class="b-recipe__l-i">

					{if $recipe->ingredients}

						<h4>Ingredients</h4>

						{$recipe->ingredients}

					{/if}

				</div>



				 <div class="b-recipe__l-i">

					{if $recipe->nutritional}

						<h4>Nutritional Information</h4>

						{$recipe->nutritional}

					{/if}

				</div>

			</div>

			<div class="b-faq-r">

				<div class="b-recipe__r-i">

					{if $recipe->directions}

						<h4>Directions</h4>

						{$recipe->directions}

					{/if}

				</div>



				<div class="b-recipe__r-i last">

					{if $another_recipe}

					<h4>You'll also love</h4>

					<div class="b-recipe__i last">

						<a href="{link rule='frontend_recipes_view' id=$another_recipe->id slug=$another_recipe->slug}">

							<table class="bordered-table">

								<tr>

									<td class="corners blt">&nbsp;</td>

									<td class="top-bottom bt">&nbsp;</td>

									<td class="corners brt">&nbsp;</td>

								</tr>

								<tr class="img">

									<td class="left-right bl">&nbsp;</td>

									<td class="bc"><img src="/{cpf_config('APP.RECIPES.URL')}{$another_recipe->filename_thumb}" width="300" height="168" alt="{$another_recipe->title}" /></td>

									<td class="left-right br">&nbsp;</td>

								</tr>

								<tr>

									<td class="corners blb">&nbsp;</td>

									<td class="top-bottom bb">&nbsp;</td>

									<td class="corners brb">&nbsp;</td>

								</tr>

							</table>

							<span>{$another_recipe->title}</span>

						</a>

					</div>

					{/if}

				</div>

			</div>

			<div class="b-spiral"></div>

			<div class="b-ways-to-share">

				<h4>Ways to Share</h4>

				<div class="b-share-list">

					<div class="b-print">

						<a href="{link rule='frontend_recipes_view' id=$recipe->id slug=$recipe->slug}?print">Print</a>

					</div>

					<div class="b-recipe-social">

						<ul>

							<li class="sm">Social Media</li>

							<li><a target="_blank" href="mailto:?subject={$recipe->title}&amp;body=Check out this site {$cpf_root_url}{$cpf_url_current}" class="email"></a></li>

							<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={$cpf_root_url}{$cpf_url_current}" class="fb"></a></li>

							<li><a target="_blank" href="https://twitter.com/home?status={$recipe->title} on {$cpf_root_url}{$cpf_url_current}" class="tw"></a></li>

							<li><a target="_blank" href="https://plus.google.com/share?url={$cpf_root_url}{$cpf_url_current}" class="gp"></a></li>

							<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url={$cpf_root_url}{$cpf_url_current}&media={$cpf_root_url}{cpf_config('APP.RECIPES.URL')}{$recipe->filename_thumb}&description={$recipe->title}" class="p"></a></li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".b-top__gradient").css('display', 'none');
		});
	</script>

{/if}