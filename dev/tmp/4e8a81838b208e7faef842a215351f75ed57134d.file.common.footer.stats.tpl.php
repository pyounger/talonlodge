<?php /* Smarty version Smarty-3.0.8, created on 2015-11-03 13:08:41
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/common.footer.stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109998763256393069c26811-42999615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e8a81838b208e7faef842a215351f75ed57134d' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/common.footer.stats.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109998763256393069c26811-42999615',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_fsize_format')) include '/home2/talonlod/public_html/dev/cpf/core/view/smarty/plugins/modifier.fsize_format.php';
?>

<!-- 
	Page generated in <?php echo sprintf('%.2f',$_smarty_tpl->getVariable('cpf_stat_generated_in')->value);?>
 seconds (<?php echo $_smarty_tpl->getVariable('cpf_stat_db_query_count')->value;?>
 queries in <?php echo sprintf('%.3f',$_smarty_tpl->getVariable('cpf_stat_db_exec_time')->value);?>
 seconds)

	Memory used: <?php echo smarty_modifier_fsize_format($_smarty_tpl->getVariable('cpf_stat_memory_usage')->value);?>
 (peak value: <?php echo smarty_modifier_fsize_format($_smarty_tpl->getVariable('cpf_stat_memory_peak_usage')->value);?>
)

	Number of translated strings: <?php echo $_smarty_tpl->getVariable('cpf_stat_translations_count')->value;?>

	<?php if ($_smarty_tpl->getVariable('cpf_stat_cache_storage_name')->value){?>Cache storage: <?php echo $_smarty_tpl->getVariable('cpf_stat_cache_storage_name')->value;?>
 (get: <?php echo $_smarty_tpl->getVariable('cpf_stat_cache_get_count')->value;?>
, set: <?php echo $_smarty_tpl->getVariable('cpf_stat_cache_set_count')->value;?>
)<?php }?>

-->
