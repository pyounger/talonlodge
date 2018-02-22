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



    Partial Class Admin_Login
        Inherits System.Web.UI.Page

        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            Try
                txtUsernam.Focus()

                If Not (Page.IsPostBack) Then
                    lblmesg.Visible = False

                    Dim Uid As Integer
                    Uid = Request.QueryString("Uid")
                    If Uid = 2 Then
                        lblmesg.Visible = True
                        lblmesg.Text = "Password Changed successfully"

                    End If
                    Dim Uout As Integer
                    Uout = Request.QueryString("Ulogout")
                    If Uout = 2 Then
                        Session.Abandon()
                        lblmesg.Visible = True
                        lblmesg.Text = "Logged Out successfully"
                    End If

                    Dim Usrid As Integer
                    Usrid = Request.QueryString("Uid")
                    If (Request.QueryString("up") <> Nothing) Then
                        lblmesg.Visible = True
                        lblmesg.Text = "Please Login "
                    End If

                End If
            Catch ex As Exception

            End Try
        End Sub

        Protected Sub btnLogin_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles btnLogin.Click
            Dim objUser As New User()
            Dim strusertitle As String = ""
            'Try
            Dim parm As Object() = New Object(1) {}
            parm(0) = txtUsernam.Text
            parm(1) = txtPasswrd.Text
            Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_LOGINUSER"), parm)
            Dim dt As New DataTable()
            dt = ds.Tables(0)
            If dt.Rows.Count <> 0 Then
                strusertitle = dt.Rows(0)("USER_TITLE")
                Session("Uid") = dt.Rows(0).Item("User_ID")
                Session("Name") = dt.Rows(0).Item("USER_NAME")
                Dim uid1 As String
                uid1 = Session("Uid")
                Session("user_role") = dt.Rows(0).Item("USER_ROLE").ToString()
                Session("AdminLogged") = "yes"
                Session("LOGGED_IN_TIME") = Now()
                Session("usertitle") = dt.Rows(0).Item("USER_TITLE")
                Response.Redirect("AdminMain.aspx")


            Else
                lblmesg.Text = "Invalid UserName /Password"
                lblmesg.Visible = True
            End If
            txtUsernam.Text = ""
            txtPasswrd.Focus()

            ' Catch ex As Exception

            'End Try
        End Sub
    End Class
End Namespace