<?php /* Smarty version Smarty-3.0.8, created on 2016-11-02 11:37:07
         compiled from "/home2/talonlod/public_html/dev/app/templates/backend_emailtemplates.view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1568407146581a4063aaf0b8-95846980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bdfe0406d2243c2fcbe04c873a307750af342e6' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/backend_emailtemplates.view.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1568407146581a4063aaf0b8-95846980',
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
