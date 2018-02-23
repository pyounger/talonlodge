<?php
////////////////////////////////////////////////////////////////////////////
// db Masters' Links Directory 3.1.2, Copyright (c) 2003 db Masters Multimedia
// Links Directory comes with ABSOLUTELY NO WARRANTY
// Licensed under the AGPL
// See license.txt and readme.txt for details
////////////////////////////////////////////////////////////////////////////
	ob_start();include('session.php');
	//include('config.php');
	include('header.php');
?>
<form action="save_edit_delprofile.php?fieldcount=2&type=sub" method="post" id="form" >
<table border="0" width="100%"  cellspacing="2" cellpadding="0">
<tr>
	
<td style="height:320px">
	<form action="save_edit_delprofile.php?type=sub" method="post">
	<table border="0" width="100%"  cellspacing="2" cellpadding="0">
	
<tr>
	<td class="bodymd" ><h1 style="text-align:center">Welcome Admin!</h1></td><td>
	
	</td>
</tr>
<tr>
	<td class="bodymd"></td><td>
		
	</td>
</tr>

<tr><td></td><td></td></tr>
</table></form>
		</td>
</tr>
	</table>
</form>

<?php
	include('footer.php');
	ob_end_flush();
?>
