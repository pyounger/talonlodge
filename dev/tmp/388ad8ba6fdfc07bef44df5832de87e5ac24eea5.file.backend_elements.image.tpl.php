<?php /* Smarty version Smarty-3.0.8, created on 2015-12-11 08:51:11
         compiled from "/home2/talonlod/public_html/dev/app/templates/snippets/backend_elements.image.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1397270955566b0d0f06fbb3-87842063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '388ad8ba6fdfc07bef44df5832de87e5ac24eea5' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/snippets/backend_elements.image.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1397270955566b0d0f06fbb3-87842063',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-element page-element-image" id="pe-image-<?php echo $_smarty_tpl->getVariable('image')->value->id;?>
">
	<div class="c">
        <?php echo $_smarty_tpl->getVariable('image')->value->decodeVersions();?>

        <img src="<?php echo cpf_config('APP.PHOTOS.URLS.BACKEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['backend_thumb']['filename'];?>
" width="<?php echo $_smarty_tpl->getVariable('image')->value->versions['backend_thumb']['width'];?>
" height="<?php echo $_smarty_tpl->getVariable('image')->value->versions['backend_thumb']['height'];?>
" alt="<?php echo $_smarty_tpl->getVariable('image')->value->title;?>
">
        <br />
        <p><?php echo (($tmp = @$_smarty_tpl->getVariable('image')->value->title)===null||$tmp==='' ? '&nbsp;' : $tmp);?>
</p>
	</div>
	<div class="f">
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_photos','action'=>'edit','id'=>$_smarty_tpl->getVariable('image')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id),$_smarty_tpl);?>
"><i class="icon-edit"></i></a>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_pages','action'=>'move_element_up','id'=>$_smarty_tpl->getVariable('image')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'page_placeholder'=>$_smarty_tpl->getVariable('placeholder')->value,'type'=>'images'),$_smarty_tpl);?>
"><i class="icon-arrow-up"></i></a>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_pages','action'=>'move_element_down','id'=>$_smarty_tpl->getVariable('image')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'page_placeholder'=>$_smarty_tpl->getVariable('placeholder')->value,'type'=>'images'),$_smarty_tpl);?>
"><i class="icon-arrow-down"></i></a>
        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_photos','action'=>'delete','id'=>$_smarty_tpl->getVariable('image')->value->id,'page_id'=>$_smarty_tpl->getVariable('page')->value->id,'page_placeholder'=>$_smarty_tpl->getVariable('placeholder')->value),$_smarty_tpl);?>
"><i class="icon-remove"></i></a>
    </div>
</div>