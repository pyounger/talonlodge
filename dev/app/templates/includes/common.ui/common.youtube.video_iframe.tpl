{*
	YouTube video.

	@param string $youtube_id YouTube video ID
*}
{function name='cpf_youtube_video_iframe'}<iframe width="{$width|default:200}" height="{$height|default:150}" frameborder="0" allowfullscreen="true" src="http://www.youtube.com/embed/{$youtube_id|trim}?rel=0&showinfo=0{if $wmode}&wmode={$wmode}{/if}"></iframe>{/function}