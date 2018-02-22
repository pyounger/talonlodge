<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<base href="{$cpf_root_url}" />        
	<title>{block name='title'}{/block}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="generator" content="hands :)" /> 
	<meta name="description" content="{block name='description'}{/block}" /> 
	<meta name="keywords" content="{block name='keywords'}{/block}" /> 
	<link rel="canonical" href="{$cpf_canonical_url}" />
	<meta name="revisit-after" content="1 Day" /> 
	<meta name="robots" content="{block name='robots'}{/block}" />

	<link type="text/css" href="asset-css-frontend.v{$cpf_assets_version}.css" rel="stylesheet"  media="screen" />
	<script type="text/javascript" src="asset-js-frontend.v{$cpf_assets_version}.css"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	{if $recipe}
		<meta property="og:title" content="{$recipe->title}"/> 
		<meta property="og:description" content="{$recipe->direction}"/> 
		<meta property="og:image" content="{cpf_config('APP.RECIPES.URL')}{$recipe->filename_thumb}"/> 
		<meta property="og:site_name" content="Talon Lodge"/> 
	{/if}

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
</head>
<body class="controller-{$cpf_controller} action-{$cpf_action}">

{include file='includes/backend.ui/backend.validator.tpl'}
{function name='cpf_validator'}{/function}


    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

	<div class="l-wrapper">
		{include file='includes/frontend.header.tpl'}
		<!-- *********************************************************************************************************** -->
		{block name='content'}
		{/block}
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

		{include file='includes/frontend.footer.tpl'}
	</div><!-- /.l-wrapper -->

    <script type="text/javascript">
        $(document).ready(function(){
            {block name='js_init'}{/block}
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
        });
    </script>
</body>
</html>