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


    Partial Class Admin_AdminListGallery
        Inherits System.Web.UI.Page
        Dim objgallery As New clsmanagegallery
        Shared PreviousSortExpression As String = String.Empty
        Shared CurrentSortExpression As String = "ID"
        Shared CurrentSortDirection As String = "ASC"
        Shared strgame As String = ""
        Private objProperty As New clsProperty
        Private Sub bindPropertyDD()
            Dim objDT1 As DataTable = Nothing
            objProperty.IsActive = "Y"
            objDT1 = objProperty.GetPropertyDropDown("")
            ddproperty.DataSource = objDT1
            ddproperty.DataTextField = "PROPERTY_NAME"
            ddproperty.DataValueField = "ID"
            ddproperty.DataBind()
            ddproperty.Items.Insert(0, New ListItem("Select Property", "0"))

        End Sub
        Public Sub binddatagrid()
            'Try
            Dim dt As New DataTable()
            objgallery.PropId = ddproperty.SelectedValue
            objgallery.galleryName = txtgalleryTitle.Text.Replace("'", "''")
            dt = objgallery.getgalleryListing(0)
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
            Page.Form.DefaultButton = BtnSearchGallery.UniqueID
            BtnDelete.Visible = True
            lblmessage.Text = ""
            Dim id As String
            id = Request.QueryString("Id")
            If id = "1" Then
                PanelListVideo.Visible = True
                lblmessage.Text = "Record updated successfully !"
            End If

            If Not IsPostBack Then
                bindPropertyDD()
                binddatagrid()
            End If
        End Sub
        Protected Sub BtnDelete_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnDelete.Click
            'Try
            Dim GALLERY_ID As String = ""
            For Each row As GridViewRow In GrdData.Rows
                Dim chk As CheckBox = DirectCast(row.FindControl("chkDataGrid"), CheckBox)
                If chk.Checked Then
                    GALLERY_ID = GALLERY_ID & GrdData.DataKeys(row.RowIndex).Value.ToString() & ","

                Else
                End If
            Next
            GALLERY_ID = GALLERY_ID.Substring(0, GALLERY_ID.Length - 1)
            ' Passing Array of IDs to Delete and Primary key name of table

            ' Passing Array of IDs to Delete and Primary key name of table
            objgallery.DeleteRecords(GALLERY_ID, "ID")
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
            Try
                If (e.Row.RowType = DataControlRowType.DataRow) Then
                    Dim linkPageTitle As LinkButton = CType(e.Row.FindControl("linkPageTitle"), LinkButton)
                    Dim galleryType As String = DataBinder.Eval(e.Row.DataItem, "Gallery_Type").ToString()
                    linkPageTitle.Text = DataBinder.Eval(e.Row.DataItem, "Page_Title").ToString()
                    If galleryType = "VideoGallery" Then
                        linkPageTitle.PostBackUrl = "~/Admin/AdminManageVideoGallery.aspx?id=" & DataBinder.Eval(e.Row.DataItem, "ID").ToString()
                    Else
                        linkPageTitle.PostBackUrl = "~/Admin/AdminManagePhotoGallery.aspx?id=" & DataBinder.Eval(e.Row.DataItem, "ID").ToString()
                    End If
                End If
            Catch ex As Exception
            End Try
        End Sub

        Protected Sub BtnSearchGallery_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnSearchGallery.Click
            binddatagrid()
        End Sub

    End Class
End Namespace