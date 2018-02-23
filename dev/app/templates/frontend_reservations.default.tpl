
{extends file='layouts/frontend.tpl'}

{block name='description'}{/block}
{block name='keywords'}{/block}
{block name='title'}{/block}

{block name='content'}

<div class="l-subheader clearfix" style="margin-bottom:25px;margin-top: 80px;">

  <div class="b-subgallery" style="position:relative;">

    <div class="b-content-image">
      <div class="h-image-bottom l-min-width">
        <div class="l-center h-image-bottom-wrapper">
          <div class="form-wraper">
            <div class="b-image-bottom-title h-image-bottom-i">Check Availability</div>
            
            <form action="{link rule='frontend_reservation'}" id="getpackge"  class="order-form">

              {if $web == "bluffhouse"}
              <input type="hidden"  name="web" value="bluffhouse" />
              {/if}

              <div class="avail-dib">
                <div class="b-image-bottom-datepick h-image-bottom-i">Arriving Between:</div>
                <div class="b-datepick h-image-bottom-i">
                  <input type="text" id="between" name="start" value="{trim($start)}" />
                </div>
              </div>
              <div class="avail-dib">
                <div class="b-image-bottom-datepick h-image-bottom-i">And:</div>
                <div class="b-datepick h-image-bottom-i">
                  <input type="text" id="and" name="end"  value="{trim($end)}"/>
                </div>
              </div>
              <div class="avail-dib">
                <div class="b-image-bottom-datepick h-image-bottom-i">With:</div>
                <div class="b-fake-select">
                  <div class="lineForm">
                    <select class="sel80" id="adults" name="adults" tabindex="2">
                      <option value="1">1 adult</option>
                      <option selected="selected" value="2">2 adults</option>
                      <option value="3">3 adults</option>
                      <option value="4">4 adults</option>
                      <option value="5">5 adults</option>
                      <option value="6">6 adults</option>
                      <option value="7">7 adults</option>
                      <option value="8">8 adults</option>
                      <option value="9">9 adults</option>
                      <option value="10">10 adults</option>
                      <option value="11">11 adults</option>
                      <option value="12">12 adults</option>
                      <option value="13">13 adults</option>
                      <option value="14">14 adults</option>
                      <option value="15">15 adults</option>
                      <option value="16">16 adults</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="avail-dib">
                <div class="h-button-wrapper">
                  <button type="button" class="b-view-button">View</button>
                </div>
              </div>
            </form>
            
            
          </div>
          <div class="clearfix"></div>
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