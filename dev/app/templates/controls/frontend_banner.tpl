
{assign var="banner" value=$control_frontend_banner_banner}


{if $banner}
{foreach $banner as $ban}
{if $ban->url}<a href="{link rule="frontend_banners" id=$ban->id}" target="_self">{/if}

{if $ban->extension == 'swf'}

<div id="banner-container"></div>

{else}

<img src="{cpf_config('APP.BANNERS.URL')}{$ban->filename}" />

{/if}

{if $ban->url}</a></br>{/if}

{if $ban->extension == 'swf'}

<script type="text/javascript">

	$().ready(function(){

		

		var flashvars = {

			clickTAG: '{link rule="frontend_banners" id=$ban->id abs=true}'

		}



		var params = {

			wmode: 'opaque'

		}



		var attributes = {

			id: "banner",

			name: "banner"

		}



		$('#banner-container').flash({

			swf: '{cpf_config('APP.BANNERS.URL')}{$ban->filename}',

			width: 300,

			height: 250,

			allowFullScreen: true,

			wmode: 'transparent',

			flashvars: flashvars,

			params: params,

			attributes: attributes

		});

	});

</script>

{/if}
{/foreach}
{/if}
