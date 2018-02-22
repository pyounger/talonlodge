{*
	YouTube video.

	@param string $youtube_id YouTube video ID
*}
{function name='cpf_youtube_video'}

<div id="videoDiv"></div>
<script type="text/javascript">
	var videoID = "{$youtube_id|trim}";
	var params = { allowScriptAccess: "always", wmode: 'opaque' };
	var atts = { id: "ytPlayer" };
	if (videoID != '***')
	{
		swfobject.embedSWF("http://www.youtube.com/v/" + videoID + "?version=3&enablejsapi=1&playerapiid=player1", "videoDiv", "{$width|default:200}", "{$height|default:150}", "9", null, null, params, atts);
	}
	
	{if !dont_track_playback}
		var player = null;
		function onYouTubePlayerReady(player_id) {
		  player = document.getElementById('ytPlayer');
		  player.addEventListener('onStateChange', 'playerStateChanged');
		};
		function playerStateChanged(state) {
		  if (state == 1) {
			$.ajax({
				type:		'POST',
				url:		'{link rule="frontend_points_update" type="talkshow"}',
				data:		[],
				async: 		true,
				cache: 		false,
				dataType:	'json',
				success: function(data){},
				error: function(){}
			});
		  }
		};
	{/if}
</script>

{/function}