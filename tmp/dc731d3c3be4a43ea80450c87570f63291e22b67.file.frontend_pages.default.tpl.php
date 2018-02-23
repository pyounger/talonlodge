<?php /* Smarty version Smarty-3.0.8, created on 2017-12-20 09:17:24
         compiled from "/home2/talonlod/public_html/app/templates/frontend_pages.default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126676754757f2f8dfd05260-40985923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc731d3c3be4a43ea80450c87570f63291e22b67' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_pages.default.tpl',
      1 => 1475595477,
      2 => 'file',
    ),
    '3a1ec40b8beaf26d70b909063f8277e3d63be50c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/frontend.tpl',
      1 => 1513793837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126676754757f2f8dfd05260-40985923',
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
	<title><?php echo $_smarty_tpl->getVariable('page')->value->seo_title;?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="generator" content="hands :)" /> 
	<meta name="description" content="<?php echo $_smarty_tpl->getVariable('page')->value->seo_description;?>
" /> 
	<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('page')->value->seo_keywords;?>
" /> 
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
      
	<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('template_name')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

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