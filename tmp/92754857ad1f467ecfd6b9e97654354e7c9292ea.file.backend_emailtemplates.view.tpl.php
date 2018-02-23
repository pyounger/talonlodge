<?php /* Smarty version Smarty-3.0.8, created on 2016-12-08 06:51:27
         compiled from "/home2/talonlod/public_html/app/templates/backend_emailtemplates.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4230392115849817f9a7fb3-57016203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92754857ad1f467ecfd6b9e97654354e7c9292ea' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/backend_emailtemplates.view.tpl',
      1 => 1475595429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4230392115849817f9a7fb3-57016203',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
    <title><?php echo $_smarty_tpl->getVariable('entity')->value->subject;?>
</title>
</head>
<body style="background: black;">
    <div style="margin: 0px auto; width: 600px; background: white;">
        <?php echo $_smarty_tpl->getVariable('entity')->value->body;?>

    </div>
</body>
</html>
