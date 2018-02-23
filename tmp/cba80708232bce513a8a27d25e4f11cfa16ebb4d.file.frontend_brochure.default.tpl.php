<?php /* Smarty version Smarty-3.0.8, created on 2017-12-20 10:09:28
         compiled from "/home2/talonlod/public_html/app/templates/frontend_brochure.default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6019091757f3cd84ce2721-03566817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cba80708232bce513a8a27d25e4f11cfa16ebb4d' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_brochure.default.tpl',
      1 => 1475595467,
      2 => 'file',
    ),
    '3a1ec40b8beaf26d70b909063f8277e3d63be50c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/frontend.tpl',
      1 => 1513793837,
      2 => 'file',
    ),
    'd32a3585f9b449abb68ac8bfde0801b7129e2b88' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/frontend.ui/frontend.errors.tpl',
      1 => 1509743773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6019091757f3cd84ce2721-03566817',
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
      

<div class="b-brochure-wrapper l-center">

	<h1 class="baltica-plain">Order Your Talon Lodge Brochure Today</h1>



	<?php $_template = new Smarty_Internal_Template('includes/frontend.ui/frontend.errors.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '6019091757f3cd84ce2721-03566817';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2017-12-20 10:09:28
         compiled from "/home2/talonlod/public_html/app/templates/includes/frontend.ui/frontend.errors.tpl" */ ?>
<!-- <?php if ($_smarty_tpl->getVariable('cpf_errors')->value){?>
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
<?php }?> -->

<style type="text/css">
	
	.b-contacts-error {
	    padding: 38px 0 0 0 !important;
	    font-size: 1.8em !important;
	    color: red;
	}

</style>
<?php if ($_smarty_tpl->getVariable('cpf_errors')->value){?>

	<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cpf_errors')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
?>

		<p class="b-contacts-error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>

	<?php }} ?>

<?php }?><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home2/talonlod/public_html/app/templates/includes/frontend.ui/frontend.errors.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

	<?php if ($_smarty_tpl->getVariable('success')->value){?>

	<p class="b-contacts-success">Thank you for your brochure request.<br />Please check your e-mail account and you will find that we have already e-mailed you our Talon Lodge eBrochure.</p>

	<?php }else{ ?>



	<p>To receive our list of Special Offers, Available Package Dates and our Talon Lodge Print Brochure and eBrochure</p>

	<p><strong>Please complete the following form:</strong></p>





	<div class="b-brochure-form-wrap">

		<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_brochure'),$_smarty_tpl);?>
" method="post" id="cpf-page-form">

			<div class="b-brochure-form-left">

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="hidden" name="txtPackageCode" value="2x1LMSks3d" />

						<input type="hidden" name="txtBrochureCode" value="n8uGa7XguV" />

						<input type="hidden" name="txtReceiptURL" value="http://www.magnusadventures.com/talonlodge/ebrochure/thanks.asp" />

						<input type="hidden" name="txtAccount" value="http://www.magnusadventures.com/talonlodge/ebrochure/thanks.asp" />

						<input type="hidden" name="magnus_accountid" value="7" />

						<input type="hidden" name="txtPassword" value="" />

						<input type="hidden" name="txtResAccount" value="" />

						<input type="hidden" name="txtCampaign" value="" />

						<input type="hidden" name="txtSubject" value="Talon Lodge - EBROCHURE REQUEST" />

						<input type="hidden" name="txtPropertyNumber" value="1-800-536-1864" />

						<input type="hidden" name="txtPackageType" value="Consumer" />

						<input type="hidden" name="txtUnit" value="T" />

						<input type="hidden" name="txtTCURL" value="" />

						<input type="hidden" name="txtSFURL" value="http://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" />

						<input type="hidden" name="lead_source" value="Talon EBrochure" />

						<input type="hidden" name="00N30000000dSVA" value="" />

						<input type="hidden" name="00N30000000dhSo" value="Yes" />

						<input type="hidden" name="00N30000000dhSf" value="Yes" />

						<input type="hidden" name="00N30000000dhSh" value="No" />

						<input type="hidden" name="00N30000000dhQT" value="" />

						<input type="hidden" name="oid" value="00D300000000HQz" />

						<input type="hidden" name="retURL" value="http://www.talonlodge.com/store/ebrochure_thanks.asp" />

						<input type="hidden" name="recordType" value="0123000000001TT" />

						<input type="text" id="firstName" name="txtFirstName" value="<?php echo $_smarty_tpl->getVariable('txtFirstName')->value;?>
"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="lastName" name="txtLastName" value="<?php echo $_smarty_tpl->getVariable('txtLastName')->value;?>
" />

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="company-name" name="txtCompany" value="<?php echo $_smarty_tpl->getVariable('txtCompany')->value;?>
"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="email" name="txtEmail" value="<?php echo $_smarty_tpl->getVariable('txtEmail')->value;?>
"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="home-phone" name="txtPhone2" value="<?php echo $_smarty_tpl->getVariable('txtPhone2')->value;?>
"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="work-phone" name="txtPhone1" value="<?php echo $_smarty_tpl->getVariable('txtPhone1')->value;?>
"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="cell-phone" name="txtPhone3" value="<?php echo $_smarty_tpl->getVariable('txtPhone3')->value;?>
"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="fax" name="txtFax" value="<?php echo $_smarty_tpl->getVariable('txtFax')->value;?>
"/>

					</div>

				</div>

			</div><!-- /.b-brochure-form-left -->

			<div class="b-brochure-form-center">

				<div class="b-country-select">

					<select class="sel80" id="country" name="txtCountry" tabindex="2">

						<option value="" style="display: none;">Country:</option>

						<option value="United States of America" <?php if ($_smarty_tpl->getVariable('txtCountry')->value=='United States of America'){?> selected="selected"<?php }?>>United States of America</option>

						<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
?>

						<?php if ('United States of America'!=$_smarty_tpl->tpl_vars['country']->value['title']){?>

						<option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['title'];?>
" <?php if ($_smarty_tpl->getVariable('txtCountry')->value==$_smarty_tpl->tpl_vars['country']->value['title']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['country']->value['title'];?>
</option>

						<?php }?>

						<?php }} ?>

					</select>

				</div>

				<br clear="all" />

				<div class="rasporka"></div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="address-1" name="txtAddress1" value="<?php echo $_smarty_tpl->getVariable('txtAddress1')->value;?>
