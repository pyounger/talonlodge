<?php /* Smarty version Smarty-3.0.8, created on 2015-11-09 15:20:03
         compiled from "/home2/talonlod/public_html/dev/app/templates/snippets/backend_elements.placeholder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:464588107564138334837f4-66534825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3af9a1624fc07cacbda5b5d128948e651fed92f5' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/snippets/backend_elements.placeholder.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '464588107564138334837f4-66534825',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-placeholder page-placeholder-<?php echo $_smarty_tpl->getVariable('placeholder')->value;?>
">
	<div class="c"><?php echo $_smarty_tpl->getVariable('content')->value;?>
</div>
	<div class="f">
		<a class="btn btn-primary btn-mini" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_blocks','action'=>'add','id'=>$_smarty_tpl->getVariable('entity')->value->id,'ph'=>$_smarty_tpl->getVariable('placeholder')->value,'t'=>$_smarty_tpl->getVariable('template')->value),$_smarty_tpl);?>
"><i class="icon-plus-sign icon-white"></i><br /><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.pages.add_block<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
		<a class="btn btn-primary btn-mini" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_photos','action'=>'add','id'=>$_smarty_tpl->getVariable('entity')->value->id,'table'=>'App_Model_Page','ph'=>$_smarty_tpl->getVariable('placeholder')->value,'t'=>$_smarty_tpl->getVariable('template')->value),$_smarty_tpl);?>
"><i class="icon-plus-sign icon-white"></i><br /><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.pages.add_image<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        <a class="btn btn-primary btn-mini" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_galleries','action'=>'choose','page_id'=>$_smarty_tpl->getVariable('entity')->value->id,'ph'=>$_smarty_tpl->getVariable('placeholder')->value,'t'=>$_smarty_tpl->getVariable('template')->value),$_smarty_tpl);?>
"><i class="icon-plus-sign icon-white"></i><br /><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.pages.add_gallery<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
		<a class="btn btn-primary btn-mini" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_videos','action'=>'add','id'=>$_smarty_tpl->getVariable('entity')->value->id,'table'=>'App_Model_Page','ph'=>$_smarty_tpl->getVariable('placeholder')->value,'t'=>$_smarty_tpl->getVariable('template')->value),$_smarty_tpl);?>
"><i class="icon-plus-sign icon-white"></i><br /><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
backend.pages.add_video<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
    </div>
</div>