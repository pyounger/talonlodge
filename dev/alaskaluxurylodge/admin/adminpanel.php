<?php

  session_start();
 //echo $_SESSION['user_id']."hello";die;

 if(isset($_SESSION['user_id']))
 {
	// ob_start();
	  header("location:index.php");
	 exit;
	
 }


include "header.php" ;
include("asset/databaseclass.php");
 //$crimianl_id=$_SESSION['criminal_id'];



?>
<script type="text/javascript">
	 function changeregistranttype(val)
	 {
		  
		  window.location="registrants.php?regtype="+val;
		  
	 }
	 
</script>

	 <div class="main_content">
		  <div class="main_admin">
                	<h1>You must have proper rights to access this<br />
feature.Log into the Intranet Admin CMS to<br /> complete your task</h1>
					<!--Admin Div Start-->
                    	<div class="admin_main">
                        		<div class="admin_top">
                                	<div class="admin_bottom">
                                    	<div class="admin_mid">
					<?php if($_REQUEST['type']=='mis')
                                              {
	                             echo "<span class='error_msg'>Please Enter Valid username/password</span>";
                                               }
	?>				    
                                        	<div class="top_white"><h1>Log In to <i>intranet Admin</i></h1></div>
                                            <div class="close_icon">&nbsp;</div>
                                           
					    <form action="save_edit_delprofile.php?type=sub" method="post" id="form">
							

				  <div class="input_main">
                                            	<ul>
                                                	<li><label>User Name</label></li>
                                                    <li><span><input type="text"  name="field1" /></span></li>
                                                    <li><label>Password</label></li>
                                                    <li><span><input type="password" name="field2"  /></span></li>
                                                    <li>
                                                    <div class="div_btn">
                                                    	<ul>
							       <li>                     <input type="submit" class="btn" name="submit" value="OK"/></li>
                                                            <li><input type="reset" name='resetbut' value="CLEAR" /></li>
                                                            <li><input  type="reset" name='resetbutexit' value="EXIT"/></li>
                                                            <li><input  type="hidden" name='resetbutexit' value="EXIT"/></li>
                                                        </ul>
                                                    </div>
                                                    </li>
                                                </ul>
                                            </div>
					    </form>
					    
					    
					    
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <!--Admin Div close-->
                </div>





	 </div>       
            
<?php include "footer.php" ; ?>
