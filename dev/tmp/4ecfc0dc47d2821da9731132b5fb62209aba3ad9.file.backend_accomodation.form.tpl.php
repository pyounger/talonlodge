<?php /* Smarty version Smarty-3.0.8, created on 2016-11-02 15:52:55
         compiled from "/home2/talonlod/public_html/dev/app/templates/forms/backend_accomodation.form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2012172208581a7c57419752-10518130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ecfc0dc47d2821da9731132b5fb62209aba3ad9' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/forms/backend_accomodation.form.tpl',
      1 => 1478130767,
      2 => 'file',
    ),
    'e74cda78aa00d1931a833e0b7002f46b61f8817a' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/backend.form.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
    '6a88d893845b39ffd0d096eff2c68909d8044d4b' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/backend.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
    '0355f0548c7264da21079ceee1568821d93f8baf' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.validator.errors.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2012172208581a7c57419752-10518130',
  'function' => 
  array (
    'cpf_submit' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_icon_common' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_button' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_input' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_input_helper' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_validator' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_th' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_icon' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_breadcrumb' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_pager' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_youtube_video' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_youtube_video_iframe' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_youtube_thumb' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_ckeditor')) include '/home2/talonlod/public_html/dev/app/view/smarty/plugins/function.ckeditor.php';
if (!is_callable('smarty_modifier_copyright')) include '/home2/talonlod/public_html/dev/cpf/core/view/smarty/plugins/modifier.copyright.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $_smarty_tpl->getVariable('cpf_lang')->value;?>
">
<head>
	<title>
		<?php ob_start(); ?>
<?php if ($_smarty_tpl->getVariable('cpf_is_edit')->value){?>
<?php ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.editing_accomodation<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php  Smarty::$_smarty_vars['capture']['page_title']=ob_get_clean();?>
<?php }else{ ?>
<?php ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.adding_accomodation<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php  Smarty::$_smarty_vars['capture']['page_title']=ob_get_clean();?>
<?php }?>
<?php echo Smarty::$_smarty_vars['capture']['page_title'];?>

<?php  Smarty::$_smarty_vars['capture']['cpf_block_title']=ob_get_clean();?> 
		<?php echo Smarty::$_smarty_vars['capture']['cpf_block_title'];?>
 &mdash; <?php echo t($_smarty_tpl->getVariable('cpf_site_title')->value);?>

	</title>

	<base href="<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
" />        
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="generator" content="<?php echo $_smarty_tpl->getVariable('cpf_version')->value;?>
 / <?php echo $_smarty_tpl->getVariable('cpf_app_start_version')->value;?>
" />
		
	<link type="text/css" href="static/css/common/bootstrap/bootstrap.css" rel="stylesheet" media="screen" />
	<link type="text/css" href="asset-css-backend.v<?php echo $_smarty_tpl->getVariable('cpf_assets_version')->value;?>
.css" rel="stylesheet" media="screen" />

	<script type="text/javascript" src="asset-js-backend-<?php echo $_smarty_tpl->getVariable('cpf_lang')->value;?>
.v<?php echo $_smarty_tpl->getVariable('cpf_assets_version')->value;?>
.js"></script>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
static/images/backend/favicon.ico" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.form_submit.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_submit')) {
    function smarty_template_function_cpf_submit($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_submit']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
 

<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.icon_common.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_icon_common')) {
    function smarty_template_function_cpf_icon_common($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_icon_common']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
 

<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.form_button.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_button')) {
    function smarty_template_function_cpf_button($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_button']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
 

<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.form_input.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_input')) {
    function smarty_template_function_cpf_input($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_input']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
 
<?php if (!function_exists('smarty_template_function_cpf_input_helper')) {
    function smarty_template_function_cpf_input_helper($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_input_helper']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.validator.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_validator')) {
    function smarty_template_function_cpf_validator($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_validator']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
 

<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.th.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_th')) {
    function smarty_template_function_cpf_th($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_th']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
 

<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.icon.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_icon')) {
    function smarty_template_function_cpf_icon($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_icon']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
 

<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.breadcrumb.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_breadcrumb')) {
    function smarty_template_function_cpf_breadcrumb($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_breadcrumb']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.pager.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_pager')) {
    function smarty_template_function_cpf_pager($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_pager']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<!--
	Smarty template functions for inserting YouTube video & thumbs
-->

<?php $_template = new Smarty_Internal_Template('includes/common.ui/common.youtube.video.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_youtube_video')) {
    function smarty_template_function_cpf_youtube_video($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_youtube_video']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>

<?php $_template = new Smarty_Internal_Template('includes/common.ui/common.youtube.video.iframe.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_youtube_video_iframe')) {
    function smarty_template_function_cpf_youtube_video_iframe($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_youtube_video_iframe']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<?php $_template = new Smarty_Internal_Template('includes/common.ui/common.youtube.thumb.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php if (!function_exists('smarty_template_function_cpf_youtube_thumb')) {
    function smarty_template_function_cpf_youtube_thumb($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_youtube_thumb']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<body class="cpf-controller-<?php echo $_smarty_tpl->getVariable('cpf_controller')->value;?>
 cpf-action-<?php echo $_smarty_tpl->getVariable('cpf_action')->value;?>
 cpf-<?php echo $_smarty_tpl->getVariable('cpf_controller')->value;?>
-<?php echo $_smarty_tpl->getVariable('cpf_action')->value;?>
">

    <div class="cpf-wrap">

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_index'||($_smarty_tpl->getVariable('cpf_controller')->value=='backend_profile'&&$_smarty_tpl->getVariable('cpf_action')->value=='login')){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_index','abs'=>'true'),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_index'),$_smarty_tpl);?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('cpf_site_title')->value;?>
</a>
                    <div class="nav-collapse">
                        <?php $_template = new Smarty_Internal_Template('includes/backend.menu.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    
        <div class="container">
            <div class="row">
                
<?php ob_start(); ?>Any value here :)<?php  Smarty::$_smarty_vars['capture']['is_upload_form']=ob_get_clean();?>

<?php $_smarty_tpl->tpl_vars['cpf_breadcrumb'] = new Smarty_variable(array(array(t('backend.accomodation.accomodation'),cpf_link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value))),array(Smarty::$_smarty_vars['capture']['page_title'])), null, null);?>

	<?php ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value),$_smarty_tpl);?>
<?php  Smarty::$_smarty_vars['capture']['back_url']=ob_get_clean();?>

	<?php ob_start(); ?>
	rules: {
	title: { required: true },
	description: { ck_not_empty: true },
	one_bedroom_description: { ck_not_empty: true },
	two_bedroom_description: { ck_not_empty: true },
	<?php if (!$_smarty_tpl->getVariable('cpf_is_edit')->value){?>
	main_image: { required: true },
	one_bedroom_image: { required: true },
	two_bedroom_image: { required: true },
	<?php }?>
	one_bedroom_popup_description: { ck_not_empty: true },
	two_bedroom_popup_description: { ck_not_empty: true }
},
messages: {
title: { required: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.required_title<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
' },
description: { ck_not_empty: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.required_description<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
' },
one_bedroom_description: { ck_not_empty: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.required_one_bedroom_description<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
' },
two_bedroom_description: { ck_not_empty: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.required_two_bedroom_description<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
'},
<?php if (!$_smarty_tpl->getVariable('cpf_is_edit')->value){?>
main_image: { required: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.required_main_image<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
'},
one_bedroom_image: { required: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.required_one_bedroom_image<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
'},
two_bedroom_image: { required: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.required_two_bedroom_image<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
'},
<?php }?>
one_bedroom_popup_description: { ck_not_empty: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.required_one_bedroom_popup_description<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
'},
two_bedroom_popup_description: { ck_not_empty: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.accomodation.required_two_bedroom_popup_description<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
'}
}
<?php  Smarty::$_smarty_vars['capture']['validation_rules']=ob_get_clean();?>
<?php smarty_template_function_cpf_validator($_smarty_tpl,array('rules'=>Smarty::$_smarty_vars['capture']['validation_rules']));?>



    
                
                    <?php if ($_smarty_tpl->getVariable('cpf_breadcrumb')->value){?>
                        <?php smarty_template_function_cpf_breadcrumb($_smarty_tpl,array('data'=>array_merge(array(array(t('Dashboard'),cpf_link(array('controller'=>'backend_index')))),$_smarty_tpl->getVariable('cpf_breadcrumb')->value)));?>

                    <?php }?>
                
                
	
                
	<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.validator.errors.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '2012172208581a7c57419752-10518130';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2016-11-02 15:52:55
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.validator.errors.tpl" */ ?>

