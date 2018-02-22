Imports System
Imports System.Collections
Imports System.Configuration
Imports System.Data
Imports System.Web
Imports System.Web.Security
Imports System.Web.UI
Imports System.Web.UI.HtmlControls
Imports System.Web.UI.WebControls
Namespace CR


    Partial Class Admin_Includes_adminmenu
        Inherits System.Web.UI.UserControl
        Dim MenuString As String = ""

        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            Dim strRights As String = ""
            MenuString = "[" + "[null,'Home','AdminMain.aspx',null,'Control Panel'],"
            MenuString = MenuString + "_cmSplit,"
            MenuString = MenuString + "[null, 'Admin', null, null, 'Admin',"
            MenuString = MenuString + "[null,'List Admin Users','AdminListUser.aspx',null,'List Admin Users'],"
            MenuString = MenuString + "[null,'Add Admin Users','AdminAddUser.aspx',null,'Add Admin Users'],"
            MenuString = MenuString + "[null,'Change Password','AdminAddUser.aspx?mode=changepassword',null,'Change Password'],"
            MenuString = MenuString + "],"
            MenuString = MenuString + "_cmSplit,"
            MenuString = MenuString + "[null, 'Manage Libraries', null, null, 'Manage Libraries',"
            MenuString = MenuString + "[null,'Add  Photos in Libraries','AdminAddImages.aspx',null,'Add Photos in Libraries'],"
            MenuString = MenuString + "[null,'List Photos','ListImages.aspx',null,'List Photos '],"
            MenuString = MenuString + "],"
            MenuString = MenuString + "_cmSplit,"
            MenuString = MenuString + "[null, 'Manage  Talon Page', null, null, 'Manage  Talon Page',"
            MenuString = MenuString + "[null,'Manage  Photos  Presentation ','AdminManagePhotoGallery.aspx?id=1',null,'Manage  Photos Presentation '],"
            MenuString = MenuString + "],"
            MenuString = MenuString + "]"
            Page.RegisterStartupScript("scr", "<script language='javascript' type='text/javascript'>GetString(" + MenuString + ")</script>")


        End Sub
    End Class
End Namespace