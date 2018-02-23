<?php /* Smarty version Smarty-3.0.8, created on 2017-12-21 12:45:35
         compiled from "/home2/talonlod/public_html/app/templates/layouts/pages/frontend/gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19626282805a3c2b7fd10d57-51003670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5823f40a1c53679a99a19007d4e36202db7bd421' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/layouts/pages/frontend/gallery.tpl',
      1 => 1513892716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19626282805a3c2b7fd10d57-51003670',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style type="text/css">
    
    iframe {
 
        margin-bottom: 5px;
    }

    .b-gallery-subheader {
        margin-bottom: 30px;
    }
    .target-nav {
        margin-bottom: 30px;
        list-style-type: none;
    }
    .target-nav > li:first-child {
        font-size: 11px;
        color: #bfbfbf;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        display: block;
    }
    .target-nav > li > a {
        display: inline-block;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        border-radius: 20px;
        background-color: #dbe3e6;
        color: #748a94;
        font-size: 0.857em;
        padding: 6px 20px;
        line-height: 1;
    }

    h2 {
        font-family: sans-serif;
        font-size: 30px;
        margin: 18px 0px;
        color: #2f4f4fc7;
    }

    .viframe {
        display: inline-block;
    }
    .l-center{
        max-width: 980px;
    }

    .video-image-caption {
    text-align: center;
    color: #A2916A;
    margin: 5px 0 20px; /*added later*/
}


.target-nav > li > a{
    text-decoration: none;

}

.target-nav > li > a:hover {
    background-color: #5a7683;
    color: #fff;

}


iframe {
    width: 324px !important;
    height: 178px !important;
    padding-right: 7px;
}


.b-gallery-wrapper .b-gallery-photos {
    margin: -5px;
    width: calc(21% + 0px);
    margin-bottom: -47px;
    position: relative;
}

table.bordered-table {
    border-collapse:  collapse;
    margin: 0px;
    border-spacing: 0;
    table-layout: fixed;
}

.video-gallery-11 {
    width:  100%;
    height:  auto;
    border-bottom: 1px solid #e6e3db;
    padding-bottom: 37px;
}

.video-gallery-11 h2 {
    
    color: #a2916a;
    font-family: filosofia-grand,"Times New Roman",Times,Georgia,serif;
    font-weight: 400;
    line-height: 1.1;

}

.b-gallery-header h2
{

    color: #a2916a;
    font-family: filosofia-grand,"Times New Roman",Times,Georgia,serif;
    font-weight: 400;
    line-height: 1.1;
    

}

table.bordered-table tr td {

    position: relative;
}

.bc:after {
   content: "\f00e";
    position: absolute;
    font-family: fontawesome;
    z-index: 99;
    color: #fff;
    width: 20px;
    height: 20px;
    font-size: 18px;
    right: 5px;
    bottom: 18px;
          -webkit-transition: all .5s ease;
     -moz-transition: all .5s ease;
      -ms-transition: all .5s ease;
          transition: all .5s ease;
}

.bordered-table tbody tr td.bc img {
    width: 197px;
    height: 132px;
    object-fit: cover;
    border: 0.1px solid #fff;
    box-shadow: unset;
    transition: transform .2s;
}

.bc:hover:after {
     -ms-transform: scale(1.5); 
    -webkit-transform: scale(1.5); 
    transform: scale(1.5); 
      transition-duration: .5s;
}
  
.back-to-top{

    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    display: block;
    text-align: right;
    font-size: 11px;
    text-decoration: none;
    color: #a2916a;
}

.ad-image-description {

    position: absolute;

    }

.ad-image-description .ad-description-title {

    display: block;

    }

.b-gallery-subheader p {
    text-align:  justify;
  
}

.b-gallery-subheader {
    margin-bottom: 30px;
}

.b-gallery-photos.small-gallery-photo {
    margin-bottom: 30px;
}

.b-gallery-inside-image-border {
        position: relative;
}

