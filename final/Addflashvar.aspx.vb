Imports Microsoft.VisualBasic
Imports Microsoft.ApplicationBlocks.Data
Imports System.Data
Imports System.Data.SqlClient
Imports CR
Partial Class Addflashvar
    Inherits System.Web.UI.Page

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        addflashvar(Convert.ToString(Request("name")), Convert.ToString(Request("email")), Convert.ToString(Request("fname")), Convert.ToString(Request("femail")), Convert.ToString(Request("msg")))
    End Sub
    Public Sub addflashvar(ByVal name As String, ByVal email As String, ByVal fname As String, ByVal femail As String, ByVal msg As String)
        Dim parm As Object() = New Object(4) {}
        parm(0) = email
        parm(1) = name
        parm(2) = fname
        parm(3) = femail
        parm(4) = msg
        SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("add_flash_var"), parm).ToString()

    End Sub
End Class
