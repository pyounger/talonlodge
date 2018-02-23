<?php /* Smarty version Smarty-3.0.8, created on 2015-11-04 10:55:16
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.pager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:954594837563a62a4dbcbb8-62294913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19d1693225d774283f79c475c59ca223ddb2cf30' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.pager.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '954594837563a62a4dbcbb8-62294913',
  'function' => 
  array (
    'cpf_pager' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!is_callable('smarty_modifier_replace')) include '/home2/talonlod/public_html/dev/cpf/libs/smarty/plugins/modifier.replace.php';
?><?php if (!function_exists('smarty_template_function_cpf_pager')) {
    function smarty_template_function_cpf_pager($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_pager']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

<?php if (!$_smarty_tpl->getVariable('delta')->value){?>
	<?php $_smarty_tpl->tpl_vars['delta'] = new Smarty_variable($_smarty_tpl->getVariable('cpf_pager_delta')->value, null, null);?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('full_list_enabled')->value===null){?>
	<?php $_smarty_tpl->tpl_vars['full_list_enabled'] = new Smarty_variable($_smarty_tpl->getVariable('cpf_pager_full_list_enabled')->value, null, null);?>
<?php }?>


<?php if ($_smarty_tpl->getVariable('cpf_pager_count')->value>1&&$_smarty_tpl->getVariable('cpf_pager_current')->value<=$_smarty_tpl->getVariable('cpf_pager_count')->value){?>
<div class="pagination">
    <ul>
<?php if ($_smarty_tpl->getVariable('cpf_pager_current')->value!=0){?>
	<?php if ($_smarty_tpl->getVariable('cpf_pager_current')->value>2){?>
        <li class="previous"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->getVariable('direct_url')->value,$_smarty_tpl->getVariable('cpf_pager_fake_page')->value,1);?>
" class="page-changer">&laquo;&nbsp;<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
first<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('cpf_pager_current')->value!=1){?>
        <li class="previous"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->getVariable('direct_url')->value,$_smarty_tpl->getVariable('cpf_pager_fake_page')->value,($_smarty_tpl->getVariable('cpf_pager_current')->value-1));?>
" class="page-changer">&laquo;&nbsp;<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
previous<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
	<?php }?>
	
	<?php if (!$_smarty_tpl->getVariable('hide_direct')->value){?>
	    <?php if ($_smarty_tpl->getVariable('cpf_pager_current')->value-$_smarty_tpl->getVariable('delta')->value>0){?>
            <li class="disabled"><a href="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
#">...</a></li>
	    <?php }?>
	    
	    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getVariable('cpf_pager_count')->value+1 - (1) : 1-($_smarty_tpl->getVariable('cpf_pager_count')->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
	    	<?php if ($_smarty_tpl->tpl_vars['i']->iteration>$_smarty_tpl->getVariable('cpf_pager_current')->value-$_smarty_tpl->getVariable('delta')->value&&$_smarty_tpl->tpl_vars['i']->iteration<$_smarty_tpl->getVariable('cpf_pager_current')->value+$_smarty_tpl->getVariable('delta')->value){?>
	    		<?php if (($_smarty_tpl->tpl_vars['i']->iteration==$_smarty_tpl->getVariable('cpf_pager_current')->value)){?>
                    <li class="active"><a href="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
#"><?php echo $_smarty_tpl->tpl_vars['i']->iteration;?>
</a></li>
	    		<?php }else{ ?>
                    <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->getVariable('direct_url')->value,$_smarty_tpl->getVariable('cpf_pager_fake_page')->value,$_smarty_tpl->tpl_vars['i']->iteration);?>
" class="pager"><?php echo $_smarty_tpl->tpl_vars['i']->iteration;?>
</a></li>
	    		<?php }?>
	    	<?php }?>
	    <?php }} ?>
	    <?php if ($_smarty_tpl->getVariable('cpf_pager_count')->value>=$_smarty_tpl->getVariable('cpf_pager_current')->value+$_smarty_tpl->getVariable('delta')->value){?>
            <li class="disabled"><a href="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
#">...</a></li>
	    <?php }?>
	    <li class="disabled"><a href="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
#">(<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('count'=>$_smarty_tpl->getVariable('cpf_pager_count')->value,'plural'=>'total %d pages')); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array('count'=>$_smarty_tpl->getVariable('cpf_pager_count')->value,'plural'=>'total %d pages'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
total %d page<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array('count'=>$_smarty_tpl->getVariable('cpf_pager_count')->value,'plural'=>'total %d pages'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
, <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('count'=>$_smarty_tpl->getVariable('cpf_pager_records_count')->value,'plural'=>'%d records')); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array('count'=>$_smarty_tpl->getVariable('cpf_pager_records_count')->value,'plural'=>'%d records'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
%d record<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array('count'=>$_smarty_tpl->getVariable('cpf_pager_records_count')->value,'plural'=>'%d records'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
)</a></li>
	<?php }else{ ?>
        <li class="disabled"><a href="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
#"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->getVariable('cpf_pager_current')->value,2=>$_smarty_tpl->getVariable('cpf_pager_count')->value)); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(1=>$_smarty_tpl->getVariable('cpf_pager_current')->value,2=>$_smarty_tpl->getVariable('cpf_pager_count')->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
page %s of %s<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(1=>$_smarty_tpl->getVariable('cpf_pager_current')->value,2=>$_smarty_tpl->getVariable('cpf_pager_count')->value), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
	<?php }?>
	
	<?php if ($_smarty_tpl->getVariable('cpf_pager_current')->value<$_smarty_tpl->getVariable('cpf_pager_count')->value){?>
        <li class="next"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->getVariable('direct_url')->value,$_smarty_tpl->getVariable('cpf_pager_fake_page')->value,($_smarty_tpl->getVariable('cpf_pager_current')->value+1));?>
" class="page-changer"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
next<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
&nbsp;&raquo;</a></li>
	<?php }?>
	
	<?php if ($_smarty_tpl->getVariable('cpf_pager_current')->value<$_smarty_tpl->getVariable('cpf_pager_count')->value-1){?>
        <li class="next"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->getVariable('direct_url')->value,$_smarty_tpl->getVariable('cpf_pager_fake_page')->value,$_smarty_tpl->getVariable('cpf_pager_count')->value);?>
" class="page-changer"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
last<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
&nbsp;&raquo;</a></li>
	<?php }?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('full_list_enabled')->value){?>
    <?php if ($_smarty_tpl->getVariable('cpf_pager_current')->value!=0){?>
	   <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->getVariable('direct_url')->value,$_smarty_tpl->getVariable('cpf_pager_fake_page')->value,0);?>
" class="page-changer"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
show all<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
&nbsp;&raquo;</a></li>
    <?php }else{ ?>
	   <li><a href="<?php echo smarty_modifier_replace($_smarty_tpl->getVariable('direct_url')->value,$_smarty_tpl->getVariable('cpf_pager_fake_page')->value,1);?>
" class="page-changer"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
show paged<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 (<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('count'=>$_smarty_tpl->getVariable('cpf_pager_count')->value,'plural'=>'total %d pages')); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array('count'=>$_smarty_tpl->getVariable('cpf_pager_count')->value,'plural'=>'total %d pages'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
total %d page<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array('count'=>$_smarty_tpl->getVariable('cpf_pager_count')->value,'plural'=>'total %d pages'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
, <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('count'=>$_smarty_tpl->getVariable('cpf_pager_records_count')->value,'plural'=>'%d records')); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array('count'=>$_smarty_tpl->getVariable('cpf_pager_records_count')->value,'plural'=>'%d records'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
%d record<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array('count'=>$_smarty_tpl->getVariable('cpf_pager_records_count')->value,'plural'=>'%d records'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
)&nbsp;&raquo;</a></li>
    <?php }?>
<?php }?>
</ul>
</div>
<?php }?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
