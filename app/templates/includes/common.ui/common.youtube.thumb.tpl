{*
	YouTube video thumb.

	@param string $youtube_id YouTube video ID
*}
{function name='cpf_youtube_thumb'}
	<img src="http://img.youtube.com/vi/{$youtube_id}/{$type|default:'default'}.jpg" alt="{if $alt}{$alt}{else}{t}YouTube video thumb{/t}{/if}"/>
{/function}