Imports System
Imports System.Collections
Imports System.Configuration
Imports System.Data
Imports System.Web
Imports System.Web.Security
Imports System.Web.UI
Imports System.Web.UI.HtmlControls
Imports System.Web.UI.WebControls
Imports System.Web.UI.WebControls.WebParts
Imports Microsoft.ApplicationBlocks.Data
Imports System.Web.Services
Imports System.Collections.Generic
Namespace CR
    Partial Class Admin_AdminListUser
        Inherits System.Web.UI.Page
        Dim objusers As New User
        Shared PreviousSortExpression As String = String.Empty
        Shared CurrentSortExpression As String = "USER_ID"
        Shared CurrentSortDirection As String = "ASC"
        <WebMethod()> <System.Web.Script.Services.ScriptMethod()> _
Public Shared Function GetUsers(ByVal prefixText As String, ByVal count As Integer) As String()
            Dim prmtr As Object = New Object(1) {}
            prmtr(0) = prefixText

            Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETADMINUSERS"), prmtr(0))
            Dim dt As New DataTable()
            dt = ds.Tables(0)

            Dim items As New List(Of String)
            Dim i As Integer = 0
            For Each row In dt.Rows

                items.Add(row("USER_NAME").ToString())
                i = i + 1
            Next
            Return items.ToArray()
        End Function
        Protected Sub GrdData_Sorting(ByVal sender As Object, ByVal e As GridViewSortEventArgs)
            If PreviousSortExpression = e.SortExpression Then
                e.SortDirection = SortDirection.Descending
                PreviousSortExpression = Nothing
            Else
                PreviousSortExpression = e.SortExpression
            End If

            CurrentSortExpression = e.SortExpression

            If e.SortDirection = SortDirection.Ascending Then
                CurrentSortDirection = "ASC"
            Else
                CurrentSortDirection = "DESC"
            End If
            binddatagrid()
        End Sub
        Public Sub BindDataGrid()
            Dim objDT As DataTable
            ' the first parameter is user id and second parameter is username
            objDT = objusers.GetUsers()
            If objDT.Rows.Count > 0 Then
                Dim dv As New DataView(objDT)
                dv.Sort = (CurrentSortExpression & "   ") + CurrentSortDirection
                GrdData.DataSource = dv

                GrdData.DataBind()
            End If
            If (GrdData.Rows.Count < 1) Then
                'BtnAdd.Visible = True
                BtnDelete.Visible = False
            Else
                'BtnAdd.Visible = False
                BtnDelete.Visible = True
            End If
            'If objDT.Rows.Count <> 0 Then


            '    'GrdData.PageSize = ConfigurationManager.AppSettings("Gridpagesize")
            '    GrdData.DataSource = objDT
            '    GrdData.DataBind()
            '    If GrdData.Rows.Count < 1 Then
            '        BtnDelete.Visible = False
            '    End If
            'End If
        End Sub

        Protected Sub Page_Load(ByVal sender As Object, ByVal e As EventArgs) Handles Me.Load
            ' Try
            Page.Form.DefaultButton = BtnSearchUser.UniqueID
            BtnDelete.Visible = True
            lblmessage.Text = ""
            Dim id As String

            If Request.QueryString("id") IsNot Nothing Then
                id = Request.QueryString("id").ToString
                If id = "1" Then
                    PanelListUser.Visible = True
                    lblmessage.Text = "Record updated successfully !"
                End If

            End If

            If Not IsPostBack Then

                BindDataGrid()
            End If
            'Catch ex As Exception

            'End Try


        End Sub
        Private Sub ChangeStatus(ByVal ID As Integer, ByVal stIsActive As String)
            'Call Common procedure to change status COMMON FUNCTION
            If ID <> Nothing Then
                If (stIsActive = "Y") Then
                    stIsActive = "N"
                ElseIf (stIsActive = "N") Then
                    stIsActive = "Y"
                End If
                objusers.changeactive(ID, "USER_ID", stIsActive)
            End If
            BindDataGrid()

        End Sub
        Protected Sub BtnSearchUser_Click(ByVal sender As Object, ByVal e As EventArgs)

            lblmessage.Text = ""
            PanelListUser.Visible = True
            If txtUserName.Text = "" Then
                BindDataGrid()
            Else
                'Dim parm As Object() = New Object(1) {}
                'parm(0) = txtUserName.Text


                Dim dt As New DataTable()
                dt = objusers.GetUser(Replace(txtUserName.Text, "'", "''"), "")

                If dt.Rows.Count = 0 Then
                    'lblmessage.Text = "No Record Found !"
                    BtnDelete.Visible = False
                Else
                    lblmessage.Text = ""
                    BtnDelete.Visible = True
                End If
                GrdData.DataSource = dt
                GrdData.DataBind()
                If GrdData.Rows.Count < 1 Then
                    BtnDelete.Visible = False
                End If
            End If



        End Sub
        Protected Sub BtnDelete_Click(ByVal sender As Object, ByVal e As EventArgs)

            Dim USER_ID As String = ""
            For Each row As GridViewRow In GrdData.Rows

                Dim chk As CheckBox = DirectCast(row.FindControl("chkDataGrid"), CheckBox)
                Dim link As LinkButton = DirectCast(row.FindControl("UserName"), LinkButton)
                If chk.Checked Then
                    'Dim dt As DataTable
                    'dt = objusers.GetUserExist(Convert.ToInt32(GrdData.DataKeys(row.RowIndex).Value.ToString()))
                    'If Convert.ToInt32(dt.Rows(0)("REQUESTS_COUNT").ToString()) = 0 Then
                    USER_ID = USER_ID & GrdData.DataKeys(row.RowIndex).Value.ToString() & ","
                    'Else
                    '    lblmessage.Text = link.Text & " Employee Is used Somewhere No Record Deleted"
                    '    Exit Sub
                End If
                'Else
                'End If
            Next
            USER_ID = USER_ID.Substring(0, USER_ID.Length - 1)
            'Using The DeleteRecords Common Function From Utility class
            objusers.DeleteRecords(USER_ID, "USER_ID")
            lblmessage.Text = "Record deleted successfully !"
            BindDataGrid()

        End Sub
        Protected Sub GrdData_RowDataBound(ByVal sender As Object, ByVal e As GridViewRowEventArgs)
            Dim dr As GridViewRow = e.Row

            Dim lnkUserName As LinkButton
            If dr.RowType = DataControlRowType.DataRow Then
                lnkUserName = e.Row.FindControl("UserName")
                lnkUserName.Text = DataBinder.Eval(e.Row.DataItem, "User_Name")
                lnkUserName.PostBackUrl = "~/Admin/AdminAddUser.aspx?mode=Update&id=" & DataBinder.Eval(e.Row.DataItem, "User_Id")

                Dim objImage As ImageButton
                ''get isactive column value
                objImage = CType(e.Row.FindControl("imgActive"), ImageButton)
                Dim status As String
                Dim usernam As String = DataBinder.Eval(e.Row.DataItem, "User_Name")
                usernam = usernam.ToLower.ToString()
                If usernam = "admin" Then
                    Dim chk As CheckBox = CType(e.Row.FindControl("chkDataGrid"), CheckBox)
                    chk.Enabled = False
                    chk.Visible = False
                    objImage.Visible = False

                End If
                status = DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE")
                If (status = "Y") Then
                    objImage.ImageUrl = "Images/Active.png"
                ElseIf (status = "N") Then
                    objImage.ImageUrl = "Images/Inactive.png"
                End If
                objImage.PostBackUrl = "AdminListUser.aspx"
                Session("id") = GrdData.DataKeys(e.Row.RowIndex).Value
                Session("Is_Active") = DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE")
                objImage.CommandArgument = GrdData.DataKeys(e.Row.RowIndex).Value & "," & DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE")
            End If
        End Sub
        Protected Sub GrdData_PageIndexChanging(ByVal sender As Object, ByVal e As System.Web.UI.WebControls.GridViewPageEventArgs) Handles GrdData.PageIndexChanging
            GrdData.PageIndex = e.NewPageIndex
            BindDataGrid()
        End Sub
        Protected Sub GrdData_RowCommand(ByVal sender As Object, ByVal e As System.Web.UI.WebControls.GridViewCommandEventArgs) Handles GrdData.RowCommand
            If (e.CommandName = "UpdateIsActive") Then
                Dim cmd As String = e.CommandArgument().ToString()
                Dim arr() As String = cmd.Split(",")
                ChangeStatus(Convert.ToInt32(arr(0)), arr(1))
            End If
        End Sub
    End Class
End Namespace
