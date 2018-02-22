{*
	Shows messages from App_Local_Navigation_Messenger_Popup
*}
{if $cpf_popup_messages}
	/* jGrowl */
	$.jGrowl.defaults.closerTemplate = '<div>{t}close all{/t}</div>';

	{foreach $cpf_popup_messages as $message}
		$.jGrowl('{$message.text}', {
			theme: '{$message.type}'
		});
	{/foreach}
{/if}