"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="address-2" name="txtAddress2" value="<?php echo $_smarty_tpl->getVariable('txtAddress2')->value;?>
"/>

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="town" name="txtCity" value="<?php echo $_smarty_tpl->getVariable('txtCity')->value;?>
"/>

					</div>

				</div>

				<div class="b-state-select" id="main-state">

					<select class="sel80" id="state-select" name="txtState" tabindex="2">

						<option value="" style="display: <?php if ($_smarty_tpl->getVariable('txtCountry')->value=='United States of America'){?>block<?php }else{ ?>none<?php }?>;">State:</option>

						<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('states')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value){
?>

						<option value="<?php echo $_smarty_tpl->tpl_vars['state']->value['id'];?>
"<?php if ($_smarty_tpl->getVariable('txtState')->value==$_smarty_tpl->tpl_vars['state']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['state']->value['title'];?>
</option>

						<?php }} ?>

					</select>

				</div>

				<div class="b-brochure-input-r" id="other-state" style="display: <?php if ($_smarty_tpl->getVariable('txtCountry')->value=='United States of America'){?>none<?php }else{ ?>block<?php }?>;">

					<div class="b-brochure-input-l">

						<input type="text" id="stateOther" value="<?php echo $_smarty_tpl->getVariable('txtStateOther')->value;?>
" name="txtStateOther" />

					</div>

				</div>

				<div class="b-brochure-input-r">

					<div class="b-brochure-input-l">

						<input type="text" id="postal" name="txtZIP" value="<?php echo $_smarty_tpl->getVariable('txtZIP')->value;?>
"/>

					</div>

				</div>



			</div>

			<div class="b-brochure-form-right">

				<div class="b-brochure-date date-1">

					<input id="arrival" type="text" name="txtCheckinDate" value="<?php echo $_smarty_tpl->getVariable('txtCheckinDate')->value;?>
"/>

				</div>

				<div class="b-brochure-date date-2">

					<input id="arrival-2"type="text" name="txtCheckinDate2" value="<?php echo $_smarty_tpl->getVariable('txtCheckinDate2')->value;?>
"/>

				</div>

				<div class="b-selects-row">

					<div class="b-fishing-guests-select">

						<select class="sel-small cusel-small" name="txtTotalFishing" id="fishing-guests" tabindex="2">

							<option value="0" style="display: none;">Number of Guests:</option>

							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['name'] = 'cnt';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'] = is_array($_loop=25) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total']);
?>

							<option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cnt']['index'];?>
" <?php if ($_smarty_tpl->getVariable('txtTotalFishing')->value==$_smarty_tpl->getVariable('smarty')->value['section']['cnt']['index']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cnt']['index'];?>
</option>

							<?php endfor; endif; ?>

						</select>

					</div>

					<!-- <div class="b-non-fishing-guests-select">

						<select class="sel-small cusel-small right" name="txtTotalNotFishing" id="non-fishing-guests" tabindex="2">

							<option value="0" style="display: none;">No. of Non-Fishing Guests:</option>

							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['name'] = 'cnt';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'] = is_array($_loop=20) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cnt']['total']);