.b-gallery-inside-image-border a:after
{
     content: "\f00e";
    position: absolute;
    font-family: fontawesome;
    z-index: 99;
    color: #fff;
    width: 20px;
    height: 20px;
    font-size: 18px;
    right: 5px;
    bottom: 5px;
      -webkit-transition: all .5s ease;
     -moz-transition: all .5s ease;
      -ms-transition: all .5s ease;
          transition: all .5s ease;
}

.b-gallery-inside-photo {
    float: left;
    width: 196px;
    margin: 0 0px 0px 0;
    height: 135px;
}
.b-gallery-photos-i {
    overflow: unset !important;
    display: inline;
}

.b-gallery-inside-image-border a:hover:after {
     -ms-transform: scale(1.5); 
    -webkit-transform: scale(1.5); 
    transform: scale(1.5); 
   /*transition-delay: 2s;*/
    transition-duration: .5s;
}


.b-gallery-photos.small-gallery-photo {
   
    margin-left: 1px;
}

.b-gallery-inside-image-border img {
    object-fit: cover;
}

@media only all and (max-width: 30rem)
{

    viframe
    {
        display:block;
        width:100% !important;
        height:auto;
      
    }
    
    iframe
    {
        width:100% !important;
        height:100% !important;
        
    }


</style>

<div class="b-gallery-wrapper l-center" id="btot">

        <h1>Photo and Video Gallery</h1>

            <ul class="target-nav">
                <li>Jump to:</li>
                <li id="btnscr"><a href="javascript:void(0)" class="scroll">Photos <i class="fa fa-arrow-down 2x"></i></a></li>
            </ul>
            <div class="video-gallery-11">

        <h2>Videos</h2>

        <?php echo $_smarty_tpl->getVariable('page')->value->content['content'];?>


        </div>

    <div class="b-gallery-header" id="myDivphoto">

        <a href="javascript:void(0)" class="scroll back-to-top" id="clktotop">Back to Top <i class="fa fa-angle-up"></i></a>
        <h2>Photos</h2>

        <div class="b-gallery-subheader">

            <!-- ....................(Parvez)....................... -->

            <div class="b-gallery-wrapper l-center">

                <div class="b-gallery-photos small-gallery-photo">

                    <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('gallery')->value->photos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

                        <?php if (($_smarty_tpl->getVariable('i')->value-1)%4==0){?>

                        <div class="b-gallery-photos-i">

                        <?php }?>

                        <div class="b-gallery-inside-photo<?php if ($_smarty_tpl->getVariable('i')->value%4==0){?> b-gallery-inside-photo-last<?php }?>">

                            <?php echo $_smarty_tpl->getVariable('image')->value->decodeVersions();?>


                            <div class="b-gallery-inside-image-border">

                                <a rel="gallery" href="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['fullscreen']['filename'];?>
" title="" data-fancybox="group" data-caption="<?php echo $_smarty_tpl->getVariable('image')->value->title;?>
"><img alt="<?php echo $_smarty_tpl->getVariable('image')->value->title;?>
" src="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['filename'];?>
" width="<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['width'];?>
" height="<?php echo $_smarty_tpl->getVariable('image')->value->versions['thumbnail']['height'];?>
"/></a>

                            </div>

                        </div>

                        <?php if (($_smarty_tpl->getVariable('i')->value)%4==0||$_smarty_tpl->getVariable('smarty')->value['foreach']['glrs']['last']){?>

                        </div>

                        <?php }?>

                    <?php }} ?>

                </div><!-- /.b-gallery-photos -->

                <!-- Popup -->
                <div id="popup-gallery-block">
                </div>
                <!-- /Popup -->
            </div>

            <!-- ....................(Parvez)....................... -->
             

        </div>

        <div class="b-gallery-social">

            <?php $_template = new Smarty_Internal_Template('includes/snippet-social.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

        </div>
        

    </div>

</div>

<script type="text/javascript">
    
    $("#btnscr").click(function() {
            $('html, body').animate({
                scrollTop: $("#myDivphoto").offset().top
            }, 1500);
        });

     $("#clktotop").click(function() {
            $('html, body').animate({
                scrollTop: $("#fb-root").offset().top
            }, 1000);
        });
</script>

