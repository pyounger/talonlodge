<?php /* Smarty version Smarty-3.0.8, created on 2016-10-05 06:49:25
         compiled from "/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.form_submit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58833060757f512f551d2d4-26265341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7dbe4a03fbe097add2cd8bd646b02fdbe62e09e' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.form_submit.tpl',
      1 => 1475595825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58833060757f512f551d2d4-26265341',
  'function' => 
  array (
    'cpf_submit' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!function_exists('smarty_template_function_cpf_submit')) {
    function smarty_template_function_cpf_submit($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_submit']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <button id="<?php echo (($tmp = @$_smarty_tpl->getVariable('id')->value)===null||$tmp==='' ? 'submit' : $tmp);?>
" name="<?php echo (($tmp = @$_smarty_tpl->getVariable('id')->value)===null||$tmp==='' ? 'submit' : $tmp);?>
" class="btn <?php if ($_smarty_tpl->getVariable('class')->value){?><?php echo $_smarty_tpl->getVariable('class')->value;?>
<?php }else{ ?>btn-primary<?php }?>" type="submit"><?php if ($_smarty_tpl->getVariable('icon')->value){?><i class="icon-<?php echo $_smarty_tpl->getVariable('icon')->value;?>
 icon-white"></i> <?php }?><?php echo $_smarty_tpl->getVariable('title')->value;?>
</button><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>

