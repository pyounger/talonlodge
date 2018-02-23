<?php /* Smarty version Smarty-3.0.8, created on 2015-12-11 09:27:17
         compiled from "/home2/talonlod/public_html/dev/app/templates/backend_navigationelements.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1423961166566b15851f8ec3-62017527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa77e0a9a21f1df7e81e83e2e8d07b6145a9fbdf' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/backend_navigationelements.view.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
    '6093676ae1e992ac9007bdce361b3d24f470dc20' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/backend.table.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
    '6a88d893845b39ffd0d096eff2c68909d8044d4b' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/backend.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
    '390c48611204145d5ac6a34fbe45f0c215d10e42' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.common_actions.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1423961166566b15851f8ec3-62017527',
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
<?php if (!is_callable('smarty_function_cycle')) include '/home2/talonlod/public_html/dev/cpf/libs/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_copyright')) include '/home2/talonlod/public_html/dev/cpf/core/view/smarty/plugins/modifier.copyright.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $_smarty_tpl->getVariable('cpf_lang')->value;?>
">
<head>
	<title>
		<?php ob_start(); ?>
    <?php ob_start(); ?><?php echo $_smarty_tpl->getVariable('menu')->value->title;?>
<?php  Smarty::$_smarty_vars['capture']['site_title']=ob_get_clean();?>
    <?php echo Smarty::$_smarty_vars['capture']['site_title'];?>
: <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.navigation.menu_elements<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

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
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['cpf_breadcrumb'] = new Smarty_variable(array(array(t('backend.navigation.menu'),cpf_link(array('controller'=>'backend_navigation'))),array($_tmp1,'')), null, null);?>

    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'add')){?>
        <?php ob_start(); ?>
            <?php smarty_template_function_cpf_button($_smarty_tpl,array('title'=>t('backend.navigation.add_menu_element'),'icon'=>'plus-sign','url'=>cpf_link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'add','mid'=>$_smarty_tpl->getVariable('menu')->value->id))));?>

        <?php  Smarty::$_smarty_vars['capture']["common_actions"]=ob_get_clean();?>
    <?php }?>


    
                
                    <?php if ($_smarty_tpl->getVariable('cpf_breadcrumb')->value){?>
                        <?php smarty_template_function_cpf_breadcrumb($_smarty_tpl,array('data'=>array_merge(array(array(t('Dashboard'),cpf_link(array('controller'=>'backend_index')))),$_smarty_tpl->getVariable('cpf_breadcrumb')->value)));?>

                    <?php }?>
                
                
	<?php if (Smarty::$_smarty_vars['capture']['common_actions']){?>
		<?php $_template = new Smarty_Internal_Template('includes/backend.ui/backend.common_actions.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('actions',Smarty::$_smarty_vars['capture']['common_actions']);$_template->properties['nocache_hash']  = '1423961166566b15851f8ec3-62017527';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.8, created on 2015-12-11 09:27:17
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.common_actions.tpl" */ ?>

<div class="cpf-common-actions">
	<?php echo $_smarty_tpl->getVariable('actions')->value;?>

</div><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.common_actions.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
	<?php }?>

	<?php if (!Smarty::$_smarty_vars['capture']['pager_link']){?>
		<?php ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'sort'=>$_smarty_tpl->getVariable('cpf_order_sort')->value,'order'=>$_smarty_tpl->getVariable('cpf_order_order')->value,'page'=>$_smarty_tpl->getVariable('cpf_pager_fake_page')->value),$_smarty_tpl);?>
