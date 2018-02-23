<?php /* Smarty version Smarty-3.0.8, created on 2017-12-20 09:24:58
         compiled from "/home2/talonlod/public_html/app/templates/frontend_reservation.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18356343295a03aa697ac3e7-99023604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '229b875607b38e42fc7667676a4e0318e580aacf' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_reservation.view.tpl',
      1 => 1510189615,
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
  'nocache_hash' => '18356343295a03aa697ac3e7-99023604',
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
<?php if (!is_callable('smarty_modifier_truncate')) include '/home2/talonlod/public_html/cpf/libs/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home2/talonlod/public_html/cpf/libs/smarty/plugins/modifier.date_format.php';
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
      


<div class="b-reservation-view-wrapper l-center">

    <h1 class="baltica-plain pkgif">Package Information</h1>
    <?php if ($_smarty_tpl->getVariable('web')->value=="bluffhouse"){?>
    <h1 class="baltica-plain bb">Online Reservation</h1>
    <?php }?>
    <div class="btns">
        <a id = "preve" href = "http://www.talonlodge.com/reservation/?start=<?php echo $_smarty_tpl->getVariable('start')->value;?>
&end=<?php echo $_smarty_tpl->getVariable('end')->value;?>
&adults=<?php echo $_smarty_tpl->getVariable('sessadults')->value;?>
">Previous Page</a>
        <a id = "preve" class="b-reservation-view-confirm resrvreq" href="#confirm"">Reservation Request</a>
    </div>

    <?php $_template = new Smarty_Internal_Template('includes/frontend.ui/frontend.errors.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '18356343295a03aa697ac3e7-99023604';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2017-12-20 09:24:58
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
    <?php if ($_smarty_tpl->getVariable('success')->value){?><p class="b-contacts-success">Your Reservation Request has been sent!</p><?php }?>

    <div class="b-reservation-view-container">
        <div class="b-reservation-view-column">
            <div class="b-reservation-subcolumn">
                <div class="b-reservation-view-r">
                    <div class="b-reservation-view-l">

                        <p><?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Package_Name'];?>
</p>

                        <h2><?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Package_Min_Days']+1;?>
 Nights / <?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Package_Min_Days'];?>
 - <?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Type_Of_Adventure'];?>
</h2>
                        <p><?php echo $_smarty_tpl->getVariable('package')->value->ocdTFaccount_id;?>
</p>
                        <p><?php echo $_smarty_tpl->getVariable('slug')->value;?>
</p>
                        </br>
                        
                    </div>
                </div>
                <style>
                @media (min-width:280px) and (max-width:640px){
                    #vmd{
                        top:2% !important;
                        z-index:99;
                    }
                }

                @media (min-width:280px) and (max-width:420px){
                    .l-center {
                        width: 95% !important;
                        padding: 0 8px !important;
                    } 
                }
                    table, th, td {
                        border: 1px solid #bdbbbb;
                    }
                    table td {
                        padding: 0;
                        padding-left: 10px;
                    }
                    th {
                        background-color: #eeeeee !important;
                    }
                    #vmd {
                        position: fixed;
                        background: #fff;
                        width: 50%;
                        top: 15%;
                        left: 0;
                        right: 0;
                        margin: 0 auto;
                        padding: 5px;
                        height: auto;
                        border-radius: 10px;
                        border: 1px solid #c3c3c3;
                        z-index: 99999;
                    }
                    #vmd .modal-content .modal-header {
                    position: relative;
                    width: 100%;
                    height: 40px;
                    float: left;
                }

                #vmd .modal-content .close {
                    position: absolute;
                    right: 0;
                    top: 0;
                    padding: 8px;
                    font-size: 24px;
                    background: transparent;
                    font-weight: 700;
                }

                #vmd .modal-content .modal-body {
                    clear: both;
                }

                #vmd .modal-content .modal-footer {
                    font-size: 16px;
                    padding: 10px 20px;
                    text-align: left;
                }
                #vmd .modal-content .close:hover {
                    cursor: pointer;
                    color: #a93101;
                }
                #viewmdl:hover {
                    cursor: pointer;
                    color: #c52d00;
                }
                .b-reservation-view-price span {
                    float: left;
                    margin-top: 10px;
                }

                .b-reservation-view-price .ppdo {
                    float: left;
                    width: 100%;
                    margin-top: 6px;
                }
                .b-reservation-view-price {
                    height: 86px !important;
                }
                .b-reservation-right-top {
                    height: 96px;
                }
                .b-reservation-view-container{
                    float: left;
                }
                @media (min-width:280px) and (max-width: 768px){
                    #vmd {
                        width: 95% !important;
                    }
                    .pkgif{
                        width: 100% !important;
                    }
                    .btns{
                        float: left !important;
                        margin-top: 20px;
                    }
                }
                label#viewmdl {
                    color: blue;
                    text-decoration: underline;
                }
                #vmd .modal-content .modal-footer {
                    font-family: sans-serif;
                    font-size: 14px !important;
                    font-weight: bold;
                    text-align: justify;
                }
                .resrvreq {
                    width: auto;
                    height: auto;
                    margin: 0px 10px 0px 0px;
                }
                .pkgif{
                    width: fit-content;
                    float: left;
                    margin: 0 !important;
                }
                #fancy_outer {
                    position: fixed !important;
                    top: 15% !important;
                    z-index: 99999 !important;
                }
                </style>
                <div class="b-reservation-view-list">

                    <!-- ......added for new doc(Parvez) .....-->
                    <span class="b-reservation-view-title"><h2 style="font-size: 17px;">Available Accomodations:</h2></span>
                    <!-- </br> -->
                        <table>
                            <tr>
                                <th>Accomodation</th>
                                <th>Min Occupancy</th>
                                <th>Max Occupancy</th>
                                <th>Rate Per Person</th>
                            </tr>

                             <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('PackageDetail')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value){
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['details']->value['Resource_Name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['details']->value['Min_Occupancy'];?>
 People</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['details']->value['Max_occupancy'];?>
 People</td>
                              <?php  $_smarty_tpl->tpl_vars['matter'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('MatterPort')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['matter']->key => $_smarty_tpl->tpl_vars['matter']->value){
?>
                                <?php if ($_smarty_tpl->tpl_vars['details']->value['Resource_Name']==$_smarty_tpl->tpl_vars['matter']->value['Resource_Name']){?>
                                <td><?php echo $_smarty_tpl->tpl_vars['details']->value['rate_per_person'];?>
  <label data-option="<?php echo $_smarty_tpl->tpl_vars['matter']->value['Resource_Name'];?>
" data-source="<?php echo $_smarty_tpl->tpl_vars['matter']->value['Matter_Port'];?>
" class="viewmdl" id="viewmdl" onclick="openThisUrl(this.getAttribute('data-source'), this.getAttribute('data-option'))">View</label></td>
                                                                  
                                    <input data-source="<?php echo $_smarty_tpl->tpl_vars['matter']->value['Matter_Port'];?>
" type="hidden" id="murl" class="murl">
                                <?php }?>
                               <?php }} ?>  
                            </tr>
                            <?php }} ?>
                        </table>
                        </br></br>
<!-- m-edit start -->             
    <div class="viewoverlay" id="vmd" style="display:none;">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <iframe id="viewframe" src="https://my.matterport.com/show/?m=EgbkVaKAAqM" style="height:400px;width:100%;"></iframe>
        </div>
        <div class="modal-footer">
            Description: <span id="getRName"></span> 
        </div>
      </div>   
    </div>
<!-- m -edit ends  -->
                    <!-- ....EndSectin for new doc(Parvez)... -->
                    <span class="b-reservation-view-title">Package Includes:</span>

                     <ul>
                        <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Package_IncludesByID')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
 $_from = $_smarty_tpl->getVariable('Package_DoesNot_IncludeByID')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
            <span>Prices Range from:</span>
                <div class="b-reservation-view-price">

                    <span>$<?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('LowestRate')->value,4,'');?>
 to $<?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('HighestRate')->value,4,'');?>
</span>
                   <p class="ppdo">Per Person, Double Occupancy</p>
                </div>
                <div class="b-reservation-view-additional">
                
                     <span class="b-reservation-view-title">Package Details:</span><br>
    
                    <p><?php echo $_smarty_tpl->getVariable('Package_Details')->value;?>
</p>           
                </div>
            </div>
        </div>
        
        <div class="b-reservation-view-column b-reservation-view-column-r">
         <div class="b-reservation-right-top">
            <p><span>Adventure type:</span> <?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Type_Of_Adventure'];?>
</p>
            <p><span>Species:</span> <?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Associated_Species'];?>
</p>
        </div>
        <div class="b-reservation-view-additional-details">

            <span class="b-reservation-view-title">Package Fees and Terms:</span><br>

            <p><?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Package_Fees'];?>
</p><br>
            <p><?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Package_Terms'];?>
</p>
        </div>
        <div class="b-reservation-view-deposit">
            <span class="b-reservation-view-title">Deposit:</span>
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Adult_Deposit'],4,'');?>
 / Person</p>
        </div>
        <div class="b-reservation-view-arrival-confirm">
            <div class="b-reservation-view-arrival">

                <p><span>Arrival Dates:</span> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Arrival_Start_Date'],"%m/%d/%Y");?>
</p>
            </div>
            
            <?php if ($_smarty_tpl->getVariable('web')->value=="bluffhouse"){?>
            <a id="open_popup" class="open_popup"></a> 
            <?php }else{ ?>
            <a class="b-reservation-view-confirm" href="#confirm">
                <?php }?>
            </a>
            
        </div>
    </div>

</div>

<div id="confirm" style="display: none">
   
    <form action="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" method="post" id="cpf-page-form">
     <h3 class="b-reservation-popup-info"><?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Package_Name'];?>
</h3>
     <p class="b-reservation-popup-info"><span>Arrival Dates:</span> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Arrival_Start_Date'],"%m/%d/%Y");?>
&ndash;<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Arrival_End_Date'],"%m/%d/%Y");?>
</p>
     <p class="b-reservation-popup-info"><span>Min People:</span> <?php echo $_smarty_tpl->getVariable('sessadults')->value;?>
</p>

            <input type="hidden" name="lodge_account_ID" id="lodge_account_ID" value="<?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Account_ID'];?>
">

            <input type="hidden" name="Package_Name" id="Package_Name" value="<?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Package_Name'];?>
"> 

            <input type="hidden" name="Pms_Package_ID" id="Pms_Package_ID" value="<?php echo $_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Pms_Package_ID'];?>
">

            <input type="hidden" name="Arrival_Start_Date" id="Arrival_Start_Date" value='<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('PackageDetailByID')->value[0]['Arrival_Start_Date'],"%m/%d/%Y");?>
'>

            <input type="hidden" name="Num_Adults" id="Num_Adults" value="<?php echo $_smarty_tpl->getVariable('sessadults')->value;?>
">

            <input type="hidden" name="oid" value="00D300000000HQz">

            <input type="hidden" name="retURL" value="http://www.talonlodge.com/store/ebrochure_thanks.asp">
          
     <div class="b-brochure-input-r">
        <div class="b-brochure-input-l">
            <input type="text" id="popup-first-name" name="firstName" value="<?php echo $_smarty_tpl->getVariable('firstName')->value;?>
" required placeholder="First Name: *" />
        </div>
    </div>
    <div class="b-brochure-input-r">
        <div class="b-brochure-input-l">
            <input type="text" id="popup-last-name" name="lastName" value="<?php echo $_smarty_tpl->getVariable('lastName')->value;?>
" required placeholder="Last Name: *" />
        </div>
    </div>
    <div class="b-brochure-input-r">
        <div class="b-brochure-input-l">
            <input type="email" id="popup-email" name="email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
" required placeholder="Email: *" />
        </div>
    </div>
    <div class="b-brochure-input-r">
        <div class="b-brochure-input-l">
            <input type="text" id="popup-home-phone" name="phone" value="<?php echo $_smarty_tpl->getVariable('phone')->value;?>
" required placeholder="Phone: *"/>
        </div>
    </div>
    <textarea id="popup-comments" name="comments"><?php echo $_smarty_tpl->getVariable('comments')->value;?>
</textarea>
    <div class="b-popup-footer">
        <button type="submit"></button>
    </div>
    
</form>
</div> 

<?php echo isset($_smarty_tpl->getVariable('_SESSION',null,true,false)->value['reservation_adults']);?>


<div id="popup" class="popup-bg" style="display:none;" >
    <div class="popup-container">
        <div class="popup-close"></div>
        <span id="success_msg" class="success_msg"></span>
        <div id="form-reservation">
            <h3 class="b-reservation-popup-info"><?php echo $_smarty_tpl->getVariable('package')->value->Package_Name;?>
</h3>
            <p class="b-reservation-popup-info"><span>Arrival Dates:</span> <?php echo smarty_modifier_datetime_format($_smarty_tpl->getVariable('package')->value->Arrival_Start_Date,'m/d/Y');?>
&ndash;<?php echo smarty_modifier_datetime_format($_smarty_tpl->getVariable('package')->value->Arrival_End_Date,'m/d/Y');?>
</p>
            <p class="b-reservation-popup-info"><span>Min People:</span> <?php echo (($tmp = @$_smarty_tpl->getVariable('reservation_adults')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('package')->value->Package_Min_People : $tmp);?>
</p>
            <span id="form_error" class="form_error"></span>
            

            <input type="hidden" name="lodge_account_ID" id="lodge_account_ID" value="<?php echo $_smarty_tpl->getVariable('package')->value->Account_ID;?>
">

            <input type="hidden" name="Package_Name" id="Package_Name" value="<?php echo $_smarty_tpl->getVariable('package')->value->Package_Name;?>
"> 

            <input type="hidden" name="Pms_Package_ID" id="Pms_Package_ID" value="<?php echo $_smarty_tpl->getVariable('package')->value->Pms_Package_ID;?>
">

            <input type="hidden" name="Arrival_Start_Date" id="Arrival_Start_Date" value="<?php echo $_smarty_tpl->getVariable('package')->value->Arrival_Start_Date->format('m/d/Y');?>
">

            <input type="hidden" name="Adult_Cost" id="Adult_Cost" value="<?php echo $_smarty_tpl->getVariable('package')->value->Adult_Cost;?>
">
            
            <input type="hidden" name="Num_Adults" id="Num_Adults" value="<?php echo $_smarty_tpl->getVariable('bipin')->value;?>
">
            
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="firstName" name="firstName" placeholder="Frist Name" />
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="lastName" name="lastName"  placeholder="Last Name"/>
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="email" name="email" placeholder="Email"/>
                </div>
            </div>
            <div class="b-brochure-input-r">
                <div class="b-brochure-input-l">
                    <input type="text" id="phone" name="phone" placeholder="Phone"/>
                </div>
            </div> 
            <textarea id="comments" name="comments" class="comments" placeholder="Comments"> </textarea>
            <div class="b-popup-footer">
                <a id="submitme" class="submit-popup"></a>
            </div> 
        </div>             
    </div>
</div>
<!-- <a id="submitme"> Click Here </a> -->
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
    cforms.push($('input#popup-first-name').compactform({ text: ''}));
    cforms.push($('input#popup-last-name').compactform({ text: ''}));
    cforms.push($('input#popup-email').compactform({ text: ''}));
    cforms.push($('input#popup-home-phone').compactform({ text: ''}));
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