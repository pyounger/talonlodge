<?php
ob_start();
  session_start();
  include("../asset/constants.php");
$type=$_REQUEST['type'];
	   include("../asset/databasefunctions.php");

	 include("../asset/email_config.php");
	
	$databaseobj=new database();
	
/* Code to Save Phone List Person */
if($type=="savephonelp")
{
	$name = $_POST['name'];
    $mode = $_POST['mode'];
    $designation = $_POST['Designation'];
    $extension = $_POST['extension'];
    $id = $_POST['appid'];
    $listid = $_POST['list_id'];

	
	
	if($mode=="edit")
	{
		$select="update phone_list_person set person_name='".$name."', extension='".$extension."', designation='".$designation."', list_id='".$listid."' where id='".$id."'";          
		mysql_query($select);
	}else
	{
		$select="insert into phone_list_person (person_name, extension, designation, list_id)values('".$name."', '".$extension."', '".$designation."', '".$listid."')";
		mysql_query($select);
	}
	
	

	
	header("location:viewphonelp.php");
}	
else if($type=="savecity")
{
	$ctname=$_POST['name'];
	$ctwebpage=$_POST['webpage'];
	$mode=$_POST['mode'];
	$ctid=$_POST['id'];
	
	$target_path = "badgeimages/";
	$target_path = $target_path . basename( $_FILES['filename']['name']);
	$doc = $_FILES['filename']['name'];
	$ext = explode(".",$doc);
	$cnt = count($ext);
	
	if($doc=="")
	{
		if($mode=="edit")
		{
			$select="update cities set name='$ctname', webpage='$ctwebpage' where id='$ctid'";          
			mysql_query($select);
		}
		else
		{
			$select="insert into cities (name, webpage, created_at)values('$ctname','$ctwebpage', '$ctwebpage')";
			mysql_query($select);
		}
	}
	else
	{
			if ($cnt>0)
			{
					echo $y = $ext[$cnt-1];
			
					if ($y=="jpg"||$y=="jpeg"||$y=="png"||$y=="bmp"||$y=="gif"||$y=="JPG"||$y=="JPEG"||$y=="PNG"||$y=="BMP"||$y=="GIF")
					{
							if(move_uploaded_file($_FILES['filename']['tmp_name'], $target_path))
							{
									if($mode=="edit")
									{
										$select="update cities set name='$ctname', badge_image_path='$doc', webpage='$ctwebpage' where id='$ctid'";          
										mysql_query($select);
									}
									else
									{
										$select="insert into cities (name, badge_image_path, webpage, created_at)values('$ctname', '$doc', '$ctwebpage', '$ctwebpage')";
										mysql_query($select);
									}
							}
					}
			}
	}
	
	header("location:viewcity.php");
}
/* Code to Save files */
else if($type=="savefiles")
{

	$mode = $_POST['mode'];
	$id = $_REQUEST['bltid'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	
	$status = $_POST['status'];
	$created =  date("Y-m-d H:i:s");
	$target_path = "fileshare/";
	$target_path = $target_path . basename( $_FILES['filename']['name']);
	$doc = $_FILES['filename']['name'];
	$ext = explode(".",$doc);
	$cnt = count($ext);
	$userid=$_SESSION['user_id'];

	
	if($doc=="")
	{
			if($mode=="edit")
			{
				$select = "update fileshare set title = '".$title."',description = '".addslashes($description)."',status = '".$status."' where id='".$id."'";
				mysql_query($select);
			}
			else
			{
			$select = "insert into fileshare (title, description,status,created_at,user_id) values ('".$title."', '".addslashes($description)."', '".$status."', '".$created."', '".$userid."')";
	
			
				mysql_query($select);
			}
			
			header("location:viewfileshare.php");
	}
	else
	{
			if ($cnt>0)
			{
					$y = $ext[$cnt-1];
					//if ($y=="doc"||$y=="txt"||$y=="pdf")
					//{
						
							if(move_uploaded_file($_FILES['filename']['tmp_name'], $target_path))
							{
									if($mode=="edit")
									{
									
										$select = "update fileshare set title = '".$title."',description = '".addslashes($description)."',fileupload='".$doc."',status = '".$status."' where id='".$id."'";
										mysql_query($select);
									}
									else
									{
								
								$select = "insert into fileshare (title, fileupload, description,status,created_at,user_id) values ('".$title."', '".$doc."', '".addslashes($description)."', '".$status."', '".$created."', '".$userid."')";
							
										mysql_query($select) or die(mysql_error());
									}
									header("location:viewfileshare.php");
					//}
				}
			}
	}
}
/* Code to Save files */
else if($type=="saveemails")
{
	//echo BASEPATH,SECURITYCODE;
	//die;
	
	$txtemails = $_POST['txtemails'];
	$subject = $_REQUEST['subject'];
	$fileid = $_POST['fileid'];
	
	$description = $_POST['description'];
	$created =  date("Y-m-d H:i:s");
	$chkuser = $_POST['chkuser'];
	$chkuserstring=implode(',',$chkuser);
	$txtemailsarray=explode(',',$txtemails);
	$fileidbase=SECURITYCODE.$fileid;
	$fileidbase=base64_encode($fileidbase);
	
	//echo "<pre>"; print_r($txtemailsarray);
	//die;
	$linkdetail="<a href='".BASEPATH."fileshare.php?fid=$fileidbase'>Click here</a>";
	$descriptiondetail=str_replace('$$link$$',$linkdetail,$description);
	 	require("send-mail/loadsmtp.php");
	for($i=0;$i<count($txtemailsarray);$i++)
	{
		try{
			//mail($txtemailsarray[$i],$subject,$descriptiondetail) ;
		
			$ishtml=true;
		
			$from_name=FROMNAME;	
			
			$resipent_address=$txtemailsarray[$i];
			$htmlcontent=$descriptiondetail;
			send_mail();
			
			
			
			
			
			
		
		}catch(Exception $e){
			
			
		}
	}
	
	$select = "insert into fileemails (subject, description,fileid,emails,created_at,userids) values ('".$subject."', '".addslashes($description)."', '".$fileid."','".$txtemails."', '".$created."', '".$chkuserstring."')";
	
	//die;
	
	mysql_query($select);
	
	$fileid=base64_encode($fileid);
	
	header("location:viewfileemail.php?id='$fileid'");
	
}
/* Code to Save Document */
else if($type=="savedocument")
{
	
	$mode = $_POST['mode'];
	$id = $_REQUEST['bltid'];
	$title = $_POST['title'];
	$created = $_REQUEST['created'];
	$doctype = $_REQUEST['doctype'];
	$category_id = $_REQUEST['category_id'];
	
	$target_path = "docs/";
	$target_path = $target_path . basename( $_FILES['filename']['name']);
	$doc = $_FILES['filename']['name'];
	$ext = explode(".",$doc);
	$cnt = count($ext);
	
	if($doc=="")
	{
			if($mode=="edit")
			{
				$select = "update documents set title = '".$title."', type = '".$doctype."', category_id = '".$category_id."', created_at = '".$created."' where id='".$id."'";
				mysql_query($select);
			}
			else
			{
				$select = "insert into documents (title, type, category_id, attachments, created_at) values ('".$title."', '".$doctype."', '".$category_id."', '".$doc."', '".$created."')";
				mysql_query($select);
			}
			header("location:viewdocument.php");
	}
	else
	{
			if ($cnt>0)
			{
					$y = $ext[$cnt-1];
					if ($y=="doc"||$y=="txt"||$y=="pdf")
					{
							if(move_uploaded_file($_FILES['filename']['tmp_name'], $target_path))
							{
									if($mode=="edit")
									{
										$select = "update documents set title = '".$title."', type = '".$doctype."', category_id = '".$category_id."', 
										attachments = '".$doc."', created_at = '".$created."' where id='$id'";
										mysql_query($select);
									}
									else
									{
										$select = "insert into documents (title, type, category_id, attachments, created_at) values ('".$title."', '".$doctype."', '".$category_id."', '".$doc."', '".$created."')";
										mysql_query($select) or die(mysql_error());
									}
									header("location:viewdocument.php");
							}
					}else
					{
							header("location:add_editdocument.php?val=mis");
						
					}
			}
	}
}
/* Code to Save blogs */
else if($type=="saveblogs")
{
	
	$mode = $_POST['mode'];
	$userid=$_SESSION['user_id'];
	
	$id = $_REQUEST['bltid'];
	$title = $_POST['title'];
	$created = $_REQUEST['created'];
	$description = $_REQUEST['field4'];
	$category_id = $_REQUEST['category_id'];
	
	$target_path = "blog_images/";
	$target_path = $target_path . basename( $_FILES['filename']['name']);
	$doc = $_FILES['filename']['name'];
	$ext = explode(".",$doc);
	$cnt = count($ext);
	
	if($doc=="")
	{
			if($mode=="edit")
			{
				$select = "update blogs set title = '".$title."', description = '".$description."', category_id = '".$category_id."', created_at = '".$created."' where id='".$id."'";
				mysql_query($select);
			}
			else
			{
				$select = "insert into blogs (title, description, category_id, image_path, created_at,posted_by) values ('".$title."', '".$description."', '".$category_id."', '".$doc."', '".$created."','".$userid."')";
				mysql_query($select);
			}
			header("location:viewblogs.php");
	}
	else
	{
			if ($cnt>0)
			{
					
							if(move_uploaded_file($_FILES['filename']['tmp_name'], $target_path))
							{
									if($mode=="edit")
									{
										$select = "update blogs set title = '".$title."', description = '".$description."', category_id = '".$category_id."', image_path = '".$doc."', created_at = '".$created."' where id='$id'";
										
										mysql_query($select);
									}
									else
									{
										$select = "insert into blogs (title, description, category_id, image_path, created_at,posted_by) values ('".$title."', '".$description."', '".$category_id."', '".$doc."', '".$created."','".$userid."')";
									
										mysql_query($select) or die(mysql_error());
									}
									header("location:viewblogs.php");
							}
					
			}
	}
}
/* Code to Save events */
else if($type=="saveevents")
{
	
		$namep=$_POST['namep'];
                $title=$_POST['eventTitle'];
                $description=$_POST['eventDescription'];
                $eventStartDate=$_POST['eventStartDate'];
                $eventendDate=$_POST['eventendDate'];
        	$timestart1=$_POST['timepicker_showon1'];
		$timestart2=$_POST['timepicker_showon2'];
             	if(!empty($eventStartDate))
				{
					$changeformat=explode('-',$eventStartDate);
					$eventStartDate=$changeformat[2]."-".$changeformat[0]."-".$changeformat[1];
				}
				else{
				     $eventStartDate ="0000-00-00";
					
				}
				if(!empty($eventendDate))
				{
				$changeformat=explode('-',$eventendDate);
				$eventendDate=$changeformat[2]."-".$changeformat[0]."-".$changeformat[1]; 
				}
				else{
				     $eventendDate ="0000-00-00";
					
				}
                
                            
			$location=$_POST['location'];
			$frequency=$_POST['frequency'];
				if(!empty($_POST['chkevent']))
				{
					$chkevent=$_POST['chkevent'];
				}
				else{
					$chkevent=0;
				}
			$frequencyfield=implode(",",$frequencyfield);
				/////////////////////////////////15--nov/////////////////////
				 $occur=$_POST['occur'];
              
					if(!empty($_POST['eventoccurenceDate']))
					{
					 "i m in 1";
				 $recurencestart=$_POST['eventoccurenceDate'];
				 $changeformat=explode('-',$recurencestart);
				$startdate3=$changeformat[2]."-".$changeformat[0]."-".$changeformat[1];
					}
					else{
						 $startdate3="0000-00-00";
						
					}
				//echo $startdate3= date('Y-m-d',strtotime($recurencestart));exit;
				$stopafter= $_POST['recurence_stop'];
				$recurence=$_POST['recurence'];
				$every_recurence=$_POST['every_recurence'];
		$id = $_REQUEST['id'];
		 
		$task4=$_POST['task4'];
		
		
                $userId=$_SESSION['user_id'];
                
                if($userId=='')
                $userId='null';
		
	if($task4=="update")
	{
		 $insertQuery="UPDATE events set title='".$title."',description='".addslashes($description)."',event_date='".$eventStartDate."',location='".$location."',eventend_date='".$eventendDate."',fullname='".$namep."',allday='".$chkevent."',time_start='".$timestart1."',time_end='".$timestart2."',recuringdate='".$startdate3."',repeatrecuring='".$recurence."',stoprecuring='".$stopafter."',recuringperiods='".$every_recurence."' where id=$id";
				  //die;
	}
	else{
                 $insertQuery="INSERT into events(user_id,title,description,event_date,created_at,location,eventend_date,fullname,allday,time_start,time_end,recuringdate,repeatrecuring,stoprecuring,recuringperiods)
				  VALUES($userId,'".$title."','".addslashes($description)."','".$eventStartDate."',CURDATE(),'".$location."','".$eventendDate."','".$namep."','".$chkevent."','".$timestart1."','".$timestart2."','".$startdate3."','".$recurence."','".$stopafter."','".$every_recurence."')";
                
	}
                $resultSet=mysql_query($insertQuery)or die(mysql_error());
	
	header("location:viewevents.php");
}
/* Code to Save Crime Bulletin */
else if($type=="savebulletin")
{/*
	echo "<pre>POST data";
	print_r($_POST);
	echo "</pre>";
	
	echo "<pre>FILE data";
	print_r($_FILES);
	echo "</pre>";
	
	die("here");*/
	$title = $_POST['title']; //Y
    $mode = $_POST['mode'];
 //   $case_number = $_POST['case_number']; //Y
   // $description = $_POST['description']; //Y
    $userid = $_POST['user_id']; //Y
    $id = $_REQUEST['bltid'];
	$modifiedby_uid = $_REQUEST['modifiedby_uid'];
	$date = $_REQUEST['date']; //Y
	$created = $_REQUEST['created']; //Y
	
	//code to save use image.
	$uploaddir = "docs/";
		if($_FILES["file"]["error"]<=0){
				$tmp_name = $_FILES["image_path"]["tmp_name"];
				$name = $_FILES["image_path"]["name"];
				if($name!=''){
					$uploadfile=rand().strtotime().$name;
					$uploadfile = $uploaddir.basename($uploadfile);
					move_uploaded_file($tmp_name, $uploadfile); 
				}else{
				 $uploadfile=$_POST['upload_img_hidden'];
			}
		}else{
			$uploadfile=$_POST['upload_img_hidden'];
		}
		
	$pdffilename=basename($_FILES['filename']['name']);
	$target_path =$pdffilename;
	
	
	//image_path
	
	$doc = $_FILES['filename']['name'];
	$ext = explode(".",$doc);
	$cnt = count($ext);
	

	
	if($doc==""){
			if($mode=="edit"){
				$select = "update crime_bulletins set title = '$title', modifiedby_uid = $modifiedby_uid where id='$id'";
				mysql_query($select) or die(mysql_error());
			}
			else{
				 $select = "insert into crime_bulletins (title,user_id,created_at)values('$title','$userid','$date','$uploadfile','$case_number','$description','$created')";
				 mysql_query($select);
			}
			header("location:viewbulletin.php");
			
	}
	else{
		
			if ($cnt>0){
					$y = $ext[$cnt-1];
					if ($y=="doc"||$y=="txt"||$y=="pdf")
					{
					
							if(move_uploaded_file($_FILES['filename']['tmp_name'], $target_path)){
		
						
	$target_path = $pdffilename;
	$target_pathnew = time().".jpg";
	$pathnew=$target_pathnew;
	$input =$pdffilename;
	//$output = "/crimebulletinimages/".$target_pathnew;

	exec("convert $pdffilename $pathnew");
	
	
								
								
								
									if($mode=="edit"){
										$select = "update crime_bulletins set title = '$title', attachment_link = '$doc' , image_path = '$pathnew' where id='$id'";
										mysql_query($select) or die(mysql_error());
									}
									else{
										$select = "insert into crime_bulletins (title, user_id, attachment_link, created_at , image_path )values('$title','$userid','$doc','$created','$pathnew')";
										mysql_query($select) or die(mysql_error());
									}
									header("location:viewbulletin.php");
							}
					}
			}
	}
}
else if($type=="savecategory")
{ 
	$lname=$_POST['field1'];
	$status=$_POST['field2'];
	$catid=$_POST['catid'];
	 $task4=$_POST['mode'];

	if($task4=="edit")
	{
    	$select="update category set title='$lname',status='$status' where id='$catid'";          
		mysql_query($select);
	}else
	{
		$select="insert into category (title,status)values('$lname','$status')";
		
	  mysql_query($select);
	}
	header("location:viewcategory.php");
}
else if($type=="savenotes")
{
	
	
	
	 $textdate= $_POST['dateofentry'];
	 if($textdate=='')
	 {
		  $textdate= '0000-00-00';
	 }
	 else
	 {
	 $textdatearray=explode("-",$textdate);
	$changeformattextdate=$textdatearray[2]."-".$textdatearray[0]."-".$textdatearray[1];
		  
	 }
	
	$time=$_POST['timefield'];
	$txtid=$_POST['idfield'];
	$txtcomment= $_POST['comment'];
	$txtname=$_POST['enteredby'];
	$rid= $_POST['regid'];

	$id= $_POST['id'];
	
	
	
	
	
	

	$task4=$_POST['mode'];
	
	if($task4=="edit")
	{
    	$select="update notes set entered_by='$txtname',dateofentry='$changeformattextdate',timefield='$time',idcode='$txtid',comments='$txtcomment' where id='$id'";  
		mysql_query($select);
	}else
	{
		$select="INSERT into notes(entered_by,dateofentry,timefield,idcode,comments,regid)VALUES('$txtname','".$changeformattextdate."','".$time."','".$txtid."','".$txtcomment."','".$rid."')";
	
	  mysql_query($select);
	}
	header("location:viewnotes.php?id=$rid");
}
else if($type=="saveblogcategory")
{ 
	$lname=$_POST['field1'];
	$status=$_POST['field2'];
	$catid=$_POST['catid'];
	 $task4=$_POST['mode'];

	if($task4=="edit")
	{
    	$select="update category set title='$lname',status='$status' where id='$catid'";          
		mysql_query($select);
	}else
	{
		$select="insert into category (title,status,type)values('$lname','$status','1')";
		
	  mysql_query($select);
	}
	header("location:viewblogcategory.php");
}
else if($type=="saveapplication")
{ 
	$title=$_POST['title'];
	$status=$_POST['status'];
	$url=$_POST['url'];
	$task4=$_POST['mode'];
	$appid=$_POST['appid'];
	if($task4=="edit")
	{
		$datetoday=date('y-m-d');
		$select="update application_links set status='$status',title='$title',url='$url' ,updated_at='$datetoday' where id='$appid'";          
		mysql_query($select);
	}else
	{
		$datetoday=date('y-m-d');
		$select="insert into application_links (title,url,status,created_at,updated_at)values('$title','$url','$status','$datetoday','$datetoday')";
		
		mysql_query($select);
	}
	header("location:viewapplication.php");
}
/* Code to add Most Wanted */
else if($type=="savewanted")
{
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$race = $_POST['race'];
	$height= $_POST['height'];
	$weight = $_POST['weight'];
	$hair_color= $_POST['hair_color'];
	$eye_color = $_POST['eye_color'];
	$cdl = $_POST['cdl'];
	$address = $_POST['address'];
	$vehicle_state = $_POST['vehicle_state'];
	$vehicle_lic = $_POST['vehicle_lic'];
	$vehicle_year = $_POST['vehicle_year'];
	$vehicle_make = $_POST['vehicle_make'];
	$vehicle_model = $_POST['vehicle_model'];
	$vehicle_color = $_POST['vehicle_color'];
	$vehicle_type = $_POST['vehicle_type'];
	$probation_status = $_POST['probation_status'];
	$comments = $_POST['comments'];
	$associated_vehicle = $_POST['associated_vehicle'];
	$key_number = $_POST['key_number'];
	$issue_date_of_warrant = $_POST['issue_date_of_warrant'];
	$bail_amount = $_POST['bail_amount'];
	$warrant_file_number= $_POST['warrant_file_number'];
	$scars = $_POST['scars'];
	$charges = $_POST['charges'];
	$user_id = $_SESSION['user_id'];
	
	$task4 = $_POST['mode'];
	$id = $_REQUEST['registrant_id'];
	$datetoday=date('y-m-d');
	$comments=addslashes($comments);
	

	$target_path = "most_wanted/";
	$target_path = $target_path . basename( $_FILES['associated_photo']['name']);
	$doc = $_FILES['associated_photo']['name'];
	$ext = explode(".",$doc);
	$cnt = count($ext);
	
	
	if($doc=="")
	{
			if($task4=="edit")
			{ 
				$select = "update registrants set mostwanted=1,
											first_name='$first_name',
											middle_name='$middle_name',
											last_name='$last_name',
											dob='$dob',
											gender='$gender',
											race='$race',
											height='$height',	
											weight='$weight',
											hair_color='$hair_color',
											eye_color='$eye_color',
											cdl='$cdl',
											address='$address',
											vehicle_state='$vehicle_state',
											vehicle_lic='$vehicle_lic',
											vehicle_year='$vehicle_year',	
											vehicle_make='$vehicle_make',	
											vehicle_model='$vehicle_model',
											vehicle_color='$vehicle_color',
											vehicle_type='$vehicle_type',
											comments='$comments',
											probation_parole_status='$probation_status',
											associated_vehicle='$associated_vehicle' where registrants.id=$id";
				mysql_query($select);
				
				$select="update most_wanted  set key_number='$key_number',
												issue_date_of_warrant='$issue_date_of_warrant',
												bail_amount='$bail_amount',
												warrant_file_number='$warrant_file_number',scars='$scars',charges='$charges' where most_wanted.registrant_id=$id";
				mysql_query($select);

			}
			else
			{
				$select="insert into registrants (user_id,mostwanted,first_name,middle_name,last_name,dob,gender,race,height,	weight,hair_color,eye_color,cdl,address,vehicle_state,vehicle_lic,vehicle_year,	vehicle_make,	vehicle_model,vehicle_color,vehicle_type,comments,probation_parole_status,associated_vehicle,created_at)
										values('$user_id',1,'$first_name','$middle_name','$last_name','$dob','$gender','$race','$height','$weight','$hair_color','$eye_color','$cdl','$address','$vehicle_state','$vehicle_lic','$vehicle_year','$vehicle_make','$vehicle_model','$vehicle_color','$vehicle_type','$comments','$probation_status','$associated_vehicle','$datetoday')";
				mysql_query($select);
				
				$registrant_id=mysql_insert_id();
				$select="insert into most_wanted (user_id,key_number,issue_date_of_warrant,bail_amount,warrant_file_number,scars,charges,registrant_id)
										values('$user_id','$key_number','$issue_date_of_warrant','$bail_amount','$warrant_file_number','$scars','$charges',$registrant_id)";
				mysql_query($select);
			}
	}
	else
	{
	
			if ($cnt>0)
			{
					$y = $ext[$cnt-1];
					if ($y=="gif"||$y=="jpg"||$y=="jpeg"||$y=="png"||$y=="bmp"||$y=="GIF"||$y=="JPG"||$y=="JPEG"||$y=="PNG"||$y=="BMP")
					{
							if(move_uploaded_file($_FILES['associated_photo']['tmp_name'], $target_path))
							{
								
								
								
								
								
								
								
									if($task4=="edit")
									{ 
										$select = "update registrants set mostwanted=1,
																	first_name='$first_name',
																	middle_name='$middle_name',
																	last_name='$last_name',
																	dob='$dob',
																	gender='$gender',
																	race='$race',
																	height='$height',	
																	weight='$weight',
																	hair_color='$hair_color',
																	eye_color='$eye_color',
																	cdl='$cdl',
																	address='$address',
																	vehicle_state='$vehicle_state',
																	vehicle_lic='$vehicle_lic',
																	vehicle_year='$vehicle_year',	
																	vehicle_make='$vehicle_make',	
																	vehicle_model='$vehicle_model',
																	vehicle_color='$vehicle_color',
																	vehicle_type='$vehicle_type',
																	comments='$comments',
																	probation_parole_status='$probation_status',
																	associated_vehicle='$associated_vehicle',
																	image_path = '$doc'
																	where registrants.id=$id";
										mysql_query($select);
										
										$select="update most_wanted  set key_number='$key_number',
																		issue_date_of_warrant='$issue_date_of_warrant',
																		bail_amount='$bail_amount',
																		warrant_file_number='$warrant_file_number',scars='$scars',charges='$charges' where most_wanted.registrant_id=$id";
										mysql_query($select);

									}
									else
									{
										$select="insert into registrants (user_id,mostwanted,first_name,middle_name,last_name,dob,gender,race,height,	weight,hair_color,eye_color,cdl,address,vehicle_state,vehicle_lic,vehicle_year,	vehicle_make,	vehicle_model,vehicle_color,vehicle_type,comments,probation_parole_status,associated_vehicle,created_at,image_path)
																values('$user_id',1,'$first_name','$middle_name','$last_name','$dob','$gender','$race','$height','$weight','$hair_color','$eye_color','$cdl','$address','$vehicle_state','$vehicle_lic','$vehicle_year','$vehicle_make','$vehicle_model','$vehicle_color','$vehicle_type','$comments','$probation_status','$associated_vehicle','$datetoday','$doc')";
																
										mysql_query($select) or die(mysql_error());
										
										$registrant_id=mysql_insert_id();
										$select="insert into most_wanted (user_id,key_number,issue_date_of_warrant,bail_amount,warrant_file_number,scars,charges,registrant_id)
																values('$user_id','$key_number','$issue_date_of_warrant','$bail_amount','$warrant_file_number','$scars','$charges',$registrant_id)";
										mysql_query($select) or die(mysql_error());
									}
								
								
								
								
								
								
								
									
							}
					}
			}
		
	}
	
	header("location:viewwanted.php");
}
/* Code to add New Message */
else if($type=="savemessage")
{ 
	/*print_r($_POST);
	die("here");
	
	[field1] => tt 
	[task5] => 2011-10-17 
	[task6] => 2011-10-17 
	[field3] => general 
	[field4] => dse 
	[field2] => 1 
	[submit] => save
	die("here");*/
	$title = $_POST['field1'];
	$status = $_POST['field2'];
	$type = $_POST['field3'];
	$description = $_POST['field4'];
	$created = $_POST['field5'];
	$modified = $_POST['field6'];
	
	$task4 = $_POST['task4'];
	$id = $_REQUEST['id'];
	
	if($task4=="update")
	{
    	$select="update messages set title='$title', status='$status', type='$type', description='$description', modified_at='$modified' where id='$id'";          
		mysql_query($select);
	}else
	{
		//$select="insert into category (cat_name,status)values('$lname','$status')";
		$select="insert into messages (title,type,description,created_at,modified_at,status)values('$title','$type','$description','$created','$modified','$status')";
		mysql_query($select);
	}
	header("location:viewmessages.php");
}
else if($type=="saveusers")
{ 
	$username=$_POST['uname'];
	$password=$_POST['password'];
	$user_type=$_POST['user_type'];
	$task4=$_POST['mode'];
	$userid=$_POST['user_id'];
	if($task4=="edit")
	{
		$datetoday=date('y-m-d');
		if($password!='')
		{
		$select="update users set username='$username',password='$password',type='$user_type' ,updated_at='$datetoday' where id='$userid'";
		}
		else
		{
			$select="update users set username='$username',type='$user_type' ,updated_at='$datetoday' where id='$userid'";
			
		}
		mysql_query($select);
	}else
	{
		$datetoday=date('y-m-d');
		$select="insert into users (username,password,type,created_at,updated_at)values('$username','$password','$user_type','$datetoday','$datetoday')";
		
		 mysql_query($select);
	}
	header("location:viewusers.php");
}
else if($type=="changepwd")
{ 
	$oldpwd=$_POST['oldpwd'];
	$newpwd=$_POST['newpwd'];
	$confirmpwd=$_POST['confirmpwd'];
	if(isset($_SESSION['username']))
	{
		$username=$_SESSION['username'];
		
	}
	
	 if($newpwd==''||$confirmpwd==''||$oldpwd=='')
	{
		header("location:changepassword.php?type=mis");
	}
	else if($newpwd==$confirmpwd)
	{
		$select="update users set password='$newpwd' where username='$username' and password='$oldpwd' ";
	
		mysql_query($select);
		
		header("location:changepassword.php?type=change");
	}
	else
	{
		header("location:changepassword.php?type=mis");
		
	}
}
else if($type=="sub")
{	
	$uname=$_POST['field1'];
	$pass=$_POST['field2'];
  
	$select="select * from users where username='$uname' and password='$pass'";

	$resource=mysql_query($select);
	$resourcedetail=mysql_fetch_assoc($resource);
	
	$count=mysql_num_rows($resource);
	
	
	if($count>=1)
	{
		$_SESSION['username']=$uname;
		$_SESSION['user_type']=$resourcedetail['type'];
		$_SESSION['user_id']=$resourcedetail['id'];
   		header("location:add_edit_registrants.php");
		exit;
	}
	else
	{
   	header("location:../adminpanel.php?type=mis");
	exit;
	}     
}
/* Code to add New Message */
else if($type=="savemessage")
{ 
	print_r($_POST);
	/*
	[field1] => tt 
	[task5] => 2011-10-17 
	[task6] => 2011-10-17 
	[field3] => general 
	[field4] => dse 
	[field2] => 1 
	[submit] => save
	die("here");*/
	$title = $_POST['field1'];
	$status = $_POST['field2'];
	$type = $_POST['field3'];
	$description = $_POST['field4'];
	$created = $_POST['field5'];
	$modified = $_POST['field6'];
	
	 //$task4=$_POST['task4'];
	
	if($task4=="update")
	{
    	//$select="update category set cat_name='$lname',status='$status' where cat_id='$catid'";          
		mysql_query($select);
	}else
	{
		//$select="insert into category (cat_name,status)values('$lname','$status')";
		$select="insert into messages (title,type,description,created_at,modified_at,status)values('$title','$type','$description','$created','$modified','$status')";
		mysql_query($select);
	}
	header("location:viewmessages.php");
}

ob_flush();
?>
