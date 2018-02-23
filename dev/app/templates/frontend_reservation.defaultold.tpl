
{extends file='layouts/frontend.tpl'}
{block name='description'}{/block}
{block name='keywords'}{/block}
{block name='title'}{/block}

{block name='content'}


<div class="b-reservation-wrapper l-center">
  <h1 class="baltica-plain">Available Package Dates</h1>
   {*foreach from=$ResourceJoin item='Res' name='ResourceJoin'*}
   {*$Res.Pms_Resource_ID*}
   {*if $Res.Pms_Package_ID == 744*}

      <!-- <span>{$Res.Pms_Package_ID}</span>--<span>{$Res.Pms_Resource_ID}</span></br> -->
   {*/if*}
   {*$Res|@debug_print_var*}
   {*/foreach*}
   {*$packages|@debug_print_var*}
   {*$Res.Pms_Resource_ID*}
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
        <span id = "bluff_package">Bluff House Packages</span>
        <!-- <ul class="packButton" style="display: inline;">
       <li id="alink"><a href="{link rule='frontend_reservation'}?yy={$cyear}&adults={$adults}">All Packages</li></a>
        <span id = "stand_package">Standard Packages</span>
        <li><a href="{link rule='frontend_reservation'}?fill=bluff&adults=6">Bluff House Packages</li></a>
        </ul> --></strong>
      </div>
      {/if}   
      <ul class="packButton">
      {foreach from=$packages.years item='cyear' name='pyears'}
      {*$year*}{*$cyear*}
      {*if $year != $cyear*}
    
      <li id="flink"><a href="{link rule='frontend_reservation'}?yy={$cyear}&adults={$adults}">{$cyear} Packages</a></li>
      {*else*}

      <li id="llink"><a href="{link rule='frontend_reservation'}?start=05/01/{$cyear+1}&end=09/30/{$cyear+1}&adults={$adults}">{$year} Packages</a> </li>   
    
      {*/if*}


      {if !$smarty.foreach.pyears.last} {/if}
      {/foreach}
    </ul> 
    </div>


  </div>

  <script type="text/javascript">

       function getParameterByName(name, url) {
        if (!url) url = window.location.href;
         name = name.replace(/[\[\]]/g, "\\$&");
         var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
         if (!results) return null;
         if (!results[2]) return '';
         return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

         var getYear = getParameterByName('yy');
         if (getYear == 2018) {
            var d = document.getElementById("flink");
            d.className += "active";
            var al = document.getElementById("alink");
            al.className += "active";
         }

        var start = getParameterByName('start'); 
        var end = getParameterByName('end'); 
        var cropdate = end.substring(6);
        var yahi = new Date(end);
        var thiktohai = yahi.getFullYear();

        //....added by (Parvez)

          if (thiktohai == "2019") {

          var d = document.getElementById("llink");
          d.className += "active";

          }else{

              var d = document.getElementById("flink");
              d.className += "active";
         }

  </script>

  <script type="text/javascript">
    
         if (window.location.href == "http://www.dev.talonlodge.com/reservation/")
          {
             var db = document.getElementById("flink");
              db.className += "active";
          }
          else if (window.location.href == "http://www.dev.talonlodge.com/reservation/?fill=bluff&adults=6") {

            var db = document.getElementById("flink");
              db.className += "active";

          }
          else{

          }
          
  </script>
  
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
        font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;}

      #bluff_package1{
        background: #a93101;
        display: inline-block;
        padding-bottom: 3px;
        padding: 5px 10px;
        border-radius: 4px;
        border: solid 1px #ccc;
      }
      #bluff_package1 a{
        color:#fff;
        text-decoration: none;
        font-weight: 600;
        font-size: 12px;
        font-family: verdana;
      }
      #bluff_package2{
        background: #E6E6E6;
        display: inline-block;
        padding-bottom: 3px;
        padding: 5px 10px;
        border-radius: 4px;
        border: solid 1px #ccc;
      }
      #bluff_package2 a{
        color:#333;
        text-decoration: none;
        font-weight: 600;
        font-size: 12px;
        font-family: verdana;
      }
      .packButton li{
        background: #e6e6e6;
        display: inline-block;
        padding-bottom: 3px;
        padding: 5px 10px;
        border-radius: 4px;
        border: solid 1px #ccc;
      }
      .packButton li a{
        color:#333;
        text-decoration: none;
        font-weight: 600;
        font-size: 12px !important;
        font-family: verdana;
      }
      .packButton li.active{
        background: #a93101;
        display: inline-block;
        padding-bottom: 3px;
        padding: 5px 10px;
        border-radius: 4px;
        border: solid 1px #ccc;
      }
      .packButton li.active a{
        color:#fff;
        text-decoration: none;
        font-weight: 600;
        font-size: 12px !important;
        font-family: verdana;
      }
      .b-reservation-wrapper .b-reservation-date {
    margin-top: 0;}

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

         
          <!-- <li class="{cycle values='no-bg,'} myli{$package->Account_ID}"> -->
          <li class="{cycle values='no-bg,'} myli{if $package->resource_name_fn=='Bluff House'}185{else}7{/if}">
            <!-- <a href="{link rule='frontend_reservation_view' slug=$package->slug}"> -->
            <a href="reservation/{$package->slug}{if $web == 'bluffhouse'}?web=bluffhouse&adults={$adults} {/if}">

              <div class="b-reservation-i-l">
                <p style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:13.4px;"><strong>{$package->Package_Name}</strong></p>
                <p style="font-size:14px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">{$package->Package_Min_Days+1} Nights / {$package->Package_Min_Days} Days - {$package->Type_Of_Adventure}</p><br>
                {*$package->Package_Min_Adults*}
                {*$package->Package_Max_Adults*}

                <p style = "font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">(Arrival Dates Between: {$package->Arrival_Start_Date|datetime_format:"m/d/Y"} - {$package->Arrival_End_Date|datetime_format:"m/d/Y"})</p>

              </div>
              <div class="b-reservation-i-r">
                   <!-- <h5>${*$package->Pms_Package_ID*}</h5> -->
                {*if $package->Account_ID == "185"*}  
                {*$package->Pms_Package_ID*}
                {if $package->resource_name_fn == "Bluff House"}            
                <h5>Bluff House</h5>
                  
                {else}
                <h5>Talon Lodge</h5>
                {/if}
                <p>${$package->Adult_Cost}</p>
               <!--  <p>${$package->resource_cost_fn|truncate:4:""}</p> -->
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