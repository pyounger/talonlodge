<?php /* Smarty version Smarty-3.0.8, created on 2017-12-14 09:03:49
         compiled from "/home2/talonlod/public_html/dev/app/templates/snippets/frontend_elements.video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4588346995a32bd051c4d44-63225213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '675d527700e12d5595521200cf1ba94b871dea95' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/snippets/frontend_elements.video.tpl',
      1 => 1513274622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4588346995a32bd051c4d44-63225213',
  'function' => 
  array (
    'cpf_youtube_video_iframe' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('includes/common.ui/common.youtube.video.iframe.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<?php if (!function_exists('smarty_template_function_cpf_youtube_video_iframe')) {
    function smarty_template_function_cpf_youtube_video_iframe($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_youtube_video_iframe']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>




<?php smarty_template_function_cpf_youtube_video_iframe($_smarty_tpl,array('youtube_id'=>$_smarty_tpl->getVariable('video')->value->service_id,'width'=>$_smarty_tpl->getVariable('video')->value->width,'height'=>$_smarty_tpl->getVariable('video')->value->height,'description'=>$_smarty_tpl->getVariable('video')->value->description));?>


