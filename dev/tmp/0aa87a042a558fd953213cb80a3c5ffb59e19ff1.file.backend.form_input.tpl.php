<?php /* Smarty version Smarty-3.0.8, created on 2015-11-04 10:55:16
         compiled from "/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.form_input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2094554997563a62a4bdadd7-02821830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0aa87a042a558fd953213cb80a3c5ffb59e19ff1' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/includes/backend.ui/backend.form_input.tpl',
      1 => 1446588287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2094554997563a62a4bdadd7-02821830',
  'function' => 
  array (
    'cpf_input_helper' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'cpf_input' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!is_callable('smarty_function_cpf_title')) include '/home2/talonlod/public_html/dev/app/view/smarty/plugins/function.cpf_title.php';
?><?php if (!function_exists('smarty_template_function_cpf_input_helper')) {
    function smarty_template_function_cpf_input_helper($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_input_helper']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<?php ob_start(); ?><?php echo smarty_function_cpf_title(array('var'=>$_smarty_tpl->getVariable('cpf_current_entity')->value,'field'=>$_smarty_tpl->getVariable('field')->value),$_smarty_tpl);?>
<?php  Smarty::$_smarty_vars['capture']['label']=ob_get_clean();?>
	<?php ob_start(); ?><?php if (!$_smarty_tpl->getVariable('no_value')->value){?><?php echo $_smarty_tpl->getVariable(($_smarty_tpl->getVariable('field')->value))->value;?>
<?php }?><?php  Smarty::$_smarty_vars['capture']['value']=ob_get_clean();?>
	<?php smarty_template_function_cpf_input($_smarty_tpl,array('type'=>$_smarty_tpl->getVariable('type')->value,'value'=>Smarty::$_smarty_vars['capture']['value'],'field'=>$_smarty_tpl->getVariable('field')->value,'label'=>Smarty::$_smarty_vars['capture']['label'],'class'=>$_smarty_tpl->getVariable('class')->value,'no_border'=>$_smarty_tpl->getVariable('no_border')->value,'list'=>$_smarty_tpl->getVariable('list')->value));?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>

<?php if (!is_callable('smarty_function_fckeditor')) include '/home2/talonlod/public_html/dev/app/view/smarty/plugins/function.fckeditor.php';
if (!is_callable('smarty_function_ckeditor')) include '/home2/talonlod/public_html/dev/app/view/smarty/plugins/function.ckeditor.php';
?><?php if (!function_exists('smarty_template_function_cpf_input')) {
    function smarty_template_function_cpf_input($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_input']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php if ($_smarty_tpl->getVariable('type')->value=='hidden'){?>
    <input type="hidden" id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
">
<?php }else{ ?>
    <div class="control-group<?php if ($_smarty_tpl->getVariable('wr_class')->value){?> <?php echo $_smarty_tpl->getVariable('wr_class')->value;?>
<?php }?>">
        <?php if ($_smarty_tpl->getVariable('type')->value=='textonly'){?>
            <label class="control-label"><?php echo $_smarty_tpl->getVariable('label')->value;?>
</label>
            <div class="controls">
                <?php echo $_smarty_tpl->getVariable('value')->value;?>

            </div>

        <?php }elseif($_smarty_tpl->getVariable('type')->value=='link'){?>
            <label width="100" class="control-label"><?php echo $_smarty_tpl->getVariable('label')->value;?>
</label>
            <div><a href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
" title="<?php echo $_smarty_tpl->getVariable('value')->value;?>
"><?php echo $_smarty_tpl->getVariable('value')->value;?>
</a></div>

        <?php }elseif($_smarty_tpl->getVariable('type')->value=='comment'){?>
            <div><i><?php echo $_smarty_tpl->getVariable('value')->value;?>
</i></div>

        <?php }else{ ?>
            <?php if ($_smarty_tpl->getVariable('type')->value!='checkbox'){?>
                <label for="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" class="control-label"><?php echo $_smarty_tpl->getVariable('label')->value;?>
:</label>
            <?php }else{ ?>
                <label class="control-label"></label>
            <?php }?>

            <div class="controls">
            <?php if ($_smarty_tpl->getVariable('type')->value=='text'){?>
                    <input type="text" id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" maxlength="255" value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
" class="input-file <?php echo $_smarty_tpl->getVariable('class')->value;?>
"/>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='slug'){?>
                    <input type="text" id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" maxlength="255" value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
" class="input-file <?php echo $_smarty_tpl->getVariable('class')->value;?>
"/>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#<?php if ($_smarty_tpl->getVariable('title_field')->value){?><?php echo $_smarty_tpl->getVariable('title_field')->value;?>
<?php }else{ ?>title<?php }?>').syncTranslit({ destination: '<?php echo $_smarty_tpl->getVariable('field')->value;?>
' });
                        });
                    </script>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='password'){?>
                    <input type="password" id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
" class="input-file <?php echo $_smarty_tpl->getVariable('class')->value;?>
"/>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='checkbox'){?>
                    <label class="checkbox">
                        <input style="border: none" type="checkbox" id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
"<?php if ($_smarty_tpl->getVariable('value')->value){?> checked="checked"<?php }?> value="1"<?php if ($_smarty_tpl->getVariable('readonly')->value){?> disabled="disabled"<?php }?> />
                        <span><?php echo $_smarty_tpl->getVariable('label')->value;?>
</span>
                    </label>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='radio'){?>
                    <label><input type="radio" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" value="1" <?php if ($_smarty_tpl->getVariable('value')->value){?>checked="checked"<?php }?> />&nbsp;<?php if ($_smarty_tpl->getVariable('label_true')->value){?><?php echo $_smarty_tpl->getVariable('label_true')->value;?>
<?php }else{ ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Yes<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></label>
                    <label><input type="radio" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" value="0" <?php if (!$_smarty_tpl->getVariable('value')->value){?>checked="checked"<?php }?> />&nbsp;<?php if ($_smarty_tpl->getVariable('label_false')->value){?><?php echo $_smarty_tpl->getVariable('label_false')->value;?>
<?php }else{ ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
No<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['t'][0][0]->translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></label>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='select'){?>
                    <select id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" class="field <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->getVariable('value')->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</option>
                        <?php }} ?>
                    </select>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='multiple_select'){?>
                    <select id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
[]" class="field <?php echo $_smarty_tpl->getVariable('class')->value;?>
" multiple="multiple">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->getVariable('value')->value)){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</option>
                        <?php }} ?>
                    </select>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='textarea'){?>
                    <textarea id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" class="input-xlarge textarea span6 <?php echo $_smarty_tpl->getVariable('class')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
"<?php if ($_smarty_tpl->getVariable('readonly')->value){?> readonly="readonly"<?php }?>><?php echo $_smarty_tpl->getVariable('value')->value;?>
</textarea>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='fck_default'){?>
                    <?php echo smarty_function_fckeditor(array('BasePath'=>"/static/javascript/fckeditor/",'InstanceName'=>$_smarty_tpl->getVariable('field')->value,'Width'=>"100%",'Height'=>"300px",'ToolbarSet'=>"CPFDefault",'Value'=>$_smarty_tpl->getVariable('value')->value,'StylesXmlPath'=>"/static/css/fckeditor/fckstyles.xml",'EditorAreaCSS'=>"/static/css/fckeditor/fck_editorarea_cpf.css"),$_smarty_tpl);?>

            <?php }elseif($_smarty_tpl->getVariable('type')->value=='fck_lead'){?>
                    <?php echo smarty_function_fckeditor(array('BasePath'=>"/static/javascript/fckeditor/",'InstanceName'=>$_smarty_tpl->getVariable('field')->value,'Width'=>"100%",'Height'=>"150px",'ToolbarSet'=>"CPFLead",'Value'=>$_smarty_tpl->getVariable('value')->value,'StylesXmlPath'=>"/static/css/fckeditor/fcklead.xml",'EditorAreaCSS'=>"/static/css/fckeditor/fck_editorarea_cpf.css"),$_smarty_tpl);?>

            <?php }elseif($_smarty_tpl->getVariable('type')->value=='ck_editor'){?>
                    <div style="width: 720px;">
                    <?php ob_start(); ?><?php if ($_smarty_tpl->getVariable('loadJS')->value){?>true<?php }else{ ?>false<?php }?><?php  Smarty::$_smarty_vars['capture']['loadJS']=ob_get_clean();?>
                    <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('height')->value)===null||$tmp==='' ? "150" : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_ckeditor(array('BasePath'=>"static/javascript/backend/ckeditor/",'InstanceName'=>$_smarty_tpl->getVariable('field')->value,'height'=>$_tmp1."px",'toolbar'=>"CPFDefault",'Value'=>$_smarty_tpl->getVariable('value')->value,'loadJS'=>Smarty::$_smarty_vars['capture']['loadJS'],'language'=>$_smarty_tpl->getVariable('cpf_lang')->value),$_smarty_tpl);?>

                    </div>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='date'){?>
                
                    <script type="text/javascript">
                        $(function(){
                            $('#<?php echo $_smarty_tpl->getVariable('field')->value;?>
').datepicker({
                                defaultDate: +1
                            });
                        });
                    </script>
                
                <input type="text" id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" maxlength="255" value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
" class="small_field" style="float: left; margin-right: 15px"/>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='datetime'){?>
                <?php if (!$_smarty_tpl->getVariable('readonly')->value){?>
                    <input type="text" id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
" maxlength="255" value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
" class="small_field" style="float: left; margin-right: 15px"/>
                    <?php $_smarty_tpl->tpl_vars["value_time"] = new Smarty_variable(($_smarty_tpl->getVariable('field')->value).("_time"), null, null);?>
                    <input type="text" id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
_time" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
_time" maxlength="255" value="<?php echo $_smarty_tpl->getVariable(($_smarty_tpl->getVariable('value_time')->value))->value;?>
" class="small_field" style="width: 50px" />
                    
                    <script type="text/javascript">
                        $(function(){
                            $('#<?php echo $_smarty_tpl->getVariable('field')->value;?>
').datepicker({
                                defaultDate: +1
                            });
                            $('#<?php echo $_smarty_tpl->getVariable('field')->value;?>
').datepicker('option', $.datepicker.regional['<?php echo $_smarty_tpl->getVariable('cpf_lang')->value;?>
']);
                            $('#<?php echo $_smarty_tpl->getVariable('field')->value;?>
').datepicker( "option", "dateFormat", 'dd.mm.yy' );
                            $('#<?php echo $_smarty_tpl->getVariable('field')->value;?>
_time').mask('<?php echo $_smarty_tpl->getVariable('cpf_config_validation')->value['TIME']['MASK'];?>
');
                        });
                    </script>
                    
                <?php }else{ ?><?php echo $_smarty_tpl->getVariable('value')->value;?>
 <?php echo $_smarty_tpl->getVariable('value_time')->value;?>
<?php }?>
            <?php }elseif($_smarty_tpl->getVariable('type')->value=='time'){?>
                <input type="text" id="<?php echo $_smarty_tpl->getVariable('field')->value;?>
_time" name="<?php echo $_smarty_tpl->getVariable('field')->value;?>
_time" maxlength="255" value="<?php echo $_smarty_tpl->getVariable('value_time')->value;?>
" class="small_field" style="width: 50px" />
                
                <script type="text/javascript">
                    $(function(){
                        $('#<?php echo $_smarty_tpl->getVariable('field')->value;?>
_time').mask('<?php echo $_smarty_tpl->getVariable('cpf_config_validation')->value['TIME']['MASK'];?>
');
                    });
                </script>
                
            <?php }?>
        <?php }?>

        <?php if ($_smarty_tpl->getVariable('additional_data')->value){?><?php echo $_smarty_tpl->getVariable('additional_data')->value;?>
<?php }?>
        </div>
    </div>
<?php }?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
