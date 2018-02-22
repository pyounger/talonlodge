{extends file='layouts/frontend.tpl'}

{block name='description'}{/block}
{block name='keywords'}{/block}
{block name='title'}{/block}

{block name='content'}


<div class="b-reservation-view-wrapper l-center">

    <h1 class="baltica-plain pkgif">Package Information</h1>
    {if $web == "bluffhouse"}
    <h1 class="baltica-plain bb">Online Reservation</h1>
    {/if}
    <div class="btns">
        <a id = "preve" href = "http://www.talonlodge.com/reservation/?start={$start}&end={$end}&adults={$sessadults}">Previous Page</a>
        <a id = "preve" class="b-reservation-view-confirm resrvreq" href="#confirm"">Reservation Request</a>
    </div>

    {include file='includes/frontend.ui/frontend.errors.tpl'}
    {if $success}<p class="b-contacts-success">Your Reservation Request has been sent!</p>{/if}

    <div class="b-reservation-view-container">
        <div class="b-reservation-view-column">
            <div class="b-reservation-subcolumn">
                <div class="b-reservation-view-r">
                    <div class="b-reservation-view-l">

                        <p>{$PackageDetailByID[0].Package_Name}</p>

                        <h2>{$PackageDetailByID[0].Package_Min_Days+1} Nights / {$PackageDetailByID[0].Package_Min_Days} - {$PackageDetailByID[0].Type_Of_Adventure}</h2>
                        <p>{$package->ocdTFaccount_id}</p>
                        <p>{$slug}</p>
                        </br>
                        
                    </div>
                </div>
                <style>
                @media (min-width:280px) and (max-width:640px){
                    #vmd{
                        top:2% !important;
                        z-index:99;
                    }
                }

                @media (min-width:280px) and (max-width:420px){
                    .l-center {
                        width: 95% !important;
                        padding: 0 8px !important;
                    } 
                }
                    table, th, td {
                        border: 1px solid #bdbbbb;
                    }
                    table td {
                        padding: 0;
                        padding-left: 10px;
                    }
                    th {
                        background-color: #eeeeee !important;
                    }
                    #vmd {
                        position: fixed;
                        background: #fff;
                        width: 50%;
                        top: 15%;
                        left: 0;
                        right: 0;
                        margin: 0 auto;
                        padding: 5px;
                        height: auto;
                        border-radius: 10px;
                        border: 1px solid #c3c3c3;
                        z-index: 99999;
                    }
                    #vmd .modal-content .modal-header {
                    position: relative;
                    width: 100%;
                    height: 40px;
                    float: left;
                }

                #vmd .modal-content .close {
                    position: absolute;
                    right: 0;
                    top: 0;
                    padding: 8px;
                    font-size: 24px;
                    background: transparent;
                    font-weight: 700;
                }

                #vmd .modal-content .modal-body {
                    clear: both;
                }

                #vmd .modal-content .modal-footer {
                    font-size: 16px;
                    padding: 10px 20px;
                    text-align: left;
                }
                #vmd .modal-content .close:hover {
                    cursor: pointer;
                    color: #a93101;
                }
                #viewmdl:hover {
                    cursor: pointer;
                    color: #c52d00;
                }
                .b-reservation-view-price span {
                    float: left;
                    margin-top: 10px;
                }

                .b-reservation-view-price .ppdo {
                    float: left;
                    width: 100%;
                    margin-top: 6px;
                }
                .b-reservation-view-price {
                    height: 86px !important;
                }
                .b-reservation-right-top {
                    height: 96px;
                }
                .b-reservation-view-container{
                    float: left;
                }
                @media (min-width:280px) and (max-width: 768px){
                    #vmd {
                        width: 95% !important;
                    }
                    .pkgif{
                        width: 100% !important;
                    }
                    .btns{
                        float: left !important;
                        margin-top: 20px;
                    }
                }
                label#viewmdl {
                    color: blue;
                    text-decoration: underline;
                }
                #vmd .modal-content .modal-footer {
                    font-family: sans-serif;
                    font-size: 14px !important;
                    font-weight: bold;
                    text-align: justify;
                }
                .resrvreq {
                    width: auto;
                    height: auto;
                    margin: 0px 10px 0px 0px;
                }
                .pkgif{
                    width: fit-content;
                    float: left;
                    margin: 0 !important;
                }
                #fancy_outer {
                    position: fixed !important;
                    top: 15% !important;
                    z-index: 99999 !important;
                }
                </style>
                <div class="b-reservation-view-list">

                    <!-- ......added for new doc(Parvez) .....-->
                    <span class="b-reservation-view-title"><h2 style="font-size: 17px;">Available Accomodations:</h2></span>
                    <!-- </br> -->
                        <table>
                            <tr>
                                <th>Accomodation</th>
                                <th>Min Occupancy</th>
                                <th>Max Occupancy</th>
                                <th>Rate Per Person</th>
                            </tr>

                             {foreach $PackageDetail as $details}
                            <tr>
                                <td>{$details.Resource_Name}</td>
                                <td>{$details.Min_Occupancy} People</td>
                                <td>{$details.Max_occupancy} People</td>
                              {foreach $MatterPort as $matter}
                                {if $details.Resource_Name == $matter.Resource_Name}
                                <td>{$details.rate_per_person}  <label data-option="{$matter.Resource_Name}" data-source="{$matter.Matter_Port}" class="viewmdl" id="viewmdl" onclick="openThisUrl(this.getAttribute('data-source'), this.getAttribute('data-option'))">View</label></td>
                                                                  
                                    <input data-source="{$matter.Matter_Port}" type="hidden" id="murl" class="murl">
                                {/if}
                               {/foreach}  
                            </tr>
                            {/foreach}
                        </table>
                        </br></br>