<?php if ($_smarty_tpl->getVariable('cpf_errors')->value){?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cpf_errors')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
?>
			<p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
		<?php }} ?>
	</div>
	<script type="text/javascript">
	/*<![CDATA[*/
	$(function(){
		$(".alert-message").alert()
	});
	/* ]]>*/
	</script>

<?php }?>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.validator.errors.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

	<form action="<?php echo (($tmp = @Smarty::$_smarty_vars['capture']['action'])===null||$tmp==='' ? $_smarty_tpl->getVariable('cpf_url_current')->value : $tmp);?>
" method="post" id="cpf-page-form"<?php if (Smarty::$_smarty_vars['capture']['is_upload_form']){?> enctype="multipart/form-data"<?php }?> class="form-horizontal">
        <fieldset>
            <legend><?php echo Smarty::$_smarty_vars['capture']['page_title'];?>
</legend>


    
                
<?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'title','class'=>"span9"));?>

<div class="control-group">
	<div class="row">
		<div class="span4" style="padding-left: 10px;">
			<label for="description" class="">Description:</label>
		</div>
		<div class="span5">
			<div id="counter">
				<div class="barcount">
					<div class="bar bluebar"></div>
				</div><!-- end barcount -->
				<div id="count"></div>
				<p>350 Characters Maximum</p>				
			</div><!-- end counter -->						
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="controls">
		<div style="width: 720px;">
			<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('height')->value)===null||$tmp==='' ? "150" : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_ckeditor(array('BasePath'=>"static/javascript/backend/ckeditor/",'InstanceName'=>'description','height'=>$_tmp1."px",'toolbar'=>"CPFDefault",'Value'=>$_smarty_tpl->getVariable('description')->value,'loadJS'=>true,'language'=>$_smarty_tpl->getVariable('cpf_lang')->value),$_smarty_tpl);?>

		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="main_image"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tables.accomodation.main_image<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
	<div class="controls">
		<input type="file" id="main_image" name="main_image" class="input-file" />
	</div>
	<?php if ($_smarty_tpl->getVariable('main_image')->value){?>
	<div class="controls">
		<img src="<?php echo $_smarty_tpl->getVariable('attachment_url')->value;?>
<?php echo $_smarty_tpl->getVariable('main_image')->value;?>
" />
	</div>
	<?php }?>
