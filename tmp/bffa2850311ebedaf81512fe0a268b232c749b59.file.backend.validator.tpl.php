<?php /* Smarty version Smarty-3.0.8, created on 2016-10-04 07:44:37
         compiled from "/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.validator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24830361557f3ce654da782-55872432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bffa2850311ebedaf81512fe0a268b232c749b59' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/backend.ui/backend.validator.tpl',
      1 => 1475595832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24830361557f3ce654da782-55872432',
  'function' => 
  array (
    'cpf_validator' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!function_exists('smarty_template_function_cpf_validator')) {
    function smarty_template_function_cpf_validator($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_validator']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if (!$_smarty_tpl->getVariable('noscript')->value){?>
	<script type="text/javascript">
	$().ready(function() {
    <?php }?>
		$(<?php if (!$_smarty_tpl->getVariable('form')->value){?>'#cpf-page-form'<?php }else{ ?>'<?php echo $_smarty_tpl->getVariable('form')->value;?>
'<?php }?>).validate(
		{
            highlight: function(element) {
                $(element).addClass('error');
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element) {
                $(element).removeClass('error');
                $(element).parents('.control-group').removeClass('error');
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('help-inline');
                error.appendTo( element.parent() );
            },
			<?php echo $_smarty_tpl->getVariable('rules')->value;?>

		});
    <?php if (!$_smarty_tpl->getVariable('noscript')->value){?>
	});
	</script>
    <?php }?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
