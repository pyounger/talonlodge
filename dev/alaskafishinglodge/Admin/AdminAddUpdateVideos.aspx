<%@ Page Language="VB" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="false" ValidateRequest="false" CodeFile="AdminAddUpdateVideos.aspx.vb" Inherits="CR.Admin_Addupdatevideos" title="Add Update videos" %>
<%@ Register Assembly="FredCK.FCKeditorV2" Namespace="FredCK.FCKeditorV2" TagPrefix="FCKeditorV2" %>
<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">

    <script type ="text/javascript" >
        function CheckValidation() {
            
            if (CheckForDropdownListStatus('aspnetForm', 'Property', 'ctl00_ContentPlaceHolder1_ddproperty', '0') == false) return false;
          if (CheckForDropdownListStatus('aspnetForm', 'Category', 'ctl00_ContentPlaceHolder1_ddCategory', '0') == false) return false;
         if (CheckForNull('aspnetForm', 'Video Name', 'ctl00_ContentPlaceHolder1_txtVideoTitle') == false) return false;
         
         var header = document.getElementById('ctl00_ContentPlaceHolder1_lblheader');
         if (header.innerHTML == 'Add Video')
          {
             var thumb = document.getElementById('ctl00_ContentPlaceHolder1_FiluplodVideoimage').value;
             if (thumb == "") {
                 alert("Please enter value in Video Image.");
                 return false;
             }
             if (thumb != "") {
                 var extensions = new Array("jpg", "jpeg", "gif", "png", "bmp");
                 var image_file = thumb;
                 var chkExt = false;
                 var image_length = thumb.length;
                 var pos = image_file.lastIndexOf('.') + 1;
                 var ext = image_file.substring(pos, image_length);
                 var final_ext = ext.toLowerCase();
                 for (i = 0; i < extensions.length; i++) {
                     if (extensions[i] == final_ext)
                     { chkExt = true; }
                 }
                 if (chkExt == false) {
                     alert("You must upload an image file with one of the following extensions: " + extensions.join(', ') + ".");
                     return false;
                 }
             }
             if (document.getElementById("ctl00_ContentPlaceHolder1_ChkGeneral").checked == true) {
                 var video = document.getElementById('ctl00_ContentPlaceHolder1_txtFileName').value;
                 if (video == "")
                  {
                     alert("Please enter value in Video file.");
                     return false; 
                 }
                 if (video !="")
                  {
                      var chkExt1 = false;
                      var strExtn = video.substr(video.lastIndexOf(".") + 1);
                      var extenson = new Array("3g2", "3gp", "asf", "asx", "avi", "flv", "mov", "mp4", "mpg", "rm", "swf", "vob", "wmv");
                      for (i = 0; i < extenson.length; i++) {
                          if (extenson[i] == strExtn) {
                              chkExt1 = true;
                          }
                      }
                      if (chkExt1 == false) {
                          alert("You must upload an video with one of the following extensions: " + extenson.join(', ') + ".");
                          return false;
                      }
                 }
             }
             else {
               
             }
         }
         if (header.innerHTML == 'Edit Video')
          {
             var chk = document.getElementById('ctl00_ContentPlaceHolder1_ChkRemov');
             if (chk.checked == true) 
             {

                 var thumb = document.getElementById('ctl00_ContentPlaceHolder1_FiluplodVideoimage').value;
                 if (thumb == "")
                  {
                     alert("Please enter value in Video Image.");
                     return false;
                  }
                  if (thumb != "") 
                  {
                     var extensions = new Array("jpg", "jpeg", "gif", "png", "bmp");
                     var image_file = thumb;
                     var image_length = thumb.length;
                     var pos = image_file.lastIndexOf('.') + 1;
                     var ext = image_file.substring(pos, image_length);
                     var final_ext = ext.toLowerCase();
                     for (i = 0; i < extensions.length; i++)
                      {
                         if (extensions[i] == final_ext) {
                             return true;
                         }
                      }
                     alert("You must upload an image file with one of the following extensions: " + extensions.join(', ') + ".");
                     return false;
                 }
             }
             var chk2 = document.getElementById('ctl00_ContentPlaceHolder1_chkremovevideo');
             if (chk2.checked == true)
             {
                 var video = document.getElementById('ctl00_ContentPlaceHolder1_txtFileName').value;
                 if (video == "") {
                     alert("Please enter value in Video File");
                     return false;
                 }
                 if (video != "")
                  {
                     var chkExt1 = false;
                     var strExtn = video.substr(video.lastIndexOf(".") + 1);
                     var extenson = new Array("3g2", "3gp", "asf", "asx", "avi", "flv", "mov", "mp4", "mpg", "rm", "swf", "vob", "wmv");
                     for (i = 0; i < extenson.length; i++) {
                         if (extenson[i] == strExtn) {
                             chkExt1 = true;
                         }
                     }
                     if (chkExt1 == false) 
                     {
                       alert("You must upload an video with one of the following extensions: " + extenson.join(', ') + ".");
                         return false;
                     }
                     }
                 }
             }
             
             
            
         
     }
   
</script>
<asp:ScriptManager runat="server" ></asp:ScriptManager>

