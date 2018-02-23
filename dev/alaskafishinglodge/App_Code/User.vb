Imports Microsoft.VisualBasic
Imports Microsoft.ApplicationBlocks.Data
Imports System.Data.SqlClient
Imports System.Data
Namespace CR
    Public Class User
#Region "Declarations"
        Private stUserID As Integer
        Private stUserName As String
        Private stUserTitle As String ' MR. Miss.
        Private stUserPassword As String
        Private intRoleID As Integer ' Access Level Linked With table User Roles
        Private stUserEmail As String
        Private stReceiveTextMessage As String
        Private stCellProvider As String
        Private stCellNumber As String
        Private stUserRole As Integer
        Private stIsActive As String ' User is active or not 'Y' or 'N'
#End Region

#Region "Public Properties"
        Public Property UserID() As Integer
            Get
                Return stUserID
            End Get
            Set(ByVal value As Integer)
                stUserID = value
            End Set
        End Property
        Public Property UserRole() As Integer
            Get
                Return stUserRole
            End Get
            Set(ByVal value As Integer)
                stUserRole = value
            End Set
        End Property
        Public Property UserName() As String
            Get
                Return stUserName
            End Get
            Set(ByVal value As String)
                stUserName = value
            End Set
        End Property
        Public Property UserTitle() As String
            Get
                Return stUserTitle
            End Get
            Set(ByVal value As String)
                stUserTitle = value
            End Set
        End Property
        Public Property UserPassword() As String
            Get
                Return stUserPassword
            End Get
            Set(ByVal value As String)
                stUserPassword = value
            End Set
        End Property
        ' For Getting and Setting Acess Level

        Public Property UserEmail() As String
            Get
                Return stUserEmail
            End Get
            Set(ByVal value As String)
                stUserEmail = value
            End Set
        End Property
        ' User will check the box whether wants to receive
        ' message on cell or not

        ' Cell provider list from XML file if user wants to receive
        ' the text message then also provide the cell provider


        ' User is Active or not
        Public Property IsActive() As String
            Get
                Return stIsActive
            End Get
            Set(ByVal value As String)
                stIsActive = value
            End Set
        End Property
