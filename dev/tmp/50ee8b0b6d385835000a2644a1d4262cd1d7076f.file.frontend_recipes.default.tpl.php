<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 12:35:13
         compiled from "/home2/talonlod/public_html/app/templates/frontend_recipes.default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160512111354bfc8dc0d9ef1-90587340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50ee8b0b6d385835000a2644a1d4262cd1d7076f' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_recipes.default.tpl',
      1 => 1421849974,
      2 => 'file',
    ),
    '3a1ec40b8beaf26d70b909063f8277e3d63be50c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/frontend.tpl',
      1 => 1446581652,
      2 => 'file',
    ),
    '64b223e1067cd3c4667ceb3c417a795fca0826ec' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_recipes.list.tpl',
      1 => 1421849975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160512111354bfc8dc0d9ef1-90587340',
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
		
<div class="h-recipes-wrapper h-faq-wrapper l-center">
	<div class="h-recipe-head">
		<h1>Recipe Finder</h1>
		<p>There's a recipe to satisfy every taste and craving for Alaska seafood. Browse featured recipes of filter your search based on a seafood type.</p>
	</div>
	<div class="h-recipe-container">
		<div class="b-recipe__search">
			<form action="#" method="post">
				<div class="b-search__i">
					<div class="b-fake-select">
						<div class="lineForm">
							<select onchange="loadRecipes" class="recipe_select" id="meal_types" name="meal_types" tabindex="2">
								<option value="">All meal types</option>
								<?php  $_smarty_tpl->tpl_vars['_t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('meal_types')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['_t']->key => $_smarty_tpl->tpl_vars['_t']->value){
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['_t']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_t']->value['title'];?>
</option>
								<?php }} ?>
							</select>
						</div>
					</div>
				</div>
				<div class="b-search__i">
					<div class="b-fake-select">
						<div class="lineForm">
							<select onchange="loadRecipes" class="recipe_select" id="fish_types" name="fish_types" tabindex="2">
								<option value="">Main Ingredient</option>
								<?php  $_smarty_tpl->tpl_vars['_t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fish_types')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['_t']->key => $_smarty_tpl->tpl_vars['_t']->value){
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['_t']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_t']->value['title'];?>
</option>
								<?php }} ?>
							</select>
						</div>
					</div>
				</div>
				<div class="b-search__i">
					<div class="b-fake-select">
						<div class="lineForm">
							<select onchange="loadRecipes" class="recipe_select" id="technique_types" name="technique_types" tabindex="2">
								<option value="">All techniques</option>
								<?php  $_smarty_tpl->tpl_vars['_t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('technique_types')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['_t']->key => $_smarty_tpl->tpl_vars['_t']->value){
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['_t']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_t']->value['title'];?>
</option>
								<?php }} ?>
							</select>
						</div>
					</div>
				</div>
				<div class="b-search__i">
					<input type="text" value="" id="recipe_search" name="search" placeholder="search"/>
					<button type="submit" class="recipe-search-button"></button>
				</div>
			</form>
			<div style="clear: both;"></div>
		</div>

		<div class="recipes-wrapper">
			<?php $_template = new Smarty_Internal_Template('frontend_recipes.list.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '160512111354bfc8dc0d9ef1-90587340';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 12:35:13
         compiled from "/home2/talonlod/public_html/app/templates/frontend_recipes.list.tpl" */ ?>
	<div class="b-recipe__items">
		<?php  $_smarty_tpl->tpl_vars['recipe'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recipes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['recipe']->iteration=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['recipe']->key => $_smarty_tpl->tpl_vars['recipe']->value){
 $_smarty_tpl->tpl_vars['recipe']->iteration++;
?>
		<div class="b-recipe__i<?php if ($_smarty_tpl->tpl_vars['recipe']->iteration%3==0){?> last<?php }?>">
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_recipes_view','id'=>$_smarty_tpl->getVariable('recipe')->value->id,'slug'=>$_smarty_tpl->getVariable('recipe')->value->slug),$_smarty_tpl);?>
">
				<table class="bordered-table">
					<tr>
						<td class="corners blt">&nbsp;</td>
						<td class="top-bottom bt">&nbsp;</td>
						<td class="corners brt">&nbsp;</td>
					</tr>
					<tr class="img">
						<td class="left-right bl">&nbsp;</td>
						<td class="bc"><img src="<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('recipe')->value->filename_thumb;?>
" width="300" height="168" alt="<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
" /></td>
						<td class="left-right br">&nbsp;</td>
					</tr>
					<tr>
						<td class="corners blb">&nbsp;</td>
						<td class="top-bottom bb">&nbsp;</td>
						<td class="corners brb">&nbsp;</td>
					</tr>
				</table>
				<span><?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
</span>
			</a>
		</div>
		<?php }} ?>
	</div><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home2/talonlod/public_html/app/templates/frontend_recipes.list.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
		</div>
	</div>
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
            
	function loadRecipes()
	{
		$.ajax({
			dataType:	'html',
			type:		'post',
			url:		'<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_recipes'),$_smarty_tpl);?>
',
			data:		{
				meal: $('#meal_types').val(),
				fish: $('#fish_types').val(),
				technique: $('#technique_types').val(),
				search: $('#recipe_search').val(),
			},
			success: function(response)
			{
				$('.recipes-wrapper').html(response);
			}
		});
	}
	var params = {
		changedEl: ".lineForm select",
		visRows: 8,
		scrollArrows: true,
		callbackOnChange: loadRecipes
	}
	cuSel(params);
	$('#recipe_search').change(loadRecipes);
	$('.recipe-search-button').click(function(){
		loadRecipes();
		return false;
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