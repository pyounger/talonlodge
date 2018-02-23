{if $for_pdf}

	<div class="h-recipe-pdf">

		<img src="/{cpf_config('APP.TESTINGS.URL')}{$testing->filename_thumb}" width="100%" alt="{$testing->title}" />

		<h1>{$testing->title}</h1>

		<table width="100%" class="xh">

			<tr>

				<td width="33%">

					{if $testing->serves}

						<p>SERVES <span>{$testing->serves}</span></p>

					{/if}

				</td>

				<td width="33%">

					{if $testing->prep_time neq ''}

						<p>PREP TIME <span>{$testing->prep_time}</span></p>

					{/if}

				</td>

				<td width="33%">

					{if $testing->cook_time neq ''}

						<p>COOK TIME <span>{$testing->cook_time}</span></p>

					{/if}

				</td>

			</tr>

		</table>



		<table width="100%" class="yh">

			<tr>

				<td width="50%" valign="top">

					{if $testing->ingredients}

						<h4>Ingredients</h4>

						{$testing->ingredients}

					{/if}

				</td>

				<td width="50%" valign="top">

					{if $testing->directions}

						<h4>Directions</h4>

						{$testing->directions}

					{/if}

				</td>

			</tr>

			{if $testing->nutritional}

			<tr>

				<td valign="top">

					<h4>Nutritional Information</h4>

					{$testing->nutritional}

				</td>

				<td></td>

			</tr>

			{/if}

		</table>

	</div>

{else}

	<div class="h-recipe-view-wrapper h-faq-wrapper l-center">

		<a href="{link rule='frontend_testings'}" class="recipe-back">&larr;&nbsp;Back to testing finder</a>

		<h1>{$testing->title}</h1>

		<div class="b-recipe__info">

			{if $testing->serves}

			<div class="b-recipe__info-i">

				<p>SERVES <span>{$testing->serves}</span></p>

			</div>

			{/if}

			{if $testing->prep_time neq ''}

			<div class="b-recipe__info-i">

				<p>PREP TIME <span>{$testing->prep_time}</span></p>

			</div>

			{/if}

			{if $testing->cook_time neq ''}

			<div class="b-recipe__info-i">

				<p>COOK TIME <span>{$testing->cook_time}</span></p>

			</div>

			{/if}

		</div>



		<div class="h-faq-container">

			<div class="b-faq-l">

				<div class="b-recipe__l-i">

					{if $testing->ingredients}

						<h4>Ingredients</h4>

						{$testing->ingredients}

					{/if}

				</div>



				 <div class="b-recipe__l-i">

					{if $testing->nutritional}

						<h4>Nutritional Information</h4>

						{$testing->nutritional}

					{/if}

				</div>

			</div>

			<div class="b-faq-r">

				<div class="b-recipe__r-i">

					{if $testing->directions}

						<h4>Directions</h4>

						{$testing->directions}

					{/if}

				</div>



				<div class="b-recipe__r-i last">

					{if $another_testing}

					<h4>You'll also love</h4>

					<div class="b-recipe__i last">

						<a href="{link rule='frontend_testings_view' id=$another_testing->id slug=$another_testing->slug}">

							<table class="bordered-table">

								<tr>

									<td class="corners blt">&nbsp;</td>

									<td class="top-bottom bt">&nbsp;</td>

									<td class="corners brt">&nbsp;</td>

								</tr>

								<tr class="img">

									<td class="left-right bl">&nbsp;</td>

									<td class="bc"><img src="/{cpf_config('APP.TESTINGS.URL')}{$another_testing->filename_thumb}" width="300" height="168" alt="{$another_testing->title}" /></td>

									<td class="left-right br">&nbsp;</td>

								</tr>

								<tr>

									<td class="corners blb">&nbsp;</td>

									<td class="top-bottom bb">&nbsp;</td>

									<td class="corners brb">&nbsp;</td>

								</tr>

							</table>

							<span>{$another_testing->title}</span>

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

						<a href="{link rule='frontend_testings_view' id=$testing->id slug=$testing->slug}?print">Print</a>

					</div>

					<div class="b-recipe-social">

						<ul>

							<li class="sm">Social Media</li>

							<li><a target="_blank" href="mailto:?subject={$testing->title}&amp;body=Check out this site {$cpf_root_url}{$cpf_url_current}" class="email"></a></li>

							<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={$cpf_root_url}{$cpf_url_current}" class="fb"></a></li>

							<li><a target="_blank" href="https://twitter.com/home?status={$testing->title} on {$cpf_root_url}{$cpf_url_current}" class="tw"></a></li>

							<li><a target="_blank" href="https://plus.google.com/share?url={$cpf_root_url}{$cpf_url_current}" class="gp"></a></li>

							<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url={$cpf_root_url}{$cpf_url_current}&media={$cpf_root_url}{cpf_config('APP.TESTINGS.URL')}{$testing->filename_thumb}&description={$testing->title}" class="p"></a></li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>

{/if}