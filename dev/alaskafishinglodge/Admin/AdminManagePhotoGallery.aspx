<%@ Page Title="" Language="VB" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="false" CodeFile="AdminManagePhotoGallery.aspx.vb" Inherits="CR.Admin_AdminManagePhotoGallery" %>

<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">

    <script type ="text/javascript" >
        function CheckValidation() 
        {
           
             return CheckEmptyGrid1();
               return CheckboxSelectiongallery();
               
       }
       function CheckEmptyGrid1() {
             var grid = document.getElementById('<%= GrdData.ClientID %>');
          if (grid != null) {
            var Inputs = grid.getElementsByTagName("input");
                for (i = 0; i < Inputs.length; i++) {
                   if (Inputs[i].type == 'text') {
                          if (isNaN(Inputs[i].value)) {
                           alert(" Numeric values allowed in display order field");
                           Inputs[i].value = "";
                           if (Inputs[i].style.display != "none")
                               Inputs[i].focus();
                           return false;
                       } 
                   }
               }


           }
           return true;


       }
   

</script>
<table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td>
        
        <table cellpadding="2" cellspacing="0" border="0" width="90%" align="center" class="TableBorder">
            <tr>
                <td class="RowHeader" align="center">
                   Manage Talon Lodge Page Images
                </td>
            </tr>
            <tr>
                <td width="100%" align="center">
                    <table cellspacing="2" cellpadding="0" border="0" align="center" width="100%">
                    <tr>
                    <td align="center">
                    <asp:Label ID="lblmsg" runat="server" CssClass="Message"></asp:Label>
                    </td>
                    </tr>
                         <tr>
                            <td height="20">
                            <asp:DataList ID="GrdData" DataKeyField="IMAGE_ID" runat="server" Width="100%" RepeatColumns="7" RepeatDirection="Horizontal">
                            <ItemTemplate>
                            <table cellpadding="0" cellpadding="0" align="left">
                            <tr>
                            <td align="left" valign="top">
                            <asp:CheckBox ID="chkDataGrid" runat="server"></asp:CheckBox>
                            </td>
                            <td align="left">
                            <asp:Image ID="imgphoto" runat="server" style=" border:solid 2px gray;"  onerror="this.src='Images/no_img2.jpg'" Height="75" Width="100" />
                            </td>
                            </tr>
                            <tr>
                            <td align="center" height="40" valign="top" colspan="2">
                            <b>Display Order:</b><asp:TextBox ID="txtDisplayOrder" runat="server" Width="40" MaxLength="5"></asp:TextBox>
                            </td>
                            </tr>
                            </table>
                            </ItemTemplate>
                            </asp:DataList>                               
                            </td>
                            </tr>     
                              <tr>
                                   <td align="center" colspan="2">
                                        <asp:Button ID="BtnPublish" runat="server" Text="Publish" TabIndex="1" class="Button" OnClientClick=" return CheckValidation()" Style="width: 84px"
                                            ValidationGroup="h" />&nbsp;&nbsp;
                                        <asp:Button ID="BtnPreview" runat="server" TabIndex="1" Text="Preview" CssClass="Button" />
                                        
                                            
                                    </td>
                                </tr>                       
                    </table>
                    <%--   </ContentTemplate>
                </asp:UpdatePanel>--%>
                    <tr>
                        <td align="RIGHT" height="5">
                        </td>
                    </tr>
        </table>
         <script>
         var strFlag = '<%= strPreview%>'
              if (strFlag != "") {
               window.open("../PhotoPresentationPreview.aspx", "PagePreview", 'height=1000,width=1440,top=190,left=5');
          }
   </script>
    </table>
</asp:Content>

