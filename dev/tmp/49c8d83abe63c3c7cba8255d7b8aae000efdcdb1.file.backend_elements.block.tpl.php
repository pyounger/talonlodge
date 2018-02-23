<?php /* Smarty version Smarty-3.0.8, created on 2015-11-09 15:20:03
         compiled from "/home2/talonlod/public_html/dev/app/templates/snippets/backend_elements.block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:766266349564138333e9ce1-86286990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49c8d83abe63c3c7cba8255d7b8aae000efdcdb1' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/snippets/backend_elements.block.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '766266349564138333e9ce1-86286990',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-element page-element-block" id="pe-block-<?php echo $_smarty_tpl->getVariable('block')->value->id;?>
">
	<div class="c"><?php echo $_smarty_tpl->getVariable('block')->value->content;?>
</div>
	<div class="f">
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_blocks','action'=>'edit','id'=>$_smarty_tpl->getVariable('block')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'t'=>$_smarty_tpl->getVariable('template')->value),$_smarty_tpl);?>
"><i class="icon-edit"></i></a>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_pages','action'=>'move_element_up','id'=>$_smarty_tpl->getVariable('block')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'page_placeholder'=>$_smarty_tpl->getVariable('placeholder')->value,'type'=>'blocks','t'=>$_smarty_tpl->getVariable('template')->value),$_smarty_tpl);?>
"><i class="icon-arrow-up"></i></a>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_pages','action'=>'move_element_down','id'=>$_smarty_tpl->getVariable('block')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'page_placeholder'=>$_smarty_tpl->getVariable('placeholder')->value,'type'=>'blocks','t'=>$_smarty_tpl->getVariable('template')->value),$_smarty_tpl);?>
"><i class="icon-arrow-down"></i></a>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_blocks','action'=>'delete','id'=>$_smarty_tpl->getVariable('block')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'page_placeholder'=>$_smarty_tpl->getVariable('placeholder')->value,'t'=>$_smarty_tpl->getVariable('template')->value),$_smarty_tpl);?>
"><i class="icon-remove"></i></a>
    </div>
</div>