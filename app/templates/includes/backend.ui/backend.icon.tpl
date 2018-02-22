{*
	Small icon
	
	@param	string 	$icon 		Name of icon image file without extension
	@param	string 	$url 		Link to icon, if not specified image is rendered
	@param	string 	$class 		Additional CSS class(es) for icon
	@param	string 	$confirm 	Confirmation string
	@param	string 	$style 		Additional CSS style="" properties
	@param	string 	$target 	Target attribute for element <a></a>
	@param	string 	$rel 		rel="" attribute for the element <a></a>
*}
{function name='cpf_icon'}
	{if $url}
		<a class="icon16 {$class}" href="{$url}" title="{$title}" {if $confirm}onclick="return confirm('{$confirm}')"{/if} style="background-image: url(static/images/backend/icons/icons16/{$icon}.png);{$style}"{if $target} target="{$target}"{/if}{if $rel} rel="{$rel}"{/if}></a>
	{else}
		<span class="icon16 {$class}" title="{$title}" style="background-image: url(static/images/backend/icons/icons16/{$icon}.png)"></span>
	{/if}
{/function}