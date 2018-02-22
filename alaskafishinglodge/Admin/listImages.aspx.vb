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
    Partial Class Admin_listImages
        Inherits System.Web.UI.Page
        Dim objPhotoGallery As New clsPhotoGallery
        Shared PreviousSortExpression As String = String.Empty
        Shared CurrentSortExpression As String = "IMAGE_ID"
        Shared CurrentSortDirection As String = "ASC"
        Shared strgame As String = ""
        Public Sub binddatagrid()
            'Try
            Dim dt As New DataTable()
            dt = objPhotoGallery.getImages(txtVideoTitle.Text.Replace("'", "''").Trim())
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

        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            'Try
            BtnAdd.PostBackUrl = "AdminAddImages.aspx"
            Page.Form.DefaultButton = BtnSearchVideo.UniqueID
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
            Dim VIDEO_ID As String = ""
            For Each row As GridViewRow In GrdData.Rows
                Dim chk As CheckBox = DirectCast(row.FindControl("chkDataGrid"), CheckBox)
                If chk.Checked Then
                    VIDEO_ID = VIDEO_ID & GrdData.DataKeys(row.RowIndex).Value.ToString() & ","

                Else
                End If
            Next
            VIDEO_ID = VIDEO_ID.Substring(0, VIDEO_ID.Length - 1)
            ' Passing Array of IDs to Delete and Primary key name of table
          
            ' Passing Array of IDs to Delete and Primary key name of table
            objPhotoGallery.DeleteRecords(VIDEO_ID, "IMAGE_ID")
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

                Dim lblVideoType As Label
                Dim objImage As ImageButton
                Dim s As String
                objImage = CType(e.Row.FindControl("imgActive"), Image)

                lblVideoType = CType(e.Row.FindControl("lblVideo"), Label)
                '  Dim videotype As String
                'videotype = IIf(IsDBNull(DataBinder.Eval(e.Row.DataItem, "VIDEO_TYPE")), "", DataBinder.Eval(e.Row.DataItem, "VIDEO_TYPE"))
                'If videotype = "Y" Then
                '    lblVideoType.Text = "You Tube"
                'Else
                '    lblVideoType.Text = "Uploaded Video"

                'End If

                Dim status As String

                status = IIf(IsDBNull(DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE")), "", DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE"))
                If (status = "Y") Then
                    objImage.ImageUrl = "Images/Active.png"

                ElseIf (status = "N" Or status = "") Then
                    objImage.ImageUrl = "Images/Inactive.png"
                End If
                s = "~/Uploads/Photos/" & DataBinder.Eval(e.Row.DataItem, "IMAGE_NAME")
                objImage.CommandArgument = GrdData.DataKeys(e.Row.RowIndex).Value & "," & DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE")

                Dim alternate As Image

                alternate = CType(e.Row.FindControl("alternate"), Image)

                If (DataBinder.Eval(e.Row.DataItem, "IMAGE_NAME") = "") Then


                    alternate.Visible = True
                    alternate.ImageUrl = "~/Admin/Images/notavailable.jpg"
                    alternate.Width = 100
                    alternate.Height = 75
                Else
                    img.ImageUrl = s
                    img.Width = 100
                    img.Height = 75
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
                objPhotoGallery.changeactive(ID, "IMAGE_ID", stIsActive)
            End If
            binddatagrid()

        End Sub

        Protected Sub BtnSearchVideo_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnSearchVideo.Click
            binddatagrid()
        End Sub

    End Class
End Namespace