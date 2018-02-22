<%@ Page Language="VB" MasterPageFile="MasterPage.master" AutoEventWireup="false"
    CodeFile="AdminListUser.aspx.vb" Inherits="CR.Admin_AdminListUser" Title="CR Administrator -: User Listing" %>

<%@ Register Assembly="AjaxControlToolkit" Namespace="AjaxControlToolkit" TagPrefix="ajaxtoolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" runat="Server">
    <ajaxtoolkit:ToolkitScriptManager ID="ToolkitScriptManager1" runat="server" EnableScriptGlobalization="true"
        EnableScriptLocalization="true">
    </ajaxtoolkit:ToolkitScriptManager>

    <script type="text/javascript">
    function ClientPopulated(source, eventArgs)
        {
            if (source._currentPrefix != null)
            {
                var list = source.get_completionList();
                var search = source._currentPrefix.toLowerCase();      
                for (var i = 0; i < list.childNodes.length; i++)
                {
                    var text = list.childNodes[i].innerHTML;
                    var index = text.toLowerCase().indexOf(search);
                    if (index != -1)
                    {
                        var value = text.substring(0, index);
                        value += '<span class="AutoComplete_ListItemHiliteText">';
                        value += text.substr(index, search.length);
                        value += '</span>';
                        value += text.substring(index + search.length);
                        list.childNodes[i].innerHTML = value;
                    }
                }
            }
        }
// Function to remove highlight span once selected
function ClientItemSelected(source, e)
{
    source.get_element().value = (document.all) ? e._item.innerText : e._item.textContent;
}
    </script>

    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table cellpadding="2" cellspacing="0" border="0" width="40%" align="center" class="TableBorder">
                    <tr>
                        <td colspan="2" class="RowHeader" align="center">
                            Find User
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
                                            User Name</label>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td align="left">
                                        <asp:TextBox ID="txtUserName" CssClass="TextBox" Width="200" MaxLength="200" Columns="70"
                                            TabIndex="1" runat="Server" autocomplete="off" ValidationGroup="h" />
                                        <ajaxtoolkit:AutoCompleteExtender ID="txtUserName_AutoCompleteExtender" runat="server"
                                            DelimiterCharacters="" Enabled="True" ServiceMethod="GetUsers" TargetControlID="txtUserName"
                                            MinimumPrefixLength="1" UseContextKey="True" CompletionInterval="100" CompletionListCssClass="autocomplete_completionListElement"
                                            CompletionListItemCssClass="autocomplete_listItem" CompletionListHighlightedItemCssClass="autocomplete_highlightedListItem">
                                        </ajaxtoolkit:AutoCompleteExtender>
                                    </td>
                                    &nbsp;&nbsp;
                                    <td align="center">
                                        <asp:Button ID="BtnSearchUser" runat="server" Text="Search" class="Button" Style="width: 84px"
                                            TabIndex="1" OnClick="BtnSearchUser_Click" ValidationGroup="h" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" height="20">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr height="1">
                        <td colspan="2" align="RIGHT" class="formfooter">
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
    <asp:Panel ID="PanelListUser" runat="server">
        <table cellpadding="2" cellspacing="0" border="0" width="60%" align="center" class="TableBorder">
            <tr>
                <td class="RowHeader" align="center">
                    User Detail
                </td>
            </tr>
            <tr>
                <td width="100%" align="center">
                    <table cellspacing="2" cellpadding="0" border="0" align="center" width="100%">
                        <tr>
                            <td align="center" nowrap>
                                <asp:Label ID="lblmessage" runat="server" CssClass="Message"></asp:Label>
                            </td>
                        </tr>
                        <tr>
                            <td height="20">
                                <asp:GridView ID="GrdData" runat="server" AutoGenerateColumns="False" DataKeyNames="USER_ID"
                                    OnRowDataBound="GrdData_RowDataBound" Width="100%" AllowPaging="True" AllowSorting="True" OnSorting="GrdData_Sorting">
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
                                            <ItemStyle HorizontalAlign="Center" />
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="User Name" ItemStyle-HorizontalAlign="Center" SortExpression ="USER_NAME">
                                            <ItemTemplate>
                                                <asp:LinkButton ID="UserName" runat="server" />
                                            </ItemTemplate>
                                        </asp:TemplateField>
                                        <asp:BoundField HeaderText="E-Mail" DataField="USER_EMAIL" SortExpression ="USER_EMAIL">
                                            <ItemStyle HorizontalAlign="Center"/>
                                        </asp:BoundField>
                                        <asp:TemplateField ItemStyle-HorizontalAlign="Center">
                                            <HeaderTemplate>
                                                Is Active
                                            </HeaderTemplate>
                                            <ItemTemplate>
                                                <asp:ImageButton ID="imgActive" alt="active status" CommandName="UpdateIsActive"
                                                    runat="server" Style="border: 0px" />
                                            </ItemTemplate>
                                            <ItemStyle HorizontalAlign="Center" />
                                        </asp:TemplateField>
                                    </Columns>
                                </asp:GridView>
                            </td>
                            </tr> 
                            <tr>
                                <td height="5">
                                </td>
                            </tr>
                        </tr>
                        <tr>
                            <td height="20" align="right">
                            <asp:Button ID="BtnAdd" runat="server" Text="Add New" class="Button" Style="width: 80px" PostBackUrl="~/Admin/AdminAddUser.aspx" TabIndex="1" />
                                <asp:Button ID="BtnDelete" runat="server" Text="Delete" class="Button" Style="width: 80px"
                                    TabIndex="1" OnClick="BtnDelete_Click" OnClientClick="return CheckboxSelection()" />
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
    </asp:Panel>
</asp:Content>
