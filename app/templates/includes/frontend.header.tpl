
<div class="b-header__top mobile-header-top">
  <div class="b-header__contacts">
    <div class="b-header__tollfree"> Toll Free: 800-536-1864 </div>
  </div>
</div>
<div class="l-subheader"> 
  <div class="l-new-header">
    <div class="l-new-header__inner l-center">
      <div class="b-logo"> <a href="{$cpf_base_url}"><img src="static/images/frontend/new_layout/header/talonlodge.png" width="155" height="68" alt=""/></a> </div>
      <div class="b-header__r">
        <div class="b-header__top desktop-top-header">
          <div class="b-header__social">
            <form id="searchbox_006300182637952144805:-sx4hsnrkuk" action="http://www.google.com/cse" class="b-search-form">
              <input type="hidden" name="cx" value="006300182637952144805:-sx4hsnrkuk" />
              <input type="hidden" name="cof" value="FORID:0" />
              <input type="hidden" name="ie" value="utf-8" />
              <input type="hidden" name="oe" value="utf-8" />
              <input name="siteurl" type="hidden" value="{$cpf_url_current}" />
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
              <div class="b-header__links"> {control name='frontend_menu' key='header-menu' em=true} 
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
            <div class="b-header__menu"> {control name='frontend_menu' key='main-menu' level=1 em=true custom_layout='controls/menu_custom/main_menu.tpl'} </div>
        </div>
    </div>
</div>

{if $slideshow}



{if $smarty.server.REQUEST_URI=='/'} 


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



{else if $smarty.server.REQUEST_URI=='/freshwater-fishing/'} 


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




{else if $smarty.server.REQUEST_URI=='/cuisine-events/'} 


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



{else if $smarty.server.REQUEST_URI=='/alaska-adventure/'} 


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



{else if $smarty.server.REQUEST_URI=='/winemaker-series/'} 


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



{else if $smarty.server.REQUEST_URI=='/fishing/'} 


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



{else if $smarty.server.REQUEST_URI=='/sport-fishing/'} 


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

{else if $smarty.server.REQUEST_URI=='/spa/'} 


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




{else}

<div class="b-gallery">

  <div class="b-gallery-container">
    <ul>
      {foreach from=$slideshow->photos item='slide' name='slideshow'}

      {$slide->decodeVersions()} <li{if $smarty.foreach.slideshow.first} class="active"{else} style="display: none"{/if}> <img src="{cpf_config('APP.PHOTOS.URLS.FRONTEND')}{$slide->versions.fullscreen.filename}" width="100%" alt="{$slide->title|default:$slide->alt}" class="{$slide->slideshow_position}"/>
    </li>
    {/foreach}
  </ul>
</div>
<div class="l-gallery-absolute">
  <div class="l-center">

    {$positions = explode('-', $slideshow->photos.0->slideshow_position)}
    <div class="l-center-layer title{foreach $positions as $position} {$position}{/foreach} shadow" id="gallery-title">
      <div class="b-gallery-title"> <span>{$puni = explode('-', $slideshow->photos.0->title)} <span class = "span-f">{$puni[0]}</span> <span class = "span-s">{$puni[1]}</span> <span class = "span-t">{$puni[2]}</span> </span> </div>
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
        {foreach from=$slideshow->photos item='slide' name='slideshow'}
        <li class="photo"><a href="#"{if $slide->title} title="{$slide->title}{/if}">{$slide->title}</a></li>
        {/foreach}
      </ul>
    </span> </div>
  </div>
  <!-- /.b-gallery-menu --> 

</div>
<!-- /.l-gallery-absolute --> 

