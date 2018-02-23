{$menu = $control_frontend_menu_menu}
{$elements = $control_frontend_menu_elements}
{$level = $control_frontend_menu_level}
{$em = $control_frontend_menu_em}
{$bg = $control_frontend_menu_bg}

{if $control_frontend_menu_custom_layout}
	{include file=$control_frontend_menu_custom_layout}
{else}
	{if $elements|@count > 1}
		<ul>
			{foreach from=$elements item='node' name='menu'}
				{$item = $node->data}
				{if $item->level > 0 && (!$level || ($level && $item->level == $level))}
					<li{if $smarty.foreach.menu.iteration == 2} class="first"{elseif $smarty.foreach.menu.last} class="last"{/if}>
						<a href="{if $item->type == 'page'}{if $item->slug}{link rule='frontend_page' slug=$item->slug}{/if}{else}{$item->url}{/if}"{if $item->attributes} {$item->attributes|replace:'&quot;':'"'}{/if}{if $item->target == '_blank'} target="_blank"{/if}{if $bg && $item->filename}style="background-image: url('{cpf_config('APP.NAVIGATION.URL')}{$item->filename}')"{/if}>
							{if $control_frontend_menu_em == 1}<em>{$item->title}</em>{else}{$item->title}{/if}
						</a>
					</li>
				{/if}
			{/foreach}
		</ul>
	{/if}
{/if}