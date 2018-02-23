<?php /* Smarty version Smarty-3.0.8, created on 2016-10-05 06:49:25
         compiled from "/home2/talonlod/public_html/app/templates/includes/common.ui/common.youtube.video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187064763457f512f5df8322-44043688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '482322f78bba8e520086891302e180d9fc4eb75c' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/includes/common.ui/common.youtube.video.tpl',
      1 => 1475595838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187064763457f512f5df8322-44043688',
  'function' => 
  array (
    'cpf_youtube_video' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (!function_exists('smarty_template_function_cpf_youtube_video')) {
    function smarty_template_function_cpf_youtube_video($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['cpf_youtube_video']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

<div id="videoDiv"></div>
<script type="text/javascript">
	var videoID = "<?php echo trim($_smarty_tpl->getVariable('youtube_id')->value);?>
";
	var params = { allowScriptAccess: "always", wmode: 'opaque' };
	var atts = { id: "ytPlayer" };
	if (videoID != '***')
	{
		swfobject.embedSWF("http://www.youtube.com/v/" + videoID + "?version=3&enablejsapi=1&playerapiid=player1", "videoDiv", "<?php echo (($tmp = @$_smarty_tpl->getVariable('width')->value)===null||$tmp==='' ? 200 : $tmp);?>
", "<?php echo (($tmp = @$_smarty_tpl->getVariable('height')->value)===null||$tmp==='' ? 150 : $tmp);?>
", "9", null, null, params, atts);
	}
	
	<?php if (!'dont_track_playback'){?>
		var player = null;
		function onYouTubePlayerReady(player_id) {
		  player = document.getElementById('ytPlayer');
		  player.addEventListener('onStateChange', 'playerStateChanged');
		};
		function playerStateChanged(state) {
		  if (state == 1) {
			$.ajax({
				type:		'POST',
				url:		'<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>"frontend_points_update",'type'=>"talkshow"),$_smarty_tpl);?>
',
				data:		[],
				async: 		true,
				cache: 		false,
				dataType:	'json',
				success: function(data){},
				error: function(){}
			});
		  }
		};
	<?php }?>
</script><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
