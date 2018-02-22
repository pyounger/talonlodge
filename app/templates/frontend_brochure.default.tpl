{extends file='layouts/frontend.tpl'}



{block name='description'}{/block}

{block name='keywords'}{/block}

{block name='title'}{/block}



{block name='content'}

<div class="b-brochure-wrapper l-center">

	<h1 class="baltica-plain">Order Your Talon Lodge Brochure Today</h1>



	{include file='includes/frontend.ui/frontend.errors.tpl'}

	{if $success}

	<p class="b-contacts-success">Thank you for your brochure request.<br />Please check your e-mail account and you will find that we have already e-mailed you our Talon Lodge eBrochure.</p>

	{else}



	<p>To receive our list of Special Offers, Available Package Dates and our Talon Lodge Print Brochure and eBrochure</p>

	<p><strong>Please complete the following form:</strong></p>





	<div class="b-brochure-form-wrap">

		<form action="{link rule='frontend_brochure'}" method="post" id="cpf-page-form">

			<div class="b-brochure-form-left">

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="hidden" name="txtPackageCode" value="2x1LMSks3d" />

						<input type="hidden" name="txtBrochureCode" value="n8uGa7XguV" />

						<input type="hidden" name="txtReceiptURL" value="http://www.magnusadventures.com/talonlodge/ebrochure/thanks.asp" />

						<input type="hidden" name="txtAccount" value="http://www.magnusadventures.com/talonlodge/ebrochure/thanks.asp" />

						<input type="hidden" name="magnus_accountid" value="7" />

						<input type="hidden" name="txtPassword" value="" />

						<input type="hidden" name="txtResAccount" value="" />

						<input type="hidden" name="txtCampaign" value="" />

						<input type="hidden" name="txtSubject" value="Talon Lodge - EBROCHURE REQUEST" />

						<input type="hidden" name="txtPropertyNumber" value="1-800-536-1864" />

						<input type="hidden" name="txtPackageType" value="Consumer" />

						<input type="hidden" name="txtUnit" value="T" />

						<input type="hidden" name="txtTCURL" value="" />

						<input type="hidden" name="txtSFURL" value="http://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" />

						<input type="hidden" name="lead_source" value="Talon EBrochure" />

						<input type="hidden" name="00N30000000dSVA" value="" />

						<input type="hidden" name="00N30000000dhSo" value="Yes" />

						<input type="hidden" name="00N30000000dhSf" value="Yes" />

						<input type="hidden" name="00N30000000dhSh" value="No" />

						<input type="hidden" name="00N30000000dhQT" value="" />

						<input type="hidden" name="oid" value="00D300000000HQz" />

						<input type="hidden" name="retURL" value="http://www.talonlodge.com/store/ebrochure_thanks.asp" />

						<input type="hidden" name="recordType" value="0123000000001TT" />

						<input type="text" id="firstName" name="txtFirstName" value="{$txtFirstName}"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="lastName" name="txtLastName" value="{$txtLastName}" />

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="company-name" name="txtCompany" value="{$txtCompany}"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="email" name="txtEmail" value="{$txtEmail}"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="home-phone" name="txtPhone2" value="{$txtPhone2}"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="work-phone" name="txtPhone1" value="{$txtPhone1}"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="cell-phone" name="txtPhone3" value="{$txtPhone3}"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="fax" name="txtFax" value="{$txtFax}"/>

					</div>

				</div>

			</div><!-- /.b-brochure-form-left -->

			<div class="b-brochure-form-center">

				<div class="b-country-select">

					<select class="sel80" id="country" name="txtCountry" tabindex="2">

						<option value="" style="display: none;">Country:</option>

						<option value="United States of America" {if $txtCountry == 'United States of America'} selected="selected"{/if}>United States of America</option>

						{foreach $countries as $country}

						{if 'United States of America' != $country.title}

						<option value="{$country.title}" {if $txtCountry == $country.title} selected="selected"{/if}>{$country.title}</option>

						{/if}

						{/foreach}

					</select>

				</div>

				<br clear="all" />

				<div class="rasporka"></div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="address-1" name="txtAddress1" value="{$txtAddress1}"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="address-2" name="txtAddress2" value="{$txtAddress2}"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="town" name="txtCity" value="{$txtCity}"/>

					</div>

				</div>

				<div class="b-state-select" id="main-state">

					<select class="sel80" id="state-select" name="txtState" tabindex="2">

						<option value="" style="display: {if $txtCountry == 'United States of America'}block{else}none{/if};">State:</option>

						{foreach $states as $state}

						<option value="{$state.id}"{if $txtState == $state.id} selected="selected"{/if}>{$state.title}</option>

						{/foreach}

					</select>

				</div>

				<div class="b-brochure-input-r" id="other-state" style="display: {if $txtCountry == 'United States of America'}none{else}block{/if};">

					<div class="b-brochure-input-l">

						<input type="text" id="stateOther" value="{$txtStateOther}" name="txtStateOther" />

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="postal" name="txtZIP" value="{$txtZIP}"/>

					</div>

				</div>



			</div>

			<div class="b-brochure-form-right">

				<div class="b-brochure-date date-1">

					<input id="arrival" type="text" name="txtCheckinDate" value="{$txtCheckinDate}"/>

				</div>

				<div class="b-brochure-date date-2">

					<input id="arrival-2"type="text" name="txtCheckinDate2" value="{$txtCheckinDate2}"/>

				</div>

				<div class="b-selects-row">

					<div class="b-fishing-guests-select">

						<select class="sel-small cusel-small" name="txtTotalFishing" id="fishing-guests" tabindex="2">

							<option value="0" style="display: none;">Number of Guests:</option>

							{section name=cnt start=1 loop=25 step=1}

							<option value="{$smarty.section.cnt.index}" {if $txtTotalFishing == $smarty.section.cnt.index} selected="selected"{/if}>{$smarty.section.cnt.index}</option>

							{/section}

						</select>

					</div>

					<!-- <div class="b-non-fishing-guests-select">

						<select class="sel-small cusel-small right" name="txtTotalNotFishing" id="non-fishing-guests" tabindex="2">

							<option value="0" style="display: none;">No. of Non-Fishing Guests:</option>

							{section name=cnt start=1 loop=20 step=1}

							<option value="{$smarty.section.cnt.index}" {if $txtTotalNotFishing == $smarty.section.cnt.index} selected="selected"{/if}>{$smarty.section.cnt.index}</option>

							{/section}

						</select>

					</div> -->

				</div>

				<div class="b-how-many-times-select">

					<select class="sel80 cusel-small" id="how-many-times" name="txtTotalPreviousTrips" tabindex="2">

						<option value="" style="display: none;">No. times you have been to Alaska before?:</option>

						<option value="1" {if $txtTotalPreviousTrips == '1'}selected="selected"{/if}>1</option>

						<option value="2" {if $txtTotalPreviousTrips == '2'}selected="selected"{/if}>2</option>

						<option value="3" {if $txtTotalPreviousTrips == '3'}selected="selected"{/if}>3</option>

						<option value="4" {if $txtTotalPreviousTrips == '4'}selected="selected"{/if}>4</option>

						<option value="5+" {if $txtTotalPreviousTrips == '5+'}selected="selected"{/if}>5+</option>

					</select>

				</div>

				<div class="b-purpose-select">

					<select class="sel80" id="purpose" name="txtTravelPurpose" tabindex="2">

						<option value="" style="display: none;">Purpose of Travel:</option>

						<option value="None" {if $txtTravelPurpose == 'None'}selected="selected"{/if}>None</option>

						<option value="Family Group" {if $txtTravelPurpose == 'Family Group'}selected="selected"{/if}>Family Group</option>

						<option value="Friend Group" {if $txtTravelPurpose == 'Friend Group'}selected="selected"{/if}>Friend Group</option>

						<option value="Corporate Group" {if $txtTravelPurpose == 'Corporate Group'}selected="selected"{/if}>Corporate Group</option>

					</select>

				</div>

				<div class="b-main-package">

					<select class="sel80" id="package" name="txtMainPackageInterest" tabindex="2">

						<option value="" style="display: none;">Main Package Interest?:</option>

						<option value="Saltwater Sportfishing" {if $txtMainPackageInterest == 'Saltwater Sportfishing'}selected="selected"{/if}>Saltwater Sportfishing</option>

						<option value="Freshwater Fly Fishing" {if $txtMainPackageInterest == 'Freshwater Fly Fishing'}selected="selected"{/if}>Freshwater Fly Fishing</option>

						<option value="Combo Salt and Fresh" {if $txtMainPackageInterest == 'Combo Salt and Fresh'}selected="selected"{/if}>Combo Salt and Fresh</option>

						<option value="Alaska Advanture & Photo Tour" {if $txtMainPackageInterest == 'Alaska Advanture & Photo Tour'}selected="selected"{/if}>Alaska Advanture & Photo Tour</option>

					</select>

				</div>

				<div class="b-brochure-send-news">

					<div class="b-brochure-send-news-l">

						<p>Please continue to send me Talon Lodge offers?:</p>

						<div class="b-brochure-radio">

							<input type="radio" name="txtOptin" id="radio-yes" value="Yes" {if $txtOptin == 'Yes'}checked="checked"{/if} /><label for="radio-yes">Yes</label>

							<input type="radio" name="txtOptin" id="radio-no" value="No" {if $txtOptin == 'No'}checked="checked"{/if}/><label for="radio-no">No</label>

						</div>

					</div>

					<div class="b-how-do-you-know">

						<select class="sel80" id="know" name="txtHowDidYouHear" tabindex="2">

							<option value="" style="display: none;">How did you hear about us?:</option>

							<option value="Brochures" {if $txtHowDidYouHear == 'Brochures'}selected="selected"{/if}>Brochures</option>

							<option value="E-mail Correspondence" {if $txtHowDidYouHear == 'E-mail Correspondence'}selected="selected"{/if}>E-mail Correspondence</option>

							<option value="Hotel Website" {if $txtHowDidYouHear == 'Hotel Website'}selected="selected"{/if}>Hotel Website</option>

							<option value="Internet" {if $txtHowDidYouHear == 'Internet'}selected="selected"{/if}>Internet</option>

							<option value="Newspapers" {if $txtHowDidYouHear == 'Newspapers'}selected="selected"{/if}>Newspapers</option>

							<option value="Radio" {if $txtHowDidYouHear == 'Radio'}selected="selected"{/if}>Radio</option>

							<option value="Reffered by Friend" {if $txtHowDidYouHear == 'Reffered by Friend'}selected="selected"{/if}>Reffered by Friend</option>

							<option value="Repeat Guest" {if $txtHowDidYouHear == 'Repeat Guest'}selected="selected"{/if}>Repeat Guest</option>

						</select>

					</div>

					<textarea id="comments" name="txtComments">{$txtComments}</textarea>

					<br />

					<br />

					<div class="b-captcha">

						<div class="b-brochure-input-r">

							<div class="b-brochure-input-l">

								<input type="text" id="captcha" name="captcha" maxlength="255" />

							</div>

						</div>

						<div class="b-captcha-img">

							<img id="captcha-img" src="{link rule='frontend_captcha' rand=time()}" width="95" height="42" alt=""/>

							<a id="captcha-reload" href="#">

								<img src="static/images/frontend/contactus/refresh.png" width="16" height="17" alt=""/>

							</a>

						</div>

					</div>							

					<button type="submit" name="btnSubmit"></button>

				</div>



			</div>

		</form>

	</div>



	{/if}

