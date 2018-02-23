Imports Microsoft.VisualBasic
Imports Microsoft.ApplicationBlocks.Data
Imports System.Data.SqlClient
Imports System.Data
Namespace CR


    Public Class clsPhotoGallery
#Region "Public Properties"
        Private _ImageTitle As String
        Public Property ImageTitle() As String
            Get
                Return _ImageTitle
            End Get
            Set(ByVal value As String)
                _ImageTitle = value
            End Set
        End Property
        Private _Descr As String
        Public Property Descr() As String
            Get
                Return _Descr
            End Get
            Set(ByVal value As String)
                _Descr = value
            End Set
        End Property
        Private _ImageNames As String
        Public Property ImageNames() As String
            Get
                Return _ImageNames
            End Get
            Set(ByVal value As String)
                _ImageNames = value
            End Set
        End Property

        Private _ImageIDs As String
        Public Property ImageIDs() As String
            Get
                Return _ImageIDs
            End Get
            Set(ByVal value As String)
                _ImageIDs = value
            End Set
        End Property
        Private _IsActive As String
        Public Property IsActive() As String
            Get
                Return _IsActive
            End Get
            Set(ByVal value As String)
                _IsActive = value
            End Set
        End Property
        Private _ImageID As Integer
        Public Property ImageID() As Integer
            Get
                Return _ImageID
            End Get
            Set(ByVal value As Integer)
                _ImageID = value
            End Set
        End Property
        Private _PropertyId As Integer
        Public Property PropertyId() As Integer
            Get
                Return _PropertyId
            End Get
            Set(ByVal value As Integer)
                _PropertyId = value
            End Set
        End Property
        Private _CatId As Integer
        Public Property CatId() As Integer
            Get
                Return _CatId
            End Get
            Set(ByVal value As Integer)
                _CatId = value
            End Set
        End Property
      
#End Region

#Region "Public Methods"
        Public Function AddUpdateImages() As String
            Dim parm1 As Object() = New Object(1) {}
            parm1(0) = ImageNames
            parm1(1) = Descr
            Dim objAttributeDetails As New DataTable()
            Dim strStatus As String = Nothing
            'objAttributeDetails = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADD_UPDATE_IMAGES"), parm1).Tables(0)

            objAttributeDetails = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADD_UPDATE_PHOTO_IMAGES"), parm1).Tables(0)


            strStatus = objAttributeDetails.Rows(0)("Status").ToString()

            Return strStatus
        End Function

        Public Function UpdateImages() As String
            Dim parm1 As Object() = New Object(3) {}
            parm1(0) = ImageNames
            parm1(1) = Descr
            parm1(2) = IsActive
            parm1(3) = ImageID
            Dim strStatus As String = "Hi"
            'objAttributeDetails = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADD_UPDATE_IMAGES"), parm1).Tables(0)
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_UPDATE_IMAGE"), parm1)
            Return strStatus
        End Function
        Public Function getImages(ByVal ImageDescr As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = ImageID
            objParam(1) = ImageDescr
            objParam(2) = IsActive
            objParam(3) = "images"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function getImagesByProperty(ByVal propId As Integer) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = propId
            objParam(1) = ImageTitle
            objParam(2) = IsActive
            objParam(3) = "images_ByProperty"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
        'Public Function GetImages() As DataTable
        '    Dim objParam As Object() = New Object(3) {}
        '    Dim objDT As DataTable
        '    objParam(0) = ImageTitle
        '    objParam(1) = ReferenceID

        '    objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("GET_LISTINGS"), objParam).Tables(0)
        '    Return objDT
        'End Function

        Public Sub DeleteImages()
            Dim parm1 As Object() = New Object(0) {}
            parm1(0) = ImageIDs
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_IMAGES"), parm1)
        End Sub


        Public Sub DeleteRecords(ByVal ID As String, ByVal Pkname As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = "IMAGES"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub
        Public Sub DeleteRecordsFromPhotoGalleryLinking(ByVal ID As String, ByVal Pkname As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = "Photogallerylinking"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub
        Public Sub changeactive(ByVal ID As Integer, ByVal Pkname As String, ByVal ActiveStatus As String)
            Dim parm1 As Object() = New Object(3) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = ActiveStatus
            parm1(3) = "IMAGES"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ACTIVE_INACTIVE"), parm1)
        End Sub
        Public Function getgalleyPhotoLinkingForXml(ByVal galleryId As Integer) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = galleryId
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "get_photo_for_xml"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function

#End Region

    End Class
End Namespace
