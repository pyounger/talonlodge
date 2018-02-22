Imports Microsoft.VisualBasic
Imports Microsoft.ApplicationBlocks.Data
Imports System.Data.SqlClient
Imports System.Data
Namespace CR



    Public Class clsmanagegallery

#Region "Public Properties"
        Private _Id As String
        Public Property ID() As Integer
            Get
                Return _Id
            End Get
            Set(ByVal value As Integer)
                _Id = value
            End Set
        End Property
        Private _galleryType As String
        Public Property galleryType() As String
            Get
                Return _galleryType
            End Get
            Set(ByVal value As String)
                _galleryType = value
            End Set
        End Property
        Private _galleryName As String
        Public Property galleryName() As String
            Get
                Return _galleryName
            End Get
            Set(ByVal value As String)
                _galleryName = value
            End Set
        End Property
        Private _XmlName As String
        Public Property XmlName() As String
            Get
                Return _XmlName
            End Get
            Set(ByVal value As String)
                _XmlName = value
            End Set
        End Property

        Private _Category As String
        Public Property Category() As String
            Get
                Return _Category
            End Get
            Set(ByVal value As String)
                _Category = value
            End Set
        End Property
        Private _Prop As String
        Public Property prop() As String
            Get
                Return _Prop
            End Get
            Set(ByVal value As String)
                _Prop = value
            End Set
        End Property
        Private _galleryImage As String
        Public Property galleryImage() As String
            Get
                Return _galleryImage
            End Get
            Set(ByVal value As String)
                _galleryImage = value
            End Set
        End Property
        Private _PageTitle As String
        Public Property PageTitle() As String
            Get
                Return _PageTitle
            End Get
            Set(ByVal value As String)
                _PageTitle = value
            End Set
        End Property
        Private _PropId As String
        Public Property PropId() As Integer
            Get
                Return _PropId
            End Get
            Set(ByVal value As Integer)
                _PropId = value
            End Set
        End Property
        Private _UserId As String
        Public Property UserId() As Integer
            Get
                Return _UserId
            End Get
            Set(ByVal value As Integer)
                _UserId = value
            End Set
        End Property
        Private _stDisplayOrder As Integer
        Public Property DisplayOrder() As Integer
            Get
                Return _stDisplayOrder
            End Get
            Set(ByVal value As Integer)
                _stDisplayOrder = value
            End Set
        End Property
#End Region

#Region "Public Methods"
        Public Function AddUpdateGalleries() As DataTable
            Dim parm1 As Object() = New Object(7) {}
            parm1(0) = ID
            parm1(1) = galleryType
            parm1(2) = galleryName
            parm1(3) = XmlName
            parm1(4) = Category
            parm1(5) = prop
            parm1(6) = galleryImage
            parm1(7) = PageTitle
            Dim objLastId As New DataTable()
            'objAttributeDetails = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADD_UPDATE_IMAGES"), parm1).Tables(0)

            objLastId = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), "SP_ADDUPDATE_GALLERY_PRESENTATION", parm1).Tables(0)


            'strStatus = IIf(IsDBNull(objLastId.Rows(0)(1)), "0", (objLastId.Rows(0)(1).ToString()))

            Return objLastId
        End Function
        Public Function addPhotoGalleryLinking(ByVal photoId As Integer) As String
            Dim strreturn As String = ""
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = 1
            parm1(1) = photoId
            parm1(2) = DisplayOrder
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADDUPDATE_GALLERY_PHOTO_LINKING"), parm1)
            Return strreturn
        End Function
       
        Public Function addPagesPersentation(ByVal pageId As Integer, ByVal displayOrder As Integer, ByVal straddupdate As Integer) As String
            Dim parm1 As Object() = New Object(5) {}
            parm1(0) = pageId
            parm1(1) = ID
            parm1(2) = displayOrder
            parm1(3) = straddupdate
            parm1(4) = PropId
            parm1(5) = UserId
            Dim strStatus As String = Nothing
            strStatus = SqlHelper.ExecuteScalar(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ADD_UPDATE_PAGE_PRESENTATION"), parm1)
            Return strStatus
        End Function
        Public Function getMaxId() As Integer
            Dim i As Integer = 0
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = 0
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "get_gallery_max_id"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim sa As String = objDT.Rows.Count().ToString()
            If objDT.Rows.Count <> 0 Then
                i = objDT.Rows(0)(0).ToString()
            End If

            Return i
        End Function
        Public Function getGallery() As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = ID
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "get_all_galleries"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function getGalleryPhotolinking() As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = ID
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "get_all_galleries_photos_linking"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function getPages(ByVal pageId As Integer, ByVal userId As Integer) As DataTable
            Dim objParam As Object() = New Object(2) {}
            Dim objDT As DataTable
            objParam(0) = PropId
            objParam(1) = pageId
            objParam(2) = userId
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("GET_ALL_PAGES"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function getgalleryListing(ByVal galleryId As Integer) As DataTable
            Dim objParam As Object() = New Object(2) {}
            Dim objDT As DataTable
            objParam(0) = PropId
            objParam(1) = galleryId
            objParam(2) = galleryName
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_ALL_GALLERY"), objParam).Tables(0)
            Return objDT
        End Function
        Public Sub DeleteRecords(ByVal ID As String, ByVal Pkname As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = "PRESENTATION_GALLERY"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub
        Public Function getGalleryByProperty(ByVal PROPiD As Integer) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = PROPiD
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "get_all_galleries_BYPROP"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function getGeneralContent(ByVal pageId As Integer, ByVal stpropId As Integer, ByVal stuserId As Integer) As DataTable
            Dim objDT As DataTable
            Dim objParam As Object() = New Object(2) {}
            objParam(0) = pageId
            objParam(1) = stpropId
            objParam(2) = stuserId
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_GENERAL_PAGECONTENT"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function getGalleryPreview(ByVal GalleryId As Integer) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = GalleryId
            objParam(1) = ""
            objParam(2) = ""
            objParam(3) = "get_gallery_for_preview"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Return objDT
        End Function
#End Region

    End Class
End Namespace
