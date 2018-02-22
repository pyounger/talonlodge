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
Imports System.Xml  
Imports Microsoft.ApplicationBlocks.Data
Namespace CR


    Partial Class Admin_Addupdatevideos
        Inherits System.Web.UI.Page
        Dim objvideo As New clsVideo
        Private objClscategory As New Category
        Private objProperty As New clsProperty
        Private Sub bindcategorydd()
            Dim objDT1 As DataTable = Nothing
            objClscategory.IsActive = "Y"
            objDT1 = objClscategory.GetCategoryListdd("").Tables(0)
            ddcategory.DataSource = objDT1
            ddcategory.DataTextField = "CATEGORYNAME"
            ddcategory.DataValueField = "CATEGORY_ID"
            ddcategory.DataBind()
            ddcategory.Items.Insert(0, New ListItem("Select Category", "0"))

        End Sub
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
        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            txtVideoTitle.Focus()
            If Not IsPostBack Then
                bindcategorydd()
                bindPropertyDD()
                If Request.QueryString("id") <> Nothing Then
                    lblheader.Text = "Edit Video"
                    tralVdoimage.Style.Remove("display")
                    objvideo.Id = Request.QueryString("ID")
                    Dim dt As New DataTable()
                    dt = objvideo.getVideoLibrary(txtVideoTitle.Text.Replace("'", "''").Trim())
                    If dt.Rows.Count <> 0 Then
                        trVdoFile.Style.Remove("display")
                        trAlVdo.Style.Remove("display")
                        lblvideo.Text = IIf(IsDBNull(dt.Rows(0)("VIDEO_FILE")), "", (dt.Rows(0)("VIDEO_FILE"))).ToString()
                        ViewState("Video_Url") = IIf(IsDBNull(dt.Rows(0)("VIDEO_FILE")), "", (dt.Rows(0)("VIDEO_FILE"))).ToString()
                    End If
                    txtVideoTitle.Text = dt.Rows(0)("TITLE").ToString()
                    'txtDisplay.Text = IIf(IsDBNull(dt.Rows(0)("display_order")), "", (dt.Rows(0)("display_order"))).ToString()
                    'hdnnoofview.Value = IIf(IsDBNull(dt.Rows(0)("views")), "0", (dt.Rows(0)("views"))).ToString()
                    Dim imagename As String
                    imagename = dt.Rows(0)("IMAGE_NAME").ToString()
                    ViewState("Video_img") = imagename
                    If (imagename = "") Then
                        Imgvideo.ImageUrl = "~/Admin/Images/notavailable.jpg"
                        ChkRemov.Visible = False

                    Else

                        Imgvideo.ImageUrl = "~/Uploads/VideoImage/" & dt.Rows(0)("IMAGE_NAME").ToString()
                        ChkRemov.Visible = True
                    End If
                    Imgvideo.Height = 70
                    Imgvideo.Width = 90
                    txtflashdesc.Text = IIf(IsDBNull(dt.Rows(0)("DESCR")), "", (dt.Rows(0)("DESCR").ToString()))
                    If (Convert.ToString(dt.Rows(0)("IS_ACTIVE")) = "Y") Then
                        DropDownIsActive.SelectedIndex = 0
                    Else
                        DropDownIsActive.SelectedIndex = 1
                    End If
                    Try
                        ddproperty.Items.FindByValue(IIf(IsDBNull(dt.Rows(0)("PROPERTY_ID")), "0", (dt.Rows(0)("PROPERTY_ID").ToString()))).Selected = True
                        ddCategory.Items.FindByValue(IIf(IsDBNull(dt.Rows(0)("CATEGORY_ID")), "0", (dt.Rows(0)("CATEGORY_ID").ToString()))).Selected = True
                    Catch ex As Exception
                        ddproperty.Items.FindByValue(0).Selected = True
                        ddCategory.Items.FindByValue(0).Selected = True
                    End Try
                End If
            Else

            End If
        End Sub
        Private Sub clearFormvalue()
            txtVideoTitle.Text = ""
            'txtDisplay.Text = ""
            txtflashdesc.Text = ""
        End Sub
        Private Sub GetFormValues()
            objvideo.Id = Request.QueryString("ID")
            objvideo.propId = ddproperty.SelectedValue
            objvideo.catId = ddCategory.SelectedValue
            objvideo.Title = txtVideoTitle.Text
            objvideo.IsActive = CChar(DropDownIsActive.SelectedValue)
            objvideo.FlashDesc = txtflashdesc.Text
            If txtFileName.FileName <> "" Then
                objvideo.VideoUrl = System.IO.Path.GetFileName(txtFileName.FileName)

            End If

            If Request.QueryString("mode") = "Update" Then
                If txtFileName.FileName = "" Then
                    objvideo.VideoUrl = ViewState("Video_Url")
                End If
            End If
            objvideo.VideoImage = FiluplodVideoimage.FileName
            If ChkRemov.Checked = True And FiluplodVideoimage.FileName <> "" Then
                objvideo.VideoImage = System.IO.Path.GetFileName(FiluplodVideoimage.FileName)
            End If
            Dim s As String = Request.QueryString("mode")
            If s = "Update" Then
                If FiluplodVideoimage.FileName = "" Then
                    objvideo.VideoImage = ViewState("Video_img").ToString()
                End If
            End If
        End Sub

        Protected Sub BtnAddvideo_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnAddvideo.Click
            Dim mode As String
            GetFormValues()
            mode = Request.QueryString("mode")
            If mode = "Update" Then
                lblmessage.Text = objvideo.UpdateVideoLiberary()
                Response.Redirect("AdminListVideoLibraries.aspx?id=1")
            Else
                lblmessage.Text = objvideo.UpdateVideoLiberary()
            End If
            clearFormvalue()
        End Sub

    End Class
End Namespace