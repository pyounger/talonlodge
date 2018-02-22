<%@ Page Title="Manage Photo Gallery" Language="VB" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="false" CodeFile="AdminAddUpdatePhotos.aspx.vb" Inherits="CR.Admin_AdminAddUpdatePhotos" %>
<%@ Register Assembly="FredCK.FCKeditorV2" Namespace="FredCK.FCKeditorV2" TagPrefix="FCKeditorV2" %>
<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">

    <script type ="text/javascript" >
        function CheckValidation() 
        {
                     var header = document.getElementById('ctl00_ContentPlaceHolder1_lblheader');
            if (header.innerHTML == 'Add Photos')
              {
                var thumb = document.getElementById('ctl00_ContentPlaceHolder1_Filuplodimage').value;
                if (thumb == "") {
                    alert("Please upload  Image.");
                     return false; }
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
         }
         if (header.innerHTML == 'Edit Photos') {
             var chk = document.getElementById('ctl00_ContentPlaceHolder1_ChkRemov');
             if (chk.checked == true) {

                 var thumb = document.getElementById('ctl00_ContentPlaceHolder1_Filuplodimage').value;
                 if (thumb == "") {
                     alert("Please upload  Image.");
                     return false;
                 }
                 if (thumb != "") {
                     var extensions = new Array("jpg", "jpeg", "gif", "png", "bmp");
                     var image_file = thumb;
                     var image_length = thumb.length;
                     var pos = image_file.lastIndexOf('.') + 1;
                     var ext = image_file.substring(pos, image_length);
                     var final_ext = ext.toLowerCase();
                     for (i = 0; i < extensions.length; i++) {
                         if (extensions[i] == final_ext) {
                             return true;
                         }
                     }
                     alert("You must upload an image file with one of the following extensions: " + extensions.join(', ') + ".");
                     return false;
                 }
             }

            
         }
     }
   

</script>
<asp:ScriptManager ID="ScriptManager1" runat="server" ></asp:ScriptManager>

<table width="100%" cellspacing="0" cellpadding="0" ><tr><td>
                     <table cellpadding="2" cellspacing="0" border="0" width="80%" style ="text-align :center" class="TableBorder" align="center">
							<tr><td colspan="2" class="RowHeader" align="center">
                                <asp:Label ID="lblheader" runat="server" Text="Add Photos"></asp:Label></td></tr>
							<tr>
								<td colspan="2" width="100%" align="center">
									<table cellspacing ="2" cellpadding ="0" border="0" align="center" width="100%">
									<tr>
											<td  align="center" nowrap colspan="2"><asp:Label ID="lblmessage" runat=server CssClass="Message" style="width:300px"></asp:Label></td>
										</tr>
								
								<tr id="tralimage" runat="server" visible="false">
									<td  align="right" nowrap><asp:Label ID ="lblAlrdyuplodedimg" Class="TextLabel"  runat ="server">Already Uploaded Image</asp:Label>&nbsp;&nbsp;&nbsp;</td>
									<td align=left>
                                      <asp:Image ID="Imgphoto" runat="server"  /><asp:CheckBox ID="ChkRemov" Text="Remove Image" runat="server"  /> 
                                      </td>
								</tr>
								<tr>
								<td  align="right" nowrap><Label Class="TextLabel">Image File</Label>&nbsp;<Label class="RedLabel">*</Label>&nbsp;&nbsp;</td>
								<td align=left>
                                     <asp:FileUpload ID="Filuplodimage" runat="server" TabIndex="1"/></td>
								</tr>
							  <tr>
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                             Description</label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
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
												
												<asp:Button ID="BtnAddPhotos" runat="server" Text="Save" class="Button" style="width:75px;cursor:pointer " TabIndex="1" OnClientClick="return CheckValidation()"  />
												<input type="button" value="Cancel" style="width: 80px;" onclick="javascript:window.location.href='ListImages.aspx'"
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

