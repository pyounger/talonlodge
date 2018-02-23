<?php /* Smarty version Smarty-3.0.8, created on 2018-01-25 13:30:51
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/common.ui/common.youtube.video.iframe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12565460525a6a5a9b818c90-86739765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dcc0a44dd668b8ac89d0a4b561d524f212b7d1d' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/common.ui/common.youtube.video.iframe.tpl',
      1 => 1516919443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12565460525a6a5a9b818c90-86739765',
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
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><div class="viframe" id="<?php echo trim($_smarty_tpl->getVariable('youtube_id')->value);?>
pa"><iframe id="<?php echo trim($_smarty_tpl->getVariable('youtube_id')->value);?>
" width="<?php echo (($tmp = @$_smarty_tpl->getVariable('width')->value)===null||$tmp==='' ? 200 : $tmp);?>
" height="<?php echo (($tmp = @$_smarty_tpl->getVariable('height')->value)===null||$tmp==='' ? 150 : $tmp);?>
" frameborder="0" allowfullscreen="true" src="http://www.youtube.com/embed/<?php echo trim($_smarty_tpl->getVariable('youtube_id')->value);?>
?rel=0&showinfo=0<?php if ($_smarty_tpl->getVariable('wmode')->value){?>&wmode=<?php echo $_smarty_tpl->getVariable('wmode')->value;?>
<?php }?>" onload="myFunction(this.getAttribute('id'))"></iframe>
<div class="video-image-caption"><i class="fa fa-youtube-play"></i> <em><?php echo $_smarty_tpl->getVariable('description')->value;?>
</em> <!-- <span>(04:21)</span> --></div>
</div>

<script type="text/javascript">
	

</script><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
