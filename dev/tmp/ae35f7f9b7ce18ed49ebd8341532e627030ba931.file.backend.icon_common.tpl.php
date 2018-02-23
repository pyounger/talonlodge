<?php /* Smarty version Smarty-3.0.8, created on 2015-11-04 10:55:16
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.icon_common.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18497847563a62a4ba2ae8-10226160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae35f7f9b7ce18ed49ebd8341532e627030ba931' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.icon_common.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18497847563a62a4ba2ae8-10226160',
  'function' => 
  array (
    'cpf_icon_common' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!function_exists('smarty_template_function_cpf_icon_common')) {
    function smarty_template_function_cpf_icon_common($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_icon_common']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<a <?php if ($_smarty_tpl->getVariable('id')->value){?>id="<?php echo $_smarty_tpl->getVariable('id')->value;?>
"<?php }?> class="btn" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
" title="<?php echo $_smarty_tpl->getVariable('title')->value;?>
" <?php if ($_smarty_tpl->getVariable('confirm')->value){?>onclick="return confirm('<?php echo $_smarty_tpl->getVariable('confirm')->value;?>
')"<?php }?><?php if ($_smarty_tpl->getVariable('target')->value){?> target="<?php echo $_smarty_tpl->getVariable('target')->value;?>
"<?php }?><?php if ($_smarty_tpl->getVariable('rel')->value){?> rel="<?php echo $_smarty_tpl->getVariable('rel')->value;?>
"<?php }?>><?php echo $_smarty_tpl->getVariable('title')->value;?>
</a><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
