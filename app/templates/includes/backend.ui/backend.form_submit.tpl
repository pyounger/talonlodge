{*
	Submit button

	@param 	string 	$id 	Id of <button />
	@param 	string 	$title 	Title of button
	@param 	string 	$value 	Value of submit
	@param 	string 	$class 	Class of button: positive | regular | negative. Class 'positive' by default.
	@param 	string 	$icon 	Icon name of the button. Default no icon.
*}
{function name='cpf_submit'}
    <button id="{$id|default:'submit'}" name="{$id|default:'submit'}" class="btn {if $class}{$class}{else}btn-primary{/if}" type="submit">{if $icon}<i class="icon-{$icon} icon-white"></i> {/if}{$title}</button>
{/function}
