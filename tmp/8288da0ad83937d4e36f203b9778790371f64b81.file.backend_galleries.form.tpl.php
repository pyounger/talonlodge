<?php /* Smarty version Smarty-3.0.8, created on 2016-10-11 10:00:37
         compiled from "/home2/talonlod/public_html/app/templates/forms/backend_galleries.form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173299011957fd28c564fa96-81937646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8288da0ad83937d4e36f203b9778790371f64b81' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/forms/backend_galleries.form.tpl',
      1 => 1475595703,
      2 => 'file',
    ),
    'ec0be9e6b0f55692fbe4fa56ad9e0df159f9425c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/backend.form.tpl',
      1 => 1475595737,
      2 => 'file',
    ),
    '32aa098cd1c331689fb52fce178281f53e5bd351' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/backend.tpl',
      1 => 1475595741,
      2 => 'file',
    ),
    'c34ddd0b9796c844f477b0c57c19a6d51b315fa2' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.validator.errors.tpl',
      1 => 1475595831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173299011957fd28c564fa96-81937646',
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
<?php if (!is_callable('smarty_modifier_copyright')) include '/home2/talonlod/public_html/cpf/core/view/smarty/plugins/modifier.copyright.php';
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
backend.galleries.editing_gallery<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php  Smarty::$_smarty_vars['capture']['page_title']=ob_get_clean();?>
	<?php }else{ ?>
		<?php ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.galleries.adding_gallery<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
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
                

	<?php $_smarty_tpl->tpl_vars['cpf_breadcrumb'] = new Smarty_variable(array(array(t('backend.galleries.galleries'),cpf_link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value))),array(Smarty::$_smarty_vars['capture']['page_title'])), null, null);?>

	<?php ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'default'),$_smarty_tpl);?>
<?php  Smarty::$_smarty_vars['capture']['back_url']=ob_get_clean();?>

    <?php $_smarty_tpl->tpl_vars['required_types'] = new Smarty_variable(cpf_config('APP.GALLERIES.REQUIRED_IMAGE_TYPES'), null, null);?>
    <?php $_smarty_tpl->tpl_vars['default_video_settings'] = new Smarty_variable(cpf_config('APP.GALLERIES.VIDEO_SETTINGS'), null, null);?>
	<?php ob_start(); ?>
		rules: {
			title: { required: true }<?php if (count($_smarty_tpl->getVariable('required_types')->value)>0){?>,<?php }?>
            <?php  $_smarty_tpl->tpl_vars['itype'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('required_types')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['itype']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['itype']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['itypes']['iteration']=0;
if ($_smarty_tpl->tpl_vars['itype']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itype']->key => $_smarty_tpl->tpl_vars['itype']->value){
 $_smarty_tpl->tpl_vars['itype']->iteration++;
 $_smarty_tpl->tpl_vars['itype']->last = $_smarty_tpl->tpl_vars['itype']->iteration === $_smarty_tpl->tpl_vars['itype']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['itypes']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['itypes']['last'] = $_smarty_tpl->tpl_vars['itype']->last;
?>
                width_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['itypes']['iteration'];?>
: { required: true },
                height_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['itypes']['iteration'];?>
: { required: true }<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['itypes']['last']){?>,<?php }?>
            <?php }} ?>
		},
		messages: {
			title: { required: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.galleries.required_title<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
' }<?php if (count($_smarty_tpl->getVariable('required_types')->value)>0){?>,<?php }?>
            <?php  $_smarty_tpl->tpl_vars['itype'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('required_types')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['itype']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['itype']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['itypes']['iteration']=0;
if ($_smarty_tpl->tpl_vars['itype']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itype']->key => $_smarty_tpl->tpl_vars['itype']->value){
 $_smarty_tpl->tpl_vars['itype']->iteration++;
 $_smarty_tpl->tpl_vars['itype']->last = $_smarty_tpl->tpl_vars['itype']->iteration === $_smarty_tpl->tpl_vars['itype']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['itypes']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['itypes']['last'] = $_smarty_tpl->tpl_vars['itype']->last;
?>
                width_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['itypes']['iteration'];?>
: { required: '' },
                height_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['itypes']['iteration'];?>
: { required: '' }<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['itypes']['last']){?>,<?php }?>
            <?php }} ?>
		}
	<?php  Smarty::$_smarty_vars['capture']['validation_rules']=ob_get_clean();?>
	<?php smarty_template_function_cpf_validator($_smarty_tpl,array('rules'=>Smarty::$_smarty_vars['capture']['validation_rules']));?>



    
                
                    <?php if ($_smarty_tpl->getVariable('cpf_breadcrumb')->value){?>
                        <?php smarty_template_function_cpf_breadcrumb($_smarty_tpl,array('data'=>array_merge(array(array(t('Dashboard'),cpf_link(array('controller'=>'backend_index')))),$_smarty_tpl->getVariable('cpf_breadcrumb')->value)));?>

                    <?php }?>
                
                
	
                
	<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.validator.errors.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '173299011957fd28c564fa96-81937646';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2016-10-11 10:00:37
         compiled from "/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.validator.errors.tpl" */ ?>

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
<?php /*  End of included template "/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.validator.errors.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

	<form action="<?php echo (($tmp = @Smarty::$_smarty_vars['capture']['action'])===null||$tmp==='' ? $_smarty_tpl->getVariable('cpf_url_current')->value : $tmp);?>
" method="post" id="cpf-page-form"<?php if (Smarty::$_smarty_vars['capture']['is_upload_form']){?> enctype="multipart/form-data"<?php }?> class="form-horizontal">
        <fieldset>
            <legend><?php echo Smarty::$_smarty_vars['capture']['page_title'];?>
</legend>


    
                

	<?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>"text",'field'=>"title"));?>

    <?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>"select",'field'=>"type_id",'list'=>$_smarty_tpl->getVariable('types')->value));?>

    <?php $_smarty_tpl->tpl_vars['field'] = new Smarty_variable('parent_id', null, null);?>
    <div class="control-group">
        <label for="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" class="control-label"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tables.galleries.parent_id<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
        <div class="controls">
            <select id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" class="field <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
                <?php  $_smarty_tpl->tpl_vars['gallery'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('galleries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gallery']->key => $_smarty_tpl->tpl_vars['gallery']->value){
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('gallery')->value->data->id;?>
"<?php if ($_smarty_tpl->getVariable('gallery')->value->data->id==$_smarty_tpl->getVariable('parent_id')->value){?> selected="selected"<?php }?><?php if ($_smarty_tpl->getVariable('gallery')->value->data->id==$_smarty_tpl->getVariable('id')->value){?> disabled="disabled"<?php }?>>
                        <?php if ($_smarty_tpl->getVariable('gallery')->value->data->level>0){?><?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('gallery')->value->data->level-1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['name'] = 'dashes';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['total']);
?>—<?php endfor; endif; ?> <?php }?><?php echo $_smarty_tpl->getVariable('gallery')->value->data->title;?>

                    </option>
                <?php }} ?>
            </select>
        </div>
    </div>
    <?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>"ck_editor",'field'=>"description",'loadJS'=>true));?>

    <?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>"text",'field'=>"classname"));?>

    <?php smarty_template_function_cpf_input_helper($_smarty_tpl,array('type'=>"hidden",'field'=>"page_id"));?>


    
                
    <div class="form-actions">
        <?php if ($_smarty_tpl->getVariable('cpf_is_edit')->value){?>
            <?php smarty_template_function_cpf_submit($_smarty_tpl,array('title'=>t('backend.common.save'),'icon'=>'plus-sign'));?>

            <?php smarty_template_function_cpf_submit($_smarty_tpl,array('title'=>t('backend.common.save_and_continue'),'icon'=>'check','id'=>"form-apply"));?>

            <?php smarty_template_function_cpf_button($_smarty_tpl,array('title'=>t('backend.galleries.items'),'icon'=>'th icon-white','url'=>cpf_link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'view','id'=>$_smarty_tpl->getVariable('id')->value)),'class'=>"btn-success"));?>

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
            
    $(".collapse").collapse()

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