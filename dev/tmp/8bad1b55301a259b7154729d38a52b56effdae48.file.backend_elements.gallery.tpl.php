<?php /* Smarty version Smarty-3.0.8, created on 2015-02-24 13:03:48
         compiled from "/home2/talonlod/public_html/app/templates/snippets/backend_elements.gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174481352954ecf544349260-66072952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bad1b55301a259b7154729d38a52b56effdae48' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/snippets/backend_elements.gallery.tpl',
      1 => 1332971858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174481352954ecf544349260-66072952',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-element page-element-gallery" id="pe-gallery-<?php echo $_smarty_tpl->getVariable('gallery')->value->id;?>
">
	<div class="c">
        <div><span class="label label-info">Gallery <?php echo $_smarty_tpl->getVariable('gallery')->value->title;?>
</span></div>
        <div class="i">
        <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']++;
?>
            <?php echo $_smarty_tpl->getVariable('image')->value->decodeVersions();?>

            <div class="g-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['iteration'];?>
">
                <img src="<?php echo cpf_config('APP.PHOTOS.URLS.BACKEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['backend_thumb']['filename'];?>
" width="<?php echo $_smarty_tpl->getVariable('image')->value->versions['backend_thumb']['width'];?>
" height="<?php echo $_smarty_tpl->getVariable('image')->value->versions['backend_thumb']['height'];?>
" alt="<?php echo $_smarty_tpl->getVariable('image')->value->title;?>
">
            </div>
        <?php }} ?>
        </div>
	</div>
	<div class="f">
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_galleries','action'=>'view','id'=>$_smarty_tpl->getVariable('gallery')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id),$_smarty_tpl);?>
"><i class="icon-edit"></i></a>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_pages','action'=>'move_element_up','id'=>$_smarty_tpl->getVariable('gallery')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'page_placeholder'=>$_smarty_tpl->getVariable('placeholder')->value,'type'=>'galleries'),$_smarty_tpl);?>
"><i class="icon-arrow-up"></i></a>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_pages','action'=>'move_element_down','id'=>$_smarty_tpl->getVariable('gallery')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'page_placeholder'=>$_smarty_tpl->getVariable('placeholder')->value,'type'=>'galleries'),$_smarty_tpl);?>
"><i class="icon-arrow-down"></i></a>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_pages','action'=>'gallery_delete','id'=>$_smarty_tpl->getVariable('gallery')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'page_placeholder'=>$_smarty_tpl->getVariable('placeholder')->value),$_smarty_tpl);?>
"><i class="icon-remove"></i></a>
    </div>
</div>