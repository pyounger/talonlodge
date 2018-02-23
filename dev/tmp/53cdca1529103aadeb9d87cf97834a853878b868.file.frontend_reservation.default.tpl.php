<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 11:49:48
         compiled from "/home2/talonlod/public_html/app/templates/frontend_reservation.default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167061502056391ded009e45-77539486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53cdca1529103aadeb9d87cf97834a853878b868' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_reservation.default.tpl',
      1 => 1446583741,
      2 => 'file',
    ),
    '3a1ec40b8beaf26d70b909063f8277e3d63be50c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/frontend.tpl',
      1 => 1446581652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167061502056391ded009e45-77539486',
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
<?php if (!is_callable('smarty_function_math')) include '/home2/talonlod/public_html/cpf/libs/smarty/plugins/function.math.php';
if (!is_callable('smarty_function_cycle')) include '/home2/talonlod/public_html/cpf/libs/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_datetime_format')) include '/home2/talonlod/public_html/cpf/core/view/smarty/plugins/modifier.datetime_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

	<link type="text/css" href="asset-css-frontend.v<?php echo $_smarty_tpl->getVariable('cpf_assets_version')->value;?>
.css" rel="stylesheet"  media="screen" />
	<script type="text/javascript" src="asset-js-frontend.v<?php echo $_smarty_tpl->getVariable('cpf_assets_version')->value;?>
.css"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

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
    </style>
	

</head>
<body class="controller-<?php echo $_smarty_tpl->getVariable('cpf_controller')->value;?>
 action-<?php echo $_smarty_tpl->getVariable('cpf_action')->value;?>
">

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
		

<p>test</p>
<div class="b-reservation-wrapper l-center">
    <h1 class="baltica-plain">Available Package Dates</h1>
	<div class="b-white-wrapper">
		<div class="b-image-bottom-title-white h-image-bottom-i"></div>
		<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_reservation'),$_smarty_tpl);?>
" method="get" class="order-form">
			<div class="b-image-bottom-datepick b-white-datepick h-image-bottom-i">Arriving Between:</div>
			<div class="b-datepick-white h-image-bottom-i">
				<input type="text" id="between" name="start" value="<?php echo $_smarty_tpl->getVariable('start')->value;?>
" />
			</div>
			<div class="b-image-bottom-datepick b-white-datepick h-image-bottom-i">And:</div>
			<div class="b-datepick-white h-image-bottom-i">
				<input type="text" id="and" name="end" value="<?php echo $_smarty_tpl->getVariable('end')->value;?>
"/>
			</div>
			<div class="b-image-bottom-datepick b-white-datepick h-image-bottom-i">With:</div>
            <div > </div>
			<div class="b-datepick-white-select">
				<div class="lineForm">
					<select class="sel80" id="adults" name="adults" tabindex="4">
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==1){?>selected="selected" <?php }?>value="1">1 adult</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==2){?>selected="selected" <?php }?>value="2">2 adults</option>
						<option <?php if (!$_smarty_tpl->getVariable('adults')->value||$_smarty_tpl->getVariable('adults')->value==3){?>selected="selected" <?php }?>value="3">3 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==4){?>selected="selected" <?php }?>value="4">4 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==5){?>selected="selected" <?php }?>value="5">5 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==6){?>selected="selected" <?php }?>value="6">6 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==7){?>selected="selected" <?php }?>value="7">7 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==8){?>selected="selected" <?php }?>value="8">8 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==9){?>selected="selected" <?php }?>value="9">9 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==10){?>selected="selected" <?php }?>value="10">10 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==11){?>selected="selected" <?php }?>value="11">11 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==12){?>selected="selected" <?php }?>value="12">12 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==13){?>selected="selected" <?php }?>value="13">13 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==14){?>selected="selected" <?php }?>value="14">14 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==15){?>selected="selected" <?php }?>value="15">15 adults</option>
						<option <?php if ($_smarty_tpl->getVariable('adults')->value==16){?>selected="selected" <?php }?>value="16">16 adults</option>
					</select>
				</div>
			</div>
			<div class="h-button-wrapper h-button-white reservation-b">
				<button type="submit" class="b-view-button"> 
					View
				</button>
			</div>
		</form>
	</div>
	
    
    
    
    
    <div>
    
	<div class="b-reservation-years">
        <div style = "float:right; font-family:verdana; font-size:14px"><strong>
            <span id = "all_package" class = "aaa">All Packages</span>
            <span id = "stand_package" style="">Standard Packages</span>
            <span id = "bluff_package" style="">Bluff House Packages</span></strong>
        </div>
       
		<?php  $_smarty_tpl->tpl_vars['cyear'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('packages')->value['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['cyear']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['cyear']->iteration=0;
if ($_smarty_tpl->tpl_vars['cyear']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cyear']->key => $_smarty_tpl->tpl_vars['cyear']->value){
 $_smarty_tpl->tpl_vars['cyear']->iteration++;
 $_smarty_tpl->tpl_vars['cyear']->last = $_smarty_tpl->tpl_vars['cyear']->iteration === $_smarty_tpl->tpl_vars['cyear']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pyears']['last'] = $_smarty_tpl->tpl_vars['cyear']->last;
?>
			<?php if ($_smarty_tpl->getVariable('year')->value!=$_smarty_tpl->tpl_vars['cyear']->value){?>
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_reservation'),$_smarty_tpl);?>
?year=<?php echo $_smarty_tpl->tpl_vars['cyear']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['cyear']->value;?>
 Packages</a>
			<?php }else{ ?>
				<?php echo $_smarty_tpl->tpl_vars['cyear']->value;?>
 Packages
			<?php }?>
			<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['pyears']['last']){?> / <?php }?>
            <?php }} ?>
                
           </div>
        
            
    </div>
    <!--<pre><?php echo print_r($_smarty_tpl->getVariable('packages')->value);?>
