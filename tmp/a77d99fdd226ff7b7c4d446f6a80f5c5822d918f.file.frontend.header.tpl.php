<?php /* Smarty version Smarty-3.0.8, created on 2017-12-11 11:50:49
         compiled from "/home2/talonlod/public_html/app/templates/includes/frontend.header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6661387595a2eefa9e265f8-66850339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a77d99fdd226ff7b7c4d446f6a80f5c5822d918f' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/frontend.header.tpl',
      1 => 1513025441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6661387595a2eefa9e265f8-66850339',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div class="b-header__top mobile-header-top">
  <div class="b-header__contacts">
    <div class="b-header__tollfree"> Toll Free: 800-536-1864 </div>
  </div>
</div>
<div class="l-subheader"> 
  <div class="l-new-header">
    <div class="l-new-header__inner l-center">
      <div class="b-logo"> <a href="<?php echo $_smarty_tpl->getVariable('cpf_base_url')->value;?>
"><img src="static/images/frontend/new_layout/header/talonlodge.png" width="155" height="68" alt=""/></a> </div>
      <div class="b-header__r">
        <div class="b-header__top desktop-top-header">
          <div class="b-header__social">
            <form id="searchbox_006300182637952144805:-sx4hsnrkuk" action="http://www.google.com/cse" class="b-search-form">
              <input type="hidden" name="cx" value="006300182637952144805:-sx4hsnrkuk" />
              <input type="hidden" name="cof" value="FORID:0" />
              <input type="hidden" name="ie" value="utf-8" />
              <input type="hidden" name="oe" value="utf-8" />
              <input name="siteurl" type="hidden" value="<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" />
              <input name="ref" type="hidden" value="talonlodge.com/" />
              <input name="q" type="text" placeholder="Search"/>
              <button type="submit" name="sa"></button>
            </form>
            <div class="b-facebook">
              <div class="b-facebook-wrapper">
                <div class="fb-like" data-href="http://www.facebook.com/TalonLodge?ref=ts" data-send="false" data-width="10" data-show-faces="true" layout="button_count"></div>
              </div>
            </div>
            <div class="b-tw-fb">
              <ul>
                <li><a href="https://twitter.com/talonlodge" class="tw" target="_blank"></a></li>
                <li><a href="https://www.facebook.com/TalonLodge" class="fb" target="_blank"></a></li>
                <li><a href="http://www.talonlodge.com/blog/" class="wp" target="_blank"></a></li>
              </ul>
            </div>
          </div>
          <div class="b-header__contacts">
            <div class="b-header__tollfree">

              Toll Free: 800-536-1864 </div>
              <div class="b-header__links"> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>'frontend_menu','key'=>'header-menu','em'=>true),$_smarty_tpl);?>
 
              <!-- ................Parvez............. -->
              <!-- <ul>

                                    <li><a href="http://wordpress.talonlodge.com/" target="_blank">Blog</a></li>

                                    <li><a href="http://talonlodge.com/rates/">Rates</a></li>

                                    <li><a href="http://talonlodge.com/faq/">Faq</a></li>

                                    <li class="last"><a href="#">Contacts</a></li>

                            </ul>

                        --> 

                    </div>
                </div>
            </div>
            <div class="b-header__menu"> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>'frontend_menu','key'=>'main-menu','level'=>1,'em'=>true,'custom_layout'=>'controls/menu_custom/main_menu.tpl'),$_smarty_tpl);?>
 </div>
        </div>
    </div>
</div>

<?php if ($_smarty_tpl->getVariable('slideshow')->value){?>



<?php if ($_SERVER['REQUEST_URI']=='/'){?> 


<div id="noid"></div> 
<div id="bm" style="position: absolute;bottom:80px;left:20px;color: #fff; font-size: 30px; cursor: pointer;display: inline-block; z-index:999999" >
  <i class="fa fa-volume-off" onclick="enableMute()"></i>
</div>
<script>
  var ppn = $(window).width(); 
  if(ppn>=768)
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Talon_Lodge_Spa.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/184031995.hd.mp4?s=32fdc4894d12de802841c7bb3515fb08ba9ef4aa&profile_id=174&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
  else
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Talon_Lodge_Spa.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/184031995.sd.mp4?s=5ec7c6bc5fd26d62a0f7d2e2e26a3d4fdfee79b1&profile_id=164&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
</script>



<?php }elseif($_SERVER['REQUEST_URI']=='/freshwater-fishing/'){?> 


<div id="noid"></div> 
<div id="bm" style="position: absolute;bottom:80px;left:20px;color: #fff; font-size: 30px; cursor: pointer;display: inline-block; z-index:999999" >
  <i class="fa fa-volume-off" onclick="enableMute()"></i>
</div>
<script>
  var ppn = $(window).width(); 
  if(ppn>=768)
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Freshwater_Fishing.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/183730458.hd.mp4?s=3d3b469c348b5b159c512281fa3f058966746c36&profile_id=174&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
  else
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Freshwater_Fishing.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/183730458.sd.mp4?s=9427355e68323d6a9c6965abf39d702ccf931f2c&profile_id=164&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
</script>




<?php }elseif($_SERVER['REQUEST_URI']=='/cuisine-events/'){?> 


<div id="noid"></div> 
<div id="bm" style="position: absolute;bottom:80px;left:20px;color: #fff; font-size: 30px; cursor: pointer;display: inline-block; z-index:999999" >
  <i class="fa fa-volume-off" onclick="enableMute()"></i>
</div>
<script>
  var ppn = $(window).width(); 
  if(ppn>=768)
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Cuisine_Events.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/183758165.hd.mp4?s=dd5208da39aa778d1569ea2785307a5c4cbb7049&profile_id=174&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
  else
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Cuisine_Events.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/183758165.sd.mp4?s=3b177f0f36a22aee04d032360e65391b40ee6bed&profile_id=164&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
</script>



<?php }elseif($_SERVER['REQUEST_URI']=='/alaska-adventure/'){?> 


<div id="noid"></div> 
<div id="bm" style="position: absolute;bottom:80px;left:20px;color: #fff; font-size: 30px; cursor: pointer;display: inline-block; z-index:999999" >
  <i class="fa fa-volume-off" onclick="enableMute()"></i>
</div>
<script>
  var ppn = $(window).width(); 
  if(ppn>=768)
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Alaska_Adventure.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/185136883.hd.mp4?s=e6f6dca318b23e04d342d58d1122b42aa18ce25f&profile_id=174&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
  else
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Alaska_Adventure.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/185136883.sd.mp4?s=3e167d5690a4599c9164f391f85da61518208db5&profile_id=164&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
</script>



<?php }elseif($_SERVER['REQUEST_URI']=='/winemaker-series/'){?> 


<div id="noid"></div> 
<div id="bm" style="position: absolute;bottom:80px;left:20px;color: #fff; font-size: 30px; cursor: pointer;display: inline-block; z-index:999999" >
  <i class="fa fa-volume-off" onclick="enableMute()"></i>
</div>
<script>
  var ppn = $(window).width(); 
  if(ppn>=768)
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/winemaker.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/246674068.hd.mp4?s=0111d1f0fe93205652d636704755ea9b611ea2ed&profile_id=174&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
  else
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/winemaker.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/246674068.sd.mp4?s=3f26ddc871b9f20ce4d04fe4852414c988c2516e&profile_id=164&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
</script>



<?php }elseif($_SERVER['REQUEST_URI']=='/fishing/'){?> 


<div id="noid"></div> 
<div id="bm" style="position: absolute;bottom:80px;left:20px;color: #fff; font-size: 30px; cursor: pointer;display: inline-block; z-index:999999" >
  <i class="fa fa-volume-off" onclick="enableMute()"></i>
</div>
<script>
  var ppn = $(window).width(); 
  if(ppn>=768)
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Fishing.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/185366653.hd.mp4?s=5c02f1405dab96ff2392d4a93620cf5afba59198&profile_id=174&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
  else
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Fishing.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/185366653.sd.mp4?s=28632e4a99f7206762df44b710840f6b169208a8&profile_id=164&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
</script>



<?php }elseif($_SERVER['REQUEST_URI']=='/sport-fishing/'){?> 


<div id="noid"></div> 
<div id="bm" style="position: absolute;bottom:80px;left:20px;color: #fff; font-size: 30px; cursor: pointer;display: inline-block; z-index:999999" >
  <i class="fa fa-volume-off" onclick="enableMute()"></i>
</div>
<script>
  var ppn = $(window).width(); 
  if(ppn>=768)
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Sport_Fishing.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/185366653.hd.mp4?s=5c02f1405dab96ff2392d4a93620cf5afba59198&profile_id=174&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
  else
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Sport_Fishing.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/185366653.sd.mp4?s=28632e4a99f7206762df44b710840f6b169208a8&profile_id=164&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
</script>

<?php }elseif($_SERVER['REQUEST_URI']=='/spa/'){?> 


<div id="noid"></div> 
<div id="bm" style="position: absolute;bottom:80px;left:20px;color: #fff; font-size: 30px; cursor: pointer;display: inline-block; z-index:999999" >
  <i class="fa fa-volume-off" onclick="enableMute()"></i>
</div>
<script>
  var ppn = $(window).width(); 
  if(ppn>=768)
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Sport_Fishing.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/186344355.hd.mp4?s=290d826d0e54d58111d9ca4fcb7fb7e8f87c295c&profile_id=174&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
  else
  {
    document.getElementById('noid').innerHTML += '<div id="video-masthead"><div id="masthead-vid" class="video-masthead-vid" style="position: relative;"><video id="talonvid" width="100%" poster="static/video/Sport_Fishing.jpg" preload="auto" autoplay loop muted><source src="https://player.vimeo.com/external/186344355.sd.mp4?s=2ad5f7c8c8fb6de62789a6944ffc9f1ceee2bab3&profile_id=164&autoplay=1&loop=1"/></video><img src="static/video/btn-video-play.png" id="playvid" style="position:absolute;top:50%;left:50%; z-index:9999999999;"></div></div>';
  }
</script>




<?php }else{ ?>

<div class="b-gallery">

  <div class="b-gallery-container">
    <ul>
      <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('slideshow')->value->photos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['slide']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value){
 $_smarty_tpl->tpl_vars['slide']->index++;
 $_smarty_tpl->tpl_vars['slide']->first = $_smarty_tpl->tpl_vars['slide']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['slideshow']['first'] = $_smarty_tpl->tpl_vars['slide']->first;
?>

      <?php echo $_smarty_tpl->getVariable('slide')->value->decodeVersions();?>
 <li<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['slideshow']['first']){?> class="active"<?php }else{ ?> style="display: none"<?php }?>> <img src="<?php echo cpf_config('APP.PHOTOS.URLS.FRONTEND');?>
<?php echo $_smarty_tpl->getVariable('slide')->value->versions['fullscreen']['filename'];?>
" width="100%" alt="<?php echo (($tmp = @$_smarty_tpl->getVariable('slide')->value->title)===null||$tmp==='' ? $_smarty_tpl->getVariable('slide')->value->alt : $tmp);?>
" class="<?php echo $_smarty_tpl->getVariable('slide')->value->slideshow_position;?>
"/>
    </li>
    <?php }} ?>
  </ul>
</div>
<div class="l-gallery-absolute">
  <div class="l-center">

    <?php $_smarty_tpl->tpl_vars['positions'] = new Smarty_variable(explode('-',$_smarty_tpl->getVariable('slideshow')->value->photos[0]->slideshow_position), null, null);?>
    <div class="l-center-layer title<?php  $_smarty_tpl->tpl_vars['position'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('positions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['position']->key => $_smarty_tpl->tpl_vars['position']->value){
?> <?php echo $_smarty_tpl->tpl_vars['position']->value;?>
<?php }} ?> shadow" id="gallery-title">
      <div class="b-gallery-title"> <span><?php $_smarty_tpl->tpl_vars['puni'] = new Smarty_variable(explode('-',$_smarty_tpl->getVariable('slideshow')->value->photos[0]->title), null, null);?> <span class = "span-f"><?php echo $_smarty_tpl->getVariable('puni')->value[0];?>
</span> <span class = "span-s"><?php echo $_smarty_tpl->getVariable('puni')->value[1];?>
</span> <span class = "span-t"><?php echo $_smarty_tpl->getVariable('puni')->value[2];?>
</span> </span> </div>
    </div>
    <!-- /.title -->

    <div class="l-center-layer subtitle odd" style="display: none;" id="gallery-subtitle">
      <div class="b-gallery-title"> <span>Imagine...</span> </div>
    </div>
    <!-- /.title --> 

  </div>
  <!-- /.l-center --> 

</div>
<div class="l-center-layer menu">
  <div class="b-gallery-menu">
    <div class="i"> <span>
      <ul>
        <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('slideshow')->value->photos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['slide']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value){
 $_smarty_tpl->tpl_vars['slide']->index++;
 $_smarty_tpl->tpl_vars['slide']->first = $_smarty_tpl->tpl_vars['slide']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['slideshow']['first'] = $_smarty_tpl->tpl_vars['slide']->first;
?>
        <li class="photo"><a href="#"<?php if ($_smarty_tpl->getVariable('slide')->value->title){?> title="<?php echo $_smarty_tpl->getVariable('slide')->value->title;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('slide')->value->title;?>
</a></li>
        <?php }} ?>
      </ul>
    </span> </div>
  </div>
  <!-- /.b-gallery-menu --> 

</div>
<!-- /.l-gallery-absolute --> 

 </div>
  <!-- /.b-gallery -->
  <?php }?>

  <script type="text/javascript">

    // $(window).load(function(){

    //  $("video").setAttribute("id", "talonvid");

    // });

     // for mute video audio sound (Parvez)
     
     var vid = document.getElementById("talonvid");
     
     function enableMute() { 
      if (vid.muted === true) {
        vid.muted = false;
        //$('#video-masthead video').prop('muted',false);
        var x = document.getElementById('bm').innerHTML = '<i class="fa fa-volume-up" onclick="enableMute()"></i>';
      }
      else{
        vid.muted = true
        //$('#video-masthead video').prop('muted',true);
        var x = document.getElementById('bm').innerHTML = '<i class="fa fa-volume-off" onclick="enableMute()"></i>';
      }
      
     } 

 </script>

 <div class="b-subgallery"> <?php if ($_smarty_tpl->getVariable('slideshow')->value){?>

  <div class="b-content-image">
    <div class="h-image-bottom l-min-width">
      <div class="l-center h-image-bottom-wrapper">
        <div class="form-wraper">
          <div class="b-image-bottom-title h-image-bottom-i">Check Availability</div>
          <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_reservation'),$_smarty_tpl);?>
" method="get" class="order-form">
            <div class="avail-dib">
              <div class="b-image-bottom-datepick h-image-bottom-i">Arriving Between:</div>
              <div class="b-datepick h-image-bottom-i">
                <input type="text" id="between" name="start" value="<?php if (empty($_smarty_tpl->getVariable('start',null,true,false)->value)){?>05/01/2018<?php }else{ ?> <?php echo $_smarty_tpl->getVariable('start')->value;?>
 <?php }?>" />
              </div>
            </div>
            <div class="avail-dib">
              <div class="b-image-bottom-datepick h-image-bottom-i">And:</div>
              <div class="b-datepick h-image-bottom-i">
                <input type="text" id="and" name="end" value="<?php if (empty($_smarty_tpl->getVariable('end',null,true,false)->value)){?>09/30/2018<?php }else{ ?> <?php echo $_smarty_tpl->getVariable('end')->value;?>
 <?php }?>"/>
              </div>
            </div>
            <div class="avail-dib">
              <div class="b-image-bottom-datepick h-image-bottom-i">With:</div>
              <div class="b-fake-select">
                <div class="lineForm">
                  <select class="sel80" id="adults" name="adults" tabindex="2">
                       <!-- <option <?php if (!$_smarty_tpl->getVariable('adults')->value){?>selected="selected" <?php }?>value="">Adults</option> -->
                      <option <?php if (!$_smarty_tpl->getVariable('adults')->value||$_smarty_tpl->getVariable('adults')->value==2){?>selected="selected" <?php }?>value="2">2 adults</option>
                      
                      <!-- <option <?php if ($_smarty_tpl->getVariable('adults')->value==2){?>selected="selected" <?php }?>value="2">2 adults</option> -->

                      <!-- <option <?php if ($_smarty_tpl->getVariable('adults')->value==3){?>selected="selected" <?php }?>value="3">3 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==4){?>selected="selected" <?php }?>value="4">4 adults</option>
                     <!--  <option <?php if ($_smarty_tpl->getVariable('adults')->value==5){?>selected="selected" <?php }?>value="5">5 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==6){?>selected="selected" <?php }?>value="6">6 adults</option>
                     <!--  <option <?php if ($_smarty_tpl->getVariable('adults')->value==7){?>selected="selected" <?php }?>value="7">7 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==8){?>selected="selected" <?php }?>value="8">8 adults</option>
                    <!--   <option <?php if ($_smarty_tpl->getVariable('adults')->value==9){?>selected="selected" <?php }?>value="9">9 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==10){?>selected="selected" <?php }?>value="10">10 adults</option>
                     <!--  <option <?php if ($_smarty_tpl->getVariable('adults')->value==11){?>selected="selected" <?php }?>value="11">11 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==12){?>selected="selected" <?php }?>value="12">12 adults</option>
                      <!-- <option <?php if ($_smarty_tpl->getVariable('adults')->value==13){?>selected="selected" <?php }?>value="13">13 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==14){?>selected="selected" <?php }?>value="14">14 adults</option>
                      <!-- <option <?php if ($_smarty_tpl->getVariable('adults')->value==15){?>selected="selected" <?php }?>value="15">15 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==16){?>selected="selected" <?php }?>value="16">16 adults</option>
                      <!-- <option <?php if ($_smarty_tpl->getVariable('adults')->value==17){?>selected="selected" <?php }?>value="17">17 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==18){?>selected="selected" <?php }?>value="18">18 adults</option>
                     <!--  <option <?php if ($_smarty_tpl->getVariable('adults')->value==19){?>selected="selected" <?php }?>value="19">19 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==20){?>selected="selected" <?php }?>value="20">20 adults</option>
                     <!--  <option <?php if ($_smarty_tpl->getVariable('adults')->value==21){?>selected="selected" <?php }?>value="21">21 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==22){?>selected="selected" <?php }?>value="22">22 adults</option>
                     <!--  <option <?php if ($_smarty_tpl->getVariable('adults')->value==23){?>selected="selected" <?php }?>value="23">23 adults</option> -->
                      <option <?php if ($_smarty_tpl->getVariable('adults')->value==24){?>selected="selected" <?php }?>value="24">24 adults</option>
                    </select>
                </div>
              </div>
            </div>
            <div class="avail-dib">
              <div class="h-button-wrapper">
                <button type="submit" class="b-view-button">View</button>
              </div>
            </div>
          </form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <?php }?> </div>

  <?php }?>
  <?php if ($_smarty_tpl->getVariable('recipe')->value){?>
  <div class="b-gallery">
    <div class="b-gallery-container">
      <ul>
        <li class="active"> <img src="<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('recipe')->value->filename;?>
" width="100%" alt="<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
" /> </li>
      </ul>
    </div>
    <div class="b-bottom__gradient"> </div>
  </div>
  <!-- /.b-gallery -->

  <div class="b-subgallery"> </div>
  <?php }?>


  <?php if (!$_smarty_tpl->getVariable('slideshow')->value){?>

  <div class="b-top__gradient<?php if (!$_smarty_tpl->getVariable('slideshow')->value){?> no-slideshow <?php }?>"></div>
  <?php }?>


  <!--

            <div class="h-content-navigation">

                    <div class="l-center">

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>'frontend_menu','key'=>'main-menu','level'=>1,'em'=>true,'custom_layout'=>'controls/menu_custom/main_menu.tpl'),$_smarty_tpl);?>


</div>

</div>

--> 

</div>
<!-- /.l-subheader -->

<div class="h-content <?php if ($_smarty_tpl->getVariable('slideshow')->value){?>slideshow<?php }?>">
  <?php if ($_smarty_tpl->getVariable('cpf_controller')->value=='frontend_index'){?>
  <div class="h-content-text-header l-center"> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->get_control(array('name'=>'frontend_menu','key'=>'main-sections','em'=>true,'bg'=>true),$_smarty_tpl);?>
 </div>
  <!-- /.h-content-text-header --> 

  <?php }?> 
