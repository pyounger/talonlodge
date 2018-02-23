<?php /* Smarty version Smarty-3.0.8, created on 2017-02-08 14:09:07
         compiled from "/home2/talonlod/public_html/dev/app/templates/layouts/pages/frontend/reservation1s.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1274155531589ba513cd1974-20556618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50809d5ea7f61866b76f48d016283478782cbfcc' => 
    array (
      0 => '/home2/talonlod/public_html/dev/app/templates/layouts/pages/frontend/reservation1s.tpl',
      1 => 1486595340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1274155531589ba513cd1974-20556618',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
// $(document).ready(function() {

//     $('#cpf-page-form').submit(function() {
//         var fname = $("#first_name").val();
//         var lname = $("#last_name").val();
//         var email = $("#email").val();
//         var captcha = $("#captcha").val();
//         var cemail = $('#confirm-email').val();



//         if (fname == '' || lname == ''|| email == '' || captcha == '')
//         {
//            $('#head').text("* All fields are mandatory *"); // This Segment Displays The Validation Rule For All Fields
//             return false;
//         }else if(cemail != email){
//         	           $('#head').text("* Email does not Matched *"); 
//             return false;
//         }

//         else if(captcha !=""){
//         	$('#hid').attr('disabled',true);
//             var dataString = 'captcha=' + captcha;
//             var valid = false;
//             $.ajax({
//                 type: "POST",
//                 url: "check-chaptch.php",
//                 data: dataString,
//                 success: function(html) {
//                     if(html =="success"){

	

//                    		var action = $('#cpf-page-form').attr('action');
//                    		var alldata = $('#cpf-page-form').serialize();
//                    		$.ajax({
// 			                type: "POST",
// 			                url: action,
// 			                data: alldata,
// 			                success: function(res) {
// 			                	 $('#hid').attr('disabled',true);
// 			                		window.location.href="http://www.lahainashores.com/contacts/?success=1"; 

// 			                }
// 			            });

//                     }else{
//                     	$('#hid').attr('disabled',false);
//                     	 $('#head').text("* Bad captcha code entered! *");


//                     }

//                 }
//             });




//         }
//         return false;

//     });
// });



</script>

<div class="h-contacts">
<?php echo print_r($_smarty_tpl->getVariable('packages')->value);?>

	<?php echo $_smarty_tpl->getVariable('page')->value->content['heading'];?>


	<?php if ($_smarty_tpl->getVariable('success')->value){?>
	
	<div class="l-center">
		<div class="h-email-offers-success">
			<?php echo $_smarty_tpl->getVariable('page')->value->content['success'];?>

		</div>
	</div>
	<?php }else{ ?>
	<div class="b-brochure-form-wrap">
		<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_reservation1s'),$_smarty_tpl);?>
" method="post" id="cpf-page-form">
			
			<div class="b-brochure-form-left">
				<div class="b-brochure-input-r">
					<p style="color: red" id="head"><?php echo $_smarty_tpl->getVariable('itserror')->value;?>
</p>
					<div class="b-brochure-input-l">
						<lable id="fname">*First Name</lable> 
						<input type="text" id="first_name" name="first_name" value="<?php echo $_smarty_tpl->getVariable('ofname')->value;?>
" />
					</div>
				</div>
				<div class="b-brochure-input-r">
					<div class="b-brochure-input-l">
						<lable>*Last Name</lable> 
						<input type="text" id="last_name" name="last_name" value="<?php echo $_smarty_tpl->getVariable('olname')->value;?>
" />
					</div>
				</div>
				<div class="b-brochure-input-r">
					<div class="b-brochure-input-l">
						<lable>*Email Address</lable> 
						<input type="text" id="email" name="email" value="<?php echo $_smarty_tpl->getVariable('oemail')->value;?>
" />
					</div>
				</div>
				<div class="b-brochure-input-r">
					<div class="b-brochure-input-l">
						<lable>*Validate Email Address</lable>
						<input type="text" id="confirm-email" name="confirm_email" value="<?php echo $_smarty_tpl->getVariable('confirm_email')->value;?>
"/>
					</div>
				</div>
			<div>
				<lable>*How can we assist you?<lable>
					<p></p>
					<p style="font-size:13px">If you require immediate assistance, please call the appropriate
						telephone number on the right.</p>
						<textarea id="comments" name="comments" max-length="150" value="<?php echo $_smarty_tpl->getVariable('fax')->value;?>
"><?php echo $_smarty_tpl->getVariable('comments')->value;?>
</textarea>
					</div>
					<div class="b-brochure-input-r">

						<div class="b-brochure-input-l">
							<div class="g-recaptcha" data-sitekey="6LeJ0hUTAAAAAB7Fm460v9959Fal_B-TUZfA0qmu"></div>
							<!-- 	<img class="captcha-img" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_captcha','rand'=>time(),'lang'=>''),$_smarty_tpl);?>
" width="95" height="42" alt="" /> -->

						</div>
						
					</div>

					
					<br />
					<br />
					
					
					<input type="hidden" name="Account" id="Account" value="14409" />
					<input type="hidden" name="Password" id="Password" value="HPTYS0JQCSE4U88FDITZ" />
					<input type="hidden" name="ResAccount" id="ResAccount" value="" />
					<input type="hidden" name="keyword" id="hidNavisKeyword" value="8554759318" />
					
					<button id="hid" class="b-page__big-button b-contacts__button" type="submit"><span>Send</span></button>
					
					
					<div class="b-errors error"></div>
					
				</div><!-- /.b-brochure-form-left -->
			
			
			
			
			<div class="b-brochure-form-right">
				
				<h1>Other ways to get in touch</h1>
				<div class="one-half">
					<strong>Resort Reservation</strong>                                       
					Toll Free from US & Canada:                                  
					<span style="display:block;">1 <script language="javascript">ShowNavisNCPhoneNumber();</script></span>
					<strong>Front Desk</strong>
					1 (808) 661-4835
				</div>
				
				<div class="one-half">
					<strong>Resort Address</strong>
					475 Front Street<br>
					Lahaina, Maui, Hawaii, USA 96761
					<strong>Guest Fax</strong>
					1 (808) 661-4696
					<strong>Connect</strong>
					<div class="social-icons">
						<ul>
							<li><a href="https://www.facebook.com/lahainashores" target="_blank" class="fb"></a></li>
							<li><a href="https://twitter.com/LahainaShores"  target="_blank" class="tw"></a></li>
							<li><a href="http://www.youtube.com/channel/UCSyHapKNLzBrgc70BeP-MvQ"  target="_blank" class="yt"></a></li>
							
						</div>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="b-brochure-form-right" style="margin-left:0px;margin-top: 50px;">
					<h1>INSIDE THE RESORT</h1>
					<div class="one-half">
						<strong>Concierge</strong>
					</div>
					<div class="one-half">
						1 (808) 661-8116
					</div>
				</div>
			</div>
		</form>
		<script language="javascript" type="text/javascript">NavisSetHiddenKeywordFieldD("hidNavisKeyword","8554759318");</script>
	</div>
	<?php }?>	
</div>