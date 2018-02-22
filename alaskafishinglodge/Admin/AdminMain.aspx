<%@ Page Language="VB" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="false" CodeFile="AdminMain.aspx.vb" Inherits="CR.Admin_AdminMain" Title="Main Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" runat="Server">
    <table width="100%">
        <tr>
            <td colspan="2">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0px">
                                <tr>
                                    <td valign="top">
                                        <asp:Label ID="lblWelcm" runat="server" Text="Welcome:" class="TextLabelwelcome"></asp:Label>
                                        <asp:Label ID="lblLoginname" runat="server" class="TextLabellogin" Style="color: #7b79ad"></asp:Label>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <asp:Label ID="lblLogin" runat="server" Text="You Are Login At:" class="TextLabelwelcome"></asp:Label>
                                        <asp:Label ID="lblloginTime" runat="server" class="TextLabellogin" Style="color: #7b79ad"></asp:Label>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10px">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table width="94%" bgcolor="#dfdfdf" cellpadding="0" cellspacing="0" align="center"
                    style="border: solid 1px #999999">
                    <tr>
                        <td height="10px" colspan="4" class="AdminPageHeading1">
                            <span class="">Dash Board - Talon Lodge</span>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="right" width="50%" >
                            <table style="width: 100%;height: 100px" border="0" cellpadding="0" cellspacing="1">
                               <tr>
                                    <td colspan="2" class="AdminPageHeading123">
                                    </td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                    <td valign="middle" align="left" >
                                        <asp:Label ID="lblUser" runat="server" Text="Total Number of Users:" class="TextLabelMainpage"></asp:Label>
                                    </td>
                                    <td valign="middle" align="center" >
                                        <asp:Label ID="lblUsercnt" runat="server" class="TextLabel5"></asp:Label>
                                    </td>
                                </tr>
                                  <tr bgcolor="#ffffff">
                                    <td valign="middle" align="left" >
                                        <asp:Label ID="Label1" runat="server" Text="Total Number of Photos:" class="TextLabelMainpage"></asp:Label>
                                    </td>
                                    <td valign="middle" align="center" >
                                        <asp:Label ID="lblProductcount" runat="server" class="TextLabel5"></asp:Label>
                                    </td>
                                </tr>
                                  <%--  <tr bgcolor="#ffffff">
                                    <td valign="middle" align="left" >
                                        <asp:Label ID="Label2" runat="server" Text="Total Number of Articles:" class="TextLabelMainpage"></asp:Label>
                                    </td>
                                    <td valign="middle" align="center" >
                                        <asp:Label ID="lblarticles" runat="server" class="TextLabel5"></asp:Label>
                                    </td>
                                </tr>--%>
                                <tr>
                                    <td colspan="2" class="AdminPageHeading123">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top" align="center" >
                            <table width="100%"  height="100" cellpadding="0" cellspacing="1" border="0">
                                <tr bgcolor="#ffffff">
                                    <td id="tdStaticPages" runat="server" width="13%" valign="middle" align="center" class="my_icon"
                                        onmouseover="" onmousedown="" onmouseout="" height="100">
                                        <a style="text-decoration: none;" id="arAdminUser" runat="server" href="AdminListUser.aspx">
                                            <img src="Images/users.png" border="0" onmouseover="this.className = 'pressDown'"
                                                onmouseout="this.className = 'pressNo'" alt="image" class='pressNo' height="60px" width="60px"/><br />
                                            Manage Users</a>
                                    </td>
                                          <td id="td4" runat="server" width="13%"  valign="middle" align="center" height="50"
                                        class="my_icon" onmouseover="" onmousedown="" onmouseout="">
                                        <a style="text-decoration: none;" id="arphoto" runat="server"  href="ListImages.aspx">
                                            <img src="Images/Static_pages.png" border="0" onmouseover="this.className = 'pressDown'"
                                                onmouseout="this.className = 'pressNo'" alt="image" class='pressNo' height="60px" width="60px"/><br />
                                            Photos</a>
                                    </td>                                  
                                    <td id="td5" runat="server" width="13%" valign="middle" align="center" height="50"
                                        class="my_icon" onmouseover="" onmousedown="" onmouseout="">
                                        <a style="text-decoration: none;" href="../index.html">
                                            <img src="Images/ThemeOffice/frontpage.png" border="0" onmouseover="this.className = 'pressDown'"
                                                onmouseout="this.className = 'pressNo'" alt="image" class='pressNo' /><br />
                                            Site Home </a>
                                    </td>                                                                
                                </tr>                              
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" height="6px" class="AdminPageHeading1">
                        </td>
                    </tr>
                </table>
    </table>
</asp:Content>
