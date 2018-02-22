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


    Partial Class Admin_AdminMain
        Inherits System.Web.UI.Page

        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load

            If Page.IsPostBack = False Then
            End If
            If Session("Name") <> "" Then
                lblLoginname.Text = Session("Name").ToString()
                lblloginTime.Text = Session("LOGGED_IN_TIME")

            Else
                Response.Redirect("login.aspx")
            End If

            Dim ds As New DataSet
            ds = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETDASHBOARDREQUESTS"))

            Dim dt As DataTable
            dt = ds.Tables(0)
            If dt.Rows.Count <> 0 Then
                lblUsercnt.Text = IIf(IsDBNull(dt.Rows(0)("REQUESTS_COUNT")), "-", dt.Rows(0)("REQUESTS_COUNT"))
                lblProductcount.Text = IIf(IsDBNull(dt.Rows(1)("REQUESTS_COUNT")), "-", dt.Rows(1)("REQUESTS_COUNT"))
                'lblEventcount.Text = IIf(IsDBNull(dt.Rows(5)("REQUESTS_COUNT")), "-", dt.Rows(5)("REQUESTS_COUNT"))
                'lblAdcount.Text = IIf(IsDBNull(dt.Rows(6)("REQUESTS_COUNT")), "-", dt.Rows(6)("REQUESTS_COUNT"))
                'lblSuggestioncount.Text = IIf(IsDBNull(dt.Rows(7)("REQUESTS_COUNT")), "-", dt.Rows(7)("REQUESTS_COUNT"))
            End If
        End Sub
    End Class
End Namespace