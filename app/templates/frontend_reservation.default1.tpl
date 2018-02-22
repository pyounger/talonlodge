
{extends file='layouts/frontend.tpl'}

{block name='description'}{/block}
{block name='keywords'}{/block}
{block name='title'}{/block}

{block name='content'}
<div class="l-subheader" style="margin-bottom:30px;margin-top: 120px;">
<div class="b-subgallery">
<div class="h-image-bottom l-min-width">
<div class="l-center h-image-bottom-wrapper">
<div class="form-wraper">
	<div class="b-image-bottom-title- b-image-bottom-title h-image-bottom-i">Check Availability</div>
	
    <form action="{link rule='frontend_reservation'}" method="get" class="order-form">
                    {if $web == "bluffhouse"}
                        <input type="hidden"  name="web" value="bluffhouse" />
                    {/if}
                                    
                    <div class="avail-dib">
                        <div class="b-image-bottom-datepick b-white-datepick h-image-bottom-i">Arriving Between:</div>
                        <div class="b-datepick b-datepick-white h-image-bottom-i">
                            <input type="text" id="between" name="start" value="{$start}" />
                        </div>
                    </div>                                       
                    
                    <div class="avail-dib">
                        <div class="b-image-bottom-datepick b-white-datepick h-image-bottom-i">And:</div>
                        <div class="b-datepick b-datepick-white h-image-bottom-i">
                            <input type="text" id="and" name="end" value="{$end}"/>
                        </div>
                    </div>
                    
                    <div class="avail-dib">
                        <div class="b-image-bottom-datepick b-white-datepick h-image-bottom-i">With:</div>
                        <div class="b-datepick-white-select b-fake-select">
                            <div class="lineForm">
                                <select class="sel80" id="adults" name="adults" tabindex="4">
                                    <option {if $adults == 1}selected="selected" {/if}value="1">1 adult</option>
                                    <option {if !$adults || $adults == 2}selected="selected" {/if}value="2">2 adults</option>
                                    <option {if $adults == 3}selected="selected" {/if}value="3">3 adults</option>
                                    <option {if $adults == 4}selected="selected" {/if}value="4">4 adults</option>
                                    <option {if $adults == 5}selected="selected" {/if}value="5">5 adults</option>
                                    <option {if $adults == 6}selected="selected" {/if}value="6">6 adults</option>
                                    <option {if $adults == 7}selected="selected" {/if}value="7">7 adults</option>
                                    <option {if $adults == 8}selected="selected" {/if}value="8">8 adults</option>
                                    <option {if $adults == 9}selected="selected" {/if}value="9">9 adults</option>
                                    <option {if $adults == 10}selected="selected" {/if}value="10">10 adults</option>
                                    <option {if $adults == 11}selected="selected" {/if}value="11">11 adults</option>
                                    <option {if $adults == 12}selected="selected" {/if}value="12">12 adults</option>
                                    <option {if $adults == 13}selected="selected" {/if}value="13">13 adults</option>
                                    <option {if $adults == 14}selected="selected" {/if}value="14">14 adults</option>
                                    <option {if $adults == 15}selected="selected" {/if}value="15">15 adults</option>
                                    <option {if $adults == 16}selected="selected" {/if}value="16">16 adults</option>
                                </select>
                            </div>
                        </div>
                    </div>             
                    
                    <div class="avail-dib">
                        <div class="h-button-wrapper h-button-white reservation-b">
                            <button type="submit" class="b-view-button"> 
                                View
                            </button>
                        </div>
                    </div>
                </form>

</div>
</div>
</div>
</div>
</div>
    <div class=" l-center" style="margin-bottom:50px;">
        <h1 class="baltica-plain">Available Package Dates</h1>
        
        <div>

            <div class="b-reservation-years clearfix" style="margin-bottom:30px;">
                {if $web == "bluffhouse"}
                    <div style = "float:right; font-family:verdana; font-size:14px"><strong>
                            <span id = "bluff_package">Bluff House Packages</span>
                            <span id = "stand_package">Standard Talon Lodge Packages</span>
                            <span id = "all_package" class = "aaa">All Packages</span>   </strong>     

                    </div>

                {else}
                    <div style = "float:right; font-family:verdana; font-size:14px"><strong>
                            <span id = "all_package" class = "aaa">All Packages</span>
                            <span id = "stand_package">Standard Packages</span>
                            <span id = "bluff_package">Bluff House Packages</span></strong>
                    </div>
                {/if}   
                {foreach from=$packages.years item='cyear' name='pyears'}
                    {if $year != $cyear}
                        <a href="{link rule='frontend_reservation'}?year={$cyear}">{$cyear} Packages</a>
                    {else}
                        {$cyear} Packages
                    {/if}
                    {if !$smarty.foreach.pyears.last} / {/if}
                {/foreach}

            </div>


        </div>


        <style>
            #all_package,#stand_package,#bluff_package{
                border: solid 1px #ccc;
                background: #E6E6E6;
                border-radius:4px;
                display: inline-block;
                padding: 5px;
                cursor: pointer;}




            #more{
                font-size:10.5px;
                color:#e1562d;
                font-family:font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
            }

            #more:hover{
                color:#FC5C1D;
            }
        </style>



        <div class="b-reservation-date">
            Packages for Adventures between <span>{$start}</span> and <span>{$end}</span>


        </div>

        {$count = $packages.list|@count}
        {math equation="ceil(c/2)" c=$count assign='half'}
        {$half_reached = false}
        {if $count > 0}
            <div class="h-reservation-list">
                <div class="b-reservation-column">
                    <ul>
                        {foreach from=$packages.list item='package' name='packages'}


                            <li class="{cycle values='no-bg,'} myli{$package->Account_ID}">
                                <!-- <a href="{link rule='frontend_reservation_view' slug=$package->slug}"> -->
                                <a href="reservation/{$package->slug}{if $web == 'bluffhouse'}?web=bluffhouse&adults={$adults} {/if}">

                                    <div class="b-reservation-i-l">
                                        <p style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:13.4px;"><strong>{$package->Package_Name}</strong></p>
                                        <p style="font-size:14px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">{$package->Package_Min_Days+1} Nights / {$package->Package_Min_Days} Days - {$package->Type_Of_Adventure}</p>
                                        <p style = "font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">(Arrival Dates Between: {$package->Arrival_Start_Date|datetime_format:"m/d/Y"} - {$package->Arrival_End_Date|datetime_format:"m/d/Y"})</p>

                                    </div>
                                    <div class="b-reservation-i-r">
                                        <p>${$package->Adult_Cost}</p>
                                        <p id = "more"><strong>More Details</strong></p>
                                    </div>
                                </a>
                            </li>

                            {if $smarty.foreach.packages.iteration >= $half && !$half_reached}
                                {$half_reached = true}
                            </ul>
                        </div>
                        <div class="b-reservation-column b-reservation-column-r">
                            <ul>
                            {/if}
                        {/foreach}
                    </ul>
                </div>
            </div>
            <p class="b-reservation-note">* All Rates are Per Person</p>
        {else}
            <div class="b-reservation-date">There are no packages available for the dates you selected, please select a different date range or package date.</div>
        {/if}

    </div>
{/block}

{block name='js_init'}

{/block}