<?php
ob_start();
//include('config.php');
include('session.php');
include('header.php');
//session_start();
 $myFile = "../frontpaging.txt";
if(isset($_POST['submit']))
{
	 
	 $stringData=$_POST['pageset'];	 
		 
	 $fh = fopen($myFile, 'w') or die("can't open file");
	 
	 fwrite($fh, $stringData);
	 
	 fclose($fh);
	 
}

$fh = fopen($myFile,'r');
$theData = fread($fh, 5);

fclose($fh);




?>
<script type="text/javascript">
	function cancelapplication(url)
	{
		window.location.href=url;
	}
	$(document).ready(function(){
		$('#formcat').validate();
	});
</script>
<table border="0" width="100%"  cellspacing="2" cellpadding="0">
	
	<h1 class="heading_class">Front Panel  Paging</h1>
	<tr>
		<td style=\"align:left\">
			<div class="button">
				<a href="frontpaging.php" style=" color:#fff; text-decoration:none;">Front Panel</a>
			   </div>
			<div class="button divmargin" >
				
				<a href="pagingset.php" style=" color:#fff; text-decoration:none;">Admin Panel</a>
				
			</div>
			
		
			
		</td>
	</tr>
	
<tr><td style="text-align:center"><form action="" method="post" id="formcat" name="formcat" enctype="multipart/form-data">
<table id="tbladdinstitute" name="tbladdinstitute"  border="0" width="60%"  cellspacing="2" cellpadding="0">	

<tr>
		<td class="bodymd">Paging:</td>
		<td style="text-align:left">
		  <select name="pageset" id="pageset" >
			   
			   <?php for($i=5;$i<101;$i=$i+5){ ?>
			   <option value="<?php echo $i; ?>" <?php if($theData==$i){ echo "selected";} ?> > <?php echo $i; ?></option>
			   
			   <?php } ?>
			   
		  
		  </select>
		  
		</td>
</tr>
<tr><td style="height:12px"></td></tr>
<tr>
		<td class="bodymd"></td>
		<td style="text-align:left;float:left">
	
		<input type="submit" class="button" name="submit" value="Save"/>
		  
		</td>
</tr>


<tr><td class="bodymd"></td><td>
<div id="errormsg" name="errormsg" style="color:red;font-size:10px"></div></td>
</tr>
</table>
</form>
</td></tr></table>
<?php
	include('footer.php');
	ob_end_flush();
?>
