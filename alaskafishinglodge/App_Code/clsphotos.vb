Imports Microsoft.VisualBasic
Imports Microsoft.ApplicationBlocks.Data
Imports System.Data.SqlClient
Imports System.Data
Namespace CR

    Public Class clsphotos

#Region "Decleration"
        Private stId As Integer
        Private stProperty As String
        Private stPhotocat As Integer
        Private stPhotoTitle As String
        Private stPhotoImage As String
        Private stshortdesc As String
        Private stFlashDesc As String
        Private stIsActive As String

#End Region
#Region "Public Property"
        Public Property Id() As Integer
            Get
                Return stId
            End Get
            Set(ByVal value As Integer)
                stId = value
            End Set
        End Property
        Public Property PhotoProperty() As String
            Get
                Return stProperty
            End Get
            Set(ByVal value As String)
                stProperty = value
            End Set
        End Property
        Public Property Category() As Integer
            Get
                Return stPhotocat
            End Get
            Set(ByVal value As Integer)
                stPhotocat = value
            End Set
        End Property
        Public Property Title() As String
            Get
                Return stPhotoTitle
            End Get
            Set(ByVal value As String)
                stPhotoTitle = value
            End Set
        End Property
        Public Property PhotoImage() As String
            Get
                Return stPhotoImage
            End Get
            Set(ByVal value As String)
                stPhotoImage = value
            End Set
        End Property
        Public Property ShortDesc() As String
            Get
                Return stshortdesc
            End Get
            Set(ByVal value As String)
                stshortdesc = value
            End Set
        End Property
        Public Property FlashDesc() As String
            Get
                Return stFlashDesc
            End Get
            Set(ByVal value As String)
                stFlashDesc = value
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
#Region "public methods"
        Public Function AddUpdatePhotos() As String
            Dim parm1 As Object() = New Object(7) {}
            parm1(0) = Id
            parm1(1) = PhotoProperty
            parm1(2) = Category
            parm1(3) = Title
            parm1(4) = PhotoImage
            parm1(5) = ShortDesc
            parm1(6) = FlashDesc
            parm1(7) = IsActive
            Dim str As String
            str = SqlHelper.ExecuteScalar(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDUPDATE_PHOTOS"), parm1).ToString()
            Return str
        End Function
        Public Sub DeleteRecords(ByVal ID As String, ByVal Pkname As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = "PHOTOS"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub
        Public Sub changeactive(ByVal ID As Integer, ByVal Pkname As String, ByVal ActiveStatus As String)
            Dim parm1 As Object() = New Object(3) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = ActiveStatus
            parm1(3) = "PHOTOS_ACTIVE"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ACTIVE_INACTIVE"), parm1)
        End Sub
        Public Function getPhotos(ByVal PhotoTitle As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = Id
            objParam(1) = PhotoTitle
            objParam(2) = ""
            objParam(3) = "PHOTOS"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
#End Region

    End Class
End Namespace
