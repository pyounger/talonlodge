<?php /* Smarty version Smarty-3.0.8, created on 2018-01-25 13:32:51
         compiled from "/home2/talonlod/public_html/app/templates/includes/common.ui/common.youtube.video.iframe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9865122875a6a5b13f27395-21740807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '632bfc9b98fc76d5c720749575b0aa71fb402304' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/common.ui/common.youtube.video.iframe.tpl',
      1 => 1516919559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9865122875a6a5b13f27395-21740807',
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
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><div class="viframe"><iframe width="<?php echo (($tmp = @$_smarty_tpl->getVariable('width')->value)===null||$tmp==='' ? 200 : $tmp);?>
" height="<?php echo (($tmp = @$_smarty_tpl->getVariable('height')->value)===null||$tmp==='' ? 150 : $tmp);?>
" frameborder="0" allowfullscreen="true" src="http://www.youtube.com/embed/<?php echo trim($_smarty_tpl->getVariable('youtube_id')->value);?>
?rel=0&showinfo=0<?php if ($_smarty_tpl->getVariable('wmode')->value){?>&wmode=<?php echo $_smarty_tpl->getVariable('wmode')->value;?>
<?php }?>"></iframe><div class="video-image-caption"><i class="fa fa-youtube-play"></i> <em><?php echo $_smarty_tpl->getVariable('description')->value;?>
</em> <!-- <span>(04:21)</span> --></div></div><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
