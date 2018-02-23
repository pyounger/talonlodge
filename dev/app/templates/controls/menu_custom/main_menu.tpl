{* 

	Custom layout for the dropdown menu 

*}

	{$iteration = 0}

	{$counter = $iteration}

	

	{$temp_filename = ''}

	{$temp_text = ''}



	{if $elements|@count > 1}



		{foreach from=$elements item='node' name='menu'}

			

			{if $smarty.foreach.menu.first}
    <div class="h-content-navigation-left">
  <div class="h-content-navigation-right">
        <div class="h-content-navigation-center">
      <div class="mobile-menu"><i class="fa fa-bars"></i> Menu</div>
      <ul class="mob-menu-small">
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/about/">ABOUT US</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/our-story/">Our History</a></li>
                <li><a href="http://www.talonlodge.com/location/">Location</a></li>
                <li><a href="http://www.talonlodge.com/people/">People</a></li>
              </ul>
        </li>
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/difference/">DIFFERENCE</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/talon-service/">Talon Service</a></li>
                <li><a href="http://www.talonlodge.com/alaska-adventure/">Alaska Adventure</a></li>
                <li><a href="http://www.talonlodge.com/lodge-accommodations/">Lodge & Accommodation</a></li>
              </ul>
        </li>
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/fishing/">ALASKA FISHING</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/sport-fishing/">Sport Fishing</a></li>
                <li><a href="http://www.talonlodge.com/freshwater-fishing/">Fresh Water Fishing</a></li>
                <li><a href="http://www.talonlodge.com/fishing-calendar/">Fishing Calendar</a></li>
                <li><a href="http://www.talonlodge.com/guides-and-gear/">Guides and Gear</a></li>
              </ul>
        </li>
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/cuisine-events/">CUISINE & EVENTS</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/chef-series/">Chef Series</a></li>
                <li><a href="http://www.talonlodge.com/winemaker-series/">Winemaker Series</a></li>
                <li><a href="http://www.talonlodge.com/recipe-finder/">Recipes</a></li>
              </ul>
        </li>
            <li class="has-mob-sub"><a href="http://www.talonlodge.com/spa/">SPA</a><a class="toggle-mob-sub" href="#"><i class="fa fa-caret-down"></i></a>
          <ul class="mob-sub">
                <li><a href="http://www.talonlodge.com/alaskas-only-open-air-massage-pavilion/">Alaska's Only Open Air Massage Pavilion</a></li>
                <li><a href="http://www.talonlodge.com/treatment-menu/">Treatment Menu</a></li>
              </ul>
        </li>
            <li><a href="http://www.talonlodge.com/brochure/">BROCHURE REQUEST</a></li>
            <li><a href="http://www.talonlodge.com/gallery/">PHOTO GALLERY</a></li>
            <li><a href="http://www.talonlodge.com/rates/">Rates</a></li>
            <li><a href="http://www.talonlodge.com/faq/">Faq</a></li>
            <li><a href="http://www.talonlodge.com/contacts/">Contac Us</a></li>
          </ul>
      <ul class="main-menu-big">
            {/if}
            
            
            
            {$item = $node->data}
            
            
            
            {if $item->level == 1}
            
            
            
            {$iteration = $iteration+1}
            <li class="b-menu-{$iteration}{if $smarty.foreach.menu.iteration == 2} first{elseif $smarty.foreach.menu.last} last{/if}"> <a href="{if $item->type == 'page'}{if $item->slug}{link rule='frontend_page' slug=$item->slug}{/if}{else}{$item->url}{/if}"{if $item->target == '_blank'} target="_blank"{/if}{if $bg && $item->filename}style="background-image: url('{cpf_config('APP.NAVIGATION.URL')}{$item->filename}')"{/if} id="b-menu-{$iteration}" rel="b-submenu-{$iteration}">
              
              {if $control_frontend_menu_em == 1}<em>{$item->title}</em>{else}{$item->title}{/if} </a> </li>
            {$counter = $iteration}
            
            {capture name='submenu_name'}submenu_{$iteration}{/capture}
            
            
            
            {$temp_filename = $item->filename}
            
            {$temp_text = $item->attributes_array['text']}
            
            
            
            {elseif $item->level == 2}
            
            
            
            {capture name='submenu_name'}submenu_{$iteration}{/capture}
            
            {capture append=$smarty.capture.submenu_name}
            <li {if $smarty.foreach.menu.last} class="last"{/if}> <a rel="{$item->filename}" href="{if $item->type == 'page'}{if $item->slug}{link rule='frontend_page' slug=$item->slug}{/if}{else}{$item->url}{/if}"{if $item->attributes} {$item->attributes|replace:'&quot;':'"'}{/if}{if $item->target == '_blank'} target="_blank"{/if}{if $bg && $item->filename}style="background-image: url('{cpf_config('APP.NAVIGATION.URL')}{$item->filename}')"{/if}>
              
              {$item->title} </a> </li>
            {/capture}
            {/if}
            
            
            
            {if $smarty.foreach.menu.last}
          </ul>
    </div>
      </div>
</div>
{/if}

													

		{/foreach}

		

		{* submenu *}

		

		{if $counter > 0}

			{section loop=$counter+1 start=0 step=1 name=sub}

				{$iteration = $smarty.section.sub.index}

				{capture name='submenu_name'}submenu_{$iteration}{/capture}

				

				{$temp = ${$smarty.capture.submenu_name}}

				

				{if $temp|@count > 0}				

					{capture name='file_name'}filename_{$iteration}{/capture}

					{$filename = ${$smarty.capture.file_name}}



					{capture name='text'}text_{$iteration}{/capture}

					{$text = ${$smarty.capture.text}}
                <div class="b-slidedown b-submenu-{$iteration}" style="display: none;">
  <div class="b-nipple"></div>
  <div class="b-slidedown-inner">
                    <div class="b-slidedown-inner-l">
      <div class="b-slidedown-inner-r">
                        <div class="b-about-us-inner"> {if $filename} <a href="#" class="b-slidedown-submenu-image"><img src="{cpf_config('APP.NAVIGATION.URL')}{$filename}" width="193" height="118" alt=""><span class="overlay"></span></a>
          <input type="hidden" class="image-cache" value="{$filename}" />
          {/if} <ul{if !$filename} class="wide"{/if}> {foreach $temp as $t}{$t}{/foreach}
          </ul>
        </div>
                       
                      </div>
    </div>
                  </div>
  <div class="b-slidedown-bottom-l">
                    <div class="b-slidedown-bottom-r">
      <div class="b-slidedown-bottom-c"></div>
    </div>
                  </div>
</div>
{/if}



			{/section}

		{/if}



	{/if} 
<script type="text/javascript">

        $(document).ready(function(){

            var prefix = '{cpf_config('APP.NAVIGATION.URL')}';

            $('.b-slidedown-inner ul li a').bind('mouseover', function(){

                var rel = $(this).attr('rel');

                if (rel.length > 0)

                    $(this).closest('.b-slidedown').find('.b-slidedown-submenu-image img').attr('src', prefix + rel);

            });

            $('.b-slidedown-inner ul li a').bind('mouseout', function(){

                var rel = $(this).closest('.b-slidedown').find('.image-cache').val();

                if (rel.length > 0)

                    $(this).closest('.b-slidedown').find('.b-slidedown-submenu-image img').attr('src', prefix + rel);

            });

            

            $('.mobile-menu').click(function(){

                $(this).next('ul').slideToggle(300);

            });

            $('.toggle-mob-sub').click(function(){

                $(this).parents('.has-mob-sub').children('ul.mob-sub').slideToggle(300);

            });

        });

    </script>