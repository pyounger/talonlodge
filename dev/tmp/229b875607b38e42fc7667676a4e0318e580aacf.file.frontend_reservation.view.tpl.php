<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 11:50:19
         compiled from "/home2/talonlod/public_html/app/templates/frontend_reservation.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27472075756340f2674fdc9-57000919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '229b875607b38e42fc7667676a4e0318e580aacf' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_reservation.view.tpl',
      1 => 1446251419,
      2 => 'file',
    ),
    '3a1ec40b8beaf26d70b909063f8277e3d63be50c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/frontend.tpl',
      1 => 1446581652,
      2 => 'file',
    ),
    'd32a3585f9b449abb68ac8bfde0801b7129e2b88' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/frontend.ui/frontend.errors.tpl',
      1 => 1417641678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27472075756340f2674fdc9-57000919',
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
<?php if (!is_callable('smarty_modifier_datetime_format')) include '/home2/talonlod/public_html/cpf/core/view/smarty/plugins/modifier.datetime_format.php';
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
		
<div class="b-reservation-view-wrapper l-center">
    <h1 class="baltica-plain">Online Reservation</h1>
    <?php $_template = new Smarty_Internal_Template('includes/frontend.ui/frontend.errors.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '27472075756340f2674fdc9-57000919';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 11:50:19
         compiled from "/home2/talonlod/public_html/app/templates/includes/frontend.ui/frontend.errors.tpl" */ ?>
<?php if ($_smarty_tpl->getVariable('cpf_errors')->value){?>
<div class="errors msg error cpf-errors">
	<ul>
	<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cpf_errors')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
?>
		<li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
	<?php }} ?>
	</ul>
</div>
<?php }?><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home2/talonlod/public_html/app/templates/includes/frontend.ui/frontend.errors.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <?php if ($_smarty_tpl->getVariable('success')->value){?><p class="b-contacts-success">Thank you for your reservation request!</p><?php }?>

    <div class="b-reservation-view-container">
        <div class="b-reservation-view-column">
            <div class="b-reservation-subcolumn">
                <div class="b-reservation-view-r">
                    <div class="b-reservation-view-l">
                        <h2><?php echo $_smarty_tpl->getVariable('package')->value->Package_Min_Days+1;?>
 Nights / <?php echo $_smarty_tpl->getVariable('package')->value->Package_Min_Days;?>
 - <?php echo $_smarty_tpl->getVariable('package')->value->Type_Of_Adventure;?>
</h2>
                        <p><?php echo $_smarty_tpl->getVariable('package')->value->Package_Name;?>
</p>
                        <span>Double Occupancy / Room</span>
                    </div>
                </div>
                <div class="b-reservation-view-list">
                    <span class="b-reservation-view-title">Package Includes:</span>
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('package')->value->Package_Includes; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value){
?>
                        <li>&mdash; <?php echo $_smarty_tpl->tpl_vars['li']->value;?>
</li>
                        <?php }} ?>
                    </ul>
                </div>
                <div class="b-reservation-view-list">
                    <span class="b-reservation-view-title">Package Does Not Include:</span>
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('package')->value->Package_DoesNot_Include; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value){
?>
                            <li>&mdash; <?php echo $_smarty_tpl->tpl_vars['li']->value;?>
</li>
                        <?php }} ?>
                    </ul>
                </div>
            </div>
            <div class="b-reservation-subcolumn b-reservation-subcolumn-r">
                <div class="b-reservation-view-price">
                    <span>$<?php echo $_smarty_tpl->getVariable('package')->value->Adult_Cost;?>
</span>
                    <p>Per Person USD</p>
                </div>
                <div class="b-reservation-view-additional">
                    <span class="b-reservation-view-title">Additional Fees:</span>
                    <p><?php echo $_smarty_tpl->getVariable('package')->value->Package_Fees;?>
</p>
                </div>
            </div>
        </div>
        <div class="b-reservation-view-column b-reservation-view-column-r">
			<div class="b-reservation-right-top">
				<p><span>Adventure type:</span> <?php echo $_smarty_tpl->getVariable('package')->value->Type_Of_Adventure;?>
</p>
				<p><span>Species:</span> <?php echo $_smarty_tpl->getVariable('package')->value->Associated_Species;?>
</p>
			</div>
            <div class="b-reservation-view-additional-details">
                <span class="b-reservation-view-title">Additional Package Details</span>
                <p><?php echo $_smarty_tpl->getVariable('package')->value->Package_Details;?>
</p>
            </div>
            <div class="b-reservation-view-deposit">
                <span class="b-reservation-view-title">Deposit:</span>
                <p><?php echo $_smarty_tpl->getVariable('package')->value->Adult_Deposit;?>
 / Person</p>
            </div>
            <div class="b-reservation-view-arrival-confirm">
                <div class="b-reservation-view-arrival">
                    <p><span>Arrival Dates:</span> <?php echo smarty_modifier_datetime_format($_smarty_tpl->getVariable('package')->value->Arrival_Start_Date,'m/d/Y');?>
</p>
                </div>
                <a class="b-reservation-view-confirm" href="#confirm">
                </a>
            </div>
        </div>

    </div>
    <div id="confirm" style="display: none">
        <form action="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" method="post" id="cpf-page-form">
			<h3 class="b-reservation-popup-info"><?php echo $_smarty_tpl->getVariable('package')->value->Package_Name;?>
</h3>
			<p class="b-reservation-popup-info"><span>Arrival Dates:</span> <?php echo smarty_modifier_datetime_format($_smarty_tpl->getVariable('package')->value->Arrival_Start_Date,'m/d/Y');?>
&ndash;<?php echo smarty_modifier_datetime_format($_smarty_tpl->getVariable('package')->value->Arrival_End_Date,'m/d/Y');?>
</p>
			<p class="b-reservation-popup-info"><span>Min People:</span> <?php echo (($tmp = @$_smarty_tpl->getVariable('reservation_adults')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('package')->value->Package_Min_People : $tmp);?>
</p>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="popup-first-name" name="firstName" value="<?php echo $_smarty_tpl->getVariable('firstName')->value;?>
" />
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="popup-last-name" name="lastName" value="<?php echo $_smarty_tpl->getVariable('lastName')->value;?>
" />
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="popup-email" name="email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
"/>
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="popup-home-phone" name="phone" value="<?php echo $_smarty_tpl->getVariable('phone')->value;?>
"/>
                </div>
            </div>
            <textarea id="popup-comments" name="comments"><?php echo $_smarty_tpl->getVariable('comments')->value;?>
</textarea>
            <div class="b-popup-footer">
                <button type="submit"></button>
            </div>
        </form>
    </div>
</div>
    <?php ob_start(); ?>
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
    <?php  Smarty::$_smarty_vars['capture']['validation_rules']=ob_get_clean();?>


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
                <?php smarty_template_function_cpf_validator($_smarty_tpl,array('rules'=>Smarty::$_smarty_vars['capture']['validation_rules'],'noscript'=>true));?>

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