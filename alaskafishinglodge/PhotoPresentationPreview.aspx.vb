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


    Partial Class Admin_PhotoPresentationPreview
        Inherits System.Web.UI.Page
        Dim objclsgallery As New clsmanagegallery()
        Dim strpageId As String = ""
        Dim strprop As Integer = 0
        Protected strflag As String = ""
       
        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            If Not IsPostBack Then
            End If
        End Sub

        Protected Sub BtnEdit_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnEdit.Click
            Session("Published") = "1"
            strflag = "Done"
        End Sub

        Protected Sub Btnclose_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Btnclose.Click
            Session("Published") = "Published"
            strflag = "Done"
        End Sub
    End Class
End Namespace