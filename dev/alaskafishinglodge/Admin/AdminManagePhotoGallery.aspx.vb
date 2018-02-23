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
Imports System.Web.Services
Imports System.Collections.Generic
Imports System.Xml
Namespace CR

    Partial Class Admin_AdminManagePhotoGallery
        Inherits System.Web.UI.Page
        Dim objPhotoGallery As New clsPhotoGallery
        Dim objGallery As New clsmanagegallery
        Dim objGalleryLiberary As New GalleryLiberary
        Private objProperty As New clsProperty
        Dim lastId As Integer = 0
        Protected strPreview As String = ""
        Dim strchksession As String = ""
        Private Sub bindphotogallery(ByVal pType As String)
            objPhotoGallery.IsActive = "Y"
            Dim dt As DataTable = Nothing
            If pType = 0 Then
                dt = objPhotoGallery.getImages("")
            Else
                dt = objPhotoGallery.getImagesByProperty(pType)
            End If

            GrdData.DataSource = dt
            GrdData.DataBind()
        End Sub
        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            'Dim doc As New XmlDocument()
            'doc.Load(Server.MapPath(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/Estate Homes at Mauna Lani/124.xml"))

            'Dim visitor As XmlElement = doc.CreateElement("PhotoTitle")
            ''visitor.AppendChild(visitor)
            ''Dim nameEl As XmlElement = doc.CreateElement("name")
            'Dim newAtt As XmlAttribute = doc.CreateAttribute("Property")
            'newAtt.Value = ddproperty.SelectedValue
            'Dim newAtt2 As XmlAttribute = doc.CreateAttribute("Title")
            'newAtt2.Value = "dsfdsf"
            'Dim newAtt3 As XmlAttribute = doc.CreateAttribute("PhotoImagePath")
            'newAtt3.Value = "Uploads/Photos/"
            'Dim newAtt4 As XmlAttribute = doc.CreateAttribute("FlashDesc")
            'newAtt4.Value = "dsfsdf"
            'Dim newAtt6 As XmlAttribute = doc.CreateAttribute("PhotoThumbNail")
            'newAtt6.Value = "Uploads/Photos/"
            'visitor.Attributes.Append(newAtt)
            'visitor.Attributes.Append(newAtt2)
            'visitor.Attributes.Append(newAtt3)
            'visitor.Attributes.Append(newAtt4)
            'visitor.Attributes.Append(newAtt6)
            ''nameEl.InnerText = "shatrughan"
            ''Dim lastNameEl As XmlElement = doc.CreateElement("lastname")
            ''lastNameEl.InnerText = "lamba"
            ''visitor.AppendChild(nameEl)
            ''visitor.AppendChild(lastNameEl)
            'doc.DocumentElement.AppendChild(visitor)
            'Dim s As String = doc.ChildNodes.Item(1).ChildNodes.Item(0).Name
            'Dim s1 As String = doc.ChildNodes.Item(1).ChildNodes.Count
            ''Dim s2 As String = doc.ChildNodes.Item(1).Name
            ''Dim s3 As String = doc.ChildNodes.Item(3).Name
            ''doc.ChildNodes.Item(2).AppendChild(visitor)
            'doc.ChildNodes.Item(1).ChildNodes.Item(0).AppendChild(visitor)
            'doc.Save(Server.MapPath(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/Estate Homes at Mauna Lani/124.xml"))

            If Session("Published") <> Nothing Then
                strchksession = Session("Published").ToString()
                strPreview = ""
                If strchksession <> "" Then

                    If strchksession = "Published" Then
                        lblmsg.Text = "Page published successfully!"
                        Session("Published") = ""
                        strPreview = ""
                    End If

                End If
            End If
            If Not IsPostBack Then
                bindphotogallery(0)
                If Request.QueryString("Id") <> Nothing Then
                    objGallery.ID = Request.QueryString("Id").ToString()
                    Dim dt2 As DataTable = objGallery.getGalleryPhotolinking()
                    If (dt2.Rows.Count = 0) Then
                    Else
                        For Each row As DataListItem In GrdData.Items
                            Dim chk As CheckBox = DirectCast(row.FindControl("chkDataGrid"), CheckBox)

                            Dim temp As String = dt2.Rows.Count - 1
                            Dim i As Integer
                            For i = 0 To temp

                                Dim str As String = dt2.Rows(i)("PHOTO_ID").ToString()
                                If GrdData.DataKeys(row.ItemIndex) = str Then
                                    Dim txtDisplayOrder As TextBox = DirectCast(row.FindControl("txtDisplayOrder"), TextBox)
                                    txtDisplayOrder.Text = dt2.Rows(i)("DISPLAY_ORDER").ToString()
                                    chk.Checked = True
                                End If
                            Next
                        Next
                    End If
                    '"This is the part end for photos"
                End If

            End If

        End Sub

        Protected Sub GrdData_ItemDataBound(ByVal sender As Object, ByVal e As System.Web.UI.WebControls.DataListItemEventArgs) Handles GrdData.ItemDataBound
            Dim img As Image = CType(e.Item.FindControl("imgphoto"), Image)
            img.ImageUrl = "~/Uploads/Photos/" & DataBinder.Eval(e.Item.DataItem, "IMAGE_NAME").ToString()
        End Sub

        Protected Sub BtnPublish_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnPublish.Click
            Dim strxmlName As String = ""
            Dim doc123 As New XmlDocument()
            strxmlName = "data.xml"
            If Request.QueryString("id") Is Nothing Then
                objGallery.ID = Request.QueryString("Id")
            End If
            doc123.Load(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
            Dim loNodefirst1 As XmlNode = doc123.SelectSingleNode("//data")
            loNodefirst1.RemoveAll()
            doc123.Save(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
            Dim doc As New XmlDocument()
            doc.Load(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
            objPhotoGallery.DeleteRecordsFromPhotoGalleryLinking(1, "Gallery_Id")
            For Each dlitem As DataListItem In GrdData.Items
                Dim chk As CheckBox = DirectCast(dlitem.FindControl("chkDataGrid"), CheckBox)
                If chk.Checked Then
                    Dim id As String = GrdData.DataKeys(dlitem.ItemIndex).ToString()
                    Dim txtDisplayOrder As TextBox = DirectCast(dlitem.FindControl("txtDisplayOrder"), TextBox)
                    Dim intdisplayOrder As Integer = 0
                    If txtDisplayOrder.Text <> "" Then
                        intdisplayOrder = Convert.ToInt32(txtDisplayOrder.Text)
                    End If
                    objGallery.DisplayOrder = intdisplayOrder
                    objPhotoGallery.ImageID = id
                    objGallery.addPhotoGalleryLinking(id)
                End If
            Next

            Dim dt As DataTable = objPhotoGallery.getgalleyPhotoLinkingForXml(1)

            For i As Integer = 0 To dt.Rows.Count - 1
                Dim visitor As XmlElement = doc.CreateElement("img")
                Dim newAtt As XmlAttribute = doc.CreateAttribute("imagepath")
                newAtt.Value = "Uploads/PhotoFull/" & dt.Rows(i)("IMAGE_NAME").ToString()
                Dim newAtt2 As XmlAttribute = doc.CreateAttribute("desc")
                newAtt2.Value = dt.Rows(i)("descr").ToString()
                visitor.Attributes.Append(newAtt)
                visitor.Attributes.Append(newAtt2)
                doc.DocumentElement.AppendChild(visitor)
                doc.ChildNodes.Item(1).AppendChild(visitor)
                doc.Save(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
            Next
            lblmsg.Text = "Page published successfully!"
        End Sub
        Protected Sub BtnPreview_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnPreview.Click
            Dim s As String = strchksession
            If strchksession <> "Published" Then

                Dim strxmlName As String = ""
                Dim doc123 As New XmlDocument()
                strxmlName = "data.xml"
                If Request.QueryString("id") Is Nothing Then
                    objGallery.ID = Request.QueryString("Id")
                End If
                doc123.Load(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
                Dim loNodefirst1 As XmlNode = doc123.SelectSingleNode("//data")
                loNodefirst1.RemoveAll()
                doc123.Save(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
                Dim doc As New XmlDocument()
                doc.Load(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
                objPhotoGallery.DeleteRecordsFromPhotoGalleryLinking(1, "Gallery_Id")
                For Each dlitem As DataListItem In GrdData.Items
                    Dim chk As CheckBox = DirectCast(dlitem.FindControl("chkDataGrid"), CheckBox)
                    If chk.Checked Then
                        Dim id As String = GrdData.DataKeys(dlitem.ItemIndex).ToString()
                        Dim txtDisplayOrder As TextBox = DirectCast(dlitem.FindControl("txtDisplayOrder"), TextBox)
                        Dim intdisplayOrder As Integer = 0
                        If txtDisplayOrder.Text <> "" Then
                            intdisplayOrder = Convert.ToInt32(txtDisplayOrder.Text)
                        End If
                        objGallery.DisplayOrder = intdisplayOrder
                        objPhotoGallery.ImageID = id
                        objGallery.addPhotoGalleryLinking(id)
                    End If
                Next

                Dim dt As DataTable = objPhotoGallery.getgalleyPhotoLinkingForXml(1)

                For i As Integer = 0 To dt.Rows.Count - 1
                    Dim visitor As XmlElement = doc.CreateElement("img")
                    Dim newAtt As XmlAttribute = doc.CreateAttribute("imagepath")
                    newAtt.Value = "Uploads/PhotoFull/" & dt.Rows(i)("IMAGE_NAME").ToString()
                    Dim newAtt2 As XmlAttribute = doc.CreateAttribute("desc")
                    newAtt2.Value = dt.Rows(i)("descr").ToString()
                    visitor.Attributes.Append(newAtt)
                    visitor.Attributes.Append(newAtt2)
                    doc.DocumentElement.AppendChild(visitor)
                    doc.ChildNodes.Item(1).AppendChild(visitor)
                    doc.Save(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "XmlFolder/" & strxmlName)
                Next
                strPreview = "wdhnkhsd"

            End If
        End Sub
    End Class

End Namespace
