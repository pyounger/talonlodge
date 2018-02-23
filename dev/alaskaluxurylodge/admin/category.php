<?php
ob_start();
//include('config.php');
include('session.php');
include('header.php');
//session_start();
include("../asset/databaseclass.php");
$task=$_REQUEST['task'];
$id=$_REQUEST['id'];

if($task=="del")
{
	$select="DELETE from category WHERE id='$id'";
	$resource=mysql_query($select);
}

//$catid='';
//$catid=$_REQUEST['id'];
//$selectcat="select * from category ";
//$resourcecat=mysql_query($selectcat);

?>
<script type="text/javascript">



function filterbycat(id)
{
	window.location ="category.php?id="+id;
}




function confirm_delete(url,id)
{
	
	if (confirm("Are you sure you want to delete the record?")==true)
	{
		var checkurl=url+id;
		alert(checkurl);
		location.href=checkurl;
	}
 	else
	{
         return false;
  	}
      return false;
}



</script>
<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2196019-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<table border="0" width="100%"  cellspacing="2" cellpadding="0">
<!--<tr>
	<td>
		<h1 class="heading_class">Filter by Category</h1>
		
	</td>
	<td>
	<select id="id" name="id" onchange="filterbycat(this.value)">
		<option value="all">All</option>	
<?php
	//while($datagetscat = mysql_fetch_array($resourcecat))
	//{
?>
	 <option <?php// if($catid==$datagetscat['id']){echo "selected";} ?> value="<?php //echo $datagetscat['id']; ?>"><?php //echo $datagetscat['cat_name']; ?></option>
<?php    
	//}
?>	</select>
	</td>
</tr>-->

<tr><td>
<h1 class="heading_class">Category</h1>

<div id="divviewinstitute" name="divviewinstitute" style="border:0;width:100%" >
<table id="tblviewinstitute" name="tblviewinstitute" border="0" width="100%"  cellspacing="0" cellpadding="0" cols="2">
<tr><td colspan="2" style="">


<!--<div align="right"><a href="add_editbulletin.php" >Add Crime Bulletin</a></div>


<a href="javascript:void(0);" onclick="fieldblankcat()"></a>--></td><td width="30%" style=\"align:left\">

</div>

</td></tr>


<?php
if(isset($_SESSION['user_id']))
{
	$userid=$_SESSION['user_id'];

}

	$select="select * from category order by id desc";

/*if($catid!='')
{
	$_REQUEST['page']=0;
	$catid=$_REQUEST['id'];
	if($catid=='all')
	{
		$select=$select;
		
	}
	else
	{
			$select=$select." where id=$catid";	
			
	}
	*/



$resource=mysql_query($select);
$counttotal = mysql_num_rows($resource);
if($counttotal>=1)
{
?>

<tr>
    <td class="tab"><h2>Category Name</h2></td>
    <td class="tab"><h2>Url</h2></td>
    <td class="tab"><h2>Action</h2></td>
    
  </tr>

<?php


//	code for paging
	$pg = $_REQUEST['page'];
		
if($pg == "" || $pg == 1)
	{ $pg = 0;}
else
	{ $pg = $pg*$numrecords - $numrecords;}

$select1 = $select." LIMIT ".$pg.",".$numrecords;
$resource=mysql_query($select1);

while($res=mysql_fetch_array($resource))
{
?>
<tr>
   <td class="tab"> <?php echo $res['cat_name']; ?></td>
    <td class="tab"> <?php echo $res['url']; ?></td>
    <td class="tab"> <a href="edit_cat.php?id=<?php echo $res['id']; ?>"><img src="images/1331556371_edit.png"></a>
    
    <!--<a href="javascript:void(0);" onclick="confirm_delete('del_cat.php?id=','<?php //echo $res['id']; ?>')"><img src="images/1331556391_trash_16x16.gif" class="del" /></a>-->
    
    </td>
 </h2>
  </tr>
<?php
}


?>
		<!--code for paging-->
			
	<tr>
		<td colspan="3" align="center">
			<?php
				//This is the actual usage of function, It prints the paging links
				doPages($numrecords, extractfilename($_SERVER['REQUEST_URI']), '', $counttotal);
			?>
		</td>
	</tr>
			
	<!--	code for paging-->




	</table></div></td></tr></table></form>
<?php
	include('footer.php');
	ob_end_flush();
}
?>
