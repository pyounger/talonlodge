<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 11:14:23
         compiled from "/home2/talonlod/public_html/app/templates/frontend_recipes.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98130678754bfc8e6463620-67336519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93ae1d5991039b0f55d85d1a39bd33bffe9ea912' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_recipes.view.tpl',
      1 => 1421849977,
      2 => 'file',
    ),
    '3a1ec40b8beaf26d70b909063f8277e3d63be50c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/frontend.tpl',
      1 => 1446581652,
      2 => 'file',
    ),
    'c18f5c9d1668608e7b950a35bdaad9db8142e2f8' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_recipes.item.tpl',
      1 => 1421849976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98130678754bfc8e6463620-67336519',
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
	<title><?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
</title>
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
		
	<!-- Recipe view page -->
	<?php $_template = new Smarty_Internal_Template('frontend_recipes.item.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '98130678754bfc8e6463620-67336519';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 11:14:23
         compiled from "/home2/talonlod/public_html/app/templates/frontend_recipes.item.tpl" */ ?>
<?php if ($_smarty_tpl->getVariable('for_pdf')->value){?>
	<div class="h-recipe-pdf">
		<img src="/<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('recipe')->value->filename_thumb;?>
" width="100%" alt="<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
" />
		<h1><?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
</h1>
		<table width="100%" class="xh">
			<tr>
				<td width="33%">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->serves){?>
						<p>SERVES <span><?php echo $_smarty_tpl->getVariable('recipe')->value->serves;?>
</span></p>
					<?php }?>
				</td>
				<td width="33%">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->prep_time!=''){?>
						<p>PREP TIME <span><?php echo $_smarty_tpl->getVariable('recipe')->value->prep_time;?>
</span></p>
					<?php }?>
				</td>
				<td width="33%">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->cook_time!=''){?>
						<p>COOK TIME <span><?php echo $_smarty_tpl->getVariable('recipe')->value->cook_time;?>
</span></p>
					<?php }?>
				</td>
			</tr>
		</table>

		<table width="100%" class="yh">
			<tr>
				<td width="50%" valign="top">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->ingredients){?>
						<h4>Ingredients</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->ingredients;?>

					<?php }?>
				</td>
				<td width="50%" valign="top">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->directions){?>
						<h4>Directions</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->directions;?>

					<?php }?>
				</td>
			</tr>
			<?php if ($_smarty_tpl->getVariable('recipe')->value->nutritional){?>
			<tr>
				<td valign="top">
					<h4>Nutritional Information</h4>
					<?php echo $_smarty_tpl->getVariable('recipe')->value->nutritional;?>

				</td>
				<td></td>
			</tr>
			<?php }?>
		</table>
	</div>
<?php }else{ ?>
	<div class="h-recipe-view-wrapper h-faq-wrapper l-center">
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_recipes'),$_smarty_tpl);?>
" class="recipe-back">&larr;&nbsp;Back to recipe finder</a>
		<h1><?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
</h1>
		<div class="b-recipe__info">
			<?php if ($_smarty_tpl->getVariable('recipe')->value->serves){?>
			<div class="b-recipe__info-i">
				<p>SERVES <span><?php echo $_smarty_tpl->getVariable('recipe')->value->serves;?>
</span></p>
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('recipe')->value->prep_time!=''){?>
			<div class="b-recipe__info-i">
				<p>PREP TIME <span><?php echo $_smarty_tpl->getVariable('recipe')->value->prep_time;?>
</span></p>
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('recipe')->value->cook_time!=''){?>
			<div class="b-recipe__info-i">
				<p>COOK TIME <span><?php echo $_smarty_tpl->getVariable('recipe')->value->cook_time;?>
</span></p>
			</div>
			<?php }?>
		</div>

		<div class="h-faq-container">
			<div class="b-faq-l">
				<div class="b-recipe__l-i">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->ingredients){?>
						<h4>Ingredients</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->ingredients;?>

					<?php }?>
				</div>

				 <div class="b-recipe__l-i">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->nutritional){?>
						<h4>Nutritional Information</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->nutritional;?>

					<?php }?>
				</div>
			</div>
			<div class="b-faq-r">
				<div class="b-recipe__r-i">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->directions){?>
						<h4>Directions</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->directions;?>

					<?php }?>
				</div>

				<div class="b-recipe__r-i last">
					<?php if ($_smarty_tpl->getVariable('another_recipe')->value){?>
					<h4>You'll also love</h4>
					<div class="b-recipe__i last">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_recipes_view','id'=>$_smarty_tpl->getVariable('another_recipe')->value->id,'slug'=>$_smarty_tpl->getVariable('another_recipe')->value->slug),$_smarty_tpl);?>
">
							<table class="bordered-table">
								<tr>
									<td class="corners blt">&nbsp;</td>
									<td class="top-bottom bt">&nbsp;</td>
									<td class="corners brt">&nbsp;</td>
								</tr>
								<tr class="img">
									<td class="left-right bl">&nbsp;</td>
									<td class="bc"><img src="/<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('another_recipe')->value->filename_thumb;?>
" width="300" height="168" alt="<?php echo $_smarty_tpl->getVariable('another_recipe')->value->title;?>
" /></td>
									<td class="left-right br">&nbsp;</td>
								</tr>
								<tr>
									<td class="corners blb">&nbsp;</td>
									<td class="top-bottom bb">&nbsp;</td>
									<td class="corners brb">&nbsp;</td>
								</tr>
							</table>
							<span><?php echo $_smarty_tpl->getVariable('another_recipe')->value->title;?>
</span>
						</a>
					</div>
					<?php }?>
				</div>
			</div>
			<div class="b-spiral"></div>
			<div class="b-ways-to-share">
				<h4>Ways to Share</h4>
				<div class="b-share-list">
					<div class="b-print">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_recipes_view','id'=>$_smarty_tpl->getVariable('recipe')->value->id,'slug'=>$_smarty_tpl->getVariable('recipe')->value->slug),$_smarty_tpl);?>
?print">Print</a>
					</div>
					<div class="b-recipe-social">
						<ul>
							<li class="sm">Social Media</li>
							<li><a target="_blank" href="mailto:?subject=<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
&amp;body=Check out this site <?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" class="email"></a></li>
							<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" class="fb"></a></li>
							<li><a target="_blank" href="https://twitter.com/home?status=<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
 on <?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" class="tw"></a></li>
							<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" class="gp"></a></li>
							<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
&media=<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('recipe')->value->filename_thumb;?>
&description=<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
" class="p"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }?><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home2/talonlod/public_html/app/templates/frontend_recipes.item.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

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