</div>
<?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'main_image_alt','class'=>"span13"));?>


<table>
	<tbody>
		<tr>
			<td><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'url_one','class'=>"span13"));?>
</td>
			<td style="padding: 0 0 0 20px;"><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'url_two','class'=>"span13"));?>
</td>
		</tr>
		<tr>
			<td><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'ck_editor','field'=>'one_bedroom_description','width'=>'450'));?>
</td>
			<td style="padding: 0 0 0 20px;"><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'ck_editor','field'=>'two_bedroom_description','width'=>'450'));?>
</td>
		</tr>
		<tr>
			<td><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'one_bedroom_title','class'=>"span13"));?>
</td>
			<td style="padding: 0 0 0 20px;"><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'two_bedroom_title','class'=>"span13"));?>
</td>
		</tr>
		<tr>
			<td><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'ck_editor','field'=>'one_bedroom_popup_description','width'=>'450'));?>
</td>
			<td style="padding: 0 0 0 20px;"><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'ck_editor','field'=>'two_bedroom_popup_description','width'=>'450'));?>
</td>
		</tr>
		<tr>
			<td><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'ck_editor','field'=>'one_popup_image_description','width'=>'450'));?>
</td>
			<td style="padding: 0 0 0 20px;"><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'ck_editor','field'=>'two_popup_image_description','width'=>'450'));?>
</td>
		</tr>
		<tr>
			<td>
				<div class="control-group">
					<label class="control-label" for="one_bedroom_image"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tables.accomodation.one_bedroom_image<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
					<div class="controls">
						<input type="file" id="one_bedroom_image" name="one_bedroom_image"  enctype="multipart/form-data" class="input-file" />
					</div>
					<?php if ($_smarty_tpl->getVariable('one_bedroom_image')->value){?>
					<div class="controls">
						<img src="<?php echo $_smarty_tpl->getVariable('attachment_url')->value;?>
<?php echo $_smarty_tpl->getVariable('one_bedroom_image')->value;?>
" />
					</div>
					<?php }?>
				</div>
				<?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'one_bedroom_image_alt','class'=>"span13"));?>

			</td>
			<td style="padding: 0 0 0 20px;">
				<div class="control-group">
					<label class="control-label" for="two_bedroom_image"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tables.accomodation.two_bedroom_image<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
					<div class="controls">
						<input type="file" id="two_bedroom_image" name="two_bedroom_image" class="input-file" />
					</div>
					<?php if ($_smarty_tpl->getVariable('two_bedroom_image')->value){?>
					<div class="controls">
						<img src="<?php echo $_smarty_tpl->getVariable('attachment_url')->value;?>
<?php echo $_smarty_tpl->getVariable('two_bedroom_image')->value;?>
" />
					</div>
					<?php }?>
				</div>
				<?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'two_bedroom_image_alt','class'=>"span13"));?>

			</td>
		</tr>
		<tr>
			<td>
				<div class="control-group">
					<label class="control-label" for="one_bedroom_small_image"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tables.accomodation.one_bedroom_small_image<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
					<div class="controls">
						<input type="file" id="one_bedroom_image" name="one_bedroom_small_image" class="input-file" />
					</div>
					<?php if ($_smarty_tpl->getVariable('one_bedroom_small_image')->value){?>
					<div class="controls">
						<img src="<?php echo $_smarty_tpl->getVariable('attachment_url')->value;?>
<?php echo $_smarty_tpl->getVariable('one_bedroom_small_image')->value;?>
" />
					</div>
					<?php }?>
				</div>
				<?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'one_bedroom_small_image_alt','class'=>"span13"));?>

			</td>
			<td style="padding: 0 0 0 20px;">
				<div class="control-group">
					<label class="control-label" for="two_bedroom_small_image"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tables.accomodation.two_bedroom_small_image<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
					<div class="controls">
						<input type="file" id="two_bedroom_image" name="two_bedroom_small_image" class="input-file" />
					</div>
					<?php if ($_smarty_tpl->getVariable('two_bedroom_small_image')->value){?>
					<div class="controls">
						<img src="<?php echo $_smarty_tpl->getVariable('attachment_url')->value;?>
<?php echo $_smarty_tpl->getVariable('two_bedroom_small_image')->value;?>
" />
					</div>
					<?php }?>
				</div>
				<?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'text','field'=>'two_bedroom_small_image_alt','class'=>"span13"));?>

			</td>
		</tr>
		<tr>
			<td><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'checkbox','field'=>'one_popup'));?>
