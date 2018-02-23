<?php /* Smarty version Smarty-3.0.8, created on 2016-10-05 06:49:25
         compiled from "/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144739464857f512f5c53010-94140256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '969fceeda3fbe811ce12750766bd109ed44a7128' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.breadcrumb.tpl',
      1 => 1475595821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144739464857f512f5c53010-94140256',
  'function' => 
  array (
    'cpf_breadcrumb' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!function_exists('smarty_template_function_cpf_breadcrumb')) {
    function smarty_template_function_cpf_breadcrumb($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_breadcrumb']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <ul class="breadcrumb">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
if ($_smarty_tpl->tpl_vars['item']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
?>
    <li>
		<?php if ($_smarty_tpl->tpl_vars['item']->last&&!$_smarty_tpl->getVariable('link_last')->value){?>
			<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>

		<?php }else{ ?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</a>
		<?php }?>
		<?php if (!$_smarty_tpl->tpl_vars['item']->last){?><span class="divider">/</span><?php }?>
    </li>
	<?php }} ?>
	</ul><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
