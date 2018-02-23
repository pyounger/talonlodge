<?php /* Smarty version Smarty-3.0.8, created on 2017-01-12 11:24:30
         compiled from "/home2/talonlod/public_html/app/templates/controls/frontend_banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18710302865877e5fe1ef411-99169281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94d64baaddc2a5b043493b3017fce2a79c0e00ae' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/controls/frontend_banner.tpl',
      1 => 1484252649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18710302865877e5fe1ef411-99169281',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars["banner"] = new Smarty_variable($_smarty_tpl->getVariable('control_frontend_banner_banner')->value, null, null);?>
<?php if ($_smarty_tpl->getVariable('banner')->value){?>
<?php  $_smarty_tpl->tpl_vars['ban'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banner')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ban']->key => $_smarty_tpl->tpl_vars['ban']->value){
?>
    <?php if ($_smarty_tpl->getVariable('ban')->value->url){?></br><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>"frontend_banners",'id'=>$_smarty_tpl->getVariable('ban')->value->id),$_smarty_tpl);?>
" target="_self"><?php }?>
        <?php if ($_smarty_tpl->getVariable('ban')->value->extension=='swf'){?>
            <div id="banner-container"></div>
        <?php }else{ ?>
            <img src="<?php echo cpf_config('APP.BANNERS.URL');?>
<?php echo $_smarty_tpl->getVariable('ban')->value->filename;?>
" />
        <?php }?>
    <?php if ($_smarty_tpl->getVariable('ban')->value->url){?></a></br><?php }?>
	<?php if ($_smarty_tpl->getVariable('ban')->value->extension=='swf'){?>
	<script type="text/javascript">
		$().ready(function(){
		
			var flashvars = {
				clickTAG: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>"frontend_banners",'id'=>$_smarty_tpl->getVariable('ban')->value->id,'abs'=>true),$_smarty_tpl);?>
'
			}
	 
			var params = {
				wmode: 'opaque'
			}

			var attributes = {
				id: "banner",
				name: "banner"
			}
			
			$('#banner-container').flash({
				swf: '<?php echo cpf_config('APP.BANNERS.URL');?>
<?php echo $_smarty_tpl->getVariable('ban')->value->filename;?>
',
				width: 300,
				height: 250,
				allowFullScreen: true,
				wmode: 'transparent',
				flashvars: flashvars,
				params: params,
				attributes: attributes
			});
		});
	</script>
	<?php }?>
	<?php }} ?>
<?php }?>