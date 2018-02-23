<?php /* Smarty version Smarty-3.0.8, created on 2017-12-20 09:23:49
         compiled from "/home2/talonlod/public_html/app/templates/frontend_reservation.default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32612176859e12deb7e05a9-74496058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53cdca1529103aadeb9d87cf97834a853878b868' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_reservation.default.tpl',
      1 => 1507929571,
      2 => 'file',
    ),
    '3a1ec40b8beaf26d70b909063f8277e3d63be50c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/frontend.tpl',
      1 => 1513793837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32612176859e12deb7e05a9-74496058',
  'function' => 
  array (
    'cpf_validator' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<base href="<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
" />        
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="generator" content="hands :)" /> 
	<meta name="description" content="" /> 
	<meta name="keywords" content="" /> 
	<link rel="canonical" href="<?php echo $_smarty_tpl->getVariable('cpf_canonical_url')->value;?>
" />
	<meta name="revisit-after" content="1 Day" /> 
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"></link>
	<link type="text/css" href="asset-css-frontend.v<?php echo $_smarty_tpl->getVariable('cpf_assets_version')->value;?>
.css" rel="stylesheet"  media="screen" />
    <!-- ..........link for gallery(Parvez)............ -->
    <link rel="stylesheet" type="text/css" href="http://www.talonlodge.com/static/css/frontend/gallery/gallery-view.css">
   <!--  <link rel="stylesheet" type="text/css" href="http://www.dev.talonlodge.com/static/css/frontend/gallery/fancy-gallery.css"> -->
    <script type="text/javascript" src="http://www.talonlodge.com/static/javascript/frontend/fancygallery/galleryjquery.js"></script>
    <script type="text/javascript" src="http://www.talonlodge.com/static/javascript/frontend/fancygallery/galleryfancy.js"></script>
    <!-- ...........end gallery css & js............... -->
	<script type="text/javascript" src="asset-js-frontend.v<?php echo $_smarty_tpl->getVariable('cpf_assets_version')->value;?>
.css"></script>
	<?php if ($_smarty_tpl->getVariable('web')->value=="bluffhouse"){?><link rel="stylesheet" type="text/css" href="/responsive.css"><?php }?>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/complete-responsive.css">
	<?php if ($_smarty_tpl->getVariable('recipe')->value){?>
	<meta property="og:title" content="<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
"/> 
	<meta property="og:description" content="<?php echo $_smarty_tpl->getVariable('recipe')->value->direction;?>
"/> 
	<meta property="og:image" content="<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('recipe')->value->filename_thumb;?>
"/> 
	<meta property="og:site_name" content="Talon Lodge"/> 
	<?php }?>
	
 <script type="text/javascript">
        
    function openThisUrl(nowData, nowOption) {
        var message = "";
        $("#viewframe").attr("src", nowData);
        if (nowOption == "Cedar 2" || nowOption == "Spruce 2") {
            message = nowOption+" is a private room with a private full bathroom. The room comes with two XL-Full beds.";
        }else if(nowOption == "Cedar 1" || nowOption == "Spruce 1"){
            message = nowOption+" is a private room with a private full bathroom. The room comes with one King or two XL-Twin beds.";
        }else if(nowOption == "Cedar House"){
            message = nowOption+" is a 3-bedroom accommodation with 2 full bathrooms. Each bedroom is available with either two XL-Twin beds or one King bed.";
        }else if(nowOption == "Spruce House"){
            message = nowOption+" is a 3-bedroom accommodation with 2 full bathrooms. Two of the bedrooms have two XL-Full beds. One bedroom is furnished with either one King bed or two XL-Twin beds.";
        }else if(nowOption == "Bluff House"){
            message = "The "+nowOption+" is a 3-bedroom accommodation with 2 full bathrooms and 1 half-bath.  Two of the bedrooms have two XL-Full beds.  One bedroom is furnished with either one King bed or two XL-Twin beds. The Bluff House has a full kitchen, dining room and living room.  The Bluff House is also equipped with a private Hot Tub.";
        }else{
            message = "";
        }
        $("#getRName").text(message);
        $("#vmd").show();
   
        $(".close").click(function(){
            $("#vmd").hide();
        });

   }
 </script>

	<script type="text/javascript"> 
		//Global language variable for javascript
		LANG = 'en';
		CMT = false;
		
		SMARTPHONE = false;
		TABLET = false;
		MAPDATA = '/poi';
	</script>
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-3585651-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>


	<?php $_template = new Smarty_Internal_Template('includes/frontend.chat.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>


	<style>
		.aa{
			color:#fff;
			background: #000;
		}

		html, body{
			height: auto!important;
		}

		.b-reservation-view-l>p{
			width: 350px;
		}

		.span-f{
			color:#fff!important;
			font-size: 78px;    
			line-height: 3.875rem;    
			display: block;
			font-family: 'Open Sans', sans-serif;
			font-weight: bold;
			margin-bottom: 10px;
			text-transform: uppercase;
		}

		.span-s{
			text-transform: uppercase;
			margin-bottom: 5px;
			display: block;
			font-family: 'Open Sans', sans-serif;
			color:#fff!important;
			font-size: 36px;
			line-height: 1.84375rem;
			padding-left: 5px;
		}
		.span-t{
			color:#fff!important;
			display: block;
			padding-left: 5px;
			font-size: 20px;
			font-family: 'Open Sans', sans-serif;
			text-transform: lowercase;
		}
		.l-center-layer{
			height: 225px;  
		}



	</style>


</head>
<?php $_smarty_tpl->tpl_vars["rsv"] = new Smarty_variable($_SERVER['REQUEST_URI'], null, null);?>
<body class="controller-<?php echo $_smarty_tpl->getVariable('cpf_controller')->value;?>
 action-<?php echo $_smarty_tpl->getVariable('cpf_action')->value;?>
 home<?php if (strpos($_smarty_tpl->getVariable('rsv')->value,'reservation')){?> reserv <?php }?>">

    <?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.validator.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    <?php if (!function_exists('smarty_template_function_cpf_validator')) {
    function smarty_template_function_cpf_validator($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_validator']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>



    <div id="fb-root"></div>


    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div class="l-wrapper">
      <?php $_template = new Smarty_Internal_Template('includes/frontend.header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

      <!-- *********************************************************************************************************** -->
      


<div class="b-reservation-wrapper l-center">
  <h1 class="baltica-plain">Available Package Dates</h1>

  <div>

    <div class="b-reservation-years clearfix" style="margin-bottom:30px;">
      <?php if ($_smarty_tpl->getVariable('web')->value=="bluffhouse"){?>
      <div style = "float:right; font-family:verdana; font-size:14px"><strong>
        <span id = "bluff_package">Bluff House Packages</span>
        <span id = "stand_package">Standard Talon Lodge Packages</span>
        <span id = "all_package" class = "aaa">All Packages</span>   </strong>     

      </div>

      <?php }else{ ?>
      <div style = "float:right; font-family:verdana; font-size:14px"><strong>
        <span id = "all_package" class = "aaa" onclick="clickbuton('all_package')" >All Packages</span>
        <span id = "stand_package" onclick="clickbuton('stand_package')" >Standard Packages</span>
        <span id = "bluff_package" onclick="clickbuton('bluff_package')" >Bluff House Packages</span>
        </strong>
      </div>
      <?php }?>   
      
      <ul class="packButton">

      <?php $_smarty_tpl->tpl_vars["year"] = new Smarty_variable(2019, null, null);?>
      <?php $_smarty_tpl->tpl_vars["cyear"] = new Smarty_variable(2018, null, null);?>

      <li id="flink"><a onclick="clickbutonYearCopy('<?php echo $_smarty_tpl->getVariable('cyear')->value;?>
')" ><?php echo $_smarty_tpl->getVariable('cyear')->value;?>
 Packages</a></li>

      <li id="llink"><a  onclick="clickbutonYearCopy('<?php echo $_smarty_tpl->getVariable('year')->value;?>
')"><?php echo $_smarty_tpl->getVariable('year')->value;?>
 Packages</a> </li>   

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

      Packages for Adventures between <span id="echostartdate"><?php echo $_smarty_tpl->getVariable('start')->value;?>
</span> and <span id="echoenddate"><?php echo $_smarty_tpl->getVariable('end')->value;?>
</span>

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
  
      <!-- *********************************************************************************************************** -->


      <!-- Google Code for Site Visitors -->
      <!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
      <script type="text/javascript">
       /* <![CDATA[ */
       var google_conversion_id = 1071356560;
       var google_conversion_label = "HH9VCPzrtwQQkLXu_gM";
       var google_custom_params = window.google_tag_params;
       var google_remarketing_only = true;
       /* ]]> */
   </script>
   <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
   </script>
   <noscript>
       <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1071356560/?value=0&amp;label=HH9VCPzrtwQQkLXu_gM&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>	

