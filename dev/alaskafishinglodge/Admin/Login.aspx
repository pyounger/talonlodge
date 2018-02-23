<%@ Page Language="VB" AutoEventWireup="false" CodeFile="Login.aspx.vb" Inherits="CR.Admin_Login" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Welcome To Talon Lodge: ADMINSTRATOR</title>
    <meta name="GENERATOR" content="Microsoft Visual Studio.NET 7.0" />
    <meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5" />
    <link rel="stylesheet" type="text/css" href="Includes/coreCSS.css" />
    <link rel="stylesheet" type="text/css" href="Includes/console.css" />
    <link href="Includes/coreCSS.css" rel="stylesheet" type="text/css" />

    <script language="JavaScript" src="Includes/clientscript.js" type="text/javascript">
		
    </script>

    <script language="JavaScript" type="text/javascript">		
//			function TextBox_OnChange(){
//				document.frmPage.txtMessage.value='';
//				<%If Request("Logout")=1 Then%>
//					document.frmPage.txtMessage.value=''
//				<%End If%>	
//			}
			
			function CheckValidation(){			
				if(CheckForNull('frmPage','Username','txtUsernam')==false) return false;
				if(CheckForNull('frmPage','Password','txtPasswrd')==false) return false;
				return true;
			}
					
    </script>

</head>
<form id="frmPage" runat="Server">
<body style="background-color: #EFEFEF; margin-bottom: 0; margin-left: 0; margin-right: 0;
    margin-top: 0">
    <table cellspacing="0" cellpadding="0" width="480" align="center" border="0">
        <tr>
            <td height="80">
            </td>
        </tr>
        <%--<%If Request("Logout")=1 Then%>--%>
        <tr>
            <td align="center">
                <asp:Label ID="lblmesg" runat="server" class="MsgTextBox"></asp:Label>
            </td>
        </tr>
        <%--<%Else%>
			<Tr>
				<Td align="middle"></Td>
			</Tr>
			<%End If%>--%>
        <tr>
            <td>
                <table  cellspacing="0" cellpadding="0" width="480" align="center"
                    border="0">
                    <tbody>
                        <tr>
                        <td>
                          <img height="128" src="../Admin/Images/mainlogo.png" width="486" border="0">
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <img height="17" src="../Admin/Images/loginBoxhead.gif" width="480" border="0">
                            </td>
                        </tr>
                        <tr>
                            <td height="30" bgcolor="#e4e4e4">
                                <spacer height="30" type="block"></spacer>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#e4e4e4">
                                <table cellspacing="0" cellpadding="0" width="300" align="center" border="0">
                                    <tbody>
                                        <tr>
                                            <td class="logmaintext" colspan="2">
                                                <strong>Administrator Login</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-right: 5px">
                                                <strong>Username</strong>
                                            </td>
                                            <td style="padding-left: 10px">
                                                <strong>Password</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <asp:TextBox ID="txtUsernam" runat="Server" TabIndex="1" />
                                            </td>
                                            <td>
                                                <asp:TextBox ID="txtPasswrd" MaxLength="25" TextMode="password" runat="Server" Style="padding-right: 5px;
                                                    margin-left: 10px" TabIndex="1" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 10px" colspan="2">
                                                <asp:Button ID="btnLogin" CssClass="Button" runat="server" OnClientClick="return CheckValidation()"
                                                    Text="Login" TabIndex="1" />
                                            </td>
                                            <%--<Input id="Submit1" type="submit" name="cmdLogin" value="  Login  " class="submit-button" onClick="return CheckValidation()" onServerClick="CheckLogin" accesskey="L" title="Login..(Alt+L)" Runat="Server">--%>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <%--<script type ="text/javascript" >
		                        document.frmPage.txtUserName.focus();
							</script>--%>
                        <tr>
                            <td height="20" bgcolor="#e4e4e4">
                                <spacer height="30" type="block"></spacer>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img height="17" src="../Admin/Images/loginBoxFooter.gif" width="480" border="0">
                            </td>
                        </tr>
                    </tbody>
                </table>
        </tr>
    </table>
</body>
</form>
</html>
