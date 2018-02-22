Imports Microsoft.VisualBasic
Imports Microsoft.ApplicationBlocks.Data
Imports System.Data.SqlClient
Imports System.Data
Namespace CR
    Public Class StaticContent
#Region "Declarations"
        Private stPageID As Integer
        Private stPage_Name As String
        Private stPageContent As String
        Private stMetaTag As String
        Private stIsActive As String
        Private stPageCode As String
        Private stimagename As String
        Private stgamename As String
        Private stpagetype As String
        Private stModifiedBY As String
#End Region

#Region "Public Properties"


        Public Property PageID() As Integer
            Get
                Return stPageID
            End Get
            Set(ByVal value As Integer)
                stPageID = value
            End Set
        End Property

        Public Property PageName() As String
            Get
                Return stPage_Name
            End Get
            Set(ByVal value As String)
                stPage_Name = value
            End Set
        End Property


        Public Property Game_Name() As String
            Get
                Return stgamename
            End Get
            Set(ByVal value As String)
                stgamename = value
            End Set
        End Property
        Public Property PageContent() As String
            Get
                Return stPageContent
            End Get
            Set(ByVal value As String)
                stPageContent = value
            End Set
        End Property



        Public Property MetaTag() As String
            Get
                Return stMetaTag
            End Get
            Set(ByVal value As String)
                stMetaTag = value
            End Set
        End Property
        Public Property imagename() As String
            Get
                Return stimagename
            End Get
            Set(ByVal value As String)
                stimagename = value
            End Set
        End Property
        Public Property pagetype() As String
            Get
                Return stpagetype
            End Get
            Set(ByVal value As String)
                stpagetype = value
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


        Public Property PageCode() As String
            Get
                Return stPageCode
            End Get
            Set(ByVal value As String)
                stPageCode = value
            End Set
        End Property

        Public Property ModifiedBY() As String
            Get
                Return stModifiedBY
            End Get
            Set(ByVal value As String)
                stModifiedBY = value
            End Set
        End Property
#End Region


#Region "Public Methods"
        Public Function GetStaticContent(ByVal P_SearchString As String, ByVal P_IsActive As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = PageID
            objParam(1) = P_SearchString
            objParam(2) = P_IsActive
            objParam(3) = "STATIC_CONTENT_PAGES"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function GetCompanylogo(ByVal P_SearchString As String, ByVal P_IsActive As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = PageID
            objParam(1) = P_SearchString
            objParam(2) = P_IsActive
            objParam(3) = "COMPANY_LOGO"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function

        Public Function GetContent() As DataTable
            Dim objParam As Object() = New Object(1) {}
            Dim objDT As DataTable
            objParam(0) = PageCode
            objParam(1) = Game_Name
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_CONTENT"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function Checkcompname(ByVal compname As String) As DataTable
            Dim objParam As Object() = New Object(0) {}
            Dim objDT As DataTable
            objParam(0) = compname
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETCOMPDETAILS_BYNAME"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function Checkcompnameforupdate(ByVal compname As String, ByVal Compid As String) As DataTable
            Dim objParam As Object() = New Object(1) {}
            Dim objDT As DataTable
            objParam(0) = compname
            objParam(1) = Compid
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GETCOMPDETAILS_BYNAME_FORUPDATE"), objParam).Tables(0)
            Return objDT
        End Function

        Public Function AddUpdateStaticContent() As String
            Dim parms As Object() = New Object(7) {}
            parms(0) = PageName
            parms(1) = PageContent
            parms(2) = MetaTag
            parms(3) = PageCode
            parms(4) = IsActive
            parms(5) = ModifiedBY
            parms(6) = PageID
            parms(7) = Game_Name
            Dim str As String
            'Mode value for Update operation
            str = SqlHelper.ExecuteScalar(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDUPDATESTATICCONTENT"), parms)
            Return str
        End Function

        Public Sub DeleteRecords(ByVal ID As String, ByVal Pkname As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = "STATIC_CONTENT_PAGES"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub

        Public Sub changeactive(ByVal ID As Integer, ByVal Pkname As String, ByVal ActiveStatus As String)
            Dim parm1 As Object() = New Object(3) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = ActiveStatus
            parm1(3) = "STATIC_CONTENT_PAGES"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ACTIVE_INACTIVE"), parm1)
        End Sub
        Public Function GetStaticContentByID(ByVal ID As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = ID
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "STATIC_CONTENT_PAGES"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function GetcompanyByID(ByVal ID As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = ID
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "COMPANY_LOGO"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function GetSettings() As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objstr As DataTable
            objParam(0) = 0
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "TRANSACTIONKEY"
            objstr = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objstr
        End Function
        Public Sub Addupdatekey(ByVal parm1() As Object)
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_UPDATETRANSACTIONKEY"), parm1)
        End Sub
#End Region


    End Class
End Namespace
