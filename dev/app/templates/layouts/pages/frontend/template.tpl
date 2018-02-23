<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title>{block name='title'}{/block} &mdash; {$cpf_site_title}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="generator" content="hands :)" /> 
	<meta name="description" content="" /> 
	<meta name="keywords" content="" /> 
	<meta name="revisit-after" content="1 Day" /> 
	<meta name="robots" content="all" />
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="js/jquery/jquery-1.6.1.js"></script>
	<script type="text/javascript" src="js/jquery/cusel.js"></script>
	<script type="text/javascript" src="js/jquery/jScrollPane.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui-1.8.17.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.compactform.js"></script>
    <script type="text/javascript" src="js/jquery/jquery.ad-gallery.js"></script>
    <script type="text/javascript" src="js/jquery/jquery.anythingslider.js"></script>
    <script type="text/javascript" src="js/jquery/jquery.scrim.cpf.js"></script>
	<script type="text/javascript" src="js/app.js"></script>	
	<script type="text/javascript" src="js/init.js"></script>	
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="l-wrapper">
		<div class="l-header l-min-width">
			<div class="l-center h-header-center">
				<div class="h-social-navigation-wrapper">
					<div class="b-social">
						<ul>
							<li><a class="twitter" href="http://twitter.com/talonlodge">Twitter</a></li>
							<li><a class="facebook" href="http://www.facebook.com/TalonLodge?ref=ts">Facebook</a></li>
						</ul>
					</div>
					<div class="b-navigation">
						<ul>
							<li><a class="active" href="#"><em>Blog</em></a></li>
							<li><a href="#"><em>Rates</em></a></li>
							<li><a href="?page=faq"><em>Faq</em></a></li>
							<li><a href="?page=contactus"><em>Contacts</em></a></li>
						</ul>
					</div>
				</div><!-- /.h-social-navigation-wrapper -->
				<div class="b-phone-number">Toll free: 800-536-1864</div>
				<div class="b-logo"><a href="<?php echo ROOT_URL; ?>"><img src="images/header/header-talonlodge.png"></a></div>
			</div><!-- /.h-header-center -->	
			<div class="h-header-bottom"></div>
		</div><!-- /.l-header -->
		<?php include('tpl/header.html'); ?>
		<?php include('tpl/'.$page.'.html');?>
		<?php include('tpl/footer.html');?>
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
				fixedHeight:	<?php echo $page == 'ourstory' || $page == 'fishinglodge' ? 'true' : 'false'; ?>
			});
		});
		</script>
</body>
</html>