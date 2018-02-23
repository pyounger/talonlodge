<?php /* Smarty version Smarty-3.0.8, created on 2016-11-11 12:04:46
         compiled from "/home2/talonlod/public_html/dev/app/templates/backend_messages.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9074445595826326e05aea1-50404362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a76ae59a737e72159e1b83dbe3e6f436899ce38a' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/backend_messages.view.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
    'a95f5803ce97e4ffc1127e6527bcb9c64dea195d' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/backend.view.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
    '6a88d893845b39ffd0d096eff2c68909d8044d4b' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/backend.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9074445595826326e05aea1-50404362',
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
<?php if (!is_callable('smarty_modifier_truncate')) include '/home2/talonlod/public_html/dev/cpf/libs/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_datetime_format')) include '/home2/talonlod/public_html/dev/cpf/core/view/smarty/plugins/modifier.datetime_format.php';
if (!is_callable('smarty_modifier_copyright')) include '/home2/talonlod/public_html/dev/cpf/core/view/smarty/plugins/modifier.copyright.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $_smarty_tpl->getVariable('cpf_lang')->value;?>
">
<head>
	<title>
		<?php ob_start(); ?>
    <?php ob_start(); ?><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('entity')->value->message),100);?>
<?php  Smarty::$_smarty_vars['capture']['site_title']=ob_get_clean();?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.messages.messages<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
: <?php echo Smarty::$_smarty_vars['capture']['site_title'];?>

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
                
    <?php ob_start();?><?php echo Smarty::$_smarty_vars['capture']['site_title'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['cpf_breadcrumb'] = new Smarty_variable(array(array(t('backend.messages.messages'),cpf_link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value))),array($_tmp1,'')), null, null);?>

    <?php ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value),$_smarty_tpl);?>
<?php  Smarty::$_smarty_vars['capture']['back_url']=ob_get_clean();?>

    
                
                    <?php if ($_smarty_tpl->getVariable('cpf_breadcrumb')->value){?>
                        <?php smarty_template_function_cpf_breadcrumb($_smarty_tpl,array('data'=>array_merge(array(array(t('Dashboard'),cpf_link(array('controller'=>'backend_index')))),$_smarty_tpl->getVariable('cpf_breadcrumb')->value)));?>

                    <?php }?>
                
    
                
    <div class="row">
        <table class="span7 table-condensed">
            <tr>
                <td><h4><?php echo smarty_modifier_datetime_format($_smarty_tpl->getVariable('entity')->value->datetime,$_smarty_tpl->getVariable('cpf_langs')->value[$_smarty_tpl->getVariable('cpf_lang')->value]['date_format']);?>
</h4></td>
            </tr>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('entity')->value->first_name;?>
 <?php echo $_smarty_tpl->getVariable('entity')->value->last_name;?>
, <a href="mailto:<?php echo $_smarty_tpl->getVariable('entity')->value->email;?>
"><?php echo $_smarty_tpl->getVariable('entity')->value->email;?>
</a></td>
            </tr>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('entity')->value->message;?>
</td>
            </tr>
            <?php if ($_smarty_tpl->getVariable('entity')->value->ip){?>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('entity')->value->ip;?>
</td>
            </tr>
            <?php }?>
        </table>
    </div>

    
                
    <div class="form-actions">
        <?php ob_start(); ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.really_delete<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php  Smarty::$_smarty_vars['capture']['confirm']=ob_get_clean();?>
        <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'edit')){?>
            <?php smarty_template_function_cpf_button($_smarty_tpl,array('title'=>t('backend.common.edit'),'class'=>'btn-success','icon'=>'edit icon-white','url'=>cpf_link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('entity')->value->id))));?>

        <?php }?>
        <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'delete')){?>
            <?php smarty_template_function_cpf_button($_smarty_tpl,array('title'=>t('backend.common.delete'),'class'=>'btn-danger','icon'=>'trash icon-white','url'=>cpf_link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'delete','id'=>$_smarty_tpl->getVariable('entity')->value->id)),'onclick'=>"return confirm('".(Smarty::$_smarty_vars['capture']['confirm'])."');"));?>

        <?php }?>
    </div>

    
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