<?php  Smarty::$_smarty_vars['capture']['pager_link']=ob_get_clean();?>
	<?php }?>

	<?php smarty_template_function_cpf_pager($_smarty_tpl,array('direct_url'=>Smarty::$_smarty_vars['capture']['pager_link'],'full_list_enabled'=>false));?>


	<?php if (!empty($_smarty_tpl->getVariable('cpf_entities',null,true,false)->value)){?>
		<table summary="<?php echo (($tmp = @Smarty::$_smarty_vars['capture']['table_summary'])===null||$tmp==='' ? t('Main table on the page') : $tmp);?>
" class="table table-striped">
			<thead>
				<tr>
	<?php }?>

                
    <?php if (count($_smarty_tpl->getVariable('cpf_entities')->value)>1){?>
        <?php smarty_template_function_cpf_th($_smarty_tpl,array('field'=>'id','title'=>t('tables.navigation_menu_elements.id')));?>


        <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'toggle_published')){?>
            <?php smarty_template_function_cpf_th($_smarty_tpl,array('field'=>'is_published','no_link'=>true,'title'=>t('tables.navigation_menu_elements.is_published')));?>

        <?php }?>

        <?php smarty_template_function_cpf_th($_smarty_tpl,array('field'=>'title','title'=>t('tables.navigation_menu_elements.title')));?>

        <?php $_smarty_tpl->tpl_vars['show_actions'] = new Smarty_variable(false, null, null);?>
        <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'edit')||$_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'delete')){?>
            <?php $_smarty_tpl->tpl_vars['show_actions'] = new Smarty_variable(true, null, null);?>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('show_actions')->value){?>
            <?php smarty_template_function_cpf_th($_smarty_tpl,array('title'=>t('backend.common.actions')));?>

        <?php }?>
    <?php }?>

                
			</tr>
		</thead>
	<tbody>	

    
                
    <?php  $_smarty_tpl->tpl_vars['node'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cpf_entities')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['node']->key => $_smarty_tpl->tpl_vars['node']->value){
?>
    <?php $_smarty_tpl->tpl_vars['item'] = new Smarty_variable($_smarty_tpl->getVariable('node')->value->data, null, null);?>	
    <?php if ($_smarty_tpl->getVariable('item')->value->level>0){?>
        <tr class="<?php echo smarty_function_cycle(array('values'=>',alternate'),$_smarty_tpl);?>
">
            <td><?php echo $_smarty_tpl->getVariable('item')->value->id;?>
</td>
			<?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'toggle_published')){?>
			<td class="span1">
				<?php if ($_smarty_tpl->getVariable('item')->value->is_published){?>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'toggle_published','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
" class="icon-eye-open" title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.unpublish<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"></a>
				<?php }else{ ?>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'toggle_published','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
" class="icon-eye-close" title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.publish<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"></a>
				<?php }?>
			</td>
			<?php }?>
			
            <td>
                <?php if ($_smarty_tpl->getVariable('item')->value->level>0){?><?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dashes']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('item')->value->level-1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?>—<?php endfor; endif; ?> <?php }?>
                <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'edit')){?>
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>"edit",'id'=>$_smarty_tpl->getVariable('item')->value->id,'mid'=>$_smarty_tpl->getVariable('menu')->value->id),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('item')->value->title;?>
</a>
                <?php }else{ ?>
                    <?php echo $_smarty_tpl->getVariable('item')->value->title;?>

                <?php }?>
            </td>
            <?php if ($_smarty_tpl->getVariable('show_actions')->value){?>
                <td>
                    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'edit')){?>
                        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('item')->value->id,'mid'=>$_smarty_tpl->getVariable('menu')->value->id),$_smarty_tpl);?>
"><i class="icon-edit"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.edit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'delete')){?>
                        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'delete','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
" onclick="return confirm('<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.really_delete<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
');"><i class="icon-remove"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.delete<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
                    <?php }?>
					<?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'up')||$_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'down')){?>
							<?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'up')&&!$_smarty_tpl->getVariable('item')->value->first_on_level){?>
									<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'up','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
"><i class="icon-arrow-up"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.move_up<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
							<?php }?>
							<?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights($_smarty_tpl->getVariable('cpf_controller')->value,'down')&&!$_smarty_tpl->getVariable('item')->value->last_on_level){?>
									<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'action'=>'down','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
"><i class="icon-arrow-down"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.common.move_down<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
							<?php }?>
					<?php }?>					
                </td>
            <?php }?>

        </tr>
    <?php }?>
    <?php }} ?>

    
                
	<?php if (!empty($_smarty_tpl->getVariable('cpf_entities',null,true,false)->value)){?>
		</tbody>
			</table>
	
	<?php smarty_template_function_cpf_pager($_smarty_tpl,array('direct_url'=>Smarty::$_smarty_vars['capture']['pager_link'],'full_list_enabled'=>false));?>

	
	<?php }else{ ?>
		<div class="cpf-no-data"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
No matching records found<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>
	<?php }?>

    
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