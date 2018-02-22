Imports Microsoft.VisualBasic
Imports Microsoft.ApplicationBlocks.Data
Imports System.Data
Imports System.Data.SqlClient

Namespace CR


    Public Class GalleryLiberary
#Region "Declarations"
        Private stId As Integer
        Private stGalleryName As String
        Private stGalleryImage As String
        Private stIsActive As String
        Private stPropId As Integer

#End Region
#Region "Public Properties"
        Public Property Id() As Integer
            Get
                Return stId
            End Get
            Set(ByVal value As Integer)
                stId = value
            End Set
        End Property
        Public Property GalleryName() As String
            Get
                Return stGalleryName
            End Get
            Set(ByVal value As String)
                stGalleryName = value

            End Set
        End Property
        Public Property GalleryImage() As String
            Get
                Return stGalleryImage
            End Get
            Set(ByVal value As String)
                stGalleryImage = value

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
        Public Property PropertyId() As Integer
            Get
                Return stPropId
            End Get
            Set(ByVal value As Integer)
                stPropId = value
            End Set
        End Property

#End Region
#Region "Pubhlic Method"
        Public Function AddupdateGalleryliberary() As String
            Dim objParameter(4) As SqlParameter
            objParameter(4) = New SqlParameter
            objParameter(0) = New SqlParameter("@ID", Id)
            objParameter(1) = New SqlParameter("@GALLERTTITLE", GalleryName)
            objParameter(2) = New SqlParameter("@GALLERYIMAGE", GalleryImage)
            objParameter(3) = New SqlParameter("@ISACTIVE", IsActive)
            objParameter(4) = New SqlParameter("@PropertyId", PropertyId)
            Dim strreturn As String
            strreturn = SqlHelper.ExecuteScalar(Utility.GetConnectionString(), CommandType.StoredProcedure, Utility.GetCommandPrefix("SP_ADD_UPDATE_GALLERY_LIBERARY"), objParameter)
            Return strreturn
        End Function
        Public Sub changeactive(ByVal ID As Integer, ByVal Pkname As String, ByVal ActiveStatus As String)
            Dim parm1 As Object() = New Object(3) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = ActiveStatus
            parm1(3) = "GALLERYLIBRARY_ACTIVE"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ACTIVE_INACTIVE"), parm1)
        End Sub
        Public Sub DeleteRecords(ByVal ID As String, ByVal Pkname As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = "GALLERYLIBRARY_MASTER"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub
        Public Function GetGalleryLiberary(ByVal P_SearchString As String, ByVal active As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = Id
            objParam(1) = P_SearchString
            objParam(2) = active
            objParam(3) = "GALLERY_LIBERARY"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
        Public Function GetGalleryLiberaryDropdown(ByVal CATTYPE As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = Id
            objParam(1) = CATTYPE
            objParam(2) = "Y"
            objParam(3) = "GALLERY_LIBERARY"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
        Public Function GetGalleryLiberaryDropdownByProperty(ByVal CATTYPE As Integer) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = CATTYPE
            objParam(1) = ""
            objParam(2) = "Y"
            objParam(3) = "GALLERY_LIBERARY_dropwown_by_propertyId"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
#End Region
    End Class
End Namespace