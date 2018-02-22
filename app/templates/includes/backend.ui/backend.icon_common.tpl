{*
	Big icon for 'common actions'
	
	@param 	string 	$id 		Id attribute of <a>
	@param 	string 	$url 		URL where icon is linked to
	@param 	string 	$icon 		Name of image file without extension
	@param 	string 	$title 		Title of icon
	@param 	string 	$confirm 	Confirmation text
	@param 	string 	$target 	Target attribute for element <a></a>
	@param 	string 	$rel 		rel="" attribute for the element <a></a>	
*}
{function name='cpf_icon_common'}
	<a {if $id}id="{$id}"{/if} class="btn" href="{$url}" title="{$title}" {if $confirm}onclick="return confirm('{$confirm}')"{/if}{if $target} target="{$target}"{/if}{if $rel} rel="{$rel}"{/if}>{$title}</a>
{/function}