<?php $_template = new Smarty_Internal_Template('includes/frontend.footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div><!-- /.l-wrapper -->

<script type="text/javascript">
  $(document).ready(function(){
   

  
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
   $('#open_popup').click(function(){

    $('#popup').fadeIn();
    $('#form-reservation').show();
    $('#form_error').hide();
    $('#success_msg').hide();
});

   $('.popup-close').click(function(){
    $("#popup").fadeOut();
    $(".popup-container").removeClass("success-popup"); 
});

   $('#submitme').click(function(){

    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/;
    var phone = $('#phone').val(),intRegex = /[0-9 -()+]+$/;


    if($('#firstName').val()=="" || $('#lastName').val()=="" || $('#email').val()=="" || $('#phone').val() =="" || $('#comments').val()==""){
     $('#form_error').show();
     $('#form_error').html('All Feilds are required !');
     return false; 

 }else if(! filter.test($('#email').val())) {
     $('#form_error').show();
     $('#form_error').html('Invalid Email Address !');
     return false; 
 }else if((phone.length < 10) || (!intRegex.test(phone))){
     $('#form_error').show();
     $('#form_error').html('Invalid Phone Number !');
     return false; 
 }else {
     $('#form_error').hide();
     $('#success_msg').hide();
     $('#form_error').html('');
     var data = "firstName="+$('#firstName').val()+"&lastName="+ $('#lastName').val()+"&email="+$('#email').val()+"&phone="+$('#phone').val()+"&comments="+$('#comments').val()+"&Package_Name="+$('#Package_Name').val()+"&Pms_Package_ID="+$('#Pms_Package_ID').val()+"&Arrival_Start_Date="+$('#Arrival_Start_Date').val()+"&Adult_Cost="+$('#Adult_Cost').val()+"&Num_Adults="+$('#Num_Adults').val()+"&lodge_account_ID="+$('#lodge_account_ID').val();
     $.post('test.php',data).done(function(data){
      $('#firstName').val('');
      $('#lastName').val('');
      $('#email').val('');
      $('#comments').val('');
      $('#phone').val('');
      $('#form-reservation').hide();
      $('#success_msg').show();
      $('#success_msg').html('Your Reservation Request has been sent.');
      $(".popup-container").addClass("success-popup");


      return false;
  });
     return false;
 }

}); 


            // Subheader Gallery
            $().mainSlider({
            	slides: 		'.b-gallery-container ul li',
            	menu: 			'.b-gallery-menu',
            	links: 			'.b-gallery-menu ul li.photo a',
            	title: 			'#gallery-title',
            	titleContent: 	'#gallery-title .b-gallery-title',
            	subtitle: 		'#gallery-subtitle',
            	fixedHeight:	false
            });
            
            
            var $datepicker = $('#ui-datepicker-div');
            
            $datepicker.css({
            	top: 10,
            	left: 10
            }); 
            
            
            
            
        });

    </script>
    


    <?php if ($_smarty_tpl->getVariable('web')->value=="bluffhouse"){?>

    <style type="text/css">

    	body{
    		background: #fff !important;
    		font-family: 'Roboto', sans-serif !important;
    	}
    	.b-reservation-years,.b-reservation-date,.b-reservation-column ul li,div.b-reservation-i-l p strong,.b-reservation-column ul li div.b-reservation-i-l p,.b-reservation-wrapper p.b-reservation-note,.b-reservation-view-list ul li,.b-reservation-view-column-r p,.b-reservation-view-l{
    		font-family: 'Roboto', sans-serif !important;
    	}

    	.b-reservation-wrapper p.b-reservation-note{
    		padding: 5px 0 0 0!important;
    		margin-bottom: 5px;
    	}

    	h1.baltica-plain.bb {
    		display: block !important;
    		color: #f38118 !important;
    		font-family: 'Roboto', sans-serif !important;
    	}
    	#more{
    		color: #f38118 !important;
    	}
    	#more:hover{
    		color: #f35102 !important;
    	}
    	.b-view-button,#preve{
    		background: #f38118 !important;
    	}
    	.b-view-button,#bluff_package,#preve,#stand_package,#all_package{
    		font-family: 'Roboto', sans-serif !important;
    	}
    	.b-view-button:hover,#bluff_package:hover,#preve:hover,#stand_package:hover,#all_package:hover{
    		background: #f35102 !important;
    	}
    	.b-top__gradient{
    		display: none !important;
    	}

    	.l-new-header{
    		display: none !important;
    	}

    	.baltica-plain{
    		display: none !important;
    	}

    	#IframeId{

    		height: auto !important;
    	}

    	.b-footer{
    		display: none !important;
    	}

    	.h-content-footer{
    		display: none !important;
    	}

    	.b-reservation-wrapper{
    		padding: 0px 0 55px 0;
    	}

    	.b-reservation-subcolumn{
    		width: 49%!important;
    	}

    	.b-reservation-view-column{
    		width:68%!important; 
    	}

    	.b-reservation-view-container{
    		width:100%!important;
    	}
    	.b-reservation-view-column-r{
    		width: 30%!important;   
    	}

    	.b-reservation-view-l span{
    		font-size: 1.6em!important;
    	}

    	.b-reservation-view-l{
    		padding-top:10px!important;
    	}

    	.b-reservation-view-price p{
    		width:100%;
    	}
    	.b-reservation-subcolumn div>p, .b-reservation-view-column-r div>p, .b-reservation-view-container div>p, .b-reservation-view-column div>p{
    		width:100%!important;
    	}

    	.b-reservation-view-column-r p{
    		width:100%;
    	}

    	#IframeId{
    		width:100%;
    	}



    	@media screen and (max-width: 680px){
    		.b-reservation-subcolumn{
    			width: 48%!important;
    		}

    		.b-reservation-view-column{
    			width:67%!important; 
    		}

    		.b-reservation-view-container{
    			width:100%!important;
    		}
    		.b-reservation-view-column-r{
    			width: 30%!important;   
    		}

    		.b-reservation-view-l, .b-reservation-view-r{
    			background-image:none;
    			background:none;
    			height: auto;
    		}

    		.b-reservation-right-top{
    			height: auto!important;
    		}

    		.b-reservation-view-additional-details{
    			width:100%;
    		}

    		#IframeId{
    			height:1500px;
    		}
    	}

    	@media screen and (max-width: 480px){
    		.b-reservation-subcolumn{
    			width: 100%!important;
    		}

    		.b-reservation-view-column{
    			width:100%!important; 
    		}

    		.b-reservation-view-container{
    			width:100%!important;
    		}
    		.b-reservation-view-column-r{
    			width: 100%!important;   
    		}

    		.b-reservation-view-l, .b-reservation-view-r{
    			background-image:none;
    			background:none;
    			height: auto;
    		}

    		p{
    			font-size:1.2em!important;
    		}

    		.b-reservation-view-price{
    			height: auto!important;
    			margin-bottom: 10px;
    		}

    		.controller-frontend_reservation .baltica-plain{
    			margin: 0;
    			font-size:35px;
    		}

    		.b-reservation-view-wrapper{
    			padding: 0!important;
    		}

    		div#fancy_outer{
    			width: 94%!important;
    			padding: 10px;
    		}

    		div#fancy_outer input, div#fancy_outer textarea{
    			width: 100%;
    		}
    		div#fancy_close{
    			top: -8px;
    			right: -8px;
    		}

    		#fancy_div form div.b-brochure-input-r{
    			width: 100%;
    			margin: 5px;
    		}

    		.b-brochure-input-l{
    			background-size: cover;
    			width: 95%;
    		}

    		.b-reservation-popup-info{
    			padding: 10px;
    		}

    		#fancy_div form textarea{
    			margin: 5px;
    		}

    		.b-popup-footer button{
    			margin: 5px 0;
    			background-size: cover;
    		}


    	}



    </style>

    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#all_package").click(function(){
    			$("#all_package").css('background','#f38118');
    			$("#all_package").css('border-color','#f35102');
    			$(this).css('color', 'white');
    			$("#stand_package").css('color', 'black');
    			$("#bluff_package").css('color', 'black');
    			$("#stand_package").css('background', '#E6E6E6');
    			$("#bluff_package").css('background', '#E6E6E6');
    			$("#bluff_package").css('border-color','#ccc');
    			$("#stand_package").css('border-color','#ccc');




    			$("ul li").removeClass("no-bg");  
    			$("ul li:even").addClass("no-bg");  

                // Find all objects to highlight.

                
                $(".myli7").fadeIn(500);
                $(".myli185").fadeIn(500);
            });

    		$("#stand_package").click(function(){
    			$(this).css('color', 'white');
    			$("#stand_package").css('background', '#f38118');
    			$("#stand_package").css('border-color','#f35102');
    			$("#all_package").css('color', 'black');
    			$("#all_package").css('background', '#E6E6E6');
    			$("#bluff_package").css('background', '#E6E6E6');
    			$("#bluff_package").css('color', 'black');
    			$("#bluff_package").css('border-color','#ccc');
    			$("#all_package").css('border-color','#ccc');
    			$("ul li").each(function(index) {
    				if($(this).is(':visible')){
    					$('ul li').removeClass('no-bg');
    				}
    			});

    			$("ul .myli7:even" ).addClass("no-bg");  
             // $("ul .myli7:odd" ).addClass("");
             $(".myli7" ).show();
             
             $(".myli7").fadeIn(500);
             $(".myli185").fadeOut(500);
         });

    		$("#bluff_package").click(function(){
    			$(this).css('color', 'white');
    			$("#all_package").css('color', 'black');
    			$("#stand_package").css('background', '#E6E6E6');
    			$("#stand_package").css('color', 'black');
    			$("#all_package").css('background', '#E6E6E6');
    			$("#bluff_package").css('background', '#f38118');
    			$("#bluff_package").css('border-color','#f35102');
    			$("#stand_package").css('border-color','#ccc');
    			$("#all_package").css('border-color','#ccc');

    			$("ul li").each(function(index) {
    				if($(this).is(':visible')){
    					$('ul li').removeClass('no-bg');

    				}

    			});

    			$("ul .myli185:even" ).addClass("no-bg");  
            //  $("ul .myli185:odd" ).addClass("");
            $(".myli185" ).show();
            $(".myli7").fadeOut(500);
            $(".no-bg myli7").fadeIn(500);
            
        });
    		$('#bluff_package').css('color', 'white');
    		$("#all_package").css('color', 'black');
    		$("#stand_package").css('background', '#E6E6E6');
    		$("#stand_package").css('color', 'black');
    		$("#all_package").css('background', '#E6E6E6');
    		$("#bluff_package").css('background', '#f38118');
    		$("#bluff_package").css('border-color','#f35102');

    		$("ul li").each(function(index) {
    			if($('#bluff_package').is(':visible')){
    				$('ul li').removeClass('no-bg');

    			}

    		});

    		$("ul .myli185:even" ).addClass("no-bg");  
            //  $("ul .myli185:odd" ).addClass("");
            $(".myli185" ).show();
            $(".myli7").fadeOut(500);
            $(".no-bg myli7").fadeIn(500);

            $("#bluff_package").css('background', '#f38118');
            $("#bluff_package").css('color', 'white');
            
            
        });



    </script>


    <?php }else{ ?>

    <script type="text/javascript">
    	 $(document).ready(function(){

            $("#all_package").click(function(){
                $("#all_package").css('background', '#a93101');
                $(this).css('color', 'white');
                $("#stand_package").css('color', 'black');
                $("#bluff_package").css('color', 'black');
                $("#stand_package").css('background', '#E6E6E6');
                $("#bluff_package").css('background', '#E6E6E6');
                
                
                
                
                // $("ul li").removeClass("no-bg");  
                // $("ul li:even").addClass("no-bg");  
// 
                // Find all objects to highlight.

                
                $(".myli7").fadeIn(500);
                $(".myli185").fadeIn(500);
            });
            
            $("#stand_package").click(function(){
                $(this).css('color', 'white');
                $("#stand_package").css('background', '#a93101');
                $("#all_package").css('color', 'black');
                $("#all_package").css('background', '#E6E6E6');
                $("#bluff_package").css('background', '#E6E6E6');
                $("#bluff_package").css('color', 'black');
                $("ul li").each(function(index) {
                    if($(this).is(':visible')){
                        $('ul li').removeClass('no-bg');
                    }
                });
                
                $("ul .myli7:even" ).addClass("no-bg");  
             // $("ul .myli7:odd" ).addClass("");
             $(".myli7" ).show();
             
             $(".myli7").fadeIn(500);
             $(".myli185").fadeOut(500);
             StripLiElement();
         });
            
            $("#bluff_package").click(function(){
                $(this).css('color', 'white');
                $("#all_package").css('color', 'black');
                $("#stand_package").css('background', '#E6E6E6');
                $("#stand_package").css('color', 'black');
                $("#all_package").css('background', '#E6E6E6');
                $("#bluff_package").css('background', '#a93101');
                
                $("ul li").each(function(index) {
                    if($(this).is(':visible')){
                        $('ul li').removeClass('no-bg');
                        
                    }
                    
                });
                
                $("ul .myli185:even" ).addClass("no-bg");  
            //  $("ul .myli185:odd" ).addClass("");
            $(".myli185" ).show();
            $(".myli7").fadeOut(500);
            $(".no-bg myli7").fadeIn(500);
            StripLiElement();
            
        });

            $("#all_package").css('background', '#a93101');
            $("#all_package").css('color', 'white');
            
            
        });

        /*...........added for years........*/
        $("#flink").click(function(){
                $("#flink").addClass("active");
                $("#llink").removeClass("active");   
            });

             $("#llink").click(function(){
                $("#llink").addClass("active");
                $("#flink").removeClass("active");
            });

            // $("#flink").addClass("active");
            // $("#llink").removeClass("active");
 
         function StripLiElement() {
            var liLength = $("ul#currentData li").length;
                 for (var i = 1; i <= liLength; i += 4) {
                  $("#currentData > li:nth-child("+i+")").addClass("no-bg");
                }     
                for (var i = 0; i <= liLength; i += 4) {
                  $("#currentData > li:nth-child("+i+")").addClass("no-bg");
                }  
           }
    </script>
    
    <?php }?>
    
    <script type="text/javascript">
      $(window).load(function(){
       var qqq = window.parent.location.href;
       var prnt1 = document.referrer;
       var prnt2 = prnt1.split("?");
       if (prnt2 !=''){

           var prnt3 = prnt2[1];
           if(prnt3 !=''){
               var prnt4 = prnt3.split("&");
               var prnt5 = prnt4[3];
               var prnt6 = prnt5.split("=");
               if(prnt6[1] == 'bluffhouse'){
                $("#ppnn").hide();
                $(".b-top__gradient").css('display', 'none');
            }else{

            }
        }else{

        }
    });
</script>

<script src="/iframeResizer.contentWindow.min.js"> </script> 

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/jplayer/jquery.jplayer.min.js"></script>

<script src="static/video/modernizr-2.6.1.min.js"></script>			
<script src="static/video/main.js"></script>
<script src="http://www.dev.talonlodge.com/static/video/special.js?v=9"></script>
<script src="static/video/jqModal.js"></script>


</body>
</html>