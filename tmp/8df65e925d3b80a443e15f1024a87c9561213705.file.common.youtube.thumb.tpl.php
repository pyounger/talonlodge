<?php /* Smarty version Smarty-3.0.8, created on 2016-10-05 06:49:25
         compiled from "/home2/talonlod/public_html/app/templates/includes/common.ui/common.youtube.thumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57055379257f512f5e3e585-84915406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8df65e925d3b80a443e15f1024a87c9561213705' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/common.ui/common.youtube.thumb.tpl',
      1 => 1475595836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57055379257f512f5e3e585-84915406',
  'function' => 
  array (
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

<?php if (!function_exists('smarty_template_function_cpf_youtube_thumb')) {
    function smarty_template_function_cpf_youtube_thumb($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_youtube_thumb']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<img src="http://img.youtube.com/vi/<?php echo $_smarty_tpl->getVariable('youtube_id')->value;?>
/<?php echo (($tmp = @$_smarty_tpl->getVariable('type')->value)===null||$tmp==='' ? 'default' : $tmp);?>
.jpg" alt="<?php if ($_smarty_tpl->getVariable('alt')->value){?><?php echo $_smarty_tpl->getVariable('alt')->value;?>
<?php }else{ ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
YouTube video thumb<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?>"/><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
