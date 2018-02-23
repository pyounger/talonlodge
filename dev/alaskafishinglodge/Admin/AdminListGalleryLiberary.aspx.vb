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


    Partial Class Admin_AdminListGalleryLiberary
        Inherits System.Web.UI.Page
        Dim objgalleryLiberary As New GalleryLiberary
        Shared PreviousSortExpression As String = String.Empty
        Shared CurrentSortExpression As String = "GALLERY_TITLE"
        Shared CurrentSortDirection As String = "ASC"
        Shared strgame As String = ""
        Public Sub binddatagrid()
            'Try
            Dim dt As New DataTable()
            dt = objgalleryLiberary.GetGalleryLiberary(txtGalleryTitle.Text.Replace("'", "''").Trim(), "")
            If dt.Rows.Count = 0 Then
                GrdData.DataSource = dt
                GrdData.DataBind()
                BtnDelete.Visible = False
            Else
                GrdData.PageSize = ConfigurationManager.AppSettings("Gridpagesize")
                Dim dv As New DataView(dt)
                dv.Sort = (CurrentSortExpression & "   ") + CurrentSortDirection
                GrdData.DataSource = dv
                GrdData.DataBind()
                BtnDelete.Visible = True
            End If

        End Sub
        <WebMethod()> <System.Web.Script.Services.ScriptMethod()> _
    Public Shared Function GetUsers(ByVal prefixText As String, ByVal count As Integer) As String()

            Dim prmtr As Object = New Object(1) {}
            prmtr(0) = prefixText & ",GALLERY_LIBERARY"
            Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_WPP_SEARCH"), prmtr(0))
            Dim dt As New DataTable()
            dt = ds.Tables(0)

            Dim items As New List(Of String)
            Dim i As Integer = 0
            For Each row In dt.Rows

                items.Add(row("GALLERY_TITLE").ToString())
                i = i + 1
            Next
            Return items.ToArray()
        End Function
        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            Page.Form.DefaultButton = BtnSearchGallery.UniqueID
            BtnDelete.Visible = True
            lblmessage.Text = ""
            Dim id As String
            id = Request.QueryString("id")
            If id = "1" Then
                PanelListVideo.Visible = True
                lblmessage.Text = "Record updated successfully !"
            End If

            If Not IsPostBack Then
                binddatagrid()
            End If
            'Catch ex As Exception

            'End Try
        End Sub
        Protected Sub BtnDelete_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnDelete.Click
            'Try
            Dim ID As String = ""
            For Each row As GridViewRow In GrdData.Rows
                Dim chk As CheckBox = DirectCast(row.FindControl("chkDataGrid"), CheckBox)
                If chk.Checked Then
                    ID = ID & GrdData.DataKeys(row.RowIndex).Value.ToString() & ","

                Else
                End If
            Next
            ID = ID.Substring(0, ID.Length - 1)
            ' Passing Array of IDs to Delete and Primary key name of table

            ' Passing Array of IDs to Delete and Primary key name of table
            objgalleryLiberary.DeleteRecords(ID, "ID")
            lblmessage.Text = "Record deleted successfully !"
            binddatagrid()

            'Catch ex As Exception

            'End Try
        End Sub

        Protected Sub GrdData_PageIndexChanging(ByVal sender As Object, ByVal e As System.Web.UI.WebControls.GridViewPageEventArgs) Handles GrdData.PageIndexChanging
            GrdData.PageIndex = e.NewPageIndex
            binddatagrid()
        End Sub

        Protected Sub GrdData_RowCommand(ByVal sender As Object, ByVal e As System.Web.UI.WebControls.GridViewCommandEventArgs) Handles GrdData.RowCommand
            If (e.CommandName = "UpdateIsActive") Then
                Dim cmd As String = e.CommandArgument().ToString()
                Dim arr() As String = cmd.Split(",")
                Dim id As Integer = Convert.ToInt32(arr(0))
                ChangeStatus(id, arr(1))
            End If
        End Sub
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
        Protected Sub GrdData_RowDataBound(ByVal sender As Object, ByVal e As System.Web.UI.WebControls.GridViewRowEventArgs) Handles GrdData.RowDataBound
            'Try
            If (e.Row.RowType = DataControlRowType.DataRow) Then
                Dim img As Image = CType(e.Row.FindControl("ImgVideo"), Image)
                Dim objImage As ImageButton
                Dim s As String
                objImage = CType(e.Row.FindControl("imgActive"), Image)
                Dim status As String

                status = IIf(IsDBNull(DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE")), "", DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE"))
                If (status = "Y") Then
                    objImage.ImageUrl = "Images/Active.png"

                ElseIf (status = "N" Or status = "") Then
                    objImage.ImageUrl = "Images/Inactive.png"
                End If
                s = "~/Uploads/GalleryImage/" & DataBinder.Eval(e.Row.DataItem, "GALLERY_IMAGE")
                objImage.CommandArgument = GrdData.DataKeys(e.Row.RowIndex).Value & "," & DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE")

                Dim alternate As Image

                alternate = CType(e.Row.FindControl("alternate"), Image)

                If (DataBinder.Eval(e.Row.DataItem, "GALLERY_IMAGE") = "") Then


                    alternate.Visible = True
                    alternate.ImageUrl = "~/Admin/Images/notavailable.jpg"
                    alternate.Width = 100
                    alternate.Height = 65
                Else
                    img.ImageUrl = s
                    img.Width = 100
                    img.Height = 65
                End If


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
                objgalleryLiberary.changeactive(ID, "ID", stIsActive)
            End If
            binddatagrid()

        End Sub

        Protected Sub BtnSearchGallery_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnSearchGallery.Click
            binddatagrid()
        End Sub

    End Class
End Namespace