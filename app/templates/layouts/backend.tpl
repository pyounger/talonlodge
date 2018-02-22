{*
	Backend layout
	
	@param 	array 	$smarty.capture.cpf_breadcrumb 		Array of breadcrumb data (to use in block 'content_init')
	@param	string	$smarty.capture.cpf_block_title		Temp variable to duplicate title
*}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="{$cpf_lang}">
<head>
	<title>
		{capture name='cpf_block_title'}{block name='title'}{/block}{/capture} 
		{$smarty.capture.cpf_block_title} &mdash; {t($cpf_site_title)}
	</title>

	<base href="{$cpf_root_url}" />        
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="generator" content="{$cpf_version} / {$cpf_app_start_version}" />
		
	<link type="text/css" href="static/css/common/bootstrap/bootstrap.css" rel="stylesheet" media="screen" />
	<link type="text/css" href="asset-css-backend.v{$cpf_assets_version}.css" rel="stylesheet" media="screen" />
    {block name='extra_css'}{/block}

	<script type="text/javascript" src="asset-js-backend-{$cpf_lang}.v{$cpf_assets_version}.js"></script>

	<link rel="shortcut icon" type="image/x-icon" href="{$cpf_root_url}static/images/backend/favicon.ico" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

{* UI functions *}
{include file='includes/backend.ui/backend.form_submit.tpl'}
{function name='cpf_submit'}{/function} 

{include file='includes/backend.ui/backend.icon_common.tpl'}
{function name='cpf_icon_common'}{/function} 

{include file='includes/backend.ui/backend.form_button.tpl'}
{function name='cpf_button'}{/function} 

{include file='includes/backend.ui/backend.form_input.tpl'}
{function name='cpf_input'}{/function} 
{function name='cpf_input_helper'}{/function}

{include file='includes/backend.ui/backend.validator.tpl'}
{function name='cpf_validator'}{/function} 

{include file='includes/backend.ui/backend.th.tpl'}
{function name='cpf_th'}{/function} 

{include file='includes/backend.ui/backend.icon.tpl'}
{function name='cpf_icon'}{/function} 

{include file='includes/backend.ui/backend.breadcrumb.tpl'}
{function name='cpf_breadcrumb'}{/function}

{include file='includes/backend.ui/backend.pager.tpl'}
{function name='cpf_pager'}{/function}

<!--
	Smarty template functions for inserting YouTube video & thumbs
-->

{include file='includes/common.ui/common.youtube.video.tpl'}
{function name='cpf_youtube_video'}{/function}
{include file='includes/common.ui/common.youtube.video.iframe.tpl'}
{function name='cpf_youtube_video_iframe'}{/function}

{include file='includes/common.ui/common.youtube.thumb.tpl'}
{function name='cpf_youtube_thumb'}{/function}

<body class="cpf-controller-{$cpf_controller} cpf-action-{$cpf_action} cpf-{$cpf_controller}-{$cpf_action}">

    <div class="cpf-wrap">

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="{if $cpf_controller == 'backend_index' || ($cpf_controller == 'backend_profile' && $cpf_action =='login')}{link rule='frontend_index' abs='true'}{else}{link controller='backend_index'}{/if}">{$cpf_site_title}</a>
                    <div class="nav-collapse">
                        {include file='includes/backend.menu.tpl'}
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    
        <div class="container">
            <div class="row">
                {block name='content_init'}{/block}
    
                {block name="breadcrumb"}
                    {if $cpf_breadcrumb}
                        {cpf_breadcrumb data=array_merge([[t('Dashboard'), cpf_link(['controller' => 'backend_index'])]], $cpf_breadcrumb)}
                    {/if}
                {/block}

                {block name='content_filter'}{/block}
                {block name='content_top_top'}{/block}
                {block name='content_top'}{/block}
                {block name='content_top_bottom'}{/block}
    
                {block name='content'}{/block}
    
                {block name='content_bottom_top'}{/block}
                {block name='content_bottom'}{/block}
                {block name='content_bottom_bottom'}{/block}
    
                {if !$cpf_rights->is_guest()}
                <footer class="footer">
                    <p style="float: right; color: gray;">Built with Twitter's Bootstrap toolkit and Icons from Glyphicons</p>
                    &copy;&nbsp;{$cpf_release_year|copyright}&nbsp;<a href="http://www.crisp-studio.cz" title="{t}backend.common.crisp_studio{/t}">{t}backend.common.crisp_studio{/t}</a>
                </footer>
                {/if}
            </div><!-- /.row -->
        </div> <!-- /.container -->
    
        <script type="text/javascript">
        $(document).ready(function(){
            {block name='js_init'}{/block}
        });
        </script>

    </div>
<noscript>
    <div class="modal-backdrop" style="width: 100%; height: 100%;">
        <div class="modal">
            <div class="modal-header"><h3>{t}backend.common.noscript_header{/t}</h3></div>
            <div class="modal-body">{t}backend.common.noscript_text{/t}</div>
        </div>
    </div>
</noscript>
</body>
</html>