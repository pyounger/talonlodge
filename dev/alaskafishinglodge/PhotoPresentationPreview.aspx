<%@ Page Language="VB" AutoEventWireup="false" CodeFile="PhotoPresentationPreview.aspx.vb" Inherits="CR.Admin_PhotoPresentationPreview" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<title>Welcome to Talon Lodge</title>
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" language="javascript"></script>

    <link href="Admin/Includes/console.css" rel="stylesheet" type="text/css" />
    <link href="Admin/Includes/coreCSS.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>
<body style=" margin:0px; padding:0px;" bgcolor="#000000">
    <form id="form1" runat="server">
    <script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '100%',
			'height', '100%',
			'src', 'startflash',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'startflash',
			'bgcolor', '#000000',
			'name', 'startflash',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', 'startflash',
			'salign', 'lt'
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="100%" height="100%" id="startflash" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="startflash.swf" /><param name="quality" value="high" /><param name="salign" value="lt" /><param name="bgcolor" value="#000000" />	<embed src="startflash.swf" quality="high" salign="lt" bgcolor="#000000" width="100%" height="100%" name="startflash" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>
<table cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top" align="center">
<asp:Button ID="BtnEdit"  runat="server" Text="Edit" CssClass="Button" />&nbsp;&nbsp;<asp:Button ID="Btnclose" runat="server"  Text="Publish" CssClass="Button" />
</td>
</tr>
</table>
 </form>
</body>
<script>
    var strFlag = '<%= strflag%>'
       if (strFlag != "") {
          window.self.close();
        window.opener.location.reload();        
    }
   </script>
</html>
