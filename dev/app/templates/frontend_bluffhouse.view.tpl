{extends file='layouts/frontend.tpl'}

{block name='description'}{/block}
{block name='keywords'}{/block}
{block name='title'}{/block}

{block name='content'}


<div class="b-reservation-view-wrapper l-center">
    <h1 class="baltica-plain">Online Reservation</h1>
    
    {*
    <div class="b-reservation-date">
        Packages for Adventures between <span>5/23/2012</span> and <span>1/10/2013</span>
    </div>
    *}
    {include file='includes/frontend.ui/frontend.errors.tpl'}
    {if $success}<p class="b-contacts-success">Thank you for your reservation request!</p>{/if}

    <div class="b-reservation-view-container">
        <div class="b-reservation-view-column">
            <div class="b-reservation-subcolumn">
                <div class="b-reservation-view-r">
                    <div class="b-reservation-view-l">
                        <p>{$package->Package_Name}</p>
                        <h2>{$package->Package_Min_Days+1} Nights / {$package->Package_Min_Days} - {$package->Type_Of_Adventure}</h2>
                        <p>{$package->ocdTFaccount_id}</p>
                        <p>{$slug}</p>

                        <span>
                        Minimum 
                        {if $package->Package_Min_People == 1}
                           Single Occupancy
                        {else if $package->Package_Min_People == 2}
                            Double Occupancy
                        {else if  $package->Package_Min_People == 3}
                            Triple Occupancy
                        {else if $package->Package_Min_People == 4}
                            Quad Occupancy
                        {else} 
                           {$package->Package_Min_People} People 
                        {/if} /



                        </span>
                       <span> {$Resource_Name} </span>
                       
                      
                    </div>
                </div>
                <div class="b-reservation-view-list">
                    <span class="b-reservation-view-title">Package Includes:</span>
                    <ul>
                        {foreach $package->Package_Includes as $li}
                        <li>&mdash; {$li}</li>
                        {/foreach}
                    </ul>
                </div>
                <div class="b-reservation-view-list">
                    <span class="b-reservation-view-title">Package Does Not Include:</span>
                    <ul>
                        {foreach $package->Package_DoesNot_Include as $li}
                            <li>&mdash; {$li}</li>
                        {/foreach}
                    </ul>
                </div>
            </div>
            <div class="b-reservation-subcolumn b-reservation-subcolumn-r">
                <div class="b-reservation-view-price">
                    <span>${$package->Adult_Cost}</span>
                    <p>Per Person USD</p>
                </div>
                <div class="b-reservation-view-additional">
                    <span class="b-reservation-view-title">Additional Fees:</span>
                    <p>{$package->Package_Fees}</p>
                </div>
            </div>
        </div>
        <div>
        <a id = "preve" href = "http://www.dev.talonlodge.com/reservation/">Previous Page</a>
        </div>
        <div class="b-reservation-view-column b-reservation-view-column-r">
			<div class="b-reservation-right-top">
				<p><span>Adventure type:</span> {$package->Type_Of_Adventure}</p>
				<p><span>Species:</span> {$package->Associated_Species}</p>
			</div>
            <div class="b-reservation-view-additional-details">
                <span class="b-reservation-view-title">Additional Package Details</span>
                <p>{$package->Package_Details}</p>
            </div>
            <div class="b-reservation-view-deposit">
                <span class="b-reservation-view-title">Deposit:</span>
                <p>{$package->Adult_Deposit} / Person</p>
            </div>
            <div class="b-reservation-view-arrival-confirm">
                <div class="b-reservation-view-arrival">
                    <p><span>Arrival Dates:</span> {$package->Arrival_Start_Date|datetime_format:'m/d/Y'}</p>
                </div>
                <a class="b-reservation-view-confirm" href="#confirm">
                </a>
            </div>
        </div>

    </div>
    <div id="confirm" style="display: none">
        <form action="{$cpf_url_current}" method="post" id="cpf-page-form">
			<h3 class="b-reservation-popup-info">{$package->Package_Name}</h3>
			<p class="b-reservation-popup-info"><span>Arrival Dates:</span> {$package->Arrival_Start_Date|datetime_format:'m/d/Y'}&ndash;{$package->Arrival_End_Date|datetime_format:'m/d/Y'}</p>
			<p class="b-reservation-popup-info"><span>Min People:</span> {$reservation_adults|default:$package->Package_Min_People}</p>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="popup-first-name" name="firstName" value="{$firstName}" />
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="popup-last-name" name="lastName" value="{$lastName}" />
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="popup-email" name="email" value="{$email}"/>
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="popup-home-phone" name="phone" value="{$phone}"/>
                </div>
            </div>
            <textarea id="popup-comments" name="comments">{$comments}</textarea>
            <div class="b-popup-footer">
                <button type="submit"></button>
            </div>
        </form>
    </div>
</div>
    {capture name='validation_rules'}
        rules:
        {
            firstName: { required: true },
            lastName: { required: true },
            email: {
                required: true,
                email: true
            }
        },
        messages:
        {
            firstName: '',
            lastName: '',
            email: {
                required: '',
                email: ''
            }
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
        invalidHandler: function() {
        }
    {/capture}

{/block}

{block name='js_init'}
    $("a.b-reservation-view-confirm").data('cforms', []);
    $("a.b-reservation-view-confirm").fancybox({
        "callbackOnShow" : function(){
            var cforms = $("a.b-reservation-view-confirm").data('cforms');
            if (cforms.length == 0)
            {
                cforms = [];
                cforms.push($('input#popup-first-name').compactform({ text: 'First Name: *'}));
                cforms.push($('input#popup-last-name').compactform({ text: 'Last Name: *'}));
                cforms.push($('input#popup-email').compactform({ text: 'Email: *'}));
                cforms.push($('input#popup-home-phone').compactform({ text: 'Phone: '}));
                cforms.push($('textarea#popup-comments').compactform({ text: 'Special Requirements, Comments, other Notes:'}));
                {cpf_validator rules=$smarty.capture.validation_rules noscript=true}
            }
            else
            {
                $('#cpf-page-form input').each(function(){
                    var cf = $(this).data('compactForm');
                    if (cf)
                    {
                        cf.Refresh();
                    }
                });
            }
        },
        "padding" : 0,
        "imageScale" : false,
        "zoomOpacity" : false,
        "zoomSpeedIn" : 1000,
        "zoomSpeedOut" : 1000,
        "zoomSpeedChange" : 1000,
        "frameWidth" : 350,
        "frameHeight" : 500,
        "overlayShow" : true,
        "overlayOpacity" : 0.8,
        "hideOnContentClick" :false,
        "centerOnScroll" : false
    });
{/block}