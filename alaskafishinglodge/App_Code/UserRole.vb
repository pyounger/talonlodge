Imports Microsoft.VisualBasic
Imports Microsoft.ApplicationBlocks.Data
Imports System.Data
Imports System.Data.SqlClient
Namespace CR
    Public Class UserRole
#Region "Declarations"
        Private stUserRoleId As Integer
        Private stUserRoleName As String
        Private stIsActive As String

#End Region
#Region "Public Properties"
        Public Property UserRoleId() As Integer
            Get
                Return stUserRoleId
            End Get
            Set(ByVal value As Integer)
                stUserRoleId = value
            End Set
        End Property
        Public Property UserRoleName() As String
            Get
                Return stUserRoleName
            End Get
            Set(ByVal value As String)
                stUserRoleName = value

            End Set

        End Property

        Public Property IsActive() As String
            Get
                Return stIsActive
            End Get
            Set(ByVal value As String)
                stIsActive = value
            End Set
        End Property

#End Region
#Region "Pubhlic Method"
        Public Function AddupdateUserRole() As String
            Dim objParameter(2) As SqlParameter
            objParameter(2) = New SqlParameter
            objParameter(0) = New SqlParameter("@RoleName", UserRoleName)
            objParameter(1) = New SqlParameter("@IsActive", IsActive)
            objParameter(2) = New SqlParameter("@Id", UserRoleId)

            If UserRoleId > 0 Then
                SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), CommandType.StoredProcedure, Utility.GetCommandPrefix("SP_ADDUPDATE_USER_ROLE"), objParameter)
                Return "Record Updated sucessfully"
            Else
                SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), CommandType.StoredProcedure, Utility.GetCommandPrefix("SP_ADDUPDATE_USER_ROLE"), objParameter)
                Return "Record Added Sucessfully"
            End If

        End Function
        Public Function AddupdateGeneralUserRole(ByVal dob As Integer, ByVal stroption As String) As String
            Dim strResult As String = ""
            Dim objParameter(1) As SqlParameter
            objParameter(1) = New SqlParameter
            objParameter(0) = New SqlParameter("@dob", dob)
            objParameter(1) = New SqlParameter("@RoleOption", stroption)
            strResult = SqlHelper.ExecuteScalar(Utility.GetConnectionString(), CommandType.StoredProcedure, Utility.GetCommandPrefix("SP_ADDUPDATE_GENERAL_USER_ROLE"), objParameter)
            Return strResult
        End Function
        Public Sub changeactive(ByVal ID As Integer, ByVal Pkname As String, ByVal ActiveRole As String)
            Dim parm1 As Object() = New Object(3) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = ActiveRole
            parm1(3) = "USER_ROLE"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ACTIVE_INACTIVE"), parm1)
        End Sub
        Public Sub DeleteRecords(ByVal ID As String, ByVal Pkname As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = "USER_ROLE"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub
        Public Function GetUserRole(ByVal P_SearchString As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = UserRoleId
            objParam(1) = P_SearchString
            objParam(2) = ""
            objParam(3) = "USER_ROLE"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
        Public Function GetUserRoleDropDown(ByVal P_SearchString As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = UserRoleId
            objParam(1) = P_SearchString
            objParam(2) = "Y"
            objParam(3) = "USER_ROLE"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
        Public Function GetAllAdminMenuOpption() As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = UserRoleId
            objParam(1) = ""
            objParam(2) = "Y"
            objParam(3) = "GENERAL_OPTION"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
        Public Function GetAllGeneralmenuoption() As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = UserRoleId
            objParam(1) = ""
            objParam(2) = "Y"
            objParam(3) = "GENERAL_MENU_OPTION"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
        Public Function GetAccessRights(ByVal roleid As Integer) As DataTable
            Dim param As Object() = New Object(0) {}
            param(0) = roleid
            Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETACCESS_RIGHTS"), param)
            Dim dt As New DataTable()
            dt = ds.Tables(0)
            Dim str As String = dt.Rows.Count
            Return dt
        End Function
        Public Function GetGeneralAccessRights(ByVal roleid As Integer) As DataTable
            Dim param As Object() = New Object(0) {}
            param(0) = roleid
            Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETACCESS_RIGHTS_GENERAL"), param)
            Dim dt As New DataTable()
            dt = ds.Tables(0)
            Dim str As String = dt.Rows.Count
            Return dt
        End Function
        Public Function checkvalidAddUpdateUserRole(ByVal UserRole As String, ByVal ID As String) As DataTable

            If ID = Nothing Then
                ID = "0"
            End If

            Dim objParam As Object() = New Object(1) {}
            Dim objDT As DataTable
            objParam(0) = UserRole
            objParam(1) = ID
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_USER_ROLE_FOR_CHECK"), objParam).Tables(0)
            Return objDT
        End Function
        Public Sub InsertAccessRights(ByVal RoleID As Integer, ByVal Accessoptions As String)
            Dim param As Object() = New Object(1) {}
            param(0) = RoleID
            param(1) = Accessoptions
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDUPDATE_ACCESS_RIGHTS"), param)


        End Sub
        Public Sub DeleteOptionLinkRecords(ByVal ID As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = ""
            parm1(1) = ID
            parm1(2) = "ACCESSRIGHTS"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub

        Public Function chkValidDeleteRole(ByVal ID As String) As DataTable
            Dim objParam As Object() = New Object(1) {}
            Dim objDT As DataTable
            objParam(0) = ID
            objParam(1) = "USER_ROLE"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_CHECK_VALID_DELETE"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function GetUserRights(ByVal UserID As Int64) As String
            Dim objParam As Object = New Object(1) {}
            Dim objDT As DataTable
            Dim i As Integer
            Dim strRights As String = ""
            objParam(0) = UserID
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETACCESSRIGHTS"), objParam(0)).Tables(0)
            If (objDT.Rows.Count > 0) Then
                For i = 0 To objDT.Rows.Count - 1
                    If strRights.Trim() = "" Then
                        strRights = objDT.Rows(i)("OPTION_NAME").ToString()
                    Else
                        strRights = strRights + "|" + objDT.Rows(i)("OPTION_NAME").ToString()
                    End If

                Next
            End If
            Return strRights
        End Function
        Public Function CheckUserRights(ByVal strRights As String, ByVal strOptionName As String) As Boolean
            Dim blRetVal As Boolean = False
            Dim arrRights() As String
            Dim i As Integer
            arrRights = strRights.Split("|")
            For i = 0 To arrRights.Length - 1
                If arrRights(i).ToString().ToUpper() = strOptionName.ToUpper() Then
                    blRetVal = True
                    Exit For
                End If
            Next
            Return blRetVal
        End Function
#End Region
    End Class
End Namespace