{*
  <div class="b-bottom__gradient"></div>
  *} </div>
  <!-- /.b-gallery -->
  {/if}

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

 <div class="b-subgallery"> {if $slideshow}

  <div class="b-content-image">
    <div class="h-image-bottom l-min-width">
      <div class="l-center h-image-bottom-wrapper">
        <div class="form-wraper">
          <div class="b-image-bottom-title h-image-bottom-i">Check Availability</div>
          <form action="{link rule='frontend_reservation'}" method="get" class="order-form">
            <div class="avail-dib">
              <div class="b-image-bottom-datepick h-image-bottom-i">Arriving Between:</div>
              <div class="b-datepick h-image-bottom-i">
                <input type="text" id="between" name="start" value="{if empty($start)}05/01/2018{else} {$start} {/if}" />
              </div>
            </div>
            <div class="avail-dib">
              <div class="b-image-bottom-datepick h-image-bottom-i">And:</div>
              <div class="b-datepick h-image-bottom-i">
                <input type="text" id="and" name="end" value="{if empty($end)}09/30/2018{else} {$end} {/if}"/>
              </div>
            </div>
            <div class="avail-dib">
              <div class="b-image-bottom-datepick h-image-bottom-i">With:</div>
              <div class="b-fake-select">
                <div class="lineForm">
                  <select class="sel80" id="adults" name="adults" tabindex="2">
                       <!-- <option {if !$adults}selected="selected" {/if}value="">Adults</option> -->
                      <option {if !$adults || $adults == 2}selected="selected" {/if}value="2">2 adults</option>
                      
                      <!-- <option {if $adults == 2}selected="selected" {/if}value="2">2 adults</option> -->

                      <!-- <option {if $adults == 3}selected="selected" {/if}value="3">3 adults</option> -->
                      <option {if $adults == 4}selected="selected" {/if}value="4">4 adults</option>
                     <!--  <option {if $adults == 5}selected="selected" {/if}value="5">5 adults</option> -->
                      <option {if $adults == 6}selected="selected" {/if}value="6">6 adults</option>
                     <!--  <option {if $adults == 7}selected="selected" {/if}value="7">7 adults</option> -->
                      <option {if $adults == 8}selected="selected" {/if}value="8">8 adults</option>
                    <!--   <option {if $adults == 9}selected="selected" {/if}value="9">9 adults</option> -->
                      <option {if $adults == 10}selected="selected" {/if}value="10">10 adults</option>
                     <!--  <option {if $adults == 11}selected="selected" {/if}value="11">11 adults</option> -->
                      <option {if $adults == 12}selected="selected" {/if}value="12">12 adults</option>
                      <!-- <option {if $adults == 13}selected="selected" {/if}value="13">13 adults</option> -->
                      <option {if $adults == 14}selected="selected" {/if}value="14">14 adults</option>
                      <!-- <option {if $adults == 15}selected="selected" {/if}value="15">15 adults</option> -->
                      <option {if $adults == 16}selected="selected" {/if}value="16">16 adults</option>
                      <!-- <option {if $adults == 17}selected="selected" {/if}value="17">17 adults</option> -->
                      <option {if $adults == 18}selected="selected" {/if}value="18">18 adults</option>
                     <!--  <option {if $adults == 19}selected="selected" {/if}value="19">19 adults</option> -->
                      <option {if $adults == 20}selected="selected" {/if}value="20">20 adults</option>
                     <!--  <option {if $adults == 21}selected="selected" {/if}value="21">21 adults</option> -->
                      <option {if $adults == 22}selected="selected" {/if}value="22">22 adults</option>
                     <!--  <option {if $adults == 23}selected="selected" {/if}value="23">23 adults</option> -->
                      <option {if $adults == 24}selected="selected" {/if}value="24">24 adults</option>
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
  {/if} </div>

  {/if}
  {if $recipe}
  <div class="b-gallery">
    <div class="b-gallery-container">
      <ul>
        <li class="active"> <img src="{cpf_config('APP.RECIPES.URL')}{$recipe->filename}" width="100%" alt="{$recipe->title}" /> </li>
      </ul>
    </div>
    <div class="b-bottom__gradient"> </div>
  </div>
  <!-- /.b-gallery -->

  <div class="b-subgallery"> </div>
  {/if}


  {if !$slideshow}

  <div class="b-top__gradient{if !$slideshow} no-slideshow {/if}"></div>
  {/if}


  <!--

            <div class="h-content-navigation">

                    <div class="l-center">

    {control name='frontend_menu' key='main-menu' level=1 em=true custom_layout='controls/menu_custom/main_menu.tpl'}

</div>

</div>

--> 

</div>
<!-- /.l-subheader -->

<div class="h-content {if $slideshow}slideshow{/if}">
  {if $cpf_controller == 'frontend_index'}
  <div class="h-content-text-header l-center"> {control name='frontend_menu' key='main-sections' em=true bg=true} </div>
  <!-- /.h-content-text-header --> 

  {/if} 
