<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 11:42:06
         compiled from "/home2/talonlod/public_html/app/templates/frontend_gallery.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32835104254bfc94a0fbfc1-02909240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e9f1d0fc1a649d90a958cc279a3b61dcf1e8c61' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_gallery.view.tpl',
      1 => 1333528200,
      2 => 'file',
    ),
    '3a1ec40b8beaf26d70b909063f8277e3d63be50c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/frontend.tpl',
      1 => 1446581652,
      2 => 'file',
    ),
    '926f8a5e02f4a0b751f4ded41d6238e06b323326' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/snippet-social.tpl',
      1 => 1417641653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32835104254bfc94a0fbfc1-02909240',
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
		
<div class="b-gallery-wrapper l-center">
	<h1 class="baltica-plain"><?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
</h1>
	<div class="b-gallery-header">
		<div class="b-gallery-subheader">
        <?php echo $_smarty_tpl->getVariable('gallery')->value->description;?>

		</div>
		<div class="b-gallery-social">
			<?php $_template = new Smarty_Internal_Template('includes/snippet-social.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '32835104254bfc94a0fbfc1-02909240';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 11:42:06
         compiled from "/home2/talonlod/public_html/app/templates/includes/snippet-social.tpl" */ ?>
	<div class="b-twitter-wrapper">
		<a href="http://twitter.com/#!/talonlodge" class="twitter-share-button">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home2/talonlod/public_html/app/templates/includes/snippet-social.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
		</div>
	</div>
	<div class="b-gallery-photos">
        <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('gallery')->value->photos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['image']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']=0;
if ($_smarty_tpl->tpl_vars['image']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['image']->iteration++;
 $_smarty_tpl->tpl_vars['image']->last = $_smarty_tpl->tpl_vars['image']->iteration === $_smarty_tpl->tpl_vars['image']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['last'] = $_smarty_tpl->tpl_vars['image']->last;
?>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['iteration'], null, null);?>
            <?php if (($_smarty_tpl->getVariable('i')->value-1)%4==0){?>
            <div class="b-gallery-photos-i">
            <?php }?>
            <div class="b-gallery-inside-photo<?php if ($_smarty_tpl->getVariable('i')->value%4==0){?> b-gallery-inside-photo-last<?php }?>">
                <?php echo $_smarty_tpl->getVariable('image')->value->decodeVersions();?>

                <h2><?php echo $_smarty_tpl->getVariable('image')->value->title;?>
</h2>
                <div class="b-gallery-inside-image-border">
                    <a rel="gallery" href="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['fullscreen']['filename'];?>
" title=""><img alt="<?php echo $_smarty_tpl->getVariable('image')->value->title;?>
" src="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['filename'];?>
" width="<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['width'];?>
" height="<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['height'];?>
"/></a>
                </div>
            </div>
            <?php if (($_smarty_tpl->getVariable('i')->value)%4==0||$_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['last']){?>
            </div>
            <?php }?>
        <?php }} ?>
	</div><!-- /.b-gallery-photos -->
	
	<!-- Popup -->
	<div id="popup-gallery-block">

	</div>
	<!-- /Popup -->
</div>

<style type="text/css">

    .ad-image-description {
    position: absolute;
    }
    .ad-image-description .ad-description-title {
    display: block;
    }
</style>

<div class="scrim" id="gallery-popup" style="visibility: hidden;">
	<div class="scrim-inner">

		<div id="gallery" class="ad-gallery">
			<a id="gallery-close" href="#"><img src="static/images/frontend/gallery/gallery-close.png" width="31" height="31" alt="Close" /></a>
			<div class="ad-image-wrapper">
			</div>
			<div class="ad-controls"></div>
			<div class="ad-nav">
				<div class="ad-thumbs">
					<ul class="ad-thumb-list">
                        <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('gallery')->value->photos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['image']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']=0;
if ($_smarty_tpl->tpl_vars['image']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['image']->iteration++;
 $_smarty_tpl->tpl_vars['image']->last = $_smarty_tpl->tpl_vars['image']->iteration === $_smarty_tpl->tpl_vars['image']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['last'] = $_smarty_tpl->tpl_vars['image']->last;
?>
						<li>
                            <a rel="gallery" href="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['fullscreen']['filename'];?>
" title=""><img alt="<?php echo $_smarty_tpl->getVariable('image')->value->title;?>
" src="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['filename'];?>
" width="<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['width'];?>
" height="<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['height'];?>
"/></a>
						</li>
                        <?php }} ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="b-social-buttons b-social-popup">
			<?php $_template = new Smarty_Internal_Template('includes/snippet-social.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '32835104254bfc94a0fbfc1-02909240';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 11:42:06
         compiled from "/home2/talonlod/public_html/app/templates/includes/snippet-social.tpl" */ ?>
	<div class="b-twitter-wrapper">
		<a href="http://twitter.com/#!/talonlodge" class="twitter-share-button">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home2/talonlod/public_html/app/templates/includes/snippet-social.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
		</div>
	</div><!-- .scrim-inner -->
</div><!-- #buy-popup .scrim -->

<script type="text/javascript">
	$(window).load(function(event){
		$().cpfScrim({
			scrim: '#gallery-popup',
			toResizeEl: '#gallery-popup',
			openLinks: '.b-gallery-photos a',
			closeLinks: '#gallery-close',
			showOnLoad: false,
			onShowScrim: function(event){ 
				$('#gallery').animate({ 'margin-top': $(document).scrollTop()+100  }, 300);
			}
		});
	});
</script>

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