</div>

{/block}

{block name='js_init'}



$('.b-country-select span').click(function(){

var id = $(this).attr('val');

if (id == 'United States of America')

{

	$('#main-state').show();

	$('#other-state').hide();

}

else

{

	$('#main-state').hide();

	$('#other-state').show();

}

});



var cforms = [];

$('#firstName').compactform({ text: 'First Name: *'});

$('#lastName').compactform({ text: 'Last Name: *'});

$('#company-name').compactform({ text: 'Company Name:'});

$('#email').compactform({ text: 'Email: *'});

$('#home-phone').compactform({ text: 'Home Phone:'});

$('#work-phone').compactform({ text: 'Work Phone:'});

$('#cell-phone').compactform({ text: 'Cell Phone:'});

$('#fax').compactform({ text: 'Fax:'});

$('#address-1').compactform({ text: 'Address 1:'});

$('#address-2').compactform({ text: 'Address 2:'});

$('#town').compactform({ text: 'City:'});

$('#postal').compactform({ text: 'Postal/ZIP Code:'});

$('#stateOther').compactform({ text: 'Province/Region:'});

$('#arrival').compactform({ text: 'Arrival Date First Choice:'});

$('#arrival-2').compactform({ text: 'Arrival Date Second Choice:'});

$('#comments').compactform({ text: 'Special Requirements, Comments, other Notes:'});

