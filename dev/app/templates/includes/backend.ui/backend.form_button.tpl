{*
	Link button with URL
	
	@param 	string 	$id 		Id of <a>
	@param 	string 	$url 		URL of link
	@param 	string 	$onclick 	On-click event
	@param 	string 	$title 		Title of button
	@param 	string 	$class 		Class of button: positive | regular | negative. Class 'regular' by default.
	@param 	string 	$icon 		Icon name of the button. Default no icon
*}
{function name='cpf_button'}
	<a {if $id}id="{$id}"{/if} class="btn {if $class}{$class}{else}negative{/if}" href="{$url}" {if $onclick}onclick="{$onclick}"{/if}{if $target} target={$target}{/if}>{if $icon}<i class="icon-{$icon}"></i> {/if}{$title}</a>
{/function}