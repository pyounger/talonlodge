<?php /* Smarty version Smarty-3.0.8, created on 2015-01-21 08:37:15
         compiled from "/home2/talonlod/public_html/app/templates/snippets/frontend_elements.video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66573630854bfe3cbb6dfc7-38478552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6323b0180b70019df45649784249ccba53371853' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/snippets/frontend_elements.video.tpl',
      1 => 1333085928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66573630854bfe3cbb6dfc7-38478552',
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


<?php smarty_template_function_cpf_youtube_video_iframe($_smarty_tpl,array('youtube_id'=>$_smarty_tpl->getVariable('video')->value->service_id,'width'=>$_smarty_tpl->getVariable('video')->value->width,'height'=>$_smarty_tpl->getVariable('video')->value->height));?>

