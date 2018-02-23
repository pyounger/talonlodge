<?php /* Smarty version Smarty-3.0.8, created on 2015-01-21 06:57:08
         compiled from "/home2/talonlod/public_html/app/templates/snippets/frontend_elements.gallery.carousel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206331596054bfcc544a1e93-82039990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2572a249ab90827f04dd4448cac2c8d7c96502fc' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/snippets/frontend_elements.gallery.carousel.tpl',
      1 => 1334271918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206331596054bfcc544a1e93-82039990',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="h-gallery-wrapper">
    <div class="h-gallery">
        <ul id="b-gallery" class="jcarousel-skin-tango">
            <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']++;
?>
                <?php echo $_smarty_tpl->getVariable('image')->value->decodeVersions();?>

                <li><a rel="gallery" href="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['fullscreen']['filename'];?>
">
					<img src="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['filename'];?>
" width="127" height="80" alt="<?php echo (($tmp = @$_smarty_tpl->getVariable('image')->value->alt)===null||$tmp==='' ? $_smarty_tpl->getVariable('image')->value->title : $tmp);?>
">
				</a></li>
            <?php }} ?>
        </ul>
    </div>
    <div class="b-gallery-tooltip">
        <div class="b-gallery-tooltip-t">
            <p></p>
        </div>
        <div class="b-gallery-tooltip-b"></div>
    </div>
</div>

<div class="scrim" id="gallery-popup" style="visibility: hidden;">
    <div class="scrim-inner">

        <div id="gallery" class="ad-gallery">
            <a id="gallery-close" href="#"><img src="static/images/frontend/gallery/gallery-close.png" width="31" height="31" alt="Close" /></a>
            <div class="ad-image-wrapper">
            </div>
            <div class="ad-controls"></div>
            <div class="ad-nav">
                <div class="ad-thumbs">
                    <ul class="ad-thumb-list">
                    <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']++;
?>
                        <?php echo $_smarty_tpl->getVariable('image')->value->decodeVersions();?>

                        <li>
                            <a href="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['fullscreen']['filename'];?>
">
                                <img alt="<?php echo (($tmp = @$_smarty_tpl->getVariable('image')->value->alt)===null||$tmp==='' ? $_smarty_tpl->getVariable('image')->value->title : $tmp);?>
" src="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['gallery_thumb']['filename'];?>
" class="image<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['iteration']-1;?>
" width="<?php echo $_smarty_tpl->getVariable('image')->value->versions['gallery_thumb']['width'];?>
" height="<?php echo $_smarty_tpl->getVariable('image')->value->versions['gallery_thumb']['height'];?>
" />
                            </a>
                        </li>
                    <?php }} ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="b-social-buttons b-social-popup">
            <?php $_template = new Smarty_Internal_Template('includes/snippet-social.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        </div>
    </div><!-- .scrim-inner -->
</div><!-- #buy-popup .scrim -->

<script type="text/javascript">
	$(window).load(function(event){
		$().cpfScrim({
			scrim: '#gallery-popup',
			toResizeEl: '#gallery-popup',
			openLinks: '#b-gallery a',
			closeLinks: '#gallery-close',
			showOnLoad: false,
			onShowScrim: function(event){ 
				$('#gallery').animate({ 'margin-top': $(document).scrollTop()+100  }, 300);
			}
		});
	});
</script>