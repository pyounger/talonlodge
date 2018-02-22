<%@ Page Language="VB" MasterPageFile="MasterPage.master" AutoEventWireup="false"
    CodeFile="AdminAddUser.aspx.vb" Inherits="CR.Admin_AdminAddUser" Title="Administrator -:  Add User" %>

<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" runat="Server">
    <br />

    <script type="text/javascript" language="javascript">
          function CheckValidation()
          { 
         
          var currenturl=window.location.href ;
//          alert(currenturl);
            var index=currenturl.lastIndexOf("?");
            var index2=currenturl.lastIndexOf("&");
            if( parseInt(index2) >0)
            {
                var mode = currenturl.substring(index+1,index2);
                }
            else
            {
                var mode = currenturl.substring(index+1);
            }
            
            
//           alert(mode);
           if(parseInt(index) <0)
           {
            if(CheckForNull('aspnetForm','User Name','ctl00_ContentPlaceHolder1_txtUserName')==false) return false;
            if(CheckForNull('aspnetForm','Password','ctl00_ContentPlaceHolder1_txtPassword')==false) return false;
            if (CheckForDropdownListStatus('aspnetForm', 'User role', 'ctl00_ContentPlaceHolder1_DropDownUserRole', '0') == false) return false;  
            if(CompareValues('aspnetForm','ctl00_ContentPlaceHolder1_txtPassword','ctl00_ContentPlaceHolder1_txtconfirmpassword')==false) {
                alert("Password does't match  Confirm Password");
                return false;
                }          
            if(CheckForNull('aspnetForm','Title','ctl00_ContentPlaceHolder1_txtTitle')==false) return false;
            if(CheckEmail('aspnetForm','ctl00_ContentPlaceHolder1_txtEmail')==false) return false;
            if(CompareValues('aspnetForm','ctl00_ContentPlaceHolder1_txtEmail','ctl00_ContentPlaceHolder1_txtConfirmemail')==false) {
                alert("Email does't match  Confirm Email");
                return false;}           
          
           }
           else if(mode=='mode=Update')
           {
         
            if(CheckForNull('aspnetForm','User Name','ctl00_ContentPlaceHolder1_txtUserName')==false) return false;
            if (CheckForDropdownListStatus('aspnetForm', 'User role', 'ctl00_ContentPlaceHolder1_DropDownUserRole', '0') == false) return false;  
            if(CheckForNull('aspnetForm','Title','ctl00_ContentPlaceHolder1_txtTitle')==false) return false;
            if(CheckEmail('aspnetForm','ctl00_ContentPlaceHolder1_txtEmail')==false) return false;
            if(CompareValues('aspnetForm','ctl00_ContentPlaceHolder1_txtEmail','ctl00_ContentPlaceHolder1_txtConfirmemail')==false) {
                alert("Email does't match  Confirm Email");
                return false;}           
          
           }
           else if(mode=='mode=changepassword')
           {
           if(CheckForNull('aspnetForm','Old Password','ctl00_ContentPlaceHolder1_txtOldPassword')==false) return false;
           if(CheckForNull('aspnetForm','Password','ctl00_ContentPlaceHolder1_txtPassword')==false) return false;
            if(CompareValues('aspnetForm','ctl00_ContentPlaceHolder1_txtPassword','ctl00_ContentPlaceHolder1_txtconfirmpassword')==false) {
                alert("Password does't match  Confirm Password");
                return false;
                }          
            
           }
//            imagename = imagename.substring(0,imagename.length-1);
//            document.getElementById("divmainimage").style .backgroundImage = 'url(uploads/portfolio_thumb/Resized/'+'' + imagename+ ')';
//            document.getElementById("hdnImage").value =  'uploads/portfolio_thumb/Main_Resized/' + imagename;
//          alert(window.location);
          
          
            
        }



    </script>

    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <%-- <a href="AdminAddUser.aspx">AdminAddUser.aspx</a>--%>
                <table cellpadding="2" cellspacing="0" border="0" width="30%" align="center" class="TableBorder">
                    <tr>
                        <td colspan="2" class="RowHeader" align="center">
                            <asp:Label ID="lblHeader" runat="server" Text="Add User"></asp:Label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="100%" align="center">
                            <table cellspacing="2" cellpadding="0" border="0" align="center" width="100%">
                                <tr>
                                    <td align="center" nowrap colspan="2">
                                        <asp:Label ID="lblmessage" runat="server" CssClass="Message" Style="width: 300px"></asp:Label>
                                    </td>
                                </tr>
                                <tr id="trUserName" runat="server">
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                            User Name</label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:TextBox ID="txtUserName" CssClass="TextBox" Width="200" MaxLength="100" Columns="70"
                                            TabIndex="1" runat="Server" />
                                    </td>
                                </tr>
                                <tr id="trOPass" runat="server">
                                    <td align="right" nowrap>
                                        <asp:Label runat="server" class="TextLabel">
                                            Old Password</asp:Label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:TextBox ID="txtOldPassword" CssClass="TextBox" Width="200" MaxLength="10" Columns="70"
                                            TabIndex="1" runat="Server" TextMode="Password" />
                                    </td>
                                </tr>
                                <tr id="trPass" runat="server">
                                    <td align="right" nowrap>
                                        <asp:Label ID="lblPass" runat="server" class="TextLabel">
                                            Password</asp:Label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:TextBox ID="txtPassword" CssClass="TextBox" Width="200" MaxLength="10" Columns="70"
                                            TabIndex="1" runat="Server" TextMode="Password" />
                                    </td>
                                </tr>
                                <tr id="trConPass" runat="server">
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                            Confirm Password<label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:TextBox ID="txtconfirmpassword" CssClass="TextBox" TabIndex="1" Width="200"
                                            runat="server" TextMode="Password" MaxLength="10"></asp:TextBox>
                                    </td>
                                </tr>                                  
                                <tr id="trTitle" runat="server">
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                            Title</label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:TextBox ID="txtTitle" TabIndex="1" CssClass="TextBox" MaxLength="100" Width="200"
                                            Columns="70" runat="Server" />
                                    </td>
                                </tr>
                                <tr id="trEmail" runat="server">
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                            Email</label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:TextBox ID="txtEmail" TabIndex="1" CssClass="TextBox" MaxLength="100" Columns="70"
                                            Width="200" runat="Server" />
                                    </td>
                                </tr>
                                <tr id="trConEmail" runat="server">
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                            Confirm Email</label>&nbsp;<label class="RedLabel">*</label>&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:TextBox TabIndex="1" CssClass="TextBox" ID="txtConfirmemail" runat="server"
                                            Width="200" MaxLength="100"></asp:TextBox>
                                    </td>
                                </tr>
                                 <tr id="trStatus" runat="server">
                                    <td align="right" nowrap width="165px">
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
                                 
                                <tr>
                                    <td colspan="2" height="2">
                                    </td>
                                </tr>
                            </table>
                            <table width="100%">
                              
                                <tr>
                                    <td align="center" colspan="2">
                                        <%--<Input type="submit" ID="cmdDel2" style="width:80px" class="Button" value="Delete" TabIndex="9"  accesskey="D" title="Delete..(Alt+D)" Runat="Server" NAME="cmdDel2">--%>
                                        <asp:Button ID="BtnAddUser" runat="server" Text="Save" class="Button" Style="width: 75px"
                                            TabIndex="1" OnClientClick="return CheckValidation()" />
                                        <input type="button" value="Cancel" style="width: 80px;" onclick="javascript:window.location.href='AdminlistUser.aspx'"
                                class="Button" tabindex="1" /></td>
                                </tr>
                                <tr height="1">
                                    <td colspan="2" height="5">
                                    </td>
                                </tr>
                            </table>
                            <tr height="1">
                                <td colspan="2" align="RIGHT" class="formfooter">
                                    <font color="red">*</font> <font class="RequiredField">indicates required field</font>
                                </td>
                            </tr>
                </table>
                <!--------------End Of Content Table--------------------------->
            </td>
        </tr>
    </table>
    <%--    <script type="text/javascript" language="javascript">
    show1()
    </script>--%>
</asp:Content>
