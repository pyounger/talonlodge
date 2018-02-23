<?php /* Smarty version Smarty-3.0.8, created on 2015-01-21 06:42:56
         compiled from "/home2/talonlod/public_html/app/templates/includes/common.ui/common.youtube.video.iframe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:658606354bfc9005bb824-69475629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '632bfc9b98fc76d5c720749575b0aa71fb402304' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/common.ui/common.youtube.video.iframe.tpl',
      1 => 1417641673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '658606354bfc9005bb824-69475629',
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

<?php if (!function_exists('smarty_template_function_cpf_youtube_video_iframe')) {
    function smarty_template_function_cpf_youtube_video_iframe($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_youtube_video_iframe']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><iframe width="<?php echo (($tmp = @$_smarty_tpl->getVariable('width')->value)===null||$tmp==='' ? 200 : $tmp);?>
" height="<?php echo (($tmp = @$_smarty_tpl->getVariable('height')->value)===null||$tmp==='' ? 150 : $tmp);?>
" frameborder="0" allowfullscreen="true" src="http://www.youtube.com/embed/<?php echo trim($_smarty_tpl->getVariable('youtube_id')->value);?>
?rel=0&showinfo=0<?php if ($_smarty_tpl->getVariable('wmode')->value){?>&wmode=<?php echo $_smarty_tpl->getVariable('wmode')->value;?>
<?php }?>"></iframe><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