<!-- m-edit start -->             
    <div class="viewoverlay" id="vmd" style="display:none;">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <iframe id="viewframe" src="https://my.matterport.com/show/?m=EgbkVaKAAqM" style="height:400px;width:100%;"></iframe>
        </div>
        <div class="modal-footer">
            Description: <span id="getRName"></span> 
        </div>
      </div>   
    </div>
<!-- m -edit ends  -->
                    <!-- ....EndSectin for new doc(Parvez)... -->
                    <span class="b-reservation-view-title">Package Includes:</span>

                     <ul>
                        {foreach $Package_IncludesByID as $li}
                        <li>&mdash; {$li}</li>
                        {/foreach}
                    </ul>
                </div>
                <div class="b-reservation-view-list">
                    <span class="b-reservation-view-title">Package Does Not Include:</span>

                    <ul>
                        {foreach $Package_DoesNot_IncludeByID as $li}
                        <li>&mdash; {$li}</li>
                        {/foreach}
                    </ul>
                </div>
            </div>
            <div class="b-reservation-subcolumn b-reservation-subcolumn-r">
            <span>Prices Range from:</span>
                <div class="b-reservation-view-price">

                    <span>${$LowestRate|truncate:4:""} to ${$HighestRate|truncate:4:""}</span>
                   <p class="ppdo">Per Person, Double Occupancy</p>
                </div>
                <div class="b-reservation-view-additional">
                
                     <span class="b-reservation-view-title">Package Details:</span><br>
    
                    <p>{$Package_Details}</p>           
                </div>
            </div>
        </div>
        
        <div class="b-reservation-view-column b-reservation-view-column-r">
         <div class="b-reservation-right-top">
            <p><span>Adventure type:</span> {$PackageDetailByID[0].Type_Of_Adventure}{*$package->Type_Of_Adventure*}</p>
            <p><span>Species:</span> {$PackageDetailByID[0].Associated_Species}{*$package->Associated_Species*}</p>
        </div>
        <div class="b-reservation-view-additional-details">

            <span class="b-reservation-view-title">Package Fees and Terms:</span><br>

            <p>{$PackageDetailByID[0].Package_Fees}</p><br>
            <p>{$PackageDetailByID[0].Package_Terms}</p>
        </div>
        <div class="b-reservation-view-deposit">
            <span class="b-reservation-view-title">Deposit:</span>
            <p>{*$package->Adult_Deposit*}{$PackageDetailByID[0].Adult_Deposit|truncate:4:""} / Person</p>
        </div>
        <div class="b-reservation-view-arrival-confirm">
            <div class="b-reservation-view-arrival">

                <p><span>Arrival Dates:</span> {$PackageDetailByID[0].Arrival_Start_Date|date_format:"%m/%d/%Y"}</p>
            </div>
            
            {if $web == "bluffhouse"}
            <a id="open_popup" class="open_popup"></a> 
            {else}
            <a class="b-reservation-view-confirm" href="#confirm">
                {/if}
            </a>
            
        </div>
    </div>

</div>