?>

							<option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cnt']['index'];?>
" <?php if ($_smarty_tpl->getVariable('txtTotalNotFishing')->value==$_smarty_tpl->getVariable('smarty')->value['section']['cnt']['index']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['cnt']['index'];?>
</option>

							<?php endfor; endif; ?>

						</select>

					</div> -->

				</div>

				<div class="b-how-many-times-select">

					<select class="sel80 cusel-small" id="how-many-times" name="txtTotalPreviousTrips" tabindex="2">

						<option value="" style="display: none;">No. times you have been to Alaska before?:</option>

						<option value="1" <?php if ($_smarty_tpl->getVariable('txtTotalPreviousTrips')->value=='1'){?>selected="selected"<?php }?>>1</option>

						<option value="2" <?php if ($_smarty_tpl->getVariable('txtTotalPreviousTrips')->value=='2'){?>selected="selected"<?php }?>>2</option>

						<option value="3" <?php if ($_smarty_tpl->getVariable('txtTotalPreviousTrips')->value=='3'){?>selected="selected"<?php }?>>3</option>

						<option value="4" <?php if ($_smarty_tpl->getVariable('txtTotalPreviousTrips')->value=='4'){?>selected="selected"<?php }?>>4</option>

						<option value="5+" <?php if ($_smarty_tpl->getVariable('txtTotalPreviousTrips')->value=='5+'){?>selected="selected"<?php }?>>5+</option>

					</select>

				</div>

				<div class="b-purpose-select">

					<select class="sel80" id="purpose" name="txtTravelPurpose" tabindex="2">

						<option value="" style="display: none;">Purpose of Travel:</option>

						<option value="None" <?php if ($_smarty_tpl->getVariable('txtTravelPurpose')->value=='None'){?>selected="selected"<?php }?>>None</option>

						<option value="Family Group" <?php if ($_smarty_tpl->getVariable('txtTravelPurpose')->value=='Family Group'){?>selected="selected"<?php }?>>Family Group</option>

						<option value="Friend Group" <?php if ($_smarty_tpl->getVariable('txtTravelPurpose')->value=='Friend Group'){?>selected="selected"<?php }?>>Friend Group</option>

						<option value="Corporate Group" <?php if ($_smarty_tpl->getVariable('txtTravelPurpose')->value=='Corporate Group'){?>selected="selected"<?php }?>>Corporate Group</option>

					</select>

				</div>

				<div class="b-main-package">

					<select class="sel80" id="package" name="txtMainPackageInterest" tabindex="2">

						<option value="" style="display: none;">Main Package Interest?:</option>

						<option value="Saltwater Sportfishing" <?php if ($_smarty_tpl->getVariable('txtMainPackageInterest')->value=='Saltwater Sportfishing'){?>selected="selected"<?php }?>>Saltwater Sportfishing</option>

						<option value="Freshwater Fly Fishing" <?php if ($_smarty_tpl->getVariable('txtMainPackageInterest')->value=='Freshwater Fly Fishing'){?>selected="selected"<?php }?>>Freshwater Fly Fishing</option>

						<option value="Combo Salt and Fresh" <?php if ($_smarty_tpl->getVariable('txtMainPackageInterest')->value=='Combo Salt and Fresh'){?>selected="selected"<?php }?>>Combo Salt and Fresh</option>

						<option value="Alaska Advanture & Photo Tour" <?php if ($_smarty_tpl->getVariable('txtMainPackageInterest')->value=='Alaska Advanture & Photo Tour'){?>selected="selected"<?php }?>>Alaska Advanture & Photo Tour</option>

					</select>

				</div>

				<div class="b-brochure-send-news">

					<div class="b-brochure-send-news-l">

						<p>Please continue to send me Talon Lodge offers?:</p>

						<div class="b-brochure-radio">

							<input type="radio" name="txtOptin" id="radio-yes" value="Yes" <?php if ($_smarty_tpl->getVariable('txtOptin')->value=='Yes'){?>checked="checked"<?php }?> /><label for="radio-yes">Yes</label>

							<input type="radio" name="txtOptin" id="radio-no" value="No" <?php if ($_smarty_tpl->getVariable('txtOptin')->value=='No'){?>checked="checked"<?php }?>/><label for="radio-no">No</label>

						</div>

					</div>

					<div class="b-how-do-you-know">

						<select class="sel80" id="know" name="txtHowDidYouHear" tabindex="2">

							<option value="" style="display: none;">How did you hear about us?:</option>

							<option value="Brochures" <?php if ($_smarty_tpl->getVariable('txtHowDidYouHear')->value=='Brochures'){?>selected="selected"<?php }?>>Brochures</option>

							<option value="E-mail Correspondence" <?php if ($_smarty_tpl->getVariable('txtHowDidYouHear')->value=='E-mail Correspondence'){?>selected="selected"<?php }?>>E-mail Correspondence</option>

							<option value="Hotel Website" <?php if ($_smarty_tpl->getVariable('txtHowDidYouHear')->value=='Hotel Website'){?>selected="selected"<?php }?>>Hotel Website</option>

							<option value="Internet" <?php if ($_smarty_tpl->getVariable('txtHowDidYouHear')->value=='Internet'){?>selected="selected"<?php }?>>Internet</option>

							<option value="Newspapers" <?php if ($_smarty_tpl->getVariable('txtHowDidYouHear')->value=='Newspapers'){?>selected="selected"<?php }?>>Newspapers</option>

							<option value="Radio" <?php if ($_smarty_tpl->getVariable('txtHowDidYouHear')->value=='Radio'){?>selected="selected"<?php }?>>Radio</option>

							<option value="Reffered by Friend" <?php if ($_smarty_tpl->getVariable('txtHowDidYouHear')->value=='Reffered by Friend'){?>selected="selected"<?php }?>>Reffered by Friend</option>

							<option value="Repeat Guest" <?php if ($_smarty_tpl->getVariable('txtHowDidYouHear')->value=='Repeat Guest'){?>selected="selected"<?php }?>>Repeat Guest</option>

						</select>

					</div>

					<textarea id="comments" name="txtComments"><?php echo $_smarty_tpl->getVariable('txtComments')->value;?>