</pre>-->
    
    
    <style>
#all_package,#stand_package,#bluff_package{
    border: solid 1px #ccc;
    background: #E6E6E6;
    border-radius:4px;
    display: inline-block;
    padding: 5px;
    cursor: pointer;}

#all_package:hover,#stand_package:hover,#bluff_package:hover{
background: #ccc;
border-radius:4px;}
</style>
    
    
    
    
    
    <div class="b-reservation-date">
        Packages for Adventures between <span><?php echo $_smarty_tpl->getVariable('start')->value;?>
</span> and <span><?php echo $_smarty_tpl->getVariable('end')->value;?>
</span>
    </div>

    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(count($_smarty_tpl->getVariable('packages')->value['list']), null, null);?>
    <?php echo smarty_function_math(array('equation'=>"ceil(c/2)",'c'=>$_smarty_tpl->getVariable('count')->value,'assign'=>'half'),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['half_reached'] = new Smarty_variable(false, null, null);?>
    <?php if ($_smarty_tpl->getVariable('count')->value>0){?>
    <div class="h-reservation-list">
        <div class="b-reservation-column">
            <ul>
            <?php  $_smarty_tpl->tpl_vars['package'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('packages')->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['packages']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['package']->key => $_smarty_tpl->tpl_vars['package']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['packages']['iteration']++;
?>
               <li class="<?php echo smarty_function_cycle(array('values'=>'no-bg,'),$_smarty_tpl);?>
 myli<?php echo $_smarty_tpl->getVariable('package')->value->Account_ID;?>
">
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_reservation_view','slug'=>$_smarty_tpl->getVariable('package')->value->slug),$_smarty_tpl);?>
">
                        <div class="b-reservation-i-l">
                            <p style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:13.4px;"><strong><?php echo $_smarty_tpl->getVariable('package')->value->Package_Name;?>
</strong></p>
                            <p style="font-size:14px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;"><?php echo $_smarty_tpl->getVariable('package')->value->Package_Min_Days+1;?>
 Nights / <?php echo $_smarty_tpl->getVariable('package')->value->Package_Min_Days;?>
 Days - <?php echo $_smarty_tpl->getVariable('package')->value->Type_Of_Adventure;?>
</p>
                            <p style = "font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">(Arrival Dates Between: <?php echo smarty_modifier_datetime_format($_smarty_tpl->getVariable('package')->value->Arrival_Start_Date,"m/d/Y");?>
 - <?php echo smarty_modifier_datetime_format($_smarty_tpl->getVariable('package')->value->Arrival_End_Date,"m/d/Y");?>
)</p>
                           
                        </div>
                        <div class="b-reservation-i-r">
                            <p>$<?php echo $_smarty_tpl->getVariable('package')->value->Adult_Cost;?>
</p>
                            <p style = "font-size:10.5px; color:#e1562d; font-family:font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;"><strong>More Details</strong></p>
                        </div>
                    </a>
               </li>

                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['packages']['iteration']>=$_smarty_tpl->getVariable('half')->value&&!$_smarty_tpl->getVariable('half_reached')->value){?>
                        <?php $_smarty_tpl->tpl_vars['half_reached'] = new Smarty_variable(true, null, null);?>
                    </ul>
                </div>
                <div class="b-reservation-column b-reservation-column-r">
                    <ul>
               <?php }?>
            <?php }} ?>
            </ul>
        </div>
    </div>
    <p class="b-reservation-note">* All Rates are Per Person</p>
	<?php }else{ ?>
		<div class="b-reservation-date">There are no packages available for the dates you selected, please select a different date range or package date.</div>
    <?php }?>

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
            // Subheader Gallery
            $().mainSlider({
                slides: 		'.b-gallery-container ul li',
                menu: 			'.b-gallery-menu',
                links: 			'.b-gallery-menu ul li.photo a',
                title: 			'#gallery-title',
                titleContent: 	'#gallery-title .b-gallery-title span',
                subtitle: 		'#gallery-subtitle',
                fixedHeight:	false
            });
			
			
			var $datepicker = $('#ui-datepicker-div');
			
			$datepicker.css({
				top: 10,
				left: 10
			}); 
            
            $("#all_package").click(function(){
                 $("#all_package").css('background', '#a93101');
                 $(this).css('color', 'white');
                $("#stand_package").css('color', 'black');
                $("#bluff_package").css('color', 'black');
                $("#stand_package").css('background', '#E6E6E6');
                $("#bluff_package").css('background', '#E6E6E6');
                
                
                
                
                   $("ul li").removeClass("no-bg");  
                $("ul li:even").addClass("no-bg");  

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
                
            });
            $("#all_package").css('background', '#a93101');
            $("#all_package").css('color', 'white');
            
            
        });
    </script>
</body>
</html>