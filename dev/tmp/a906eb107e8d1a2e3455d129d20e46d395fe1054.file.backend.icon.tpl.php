<?php /* Smarty version Smarty-3.0.8, created on 2015-11-04 10:55:16
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.icon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2044658806563a62a4d70703-93459497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a906eb107e8d1a2e3455d129d20e46d395fe1054' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.icon.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2044658806563a62a4d70703-93459497',
  'function' => 
  array (
    'cpf_icon' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!function_exists('smarty_template_function_cpf_icon')) {
    function smarty_template_function_cpf_icon($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_icon']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<?php if ($_smarty_tpl->getVariable('url')->value){?>
		<a class="icon16 <?php echo $_smarty_tpl->getVariable('class')->value;?>
" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
" title="<?php echo $_smarty_tpl->getVariable('title')->value;?>
" <?php if ($_smarty_tpl->getVariable('confirm')->value){?>onclick="return confirm('<?php echo $_smarty_tpl->getVariable('confirm')->value;?>
')"<?php }?> style="background-image: url(static/images/backend/icons/icons16/<?php echo $_smarty_tpl->getVariable('icon')->value;?>
.png);<?php echo $_smarty_tpl->getVariable('style')->value;?>
"<?php if ($_smarty_tpl->getVariable('target')->value){?> target="<?php echo $_smarty_tpl->getVariable('target')->value;?>
"<?php }?><?php if ($_smarty_tpl->getVariable('rel')->value){?> rel="<?php echo $_smarty_tpl->getVariable('rel')->value;?>
"<?php }?>></a>
	<?php }else{ ?>
		<span class="icon16 <?php echo $_smarty_tpl->getVariable('class')->value;?>
" title="<?php echo $_smarty_tpl->getVariable('title')->value;?>
" style="background-image: url(static/images/backend/icons/icons16/<?php echo $_smarty_tpl->getVariable('icon')->value;?>
.png)"></span>
	<?php }?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
