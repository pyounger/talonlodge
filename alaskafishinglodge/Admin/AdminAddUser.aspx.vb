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
Imports System.IO
Imports Microsoft.ApplicationBlocks.Data

Namespace CR


    Partial Public Class Admin_AdminAddUser
        Inherits System.Web.UI.Page
        Dim objuser As New User
        Dim objRole As New UserRole

        Protected Sub Page_Load(ByVal sender As Object, ByVal e As EventArgs) Handles Me.Load
            'Try
            txtUserName.Focus()


            If Not IsPostBack Then
                If Request.QueryString("mode") IsNot Nothing Then
                    CheckMode(Request.QueryString("mode").ToString)
                    txtOldPassword.Focus()
                Else
                    CheckMode("New")
                End If
                If Request.QueryString("ID") <> Nothing Then
                    BtnAddUser.Text = "Update"
                    lblHeader.Text = "Edit User"
                    Dim objParam As Object() = New Object(3) {}
                    objParam(0) = Request.QueryString("ID")
                    objParam(1) = ""
                    objParam(2) = ""
                    objParam(3) = "USER"
                    Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam)
                    Dim dt As New DataTable()
                    dt = ds.Tables(0)
                    Dim Username As String
                    If dt.Rows.Count <> 0 Then
                        Username = dt.Rows(0)("USER_NAME").ToString()
                        txtUserName.Text = Username
                        ViewState("userpassword") = dt.Rows(0)("USER_PASSWORD").ToString()
                        Dim usertitle As String = dt.Rows(0)("USER_TITLE").ToString()
                        If usertitle = "admin" Then
                            txtTitle.Enabled = False
                            DropDownIsActive.Enabled = False
                        End If
                        txtTitle.Text = dt.Rows(0)("USER_TITLE").ToString()
                        txtEmail.Text = dt.Rows(0)("USER_EMAIL").ToString()
                        txtConfirmemail.Text = dt.Rows(0)("USER_EMAIL").ToString()

                        DropDownIsActive.Items.FindByValue(dt.Rows(0)("IS_ACTIVE").ToString()).Selected = True
                    End If
                    txtUserName.Focus()
                    '------------Getting values while Changing password--------------
                End If

            End If


            'Catch ex As Exception

            'End Try

        End Sub
        Public Function Getpaaswordinfo() As Boolean
            Dim UID As Int32 = Session("Uid")
            If UID <> Nothing Then
                Dim objParam As Object() = New Object(3) {}
                objParam(0) = Session("Uid")
                objParam(1) = ""
                objParam(2) = ""
                objParam(3) = "USER"

                Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam)
                Dim dt As New DataTable()
                dt = ds.Tables(0)


                If txtOldPassword.Text <> dt.Rows(0)("USER_PASSWORD").ToString() Then
                    Return False
                Else
                    Return True
                End If


            End If

        End Function
        Protected Sub btnAddUser_click(ByVal sender As Object, ByVal e As EventArgs) Handles BtnAddUser.Click

            Dim strmsg As String
            GetFormValues()
            If Request.QueryString("mode") = "changepassword" Then
                Dim ValidatePassword As Boolean = Getpaaswordinfo()
                If ValidatePassword = False Then
                    lblmessage.Text = "Incorrect Password"
                    Exit Sub
                Else
                    lblmessage.Text = ""
                End If
                objuser.UserID = Session("Uid")
                objuser.UserPassword = txtPassword.Text
                objuser.UpdateUserPasword()
                Response.Redirect("Login.aspx?Uid=2")
            ElseIf Request.QueryString("mode") = "Update" Then


                strmsg = objuser.AddUpdateUsers()
                Response.Redirect("AdminListUser.aspx?id=1")
            End If


            If ValidateValues() Then

            End If

            strmsg = objuser.AddUpdateUsers()
            If Request.QueryString("id") < 1 Then
                Dim parm1 As Object() = New Object(1) {}
                parm1(0) = txtUserName.Text
                parm1(1) = Nothing
                lblmessage.Text = strmsg
                txtPassword.Text = ""
                txtTitle.Text = ""
                txtEmail.Text = ""
                txtconfirmpassword.Text = ""
                txtConfirmemail.Text = ""
                txtUserName.Text = ""

            Else
                Response.Redirect("AdminListUser.aspx?id=1")
            End If

        End Sub
        Private Sub GetFormValues()

            objuser.UserID = Request.QueryString("ID")
            objuser.UserName = txtUserName.Text
            If (txtPassword.Enabled = True) Then
                objuser.UserPassword = txtPassword.Text
            Else
                objuser.UserPassword = ViewState("userpassword")
            End If
            objuser.UserTitle = txtTitle.Text
            objuser.UserRole = 1
            objuser.UserEmail = txtEmail.Text
            objuser.IsActive = CChar(DropDownIsActive.SelectedValue)
        End Sub
        Private Function ValidateValues() As Boolean
            Dim retVal As Boolean = False
            Return retVal
        End Function
        Private Sub CheckMode(ByVal mode As String)
            If mode = "Update" Then
                trPass.Visible = False
                trConPass.Visible = False
                trUserName.Visible = True
                trEmail.Visible = True
                trConEmail.Visible = True
                trTitle.Visible = True
                trStatus.Visible = True
                trOPass.Visible = False
                lblPass.Text = "Password"
            ElseIf mode = "changepassword" Then
                lblHeader.Text = "Change Password"
                trPass.Visible = True
                trConPass.Visible = True
                trUserName.Visible = False
                trEmail.Visible = False
                trConEmail.Visible = False
                trTitle.Visible = False
                trStatus.Visible = False
                trOPass.Visible = True

                lblPass.Text = "New Password"
            Else
                trPass.Visible = True
                trConPass.Visible = True
                trUserName.Visible = True
                trEmail.Visible = True
                trConEmail.Visible = True
                trTitle.Visible = True
                trStatus.Visible = True
                trOPass.Visible = False
                lblPass.Text = "Password"
            End If
        End Sub

    End Class
End Namespace