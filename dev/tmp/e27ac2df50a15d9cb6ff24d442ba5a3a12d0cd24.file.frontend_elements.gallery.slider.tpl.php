<?php /* Smarty version Smarty-3.0.8, created on 2017-12-22 15:07:22
         compiled from "/home2/talonlod/public_html/dev/app/templates/snippets/frontend_elements.gallery.slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16255083865a3d9e3a284c40-97904080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e27ac2df50a15d9cb6ff24d442ba5a3a12d0cd24' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/snippets/frontend_elements.gallery.slider.tpl',
      1 => 1513981959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16255083865a3d9e3a284c40-97904080',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="ourstorySlider<?php if (count($_smarty_tpl->getVariable('images')->value)<9){?> one-page<?php }?>">

    <div class="wrapper">

        <ul>

            <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['image']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']=0;
if ($_smarty_tpl->tpl_vars['image']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['image']->iteration++;
 $_smarty_tpl->tpl_vars['image']->last = $_smarty_tpl->tpl_vars['image']->iteration === $_smarty_tpl->tpl_vars['image']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['last'] = $_smarty_tpl->tpl_vars['image']->last;
?>

                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['iteration'], null, null);?>

                <?php if (($_smarty_tpl->getVariable('i')->value-1)%8==0&&!$_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['last']){?>

                    <li>

                        <div class="b-ourstory-gallery">

                <?php }?>

                <?php if (($_smarty_tpl->getVariable('i')->value-1)%4==0){?>

                    <div class="b-ourstory-gallery-i">

                <?php }?>



                    <div class="b-ourstory-img<?php if (($_smarty_tpl->getVariable('i')->value-1)%4==0){?> first<?php }?>">

                        <?php echo $_smarty_tpl->getVariable('image')->value->decodeVersions();?>


                        <a rel="gallery" href="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['fullscreen']['filename'];?>
"<?php if ($_smarty_tpl->getVariable('image')->value->atitle){?> title="<?php echo $_smarty_tpl->getVariable('image')->value->atitle;?>
"<?php }?>>

							<?php ob_start(); ?><?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['filename'];?>
<?php  Smarty::$_smarty_vars['capture']['path']=ob_get_clean();?>

							<?php $_template = new Smarty_Internal_Template('snippets/frontend_elements.image.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('path',Smarty::$_smarty_vars['capture']['path']);$_template->assign('width',$_smarty_tpl->getVariable('image')->value->versions['thumbnail']['width']);$_template->assign('height',$_smarty_tpl->getVariable('image')->value->versions['thumbnail']['height']);$_template->assign('alt',(($tmp = @$_smarty_tpl->getVariable('image')->value->alt)===null||$tmp==='' ? $_smarty_tpl->getVariable('image')->value->title : $tmp)); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

						</a>

                    </div>



                <?php if (($_smarty_tpl->getVariable('i')->value)%4==0){?>

                    </div>

                <?php }?>

                <?php if (($_smarty_tpl->getVariable('i')->value)%8==0){?>

                        </div>

                    </li>

                <?php }?>

            <?php }} ?>

        </ul>

    </div>

</div>

<div class="b-ourstory-buttons">

    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_gallery'),$_smarty_tpl);?>
" class="b-ourstory-button-l">

					<span class="b-ourstory-button-r">

						View more

					</span>

    </a>

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
 $_smarty_tpl->tpl_vars['image']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['image']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']=0;
if ($_smarty_tpl->tpl_vars['image']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['image']->iteration++;
 $_smarty_tpl->tpl_vars['image']->last = $_smarty_tpl->tpl_vars['image']->iteration === $_smarty_tpl->tpl_vars['image']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['glrs']['last'] = $_smarty_tpl->tpl_vars['image']->last;
?>

                        <?php echo $_smarty_tpl->getVariable('image')->value->decodeVersions();?>


                        <li>

                            <a href="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['fullscreen']['filename'];?>
"<?php if ($_smarty_tpl->getVariable('image')->value->atitle){?> title="<?php echo $_smarty_tpl->getVariable('image')->value->atitle;?>
"<?php }?>>

                                <img alt="<?php echo (($tmp = @$_smarty_tpl->getVariable('image')->value->alt)===null||$tmp==='' ? $_smarty_tpl->getVariable('image')->value->title : $tmp);?>
" src="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['fullscreen']['filename'];?>
" class="image<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['iteration']-1;?>
" width="133" height="88" />

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

			openLinks: '.ourstorySlider a',

			closeLinks: '#gallery-close',

			showOnLoad: false,

			onShowScrim: function(event){ 

				$('#gallery').animate({ 'margin-top': $(document).scrollTop()+100  }, 300);

			}

		});

	});

</script>