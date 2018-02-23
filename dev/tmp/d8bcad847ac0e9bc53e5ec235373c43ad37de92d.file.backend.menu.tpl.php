<?php /* Smarty version Smarty-3.0.8, created on 2017-02-10 08:24:03
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/backend.menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71900399589df733934821-02578327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8bcad847ac0e9bc53e5ec235373c43ad37de92d' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/backend.menu.tpl',
      1 => 1486747100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71900399589df733934821-02578327',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>




    <?php if (!$_smarty_tpl->getVariable('cpf_rights')->value->is_guest()){?>

    <ul class="nav" style="float:right">

     <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_index'),$_smarty_tpl);?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Home<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

     <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_profile','action'=>'logout'),$_smarty_tpl);?>
" onclick="return confirm('<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Are you sure that you want to logout?<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
');"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Logout<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

 </ul>				



 <ul class="nav">
    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Content<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <b class="caret"></b></a>

        <ul class="dropdown-menu">

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_pages')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_pages'),$_smarty_tpl);?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Pages<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_galleries')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_galleries'),$_smarty_tpl);?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Galleries<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_gallerytypes')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_gallerytypes'),$_smarty_tpl);?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Gallery Types<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_layouts')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_layouts'),$_smarty_tpl);?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Layouts<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_templates')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_templates'),$_smarty_tpl);?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Templates<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_emailtemplates')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_emailtemplates'),$_smarty_tpl);?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Email Templates<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

            <?php }?>

        </ul>

    </li>

    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_backend_navigation')||$_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_navigationelements')){?>

    <li<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_navigation'||$_smarty_tpl->getVariable('cpf_controller')->value=='backend_navigationelements'){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_navigation'),$_smarty_tpl);?>
">Navigation</a></li>

    <?php }?>

    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_messages')){?>

    <li<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_messages'){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_messages'),$_smarty_tpl);?>
">Messages</a></li>

    <?php }?>

    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_banners')){?>

    <li<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_banners'){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_banners'),$_smarty_tpl);?>
">Banners</a></li>

    <?php }?>

    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_accomodation')){?>
    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_accomodation'),$_smarty_tpl);?>
">Accomodations</a></li>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_demos')){?>
    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_demos'),$_smarty_tpl);?>
">Demo</a></li>
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_recipes')){?>

    <li<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_recipes'||$_smarty_tpl->getVariable('cpf_controller')->value=='backend_recipes'){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_recipes'),$_smarty_tpl);?>
">Recipes</a></li>

    <?php }?>

     <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_testings')){?>

    <li<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_testings'||$_smarty_tpl->getVariable('cpf_controller')->value=='backend_testings'){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_testings'),$_smarty_tpl);?>
">Testings</a></li>

    <?php }?>



    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_reviews')||$_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_facebook')||$_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_twitter')){?>

    <li class="dropdown<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_reviews'||$_smarty_tpl->getVariable('cpf_controller')->value=='backend_facebook'||$_smarty_tpl->getVariable('cpf_controller')->value=='backend_twitter'){?> active<?php }?>">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Reviews<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <b class="caret"></b></a>

        <ul class="dropdown-menu">

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_reviews')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_reviews'),$_smarty_tpl);?>
">TripAdvisor</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_facebook')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_facebook'),$_smarty_tpl);?>
">Facebook</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_twitter')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_twitter'),$_smarty_tpl);?>
">Twitter</a></li>

            <?php }?>

        </ul>

    </li>

    <?php }?>



    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_users')){?>

    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Authorization<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <b class="caret"></b></a>

        <ul class="dropdown-menu">

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_users')){?>

            <li<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_users'){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_users'),$_smarty_tpl);?>
">Users</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_groups')){?>

            <li<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_groups'){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_groups'),$_smarty_tpl);?>
">Groups</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_rights')){?>

            <li<?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='backend_rights'){?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_rights'),$_smarty_tpl);?>
">Rights</a></li>

            <?php }?>

        </ul>

    </li>

    <?php }?>



    <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_cache','flush')){?>

    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Service<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <b class="caret"></b></a>

        <ul class="dropdown-menu">

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_cache','flush')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_cache','action'=>'flush'),$_smarty_tpl);?>
" onclick="return confirm('<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Are you sure that you want flush cached data?<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
');"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Flush cache<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

            <?php }?>

            <?php if ($_smarty_tpl->getVariable('cpf_rights')->value->has_rights('backend_phpinfo')){?>

            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('controller'=>'backend_phpinfo'),$_smarty_tpl);?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
PHP information<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

            <?php }?>

            <li><a href="/generator.php" target="_blank"><i class="icon-refresh"></i> Refresh</a></li>

        </ul>

    </li>

    <?php }?>

</ul>

<?php }?>

