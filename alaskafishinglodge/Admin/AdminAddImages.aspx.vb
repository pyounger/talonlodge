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
Namespace CR
    Partial Class Admin_AdminAddImages
        Inherits System.Web.UI.Page

        Private objPhotoGallery As New clsPhotoGallery()
        Protected Shared Mode As String = Nothing
        Protected Shared Reference_ID As Integer
      
        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            Try

                If Session("Name") Is Nothing Then
                    Response.Redirect("login.aspx")
                End If


                Mode = Request.QueryString("mode")
                If Not IsPostBack Then
                    If Mode IsNot Nothing Then
                        Reference_ID = Convert.ToInt16(Request.QueryString("ID"))
                        lblHeader.Text = "Upload Images"
                        ltrImageSize.Text = "<b> Preferred Upload Image Size : 610X447 </b>"
                    End If
                End If

            Catch ex As Exception

            End Try
        End Sub

        Protected Sub btnUpload_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles btnUpload.Click
            lblloading.text = "Loading......"
            Dim stTemp As String = ""
            Dim stTitle As String = ""
            Dim stDesr As String = ""

            For i As Integer = 0 To Request.Files.Count - 1
                Dim PostedFile As HttpPostedFile = Request.Files(i)
                If PostedFile.ContentLength > 0 Then
                    Dim FileName As String
                    Dim path As String = Nothing
                    Dim guid As System.Guid = System.Guid.NewGuid()
                    FileName = System.IO.Path.GetFileName(PostedFile.FileName)
                    PostedFile.SaveAs(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "Photos/" & FileName)
                    Utility.GenerateImage(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "Photos/" & FileName, FileName, 900, 1440, ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "PhotoFull/" & FileName)
                    'If (Request("txtDesc" & i)) Then
                    stDesr = Request("txtDesc" & i)
                    'End If

                    If stTemp = Nothing Or stTemp = "" Then
                        stTemp = FileName
                    Else
                        stTemp = (stTemp & ",") + FileName
                    End If

                    objPhotoGallery.ImageNames = FileName
                    objPhotoGallery.Descr = stDesr
                    Dim result As String = Nothing
                    result = objPhotoGallery.AddUpdateImages()

                End If
            Next
            lblloading.text = ""
            If Not (stTemp = Nothing Or stTemp = "") Then
                Response.Redirect("listImages.aspx?id=1")
            End If

        End Sub
    End Class
End Namespace