<table width="100%" cellspacing="0" cellpadding="0" ><tr><td>
                     <table cellpadding="2" cellspacing="0" border="0" width="80%" style ="text-align :center" class="TableBorder" align="center">
							<tr><td colspan="2" class="RowHeader" align="center">
                                <asp:Label ID="lblheader" runat="server" Text="Add Video"></asp:Label></td></tr>
							<tr>
								<td colspan="2" width="100%" align="center">
									<table cellspacing ="2" cellpadding ="0" border="0" align="center" width="100%">
									<tr>
											<td  align="center" nowrap colspan="2"><asp:Label ID="lblmessage" runat=server CssClass="Message" style="width:300px"></asp:Label></td>
										</tr>
											<tr>
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                            Property</label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                            <asp:DropDownList ID="ddproperty"  CssClass="DropDownList" TabIndex="1"
                                            runat="server">                                                                          
                                        </asp:DropDownList>
                                    </td>
                                </tr>
										<tr>
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                            Video Category</label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                            <asp:DropDownList ID="ddCategory" CssClass="DropDownList" TabIndex="1"
                                            runat="server">                                            
                                        </asp:DropDownList>
                                    </td>
                                </tr>
									
                                <tr>
											<td  align="right" nowrap><Label Class="TextLabel">Video Title</Label>&nbsp;<Label class="RedLabel">*</Label>&nbsp;&nbsp;&nbsp;</td>
											<td align=left><asp:TextBox ID="txtVideoTitle" CssClass="TextBox" Width=200  MaxLength="50" Columns="70" TabIndex="1" Runat="Server" /></td>
										</tr>
									 
										<tr id="tralVdoimage" runat="server" style=" display:none;">
											<td  align="right" nowrap><asp:Label ID ="lblAlrdyuplodedimg" Class="TextLabel"  runat ="server">Already Uploaded Video Image</asp:Label>&nbsp;&nbsp;&nbsp;</td>
											<td align=left>
                                                  <asp:Image ID="Imgvideo" runat="server"  /><asp:CheckBox ID="ChkRemov" Text="Remove Image" runat="server"  /> 
                                                 </td>
										</tr>
										<tr>
											<td  align="right" nowrap><Label Class="TextLabel">Video Image</Label>&nbsp;<Label class="RedLabel">*</Label>&nbsp;&nbsp;</td>
											<td align=left>
                                                <asp:FileUpload ID="FiluplodVideoimage" runat="server" TabIndex="1"/></td>
										</tr>
									
										<tr id="trAlVdo" runat="server" style=" display:none;">
											<td  align="right" nowrap><asp:Label ID ="lblallreadyuploadedvideo" Class="TextLabel"  runat ="server">Already Uploaded Video</asp:Label>&nbsp;&nbsp;&nbsp;</td>
											<td align=left>
                                                  <asp:label ID="lblvideo" runat="server"  />&nbsp;&nbsp;&nbsp;&nbsp;<asp:CheckBox ID="chkremovevideo" Text="Remove Video File" runat="server"  /> 
                                                 </td>
										</tr>
										<tr  runat="server" id="trVdoFile" >
											<td  align="right" nowrap><Label Class="TextLabel">Video File</Label>&nbsp;<Label class="RedLabel">*</Label>&nbsp;&nbsp;&nbsp;</td>
											<td align=left>
											 <asp:FileUpload ID="txtFileName" runat="server" /></td>
										</tr>
										
                                <tr>
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                            Flash Description</label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                       
                                             <asp:TextBox ID="txtflashdesc" TextMode="MultiLine" runat="server" CssClass="TextAreaBox" Height="200" Width="400"></asp:TextBox>
                                    </td>
                                </tr>
                                  <tr>
                                    <td align="right">
                                        <label class="TextLabel">
                                            Is Active ?</label>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:DropDownList ID="DropDownIsActive" Width="60" CssClass="DropDownList" TabIndex="1"
                                            runat="server">
                                            <asp:ListItem Value="Y" Text="Yes"></asp:ListItem>
                                            <asp:ListItem Value="N" Text="No"></asp:ListItem>
                                        </asp:DropDownList>
                                    </td>
                                </tr>
                                
                            	<tr><td colspan="2" height="5"></td></tr>
										<tr>
											<td  align="center" colspan="2">												
												
												<asp:Button ID="BtnAddvideo" runat="server" Text="Save" class="Button" style="width:75px;cursor:pointer " TabIndex="1" OnClientClick="return CheckValidation()"  />
												<input type="button" value="Cancel" style="width: 80px;" onclick="javascript:window.location.href='AdminListVideoLibraries.aspx'"
                                                    tabindex="1" class="Button" />
											</td>
										</tr>
										
										<tr>
											<td colspan="2" height="5">
                                                <asp:HiddenField ID="hdnnoofview" runat="server" />
											</td>
										</tr>									
						</table></td></tr>				
				<tr height="1" >
					<td colspan="2" ALIGN="RIGHT" class="formfooter"><font color="red">*</font> <font class="RequiredField">indicates 
							required field</font></td>
				</tr>
				
			</table>
			
			<!--------------End Of Content Table--------------------------->
    
    </td></tr></table>


</asp:Content>