#End Region
#Region "Public Methods"
        Public Function GetUserExist(ByVal id As Integer) As DataTable
            Dim dtClient As DataTable
            Dim objParam As Object() = New Object(1) {}
            objParam(0) = id
            objParam(1) = "USER"
            dtClient = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_CHECK"), objParam).Tables(0)
            Return dtClient
        End Function

        Public Function GetUsers() As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = 0
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "USER"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function


        Public Function GetUserWithRole(Optional ByVal UserID As Int64 = 0, Optional ByVal UserName As String = "") As String
            Dim objParam As Object() = New Object(1) {}
            Dim strrights As String
            objParam(0) = UserID
            objParam(1) = UserName
            strrights = SqlHelper.ExecuteScalar(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETUSERSDETAILS"), objParam).Tables(0)
            Return strrights
        End Function
        Public Function GetUserDetailsWithRole(Optional ByVal UserID As Int64 = 0, Optional ByVal UserName As String = "") As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = UserName
            objParam(1) = "USER"
            objParam(2) = ""
            objParam(3) = 0
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETUSERSDETAILS"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function GetUser(ByVal P_SearchString As String, ByVal P_IsActive As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = stUserID
            objParam(1) = P_SearchString
            objParam(2) = P_IsActive
            objParam(3) = "USER"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
        Public Function GetCustomerByID() As DataTable
            Dim objDT As DataTable
            Dim parm1 As Object() = New Object(0) {}
            parm1(0) = UserID
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_CUSTOMER_USERBY_ID"), parm1).Tables(0)
            Return objDT
        End Function
        Public Function AddUpdateUsers() As String
            Dim parm1 As Object() = New Object(6) {}
            parm1(0) = UserName
            parm1(1) = UserPassword
            parm1(2) = UserTitle
            parm1(3) = UserEmail
            parm1(4) = IsActive
            parm1(5) = UserID
            parm1(6) = UserRole
            If UserID > 0 Then

                SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDUPDATEUSER"), parm1)
                Return "Record updated successfully"
            Else
                Dim parm As Object() = New Object(1) {}
                parm(0) = UserName
                parm(1) = UserEmail
                Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADMIN_COMPAIR_USER"), parm)
                If ds.Tables(0).Rows.Count > 0 Then
                    Return "Duplicate user name or Email does not allow !"
                Else
                    SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDUPDATEUSER"), parm1)
                    Return "Record added sucessfully"
                End If

            End If

        End Function
        Public Sub UpdateUserPasword()
            Dim parm1 As Object() = New Object(1) {}
            parm1(0) = UserPassword
            parm1(1) = UserID
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_UPDATEUSERPASSWORD"), parm1)
        End Sub
        Public Sub AddCOMMENT(ByVal whowasrremarkeddid As Integer, ByVal whoremarked As Integer, ByVal remark As String, ByVal currnetdate As DateTime)
            Dim parm1 As Object() = New Object(3) {}
            parm1(0) = whowasrremarkeddid
            parm1(1) = whoremarked
            parm1(2) = remark
            parm1(3) = currnetdate
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDREMARK"), parm1)
        End Sub
        'Public Sub AddCOMMENT1(ByVal whowasrremarkeddid As Integer, ByVal whoremarked As Integer, ByVal remark As String, ByVal currnetdate As DateTime, ByVal Name As String, ByVal Email As String)
        '    Dim parm1 As Object() = New Object(5) {}
        '    parm1(0) = whowasrremarkeddid
        '    parm1(1) = whoremarked
        '    parm1(2) = remark
        '    parm1(3) = currnetdate
        '    parm1(4) = Name
        '    parm1(5) = Email
        '    SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDREMARK1"), parm1)
        'End Sub
        Public Sub AddCOMMENT1(ByVal whowasrremarkeddid As Integer, ByVal whoremarked As Integer, ByVal remark As String, ByVal currnetdate As DateTime, ByVal Name As String, ByVal Email As String, ByVal rate As Integer)
            Dim parm1 As Object() = New Object(6) {}
            parm1(0) = whowasrremarkeddid
            parm1(1) = whoremarked
            parm1(2) = remark
            parm1(3) = currnetdate
            parm1(4) = Name
            parm1(5) = Email
            parm1(6) = rate
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDREMARK1"), parm1)
        End Sub

        Public Function Getremarks(ByVal topic_id As Integer) As DataTable

            Dim objDT As DataTable
            Dim objParam As Object() = New Object(0) {}

            objParam(0) = topic_id

            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETREMARKS"), objParam).Tables(0)

            Return objDT
        End Function
        Public Sub Addrating(ByVal whoratedid As Integer, ByVal whowasratedid As Integer, ByVal rating As Integer)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = whoratedid
            parm1(1) = whowasratedid
            parm1(2) = rating
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDRATING"), parm1)
        End Sub
        Public Sub DeleteRecords(ByVal ID As String, ByVal Pkname As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = "USER"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub
        Public Sub changeactive(ByVal ID As Integer, ByVal Pkname As String, ByVal ActiveStatus As String)
            Dim parm1 As Object() = New Object(3) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = ActiveStatus
            parm1(3) = "USER"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ACTIVE_INACTIVE"), parm1)
        End Sub
        Public Function GetUserID(ByVal str As String) As DataTable
            Dim param As Object() = New Object(0) {}
            param(0) = str
            Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETUSERID"), param)
            Dim dt As New DataTable()
            dt = ds.Tables(0)
            Return dt
        End Function

        Public Function Getusernameslist() As DataTable
            Dim dsusername As DataSet
            Dim dtusername As DataTable
            Dim parm As Object() = New Object(1) {}
            parm(0) = ""
            dsusername = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETUSERNAMES"), parm(0))
            dtusername = dsusername.Tables(0)
            Return dtusername
        End Function
        Public Function Getrating(ByVal iduser As Integer) As DataTable
            Dim dsrating As DataSet
            Dim dtrating As DataTable
            Dim parm As Object() = New Object(1) {}
            parm(0) = iduser
            dsrating = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETRATING"), parm(0))
            dtrating = dsrating.Tables(0)
            Return dtrating
        End Function

#End Region


    End Class
End Namespace