</textarea>

					<br />

					<br />

					<div class="b-captcha">

						<div class="b-brochure-input-r">

							<div class="b-brochure-input-l">

								<input type="text" id="captcha" name="captcha" maxlength="255" />

							</div>

						</div>

						<div class="b-captcha-img">

							<img id="captcha-img" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_captcha','rand'=>time()),$_smarty_tpl);?>
" width="95" height="42" alt=""/>

							<a id="captcha-reload" href="#">

								<img src="static/images/frontend/contactus/refresh.png" width="16" height="17" alt=""/>

							</a>

						</div>

					</div>							

					<button type="submit" name="btnSubmit"></button>

				</div>



			</div>

		</form>

	</div>



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
   



$('.b-country-select span').click(function(){

var id = $(this).attr('val');

if (id == 'United States of America')

{

	$('#main-state').show();

	$('#other-state').hide();

}

else

{

	$('#main-state').hide();

	$('#other-state').show();

}

});



var cforms = [];

$('#firstName').compactform({ text: 'First Name: *'});

$('#lastName').compactform({ text: 'Last Name: *'});

$('#company-name').compactform({ text: 'Company Name:'});

$('#email').compactform({ text: 'Email: *'});

$('#home-phone').compactform({ text: 'Home Phone:'});

$('#work-phone').compactform({ text: 'Work Phone:'});

$('#cell-phone').compactform({ text: 'Cell Phone:'});

$('#fax').compactform({ text: 'Fax:'});

$('#address-1').compactform({ text: 'Address 1:'});

$('#address-2').compactform({ text: 'Address 2:'});

$('#town').compactform({ text: 'City:'});

$('#postal').compactform({ text: 'Postal/ZIP Code:'});

$('#stateOther').compactform({ text: 'Province/Region:'});

$('#arrival').compactform({ text: 'Arrival Date First Choice:'});

$('#arrival-2').compactform({ text: 'Arrival Date Second Choice:'});

$('#comments').compactform({ text: 'Special Requirements, Comments, other Notes:'});

$('#captcha').compactform({ text: 'Enter Anti-Spam Code:'});

$('#message').compactform({ text: 'Question/Message:'});



$('#captcha-reload').click(function(){

$('#captcha-img').attr('src', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_captcha','rand'=>0),$_smarty_tpl);?>
?' + new Date().getTime());

return false;

});



<?php ob_start(); ?>

rules:

{

	txtFirstName: { required: true },

	txtLastName: { required: true },

	txtEmail: {

	required: true,

	email: true

},

captcha: {

required: true,

digits: true

}

},

messages:

{

	txtFirstName: '',

	txtLastName: '',

	txtEmail: {

	required: '',

	email: ''

},

captcha: {

required: '',

digits: ''

},		

message: ''

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

invalidHandler: function()

{

	$('#cpf-page-form input').each(function(){

	var cf = $(this).data('compactForm');

	if (cf)

	{

	cf.Refresh();

}

});

}

<?php  Smarty::$_smarty_vars['capture']['validation_rules']=ob_get_clean();?>

<?php smarty_template_function_cpf_validator($_smarty_tpl,array('rules'=>Smarty::$_smarty_vars['capture']['validation_rules'],'noscript'=>true));?>





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