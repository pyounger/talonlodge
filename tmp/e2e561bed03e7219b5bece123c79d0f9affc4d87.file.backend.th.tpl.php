<?php /* Smarty version Smarty-3.0.8, created on 2016-10-05 06:49:25
         compiled from "/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.th.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82231709357f512f5b3be62-00663902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e561bed03e7219b5bece123c79d0f9affc4d87' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.th.tpl',
      1 => 1475595830,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82231709357f512f5b3be62-00663902',
  'function' => 
  array (
    'cpf_th' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!is_callable('smarty_modifier_replace')) include '/home2/talonlod/public_html/cpf/libs/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_function_cpf_title')) include '/home2/talonlod/public_html/app/view/smarty/plugins/function.cpf_title.php';
?><?php if (!function_exists('smarty_template_function_cpf_th')) {
    function smarty_template_function_cpf_th($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_th']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php if (!$_smarty_tpl->getVariable('title')->value){?>
	<?php if (!$_smarty_tpl->getVariable('no_link')->value){?>
		<th class="th-<?php echo $_smarty_tpl->getVariable('field')->value;?>
 <?php if ($_smarty_tpl->getVariable('field')->value==$_smarty_tpl->getVariable('cpf_order_sort')->value){?>sort-current<?php }?>">
			<?php ob_start(); ?><?php if ($_smarty_tpl->getVariable('field')->value==$_smarty_tpl->getVariable('cpf_order_sort')->value){?><?php if ($_smarty_tpl->getVariable('cpf_order_order')->value=='desc'){?>&nbsp;&darr;<?php }else{ ?>&nbsp;&uarr;<?php }?><?php }?><?php  Smarty::$_smarty_vars['capture']['th_arrow']=ob_get_clean();?>
			<?php ob_start(); ?><?php if ($_smarty_tpl->getVariable('field')->value==$_smarty_tpl->getVariable('cpf_order_sort')->value){?><?php if ($_smarty_tpl->getVariable('cpf_order_order')->value=='desc'){?>asc<?php }else{ ?>desc<?php }?><?php }else{ ?>asc<?php }?><?php  Smarty::$_smarty_vars['capture']['th_order_sort']=ob_get_clean();?>			
			<?php ob_start(); ?>
				<?php if (!$_smarty_tpl->getVariable('url')->value){?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>$_smarty_tpl->getVariable('cpf_controller')->value,'sort'=>$_smarty_tpl->getVariable('cpf_order_fake_sort')->value,'order'=>$_smarty_tpl->getVariable('cpf_order_fake_order')->value,'page'=>1),$_smarty_tpl);?>

				<?php }else{ ?>
					<?php echo $_smarty_tpl->getVariable('url')->value;?>

				<?php }?>
			<?php  Smarty::$_smarty_vars['capture']['th_url']=ob_get_clean();?>			
			<a href="<?php echo smarty_modifier_replace(smarty_modifier_replace(Smarty::$_smarty_vars['capture']['th_url'],$_smarty_tpl->getVariable('cpf_order_fake_order')->value,Smarty::$_smarty_vars['capture']['th_order_sort']),$_smarty_tpl->getVariable('cpf_order_fake_sort')->value,$_smarty_tpl->getVariable('field')->value);?>
"><?php echo smarty_function_cpf_title(array('var'=>$_smarty_tpl->getVariable('cpf_entities')->value[0],'field'=>$_smarty_tpl->getVariable('field')->value),$_smarty_tpl);?>
</a><?php echo Smarty::$_smarty_vars['capture']['th_arrow'];?>
			
		</th>
	<?php }else{ ?>
		<th><?php echo smarty_function_cpf_title(array('var'=>$_smarty_tpl->getVariable('cpf_entities')->value[0],'field'=>$_smarty_tpl->getVariable('field')->value),$_smarty_tpl);?>
</th>
	<?php }?>
<?php }else{ ?>
	<th><?php echo $_smarty_tpl->getVariable('title')->value;?>
</th>
<?php }?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
