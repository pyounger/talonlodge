
{extends file='layouts/frontend.tpl'}
{block name='description'}{/block}
{block name='keywords'}{/block}
{block name='title'}{/block}

{block name='content'}


<div class="b-reservation-wrapper l-center">
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
        <span id = "all_package" class = "aaa" onclick="clickbuton('all_package')" >All Packages</span>
        <span id = "stand_package" onclick="clickbuton('stand_package')" >Standard Packages</span>
        <span id = "bluff_package" onclick="clickbuton('bluff_package')" >Bluff House Packages</span>
        </strong>
      </div>
      {/if}   
      
      <ul class="packButton">

      {assign var="year" value=2019}
      {assign var="cyear" value=2018}

      <li id="flink"><a onclick="clickbutonYearCopy('{$cyear}')" >{$cyear} Packages</a></li>

      <li id="llink"><a  onclick="clickbutonYearCopy('{$year}')">{$year} Packages</a> </li>   

    </ul> 
    <input type="hidden" id="selectyear" value="">
    <input type="hidden" id="getadults" value="">
    <input type="hidden" id="enddate" value="">
    <input type="hidden" id="startdate" value="">
    </div>


  </div>

  <script type="text/javascript">
      
      $('.b-view-button').click(function(){
          var dpStart = $('#between').val().trim();
          var dpEnd = $('#and').val().trim();
          var adlt = $('#adults').val().trim();          
          window.location.href=window.location.origin+"/reservation/?start="+dpStart+"&end="+dpEnd+"&adults="+adlt;          
          return false;
      });
          
        function clickbutonYearCopy(nextYear) {
          //alert(nextYear);
          var dpStarts = '05/01/'+nextYear;
          var dpEnds = '09/30/'+nextYear;
          var adlts = $('#adults').val().trim();          
        window.location.href=window.location.origin+"/reservation/?start="+dpStarts+"&end="+dpEnds+"&adults="+adlts;          
          return false;
        }
      
      var AllData = {};
      var PriceData = {};
      var newPrice = "";

       function getParameterByName(name, url) {
        if (!url) url = window.location.href;
         name = name.replace(/[\[\]]/g, "\\$&");
         var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
         if (!results) return null;
         if (!results[2]) return '';
         return decodeURIComponent(results[2].replace(/\+/g, " "));
        }


        var start = getParameterByName('start'); 
        var end = getParameterByName('end'); 
        var cropdate = end.substring(6);
        var yahi = new Date(end);
        var thiktohai = yahi.getFullYear();

          if (thiktohai == "2019") {

          var d = document.getElementById("llink");
          d.className += "active";

          }else{

              var d = document.getElementById("flink");
              d.className += "active";
         }

         /*......get default or selected dates & adult values.......*/

         var getAdults = getParameterByName('adults'); 
         var forcyear = new Date();
         var currentYear = forcyear.getFullYear();
         var addOneInYear = currentYear + 1;

         if (start != "" && end != "") {
          document.getElementById("startdate").value = start;
          document.getElementById("enddate").value = end;
          document.getElementById("getadults").value = getAdults;
          document.getElementById("selectyear").value = addOneInYear;
        
         }
         else{
          document.getElementById("startdate").value = '05/01/2018';
          document.getElementById("enddate").value = '09/30/2018';
          document.getElementById("getadults").value = 2;
          document.getElementById("selectyear").value = addOneInYear;

         }

         if (addOneInYear != "2018") {
          document.getElementById("selectyear").value = (addOneInYear + 1);
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

          function formatDate(date) {
               var isSafari = navigator.vendor && navigator.vendor.indexOf('Apple') > -1 &&
                   navigator.userAgent && !navigator.userAgent.match('CriOS');
                if (isSafari) {
                   var arr = date.split(/[- :]/);                
                    date = new Date(arr[0], arr[1], arr[2]);
                    return [ arr[1], arr[2], arr[0]].join('/');
                    //return date;
                }
                else {
                    var arr = date.split(/[- :]/);                
                    date = new Date(arr[0], arr[1], arr[2]);
                    return [ arr[1], arr[2], arr[0]].join('/');
                }
          
          }


          var getApiData = function(MyData){   
            $('#waitingGIF').show();
            $.ajax({
              url:'http://www.magnusadventures.com/webservices/talonlodge/packages_New_live_temp.php',
             // url:'http://www.magnusadventures.com/webservices/talonlodge/Packages_New.php',  
              data: MyData, 
              method :'GET', 
              success:function(data){ 

                AllData =  data.mydata;             
                var pData = data.mydata;
                 PriceData = data.pricedata;
                var html = '';
                if($.isEmptyObject(pData)) { // if the result is 0
                  html +="<h2>There are no packages available for the dates you selected, please select a different date range or package date.</h2>";
                      $('#currentData').html(html);
                }

                $.each(pData,function(index,value){   
                   var slug = value.Package_Name;            
                  
                   slug = slug.replace(/\s+/g, '-').toLowerCase();
                   nslug = slug.replace(/\//g, '-');
                   var resourceName = value.resource_name_fn;
                  
                   var Package_Max_Adults = value.Package_Max_Adults;
                   var Package_Min_Adults = value.Package_Min_Adults;
                   //................................................

                  //.................................................
                  if (Package_Max_Adults >= getAdults && Package_Min_Adults <= getAdults) 
                      {
                  html +='<li class="myli7" style="display: list-item;" data-date="'+ new Date(value.Arrival_End_Date)+'">'+
                          '<input type="hidden" id="myInput" data-date="'+ new Date(value.Arrival_End_Date)+'">'+
                         '<a href="reservation/'+nslug+'?pid='+value.Pms_Package_ID+'&adults='+getAdults+'">'+
                           '<div class="b-reservation-i-l">'+
                             '<p style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size:13.4px;"><strong>'+value.Package_Name+'</strong></p>'+
                             '<p style="font-size:14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">'+(value.Package_Min_Days + 1)+ ' Nights / '+value.Package_Min_Days+' Days - '+value.Type_Of_Adventure+'</p><br>'+
                             '<p style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">(Arrival Dates Between: ' +formatDate(value.Arrival_Start_Date)+' - '+formatDate(value.Arrival_End_Date)+')</p>'+
                          '</div>'+
                          '<div class="b-reservation-i-r">'+
                             '<h5>'+value.Name+'</h5>'+
                             '<p>'+(value.rate_per_person).split('.')[0]+'</p>'+
                             '<p id="more"><strong>More Details</strong></p>'+
                          '</div>'+
                          '</a>'+
                         '</li>';
                  }
                });
               console.log(newPrice);
                $('#currentData').html(html);
                 $('#waitingGIF').hide();

                    StripLiElement();
              },
              error:function(data){
                console.log(data.responseText);
              }
            });
           
        }

        function clickbutonYear(fntype, years) {
          var  MyData = {};
              MyData.year = years;
              MyData.adults = $('#getadults').val();
              MyData.startdate = $('#startdate').val();
              MyData.enddate = $('#enddate').val();
              getApiData(MyData);
        }

        //...............filter for Bluff House Button(Parvez)...............
        function filterBluffHouseData(type){
          var html='';
          var greaterThanSix = document.getElementById("getadults").value;
           if(greaterThanSix > 6){                 
                     html +="<h2>The Maximum Group Size for The Bluff House is 6 people. If your group size is larger than 6 people, then The Bluff House may be available by combining other Talon Lodge accommodations.  For more information, Call 1-800-536-1864</h2>";
                      $('#currentData').html(html);
            } 
            else if(greaterThanSix < 6){
              html +="<h2>There is no availability for the dates you requested or the number of adults you selected.  Remember, The Bluff House requires a minimum occupancy of 6 people</h2>";
                      $('#currentData').html(html);
            }
          else{
          $.each(AllData,function(index,value){   
                   var slug = value.Package_Name;           
                  
                   slug = slug.replace(/\s+/g, '-').toLowerCase();
                   nslug = slug.replace(/\//g, '-');
                   var resourceName = value.resource_name_fn;
                   var maxoccu = document.getElementById("getadults").value;
                   if (resourceName == type && maxoccu == 6) {

                     html +='<li class="" style="display: list-item;">'+
                         '<a href="reservation/'+nslug+'?pid='+value.Pms_Package_ID+'&adults='+getAdults+'">'+
                           '<div class="b-reservation-i-l">'+
                             '<p style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size:13.4px;"><strong>'+value.Package_Name+'</strong></p>'+
                             '<p style="font-size:14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">'+(value.Package_Min_Days + 1)+ ' Nights / '+value.Package_Min_Days+' Days - '+value.Type_Of_Adventure+'</p><br>'+
                             '<p style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">(Arrival Dates Between: ' +formatDate(value.Arrival_Start_Date)+' - '+formatDate(value.Arrival_End_Date)+')</p>'+
                          '</div>'+
                          '<div class="b-reservation-i-r">'+
                             '<h5>'+value.resource_name_fn+'</h5>'+
                             '<p>'+(value.bluff_price).split('.')[0]+'</p>'+
                             '<p id="more"><strong>More Details</strong></p>'+
                          '</div>'+
                          '</a>'+
                         '</li>';
                   }                  
                   else{
                      html +="";
                   }             
                });

                console.log(html);
                $('#currentData').html(html);

           }     
             
        }

       //..............filter for Standard button(Parvez)................
       function filterStandardData(type){
          var html='';
          $.each(AllData,function(index,value){   
                   var slug = value.Package_Name;           
                  
                   slug = slug.replace(/\s+/g, '-').toLowerCase();
                   nslug = slug.replace(/\//g, '-');
                   var resourceName = value.resource_name_fn;
                   var getResourceID = value.resource_ID;
                   if (getResourceID == 13 || getResourceID == 14 || getResourceID == 15 || getResourceID == 16 || getResourceID == 17 || getResourceID == 18) {

                     html +='<li class="" style="display: list-item;">'+
                         '<a href="reservation/'+nslug+'?pid='+value.Pms_Package_ID+'&adults='+getAdults+'">'+
                           '<div class="b-reservation-i-l">'+
                             '<p style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size:13.4px;"><strong>'+value.Package_Name+'</strong></p>'+
                             '<p style="font-size:14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">'+(value.Package_Min_Days + 1)+ ' Nights / '+value.Package_Min_Days+' Days - '+value.Type_Of_Adventure+'</p><br>'+
                             '<p style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">(Arrival Dates Between: ' +formatDate(value.Arrival_Start_Date)+' - '+formatDate(value.Arrival_End_Date)+')</p>'+
                          '</div>'+
                          '<div class="b-reservation-i-r">'+
                             '<h5>'+value.Name+'</h5>'+
                             '<p>'+(value.rate_per_person).split('.')[0]+'</p>'+
                             '<p id="more"><strong>More Details</strong></p>'+
                          '</div>'+
                          '</a>'+
                         '</li>';
                   }                  
                });

                console.log(html);
                $('#currentData').html(html);

        }
        //..............filter for all Package button..................
        function filterallData(type){
          var html='';
          $.each(AllData,function(index,value){   
                   var slug = value.Package_Name;           
                  
                   slug = slug.replace(/\s+/g, '-').toLowerCase();
                   nslug = slug.replace(/\//g, '-');
                   var resourceName = value.resource_name_fn;
                   var Package_Max_Adults = value.Package_Max_Adults;
                   var Package_Min_Adults = value.Package_Min_Adults;
                   if (Package_Max_Adults >= getAdults && Package_Min_Adults <= getAdults) {

                     html +='<li class="myli7" style="display: list-item;">'+
                         '<a href="reservation/'+nslug+'?pid='+value.Pms_Package_ID+'&adults='+getAdults+'">'+
                           '<div class="b-reservation-i-l">'+
                             '<p style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size:13.4px;"><strong>'+value.Package_Name+'</strong></p>'+
                             '<p style="font-size:14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">'+(value.Package_Min_Days + 1)+ ' Nights / '+value.Package_Min_Days+' Days - '+value.Type_Of_Adventure+'</p><br>'+
                             '<p style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">(Arrival Dates Between: ' +formatDate(value.Arrival_Start_Date)+' - '+formatDate(value.Arrival_End_Date)+')</p>'+
                          '</div>'+
                          '<div class="b-reservation-i-r">'+
                             '<h5>'+value.Name+'</h5>'+
                             '<p>'+(value.rate_per_person).split('.')[0]+'</p>'+
                             '<p id="more"><strong>More Details</strong></p>'+
                          '</div>'+
                          '</a>'+
                         '</li>';
                   }                  
                });

                console.log(html);
                $('#currentData').html(html);
 
                StripLiElement();
        }

        function clickbuton(fntype){ 
            console.log(AllData);
             var  MyData = {};
             MyData.year = $('#selectyear').val();

            if (fntype == 'all_package'){
              MyData.year = $('#selectyear').val();
              MyData.adults = $('#getadults').val();
              MyData.startdate = $('#startdate').val();
              MyData.enddate = $('#enddate').val();
             // MyData.all_package = "all_package";
              filterallData("all_package");
              

            }else if(fntype == 'stand_package'){
              MyData.year = $('#selectyear').val();
              MyData.adults = $('#getadults').val();
              MyData.startdate = $('#startdate').val();
              MyData.enddate = $('#enddate').val();
              filterStandardData("stand_package");
              //filterSPData("stand_package");
               
            }else if(fntype == 'bluff_package'){

               MyData.packName == "bluff_package";
               MyData.year = $('#selectyear').val();
               MyData.adults = $('#getadults').val();
               MyData.startdate = $('#startdate').val();
               MyData.enddate = $('#enddate').val();
               filterBluffHouseData("Bluff House");
            }

          }
          
  </script>
  <script type="text/javascript">
    
  $(document).ready(function(){

   clickbutonYear('years', 2018);

  });

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
        cursor: pointer;
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
    .b-reservation-column {
      width: 100% !important;
     margin: 0;}
     .b-reservation-wrapper .h-reservation-list .b-reservation-column ul li {
    padding: 5px 10px;
    display: inline-block !important;
    width: 50%;
}

    </style>    

    <div class="b-reservation-date">

      Packages for Adventures between <span id="echostartdate">{$start}</span> and <span id="echoenddate">{$end}</span>

    </div>
    <script type="text/javascript">

        var echostartdate = getParameterByName('start'); 
        var echoenddate = getParameterByName('end');
        if (echostartdate != "" && echoenddate != "") {
           document.getElementById("echostartdate").innerHTML = echostartdate.trim();
           document.getElementById("echoenddate").innerHTML = echoenddate.trim();
        }else{
           document.getElementById("echostartdate").innerHTML = '05/01/2018';
           document.getElementById("echoenddate").innerHTML = '09/30/2018';
        }
   
    
    </script>

     <div class="h-reservation-list">
      <div class="b-reservation-column">
        <ul id="currentData">
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="waitingGIF" style="display:none;"></i>
        </ul>
      </div>
    </div>
    <p class="b-reservation-note">* All Rates are Per Person</p>

  </div>
  {/block}

  {block name='js_init'}

  {/block}