$('#captcha').compactform({ text: 'Enter Anti-Spam Code:'});

$('#message').compactform({ text: 'Question/Message:'});



$('#captcha-reload').click(function(){

$('#captcha-img').attr('src', '{link rule='frontend_captcha' rand=0}?' + new Date().getTime());

return false;

});



{capture name='validation_rules'}

rules:

{

	txtFirstName: { required: true },

	txtLastName: { required: true },

	txtEmail: {

	required: true,

	email: true

},

captcha: {

required: true,

digits: true

}

},

messages:

{

	txtFirstName: '',

	txtLastName: '',

	txtEmail: {

	required: '',

	email: ''

},

captcha: {

required: '',

digits: ''

},		

message: ''

},

highlight: function(element)

{

	$(element).parents('.b-brochure-input-r').addClass('error');

	$(element).parents('.b-contactus-form-r').addClass('error');

},

unhighlight: function(element)

{

	$(element).parents('.b-brochure-input-r').removeClass('error');

	$(element).parents('.b-contactus-form-r').removeClass('error');

},

focusInvalid: false,

errorPlacement: function(error, element) {

error.appendTo( );

},

invalidHandler: function()

{

	$('#cpf-page-form input').each(function(){

	var cf = $(this).data('compactForm');

	if (cf)

	{

	cf.Refresh();

}

});

}

{/capture}

{cpf_validator rules=$smarty.capture.validation_rules noscript=true}



{/block}