<div id="confirm" style="display: none">
   
    <form action="{$cpf_url_current}" method="post" id="cpf-page-form">
     <h3 class="b-reservation-popup-info">{$PackageDetailByID[0].Package_Name}</h3>
     <p class="b-reservation-popup-info"><span>Arrival Dates:</span> {$PackageDetailByID[0].Arrival_Start_Date|date_format:"%m/%d/%Y"}&ndash;{$PackageDetailByID[0].Arrival_End_Date|date_format:"%m/%d/%Y"}</p>
     <p class="b-reservation-popup-info"><span>Min People:</span> {$sessadults}</p>

            <input type="hidden" name="lodge_account_ID" id="lodge_account_ID" value="{$PackageDetailByID[0].Account_ID}">

            <input type="hidden" name="Package_Name" id="Package_Name" value="{$PackageDetailByID[0].Package_Name}"> 

            <input type="hidden" name="Pms_Package_ID" id="Pms_Package_ID" value="{$PackageDetailByID[0].Pms_Package_ID}">

            <input type="hidden" name="Arrival_Start_Date" id="Arrival_Start_Date" value='{$PackageDetailByID[0].Arrival_Start_Date|date_format:"%m/%d/%Y"}'>

            <input type="hidden" name="Num_Adults" id="Num_Adults" value="{$sessadults}">

            <input type="hidden" name="oid" value="00D300000000HQz">

            <input type="hidden" name="retURL" value="http://www.talonlodge.com/store/ebrochure_thanks.asp">
          
     <div class="b-brochure-input-r">
        <div class="b-brochure-input-l">
            <input type="text" id="popup-first-name" name="firstName" value="{$firstName}" required placeholder="First Name: *" />
        </div>
    </div>
    <div class="b-brochure-input-r">
        <div class="b-brochure-input-l">
            <input type="text" id="popup-last-name" name="lastName" value="{$lastName}" required placeholder="Last Name: *" />
        </div>
    </div>
    <div class="b-brochure-input-r">
        <div class="b-brochure-input-l">
            <input type="email" id="popup-email" name="email" value="{$email}" required placeholder="Email: *" />
        </div>
    </div>
    <div class="b-brochure-input-r">
        <div class="b-brochure-input-l">
            <input type="text" id="popup-home-phone" name="phone" value="{$phone}" required placeholder="Phone: *"/>
        </div>
    </div>
    <textarea id="popup-comments" name="comments">{$comments}</textarea>
    <div class="b-popup-footer">
        <button type="submit"></button>
    </div>
    
</form>
</div> 

{isset($_SESSION['reservation_adults'])}

<div id="popup" class="popup-bg" style="display:none;" >
    <div class="popup-container">
        <div class="popup-close"></div>
        <span id="success_msg" class="success_msg"></span>
        <div id="form-reservation">
            <h3 class="b-reservation-popup-info">{$package->Package_Name}</h3>
            <p class="b-reservation-popup-info"><span>Arrival Dates:</span> {$package->Arrival_Start_Date|datetime_format:'m/d/Y'}&ndash;{$package->Arrival_End_Date|datetime_format:'m/d/Y'}</p>
            <p class="b-reservation-popup-info"><span>Min People:</span> {$reservation_adults|default:$package->Package_Min_People}</p>
            <span id="form_error" class="form_error"></span>
            

            <input type="hidden" name="lodge_account_ID" id="lodge_account_ID" value="{$package->Account_ID}">

            <input type="hidden" name="Package_Name" id="Package_Name" value="{$package->Package_Name}"> 

            <input type="hidden" name="Pms_Package_ID" id="Pms_Package_ID" value="{$package->Pms_Package_ID}">

            <input type="hidden" name="Arrival_Start_Date" id="Arrival_Start_Date" value="{$package->Arrival_Start_Date->format('m/d/Y')}">

            <input type="hidden" name="Adult_Cost" id="Adult_Cost" value="{$package->Adult_Cost}">
            
            <input type="hidden" name="Num_Adults" id="Num_Adults" value="{$bipin}">
            
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="firstName" name="firstName" placeholder="Frist Name" />
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="lastName" name="lastName"  placeholder="Last Name"/>
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="email" name="email" placeholder="Email"/>
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="phone" name="phone" placeholder="Phone"/>
                </div>
            </div> 
            <textarea id="comments" name="comments" class="comments" placeholder="Comments"> </textarea>
            <div class="b-popup-footer">
                <a id="submitme" class="submit-popup"></a>
            </div> 
        </div>             
    </div>
</div>
<!-- <a id="submitme"> Click Here </a> -->
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
    cforms.push($('input#popup-first-name').compactform({ text: ''}));
    cforms.push($('input#popup-last-name').compactform({ text: ''}));
    cforms.push($('input#popup-email').compactform({ text: ''}));
    cforms.push($('input#popup-home-phone').compactform({ text: ''}));
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