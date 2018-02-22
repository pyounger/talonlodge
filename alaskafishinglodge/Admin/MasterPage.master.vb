
Partial Class Admin_MasterPage
    Inherits System.Web.UI.MasterPage

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        If (Session("Uid") = Nothing And Request.Url.ToString().IndexOf("Login.aspx") = -1) Then
            Response.Redirect("Login.aspx?up=pl")
        End If
    End Sub
End Class