</td>
			<td style="padding: 0 0 0 20px;"><?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'checkbox','field'=>'two_popup'));?>
</td>
		</tr>
	</tbody>
</table>

<?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>'checkbox','field'=>'is_published'));?>


<!--<div class="control-group">
	<label class="control-label"></label>
	<div class="controls">
		<p class="help-block">Please upload JPEG, GIF or PNG files.<br/></p>			
	</div>
</div>
-->

    
                
        <div class="form-actions">
            <?php if ($_smarty_tpl->getVariable('cpf_is_edit')->value){?>
                <?php smarty_template_function_cpf_submit($_smarty_tpl,array('title'=>t('backend.common.save'),'icon'=>'plus-sign'));?>

                <?php smarty_template_function_cpf_submit($_smarty_tpl,array('title'=>t('backend.common.save_and_continue'),'icon'=>'check','id'=>"form-apply"));?>

            <?php }else{ ?>
                <?php smarty_template_function_cpf_submit($_smarty_tpl,array('title'=>t('backend.common.save'),'icon'=>'plus-sign'));?>

                <?php smarty_template_function_cpf_submit($_smarty_tpl,array('title'=>t('backend.common.save_and_continue'),'icon'=>'check','id'=>"form-apply"));?>

            <?php }?>
            <?php smarty_template_function_cpf_button($_smarty_tpl,array('title'=>t('backend.common.cancel'),'icon'=>'ban-circle','url'=>Smarty::$_smarty_vars['capture']['back_url']));?>

        </div>
	
                
        </fieldset>
    </form>

    
                <?php if (!$_smarty_tpl->getVariable('cpf_rights')->value->is_guest()){?>
                <footer class="footer">
                    <p style="float: right; color: gray;">Built with Twitter's Bootstrap toolkit and Icons from Glyphicons</p>
                    &copy;&nbsp;<?php echo smarty_modifier_copyright($_smarty_tpl->getVariable('cpf_release_year')->value);?>
&nbsp;<a href="http://www.crisp-studio.cz" title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.crisp_studio<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.crisp_studio<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
                </footer>
                <?php }?>
            </div><!-- /.row -->
        </div> <!-- /.container -->
    
        <script type="text/javascript">
        $(document).ready(function(){
            
function updateCount() 
{
	var limit = 350;
	var editor = CKEDITOR.instances['description'];
	var almost = editor.getData().replace(/(<([^>]+)>)/ig,"").replace(/\t/g,'').replace(/\n/g,'').replace(/\r/g,'');
	almost = $("<div/>").html(almost).text();
	var main = almost.length *100;
	var value = (main / limit);
	var count = limit - almost.length;
	$('#count').html(almost.length);
	if(almost.length <= limit) {
	jQuery('#count').html(count).removeClass("red");
	jQuery('.bar').animate({ "width": value+'%' }, 1).removeClass("redbar").addClass("bluebar");
} else {
jQuery('#count').html(count).addClass("red");
jQuery('.bar').animate({ "width": '100%' }, 1).removeClass("bluebar").addClass("redbar");
}
}
setInterval(updateCount, 1000);

        });
        </script>

    </div>
<noscript>
    <div class="modal-backdrop" style="width: 100%; height: 100%;">
        <div class="modal">
            <div class="modal-header"><h3><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.noscript_header<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h3></div>
            <div class="modal-body"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.noscript_text<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>
        </div>
    </div>
</noscript>
</body>
</html>