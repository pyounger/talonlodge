<?php /* Smarty version Smarty-3.0.8, created on 2015-11-04 10:55:16
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.form_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:580876945563a62a4bbd4d1-56660407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a69f3d12b1c8592175f0108597a4896d6f951823' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.form_button.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '580876945563a62a4bbd4d1-56660407',
  'function' => 
  array (
    'cpf_button' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!function_exists('smarty_template_function_cpf_button')) {
    function smarty_template_function_cpf_button($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_button']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<a <?php if ($_smarty_tpl->getVariable('id')->value){?>id="<?php echo $_smarty_tpl->getVariable('id')->value;?>
"<?php }?> class="btn <?php if ($_smarty_tpl->getVariable('class')->value){?><?php echo $_smarty_tpl->getVariable('class')->value;?>
<?php }else{ ?>negative<?php }?>" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
" <?php if ($_smarty_tpl->getVariable('onclick')->value){?>onclick="<?php echo $_smarty_tpl->getVariable('onclick')->value;?>
"<?php }?><?php if ($_smarty_tpl->getVariable('target')->value){?> target=<?php echo $_smarty_tpl->getVariable('target')->value;?>
<?php }?>><?php if ($_smarty_tpl->getVariable('icon')->value){?><i class="icon-<?php echo $_smarty_tpl->getVariable('icon')->value;?>
"></i> <?php }?><?php echo $_smarty_tpl->getVariable('title')->value;?>
</a><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
