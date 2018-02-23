{assign var="data" value=$control_frontend_accomodation_data}
{foreach $data as $item}

<div class="h-special-and-packages-item {cycle values=',no-bg'}">
	<div class="h-special-and-packages-item-top">
		<div class="h-special-and-packages-item-bottom">
			<div class="h-special-and-packages-item-inner">
				<div class="h-accomodations-inner l-center">
					<h2>{$item->title}</h2>
					<div class="b-accomodation-item-left">
						<table class="bordered-table">
							<tr>
								<td class="corners blt"></td>
								<td class="top-bottom bt"></td>
								<td class="corners brt"></td>
							</tr>
							<tr class="img">
								<td class="left-right bl"></td>
								<td class="bc">
									<img src="{cpf_config('APP.ACCOMODATION.URL')}{$item->main_image}" alt="{$item->main_image_alt|default:$item->title}" />
								</td>
								<td class="left-right br"></td>
							</tr>
							<tr>
								<td class="corners blb"></td>
								<td class="top-bottom bb"></td>
								<td class="corners brb"></td>
							</tr>
						</table>
					</div>
					<div class="b-accomodation-item-right">
						{$item->description}
						<div class="b-accomodations-item-right-r">
							{$item->two_bedroom_description}
							{*
							{if $item->url}
							<a href="{$item->url}">Book Now</a>
							{/if}
							*}
						</div>
						<div class="b-accomodations-item-right-l">
							{$item->one_bedroom_description}
							{if $item->one_popup || $item->two_popup}
							<div id="accomodation-{$item->id}" style="display: none;">
								{if $item->one_popup}
								<div class="h-popup-container one-bedroom-container">
									<a href="#" class="two-bedroom">Two Bedroom</a>
									<h2>{$item->one_bedroom_title}</h2>
									<div class="b-popup-left">
										{if $item->one_bedroom_image}
										<table class="bordered-table">
											<tr>
												<td class="corners blt"></td>
												<td class="top-bottom bt"></td>
												<td class="corners brt"></td>
											</tr>
											<tr class="img">
												<td class="left-right bl"></td>
												<td class="bc">
													<img src="{cpf_config('APP.ACCOMODATION.URL')}{$item->one_bedroom_image}" alt="{$item->one_bedroom_image_alt|default:$item->one_bedroom_title}" />
												</td>
												<td class="left-right br"></td>
											</tr>
											<tr>
												<td class="corners blb"></td>
												<td class="top-bottom bb"></td>
												<td class="corners brb"></td>
											</tr>
										</table>
										{/if}	
									</div>

									<div class="b-popup-right">
										{$item->one_bedroom_popup_description}
										<div class="b-popup-right-footer">
											<div class="b-popup-right-footer-l">
												{if $item->one_bedroom_small_image}
												<table class="bordered-table">
													<tr>
														<td class="corners blt"></td>
														<td class="top-bottom bt"></td>
														<td class="corners brt"></td>
													</tr>
													<tr class="img">
														<td class="left-right bl"></td>
														<td class="bc">
															<img src="{cpf_config('APP.ACCOMODATION.URL')}{$item->one_bedroom_small_image}" alt="{$item->one_bedroom_small_image_alt|default:$item->one_bedroom_title}" />
														</td>
														<td class="left-right br"></td>
													</tr>
													<tr>
														<td class="corners blb"></td>
														<td class="top-bottom bb"></td>
														<td class="corners brb"></td>
													</tr>
												</table>
												{/if}	
											</div>
											<div class="b-popup-right-footer-r">
												<p>
													{$item->one_popup_image_description}
												</p>
												<div class="b-popup-right-footer-r-schema">
													<span>Standart hotel room floor plan, typically they are around 400 sq. feet.</span>
													<img src="static/images/frontend/accomodations/popup-schema.jpg" width="233" height="103"/>
												</div>
											</div>
										</div>
									</div>
								</div>
								{/if}
								{if $item->two_popup}
								<div class="h-popup-container two-bedroom-container" style="display: none;">
									<a href="#" class="one-bedroom">One Bedroom</a>
									<h2>{$item->two_bedroom_title}</h2>
									<div class="b-popup-left">
										{if $item->two_bedroom_image}
										<table class="bordered-table">
											<tr>
												<td class="corners blt"></td>
												<td class="top-bottom bt"></td>
												<td class="corners brt"></td>
											</tr>
											<tr class="img">
												<td class="left-right bl"></td>
												<td class="bc">
													<img src="{cpf_config('APP.ACCOMODATION.URL')}{$item->two_bedroom_image}" alt="{$item->two_bedroom_image_alt|default:$item->two_bedroom_title}" />
												</td>
												<td class="left-right br"></td>
											</tr>
											<tr>
												<td class="corners blb"></td>
												<td class="top-bottom bb"></td>
												<td class="corners brb"></td>
											</tr>
										</table>
										{/if}	
									</div>
									<div class="b-popup-right">
										{$item->two_bedroom_popup_description}
										<div class="b-popup-right-footer">
											<div class="b-popup-right-footer-l">
												{if $item->two_bedroom_small_image}
												<table class="bordered-table">
													<tr>
														<td class="corners blt"></td>
														<td class="top-bottom bt"></td>
														<td class="corners brt"></td>
													</tr>
													<tr class="img">
														<td class="left-right bl"></td>
														<td class="bc">
															<img src="{cpf_config('APP.ACCOMODATION.URL')}{$item->two_bedroom_small_image}" alt="{$item->two_bedroom_small_image_alt|default:$item->two_bedroom_title}" />
														</td>
														<td class="left-right br"></td>
													</tr>
													<tr>
														<td class="corners blb"></td>
														<td class="top-bottom bb"></td>
														<td class="corners brb"></td>
													</tr>
												</table>
												{/if}	
											</div>
											<div class="b-popup-right-footer-r">
												<p>
													{$item->two_popup_image_description}
												</p>
												<div class="b-popup-right-footer-r-schema">
													<span>Standard hotel room floor plan, typically they are around 400 sq. feet.</span>
													<img src="static/images/frontend/accomodations/popup-schema.jpg" width="233" height="103"/>
												</div>
											</div>
										</div>
									</div>

								</div>
								{/if}
								<div class="h-popup-footer">
									<p>Kaanapali Alii versus Typical Hotel Room</p>
								</div>
							</div>

							{/if}
						</div>
						<div class="b-accomodation__buttons">



							<style>#ocn-frnt-btn a{ margin-left:302px;}</style>

							
							<div class="b-compare-and-review">
								<a href="#one-bedroom" class="compare-and-review" rel="accomodation-{$item->id}">Compare and Review</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{/foreach}
<div class="b-content-text-inner-sidebar-image">

       {*control name="frontend_banner" cache_ttl=$smarty.const.CPF_CACHE_TIME_NEVER*}
       <p>Hello</p>

 </div>