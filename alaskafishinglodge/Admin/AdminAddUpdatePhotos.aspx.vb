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
    Partial Class Admin_AdminAddUpdatePhotos
        Inherits System.Web.UI.Page
        Dim objPhotos As New clsPhotoGallery()
        Dim objPhotoGallery As New clsPhotoGallery
        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            If Not IsPostBack Then
                If Request.QueryString("id") <> Nothing Then
                    lblheader.Text = "Edit Photos"
                    tralimage.Visible = True
                    objPhotos.ImageID = Request.QueryString("ID")
                    Dim dt As New DataTable()
                    dt = objPhotos.getImages("")
                    If dt.Rows.Count <> 0 Then
                        Dim imagename As String
                        imagename = dt.Rows(0)("IMAGE_NAME").ToString()
                        ViewState("Photo_img") = imagename
                        If (imagename = "") Then
                            Imgphoto.ImageUrl = "~/Admin/Images/notavailable.jpg"
                            ChkRemov.Visible = False

                        Else

                            Imgphoto.ImageUrl = "~/Uploads/Photos/" & dt.Rows(0)("IMAGE_NAME").ToString()
                            ChkRemov.Visible = True
                        End If
                        Imgphoto.Height = 70
                        Imgphoto.Width = 90
                        txtflashdesc.Text = IIf(IsDBNull(dt.Rows(0)("DESCR")), "", (dt.Rows(0)("DESCR").ToString()))
                        If (Convert.ToString(dt.Rows(0)("IS_ACTIVE")) = "Y") Then
                            DropDownIsActive.SelectedIndex = 0
                        Else
                            DropDownIsActive.SelectedIndex = 1
                        End If
                    End If
                Else

                End If
            End If

        End Sub
        Private Sub clearFormvalue()
            'txtDisplay.Text = ""
            txtflashdesc.Text = ""

        End Sub
        Private Sub GetFormValues()
            objPhotos.Descr = txtflashdesc.Text
            Dim s As String = Request.QueryString("mode")
            If s = "Update" Then
                If ChkRemov.Checked = False And Filuplodimage.FileName = "" Then
                    objPhotos.ImageNames = ViewState("Photo_img").ToString()
                End If
            End If
            If Filuplodimage.FileName <> "" Then
                objPhotos.ImageNames = System.IO.Path.GetFileName(Filuplodimage.FileName)
                Filuplodimage.SaveAs(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "Photos/" & objPhotos.ImageNames)
                Utility.GenerateImage(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "Photos/" & objPhotos.ImageNames, objPhotos.ImageNames, 900, 1440, ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "PhotoFull/" & objPhotos.ImageNames)
            End If
            objPhotos.ImageID = Request.QueryString("ID")
            objPhotos.IsActive = DropDownIsActive.SelectedValue
        End Sub

        Protected Sub BtnAddPhotos_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnAddPhotos.Click
            Dim mode As String
            GetFormValues()
            mode = Request.QueryString("mode")
            If mode = "Update" Then
                lblmessage.Text = objPhotos.UpdateImages()
                Dim doc As New XmlDocument()
                Dim strxmlName As String = "data.xml"
                Dim doc123 As New XmlDocument()
                doc123.Load(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
                Dim loNodefirst1 As XmlNode = doc123.SelectSingleNode("//data")
                loNodefirst1.RemoveAll()
                doc123.Save(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
                doc.Load(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
                Dim dt As DataTable = objPhotoGallery.getgalleyPhotoLinkingForXml(1)

                For i As Integer = 0 To dt.Rows.Count - 1
                    Dim visitor As XmlElement = doc.CreateElement("img")
                    Dim newAtt As XmlAttribute = doc.CreateAttribute("imagepath")
                    newAtt.Value = "Uploads/PhotoFull/" & dt.Rows(i)("IMAGE_NAME").ToString()
                    Dim newAtt2 As XmlAttribute = doc.CreateAttribute("desc")
                    newAtt2.Value = dt.Rows(i)("descr").ToString()
                    visitor.Attributes.Append(newAtt)
                    visitor.Attributes.Append(newAtt2)
                    doc.DocumentElement.AppendChild(visitor)
                    doc.ChildNodes.Item(1).AppendChild(visitor)
                    doc.Save(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
                Next
                Response.Redirect("ListImages.aspx?id=1")
            End If
            clearFormvalue()
        End Sub

    End Class
End Namespace