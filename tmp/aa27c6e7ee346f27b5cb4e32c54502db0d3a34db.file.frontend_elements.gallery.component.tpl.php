<?php /* Smarty version Smarty-3.0.8, created on 2017-12-20 09:36:31
         compiled from "/home2/talonlod/public_html/app/templates/snippets/frontend_elements.gallery.component.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126810245a3aadafc68516-20039029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa27c6e7ee346f27b5cb4e32c54502db0d3a34db' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/snippets/frontend_elements.gallery.component.tpl',
      1 => 1513794955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126810245a3aadafc68516-20039029',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="b-gallery-photos">
    <?php  $_smarty_tpl->tpl_vars['glr'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('galleries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['glr']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['glr']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']=0;
if ($_smarty_tpl->tpl_vars['glr']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['glr']->key => $_smarty_tpl->tpl_vars['glr']->value){
 $_smarty_tpl->tpl_vars['glr']->iteration++;
 $_smarty_tpl->tpl_vars['glr']->last = $_smarty_tpl->tpl_vars['glr']->iteration === $_smarty_tpl->tpl_vars['glr']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['last'] = $_smarty_tpl->tpl_vars['glr']->last;
?>
        <?php $_smarty_tpl->tpl_vars['glr'] = new Smarty_variable($_smarty_tpl->getVariable('glr')->value->data, null, null);?>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['iteration'], null, null);?>
        <?php if (($_smarty_tpl->getVariable('i')->value-1)%3==0&&!$_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['last']){?>
            <div class="b-gallery-photos-i">
        <?php }?>
        <div class="b-gallery-photo<?php if ($_smarty_tpl->getVariable('i')->value%3==0){?> b-gallery-photo-last<?php }?>">
            <?php echo $_smarty_tpl->getVariable('glr')->value->decodeCover();?>

            <!-- <h2><?php echo $_smarty_tpl->getVariable('glr')->value->title;?>
</h2> -->
            <div class="b-gallery-image-border">
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_gallery_view','id'=>$_smarty_tpl->getVariable('glr')->value->id),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->getVariable('image')->value->atitle){?> title="<?php echo $_smarty_tpl->getVariable('image')->value->atitle;?>
"<?php }?>>
                    <?php ob_start(); ?><?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('glr')->value->cover['filename'];?>
<?php  Smarty::$_smarty_vars['capture']['path']=ob_get_clean();?>
                    <?php $_template = new Smarty_Internal_Template('snippets/frontend_elements.image.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('path',Smarty::$_smarty_vars['capture']['path']);$_template->assign('width',$_smarty_tpl->getVariable('glr')->value->cover['width']);$_template->assign('height',$_smarty_tpl->getVariable('glr')->value->cover['height']);$_template->assign('alt',$_smarty_tpl->getVariable('glr')->value->alt); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
                </a>
            </div>
        </div>
        <?php if (($_smarty_tpl->getVariable('i')->value)%3==0){?>
            </div>
        <?php }?>
    <?php }} ?>
</div>

