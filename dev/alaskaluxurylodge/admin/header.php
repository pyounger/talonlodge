<?php
//session_start();
error_reporting(0);
include('headerleftout.php');
function showclass($pagename)
{
	$array=split("/", $_SERVER['SCRIPT_NAME']);
	if($array[count($array)-1]==$pagename)
	{
		return "class='linkselect'";
	}
	else
	{
		return "";
	}
}
?>
<html>
<head>
<title>City Intranet</title>
<link href="stylesheets/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "specific_textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
	     editor_deselector : "mceNoEditor",
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
	username : "Some User",
	staffid : "991234"
        }
});


</script>
<script src="js/grades_assignment.js" type="text/javascript"></script>
    <!--<script src="js/prototype.js"></script>-->
    <!--<script src="js/calendarview.js"></script>-->
   <script src="js/calendarDateInput.js"></script>
    <script>
      function setupCalendars() {
        // Embedded Calendar
        Calendar.setup(
          {
            dateField: 'embeddedDateField', 
            parentElement: 'embeddedCalendar'
          }
        )

        // Popup Calendar
        Calendar.setup(
          {
            dateField: 'field9',
            triggerElement: 'popupDateField'
          }
        )
      }

      Event.observe(window, 'load', function() { setupCalendars() })
    </script>

<link rel="stylesheet" href="stylesheets/style_default.css" type="text/css" title="style sheet"/>
</head>

<?php include "paging.php"; ?>
<body>
	<div class="main_navigation">
		<div class="nav_l">
			<div class="nav_r">
				<div class="nav_m">
					<ul>
						<?php if ($_SESSION['user_type']=='admin') { ?>
                    
                
                          <li ><a href="category.php" <?php //echo showclass('viewblogcategory.php'); ?>><span><img src="images/category1.png" /></span> Slides Category</a></li>
                          
                     <li><a href="viewfileshare.php"><span><img src="images/files-icon.png" /></span>  Category Details</a></li>
		     <li ><a href="seo.php" <?php //echo showclass('viewblogcategory.php'); ?>><span><img src="images/category1.png" /></span> SEO</a></li>
		     <li ><a href="changepassword.php" <?php //echo showclass('viewblogcategory.php'); ?>><span><img src="images/changepass.png" /></span> Change<br /> Password</a></li>
           
							
                   		
					
						
						
						
					
						<?php }else
						{
							
							header("location:logout.php");
							
						}
						
						
						?>
					
							
						
						
					
						
						<li class="last"><a href="logout.php" ><span><img src="images/log-icon.png" /></span>Logout</a></li>
					</ul>	
				</div>
			</div>
		</div>
	</div>
	<div class="main_content">
<div class="divviewvipesh"> 