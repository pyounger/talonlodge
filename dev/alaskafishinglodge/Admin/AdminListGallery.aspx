<%@ Page Title="" Language="VB" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="false" CodeFile="AdminListGallery.aspx.vb" Inherits="CR.Admin_AdminListGallery" %>


<%@ Register Assembly="AjaxControlToolkit" Namespace="AjaxControlToolkit" TagPrefix="ajaxtoolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" runat="Server">
    <ajaxtoolkit:ToolkitScriptManager ID="ToolkitScriptManager1" runat="server" EnableScriptGlobalization="true"
        EnableScriptLocalization="true">
    </ajaxtoolkit:ToolkitScriptManager>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <asp:HiddenField ID="hidenisfeatured" runat="server" />
                <table cellpadding="2" cellspacing="0" border="0" width="41%" align="center" class="TableBorder">
                    <tr>
                        <td colspan="2" class="RowHeader" align="center">
                            Find Gallery
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="100%" align="center">
                            <table cellspacing="2" cellpadding="0" border="0" align="center" width="100%">
                                <tr>
                                    <td align="center" nowrap colspan="2">
                                    </td>
                                </tr>
                                 <tr>
                                    <td align="right" nowrap  width="40%">
                                        <label class="TextLabel">
                                           Property</label>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                          <asp:DropDownList ID="ddproperty" runat="server" CssClass="DropDownList></asp:DropDownList>                                                                             
                                    </td>
                                    </tr>
                                     <tr>
                                    <td align="center" nowrap colspan="2">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" nowrap  width="40%">
                                        <label class="TextLabel">
                                           Gallery Title</label>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                         <asp:TextBox ID="txtgalleryTitle" runat="server" CssClass="TextBox" MaxLength="200"></asp:TextBox>                                                                            
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    </td>
                                    <td align="left">
                                     <asp:Button ID="BtnSearchGallery" runat="server" Text="Search" class="Button" Style="width: 84px"
                                            TabIndex="1" />
                                    </td>
                                    </tr>                              
                                <tr>
                                    <td colspan="3" height="20">
                                    </td>
                                </tr>
                            </table>
                            <tr height="1">
                                <td colspan="2" align="right" class="formfooter">
                                </td>
                            </tr>
                </table>
                <!--------------End Of Content Table--------------------------->
            </td>
        </tr>
        <tr>
            <td height="20">
            </td>
        </tr>
    </table>
    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
        <ContentTemplate>
            <asp:UpdateProgress ID="UpdateProgress1" runat="server" DynamicLayout="false">
                <ProgressTemplate>
                    <div class="imagebtm">
                        <img src="Images/ajax-loader.gif" alt="" /><span class="TextLabel">Loading ...</span></div>
                </ProgressTemplate>
            </asp:UpdateProgress>
            <asp:Panel ID="PanelListVideo" runat="server">
                <table cellpadding="2" cellspacing="0" border="0" width="80%" align="center" class="TableBorder">
                    <tr>
                        <td colspan="2" class="RowHeader" align="center">
                          Gallery Details
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="100%" align="center">
                            <table cellspacing="2" cellpadding="0" border="0" align="center" width="100%">
                                <tr>
                                    <td align="center" nowrap>
                                        <asp:Label ID="lblmessage" runat="server" CssClass="Message"></asp:Label>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20">
                                        <asp:GridView ID="GrdData" runat="server" AutoGenerateColumns="False" DataKeyNames="ID"
                                            Width="100%" AllowPaging="True" AllowSorting="true" OnSorting="GrdData_Sorting">
                                            <EmptyDataTemplate>
                                                <center>
                                                    <asp:Label ID="lblEmpty" runat="server" CssClass="Message" Text="No record exists !"></asp:Label>
                                            </EmptyDataTemplate>
                                            <HeaderStyle CssClass="Grid_HeaderStyle" />
                                            <AlternatingRowStyle CssClass="Grid_ItemStyle" />
                                            <Columns>
                                                <asp:TemplateField ItemStyle-HorizontalAlign="Center" >
                                                    <HeaderTemplate>
                                                        <input type="checkbox" name="chkSelectAll" onclick="ChkSelectAll(this)">
                                                    </HeaderTemplate>
                                                    <ItemTemplate>
                                                        <asp:CheckBox ID="chkDataGrid" runat="server"></asp:CheckBox>
                                                    </ItemTemplate>
                                                    <ItemStyle HorizontalAlign="center"></ItemStyle>
                                                </asp:TemplateField>                                                
                                        <asp:TemplateField HeaderText="Page Title" HeaderStyle-CssClass="Grid_HeaderStyle" SortExpression="Page_Title">
                                                    <ItemTemplate>
                                                       <asp:LinkButton ID="linkPageTitle"  runat="server"></asp:LinkButton>
                                                    </ItemTemplate>
                                                    <ItemStyle CssClass="GridItemStyle" HorizontalAlign="center" />
                                                </asp:TemplateField>  
                                                <asp:BoundField  DataField="Property_name" HeaderText="Property Name" SortExpression="Property_name">
                                                     <ItemStyle HorizontalAlign="Center"/>
                                        </asp:BoundField>
                                         <asp:BoundField  DataField="Gallery_Type" HeaderText="Gallery Type" SortExpression="Gallery_Type">
                                                     <ItemStyle HorizontalAlign="Center"/>
                                        </asp:BoundField>
                                        <asp:BoundField  DataField="GALLERY_NAME" HeaderText="Gallery Name" SortExpression="GALLERY_NAME">
                                                     <ItemStyle HorizontalAlign="Center"/>
                                        </asp:BoundField>
                                           <asp:TemplateField HeaderText="Gallery Image" HeaderStyle-CssClass="Grid_HeaderStyle">
                                                    <ItemTemplate>
                                                        <img src="../Uploads/GalleryThumbNail/<%#eval("GALLERY_IMAGE")%>" onerror="this.src='Images/no_img2.jpg'" height="85" width="100"  alt="" />
                                                    </ItemTemplate>
                                                    <ItemStyle CssClass="GridItemStyle" HorizontalAlign="center" />
                                                </asp:TemplateField>                                                
                                            </Columns>
                                        </asp:GridView>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" height="5">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" align="right">
                                          <asp:Button ID="BtnDelete" runat="server" Text="Delete" class="Button" Style="width: 80px"
                                            TabIndex="1" OnClientClick="return CheckboxSelection()" />
                                    </td>
                                </tr>
                            </table>
                            <tr>
                                <td colspan="2" height="5">
                                </td>
                            </tr>
                </table>
            </asp:Panel>
        </ContentTemplate>
        <Triggers>
            <asp:AsyncPostBackTrigger ControlID="BtnSearchGallery" EventName="Click" />
        </Triggers>
    </asp:UpdatePanel>
</asp:Content>

