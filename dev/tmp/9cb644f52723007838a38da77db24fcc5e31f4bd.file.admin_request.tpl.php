<?php /* Smarty version Smarty-3.0.8, created on 2015-01-21 09:23:16
         compiled from "/home2/talonlod/public_html/app/templates/mail/admin_request.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109266843054bfee949d1d23-43119761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cb644f52723007838a38da77db24fcc5e31f4bd' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/mail/admin_request.tpl',
      1 => 1337057146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109266843054bfee949d1d23-43119761',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars["cpf_root_url"] = new Smarty_variable(cpf_link('frontend_index',array('abs'=>true)), null, null);?>
	<table style="width: 600px; margin: 0px auto; border-collapse: collapse; padding: 0; text-align: left; border: 0;" width="600" cellpadding="0" cellspacing="0" border="0">
	<!-- header -->
		<tr>
			<td style="width: 600px; margin: 0; padding: 0; line-height: 0;">
				<table style="border-collapse: collapse; padding: 0; border: 0;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="padding: 0; margin: 0; height: 5px; line-height: 0;"><img src="<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
static/images/mail/header-top.png" height="5" width="600" border="0" alt=""/></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="width: 600px; margin: 0; padding: 0; line-height: 0;">
				<table style="border-collapse: collapse; padding: 0; border: 0;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="height: 69px; width: 460px; margin 0; padding: 0; line-height: 0;" width="460"><a href="http://talonlodge.com"><img src="<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
static/images/mail/logo.png" width="460" height="69" border="0" alt=""/></a></td>
						<td align="center" style="height: 69px; width: 72px; margin 0; padding: 0; line-height: 0;" width="70"><a href="http://twitter.com/talonlodge"><img src="<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
static/images/mail/twitter.png" width="72" height="69" border="0" alt=""/></a></td>
						<td style="height: 69px; width: 71px; margin 0; padding: 0; line-height: 0;" width="70"><a href="http://www.facebook.com/TalonLodge?ref=ts"><img src="<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
static/images/mail/facebook.png" width="68" height="69" border="0" alt=""/></a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="width: 600px; margin: 0; padding: 0; line-height: 0;">
				<table style="border-collapse: collapse; padding: 0; border: 0;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="height: 5px; margin 0; padding: 0; line-height: 0;"><img src="<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
static/images/mail/header-bottom.png" height="5" width="600" border="0" alt=""/></td>
					</tr>
				</table>
			</td>
		</tr>
	<!-- /header -->
	<!-- content -->
		<tr>
			<td style="width: 600px; margin: 0; padding: 0; line-height: 0;">
				<p style="line-height: 1.5em; font-family: Times New Roman; font-size: 18px;">Name: <?php echo $_smarty_tpl->getVariable('message')->value->first_name;?>
 <?php echo $_smarty_tpl->getVariable('message')->value->last_name;?>
</p>
				<p style="line-height: 1.5em; font-family: Times New Roman; font-size: 18px;">Email: <?php echo $_smarty_tpl->getVariable('message')->value->email;?>
</p>
				<?php if ($_smarty_tpl->getVariable('message')->value->message){?><p style="line-height: 1.5em; font-family: Times New Roman; font-size: 18px;">Message: <?php echo $_smarty_tpl->getVariable('message')->value->message;?>
</p><?php }?>
			</td>
		</tr>
		<!-- /content -->
	</table>

</body>
</html>