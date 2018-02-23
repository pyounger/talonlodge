<%@ Page Language="VB" MasterPageFile="MasterPage.master" AutoEventWireup="false"
    CodeFile="listImages.aspx.vb" Inherits="CR.Admin_listImages"  %>

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
                            Find Photo Image
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="100%" align="center">
                            <table cellspacing="2" cellpadding="0" border="0" align="center" width="100%">
                                <tr>
                                    <td align="center" nowrap colspan="3">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" nowrap>
                                        <label class="TextLabel">
                                            Photo Image Descr</label>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:TextBox ID="txtVideoTitle" CssClass="TextBox" Width="200" MaxLength="100" Columns="70"
                                            TabIndex="1" runat="Server" AutoComplete="Off" />                                       
                                    </td>
                                    &nbsp;&nbsp;
                                    <td align="center">
                                        <asp:Button ID="BtnSearchVideo" runat="server" Text="Search" class="Button" Style="width: 84px"
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
                          Photo   Image Details
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
                                        <asp:GridView ID="GrdData" runat="server" AutoGenerateColumns="False" DataKeyNames="IMAGE_ID"
                                            Width="100%" AllowPaging="True" AllowSorting="true" OnSorting="GrdData_Sorting">
                                            <EmptyDataTemplate>
                                                <center>
                                                    <asp:Label ID="lblEmpty" runat="server" CssClass="Message" Text="No record exists !"></asp:Label>
                                            </EmptyDataTemplate>
                                            <HeaderStyle CssClass="Grid_HeaderStyle" />
                                            <AlternatingRowStyle CssClass="Grid_ItemStyle" />
                                            <Columns>
                                                <asp:TemplateField ItemStyle-HorizontalAlign="Center">
                                                    <HeaderTemplate>
                                                        <input type="checkbox" name="chkSelectAll" onclick="ChkSelectAll(this)">
                                                    </HeaderTemplate>
                                                    <ItemTemplate>
                                                        <asp:CheckBox ID="chkDataGrid" runat="server"></asp:CheckBox>
                                                    </ItemTemplate>
                                                    <ItemStyle HorizontalAlign="center"></ItemStyle>
                                                </asp:TemplateField>
                                                <asp:HyperLinkField HeaderText="Image Description" DataTextField="descr" SortExpression="descr" 
                    NavigateUrl="~/Admin/AdminAddUpdatePhotos.aspx?mode=Update" 
                    DataNavigateUrlFormatString= "~/Admin/AdminAddUpdatePhotos.aspx?mode=Update&id={0}" 
                    DataNavigateUrlFields="IMAGE_ID"  HeaderStyle-CssClass ="Grid_HeaderStyle">
                     
                     <ItemStyle CssClass="GridItemStyle" HorizontalAlign="center" />
                </asp:HyperLinkField>
                                         <asp:TemplateField HeaderText="Photo Image">
                                                    <ItemTemplate>
                                                        <asp:Image ID="ImgVideo" runat="server" Height="75" Width="100" />
                                                        <asp:Image ID="alternate" Visible="false" runat="server" />
                                                    </ItemTemplate>
                                                    <ItemStyle HorizontalAlign="Center" />
                                                </asp:TemplateField>
                                                <asp:TemplateField HeaderText="Is Active">
                                                    <ItemTemplate>
                                                        <asp:ImageButton ID="imgActive" CommandName="UpdateIsActive" runat="server" />
                                                    </ItemTemplate>
                                                    <ItemStyle HorizontalAlign="Center" />
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
                                        <asp:Button ID="BtnAdd" runat="server" PostBackUrl="~/Admin/AdminAddImages.aspx"
                                            Text="Add New" class="Button" Style="width: 80px" TabIndex="1" />
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
            <asp:AsyncPostBackTrigger ControlID="BtnSearchVideo" EventName="Click" />
        </Triggers>
    </asp:UpdatePanel>
</asp:Content>
