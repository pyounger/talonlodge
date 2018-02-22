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

    Partial Class Admin_AdminListPhotos
        Inherits System.Web.UI.Page
        Dim objPhoto As New clsphotos
        Shared PreviousSortExpression As String = String.Empty
        Shared CurrentSortExpression As String = "Title"
        Shared CurrentSortDirection As String = "ASC"
        Shared strgame As String = ""

        Public Sub binddatagrid()
            'Try
            Dim dt As New DataTable()
            dt = objPhoto.getPhotos(txtPhotoTitle.Text.Replace("'", "''"))
            If dt.Rows.Count = 0 Then
                GrdData.DataSource = dt
                GrdData.DataBind()
                BtnDelete.Visible = False
            Else
                GrdData.PageSize = ConfigurationManager.AppSettings("Gridpagesize")
                Dim dv As New DataView(dt)
                dv.Sort = (CurrentSortExpression & "   ") + CurrentSortDirection
                GrdData.DataSource = dv
                GrdData.DataBind()
                BtnDelete.Visible = True
            End If

        End Sub
        Private Sub bindphotoxml()
            Dim loXMLDoc As XmlDocument = New XmlDocument
            Dim loNodefirst As XmlNode
            loXMLDoc.Load(Server.MapPath(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "text.xml"))
            loNodefirst = loXMLDoc.SelectSingleNode("//Photos/first")
            loNodefirst.RemoveAll()
            Dim loNodeSecond As XmlNode = loXMLDoc.SelectSingleNode("//Photos/second")
            loNodeSecond.RemoveAll()
            Dim loNodeThird As XmlNode = loXMLDoc.SelectSingleNode("//Photos/third")
            loNodeThird.RemoveAll()
            Dim loNodeFourth As XmlNode = loXMLDoc.SelectSingleNode("//Photos/foyrth")
            loNodeFourth.RemoveAll()
            loXMLDoc.Save(Server.MapPath(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "text.xml"))
            objPhoto.IsActive = "Y"
            Dim dt As DataTable = objPhoto.getPhotos("")

            For i As Integer = 0 To dt.Rows.Count - 1
                Dim doc As New XmlDocument()
                doc.Load(Server.MapPath(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "text.xml"))
                Dim visitor As XmlElement = doc.CreateElement("PhotoTitle")
                'visitor.AppendChild(visitor)
                'Dim nameEl As XmlElement = doc.CreateElement("name")
                Dim newAtt As XmlAttribute = doc.CreateAttribute("Property")
                newAtt.Value = dt.Rows(i)("Property").ToString()
                Dim newAtt1 As XmlAttribute = doc.CreateAttribute("PhotoCategory")
                newAtt1.Value = dt.Rows(i)("PHOTO_CATEGORY").ToString()
                Dim newAtt2 As XmlAttribute = doc.CreateAttribute("Title")
                newAtt2.Value = dt.Rows(i)("TITLE").ToString()
                Dim newAtt3 As XmlAttribute = doc.CreateAttribute("PhotoImagePath")
                newAtt3.Value = "Uploads/Photos/" & dt.Rows(i)("FILE_NAME").ToString()
                Dim newAtt4 As XmlAttribute = doc.CreateAttribute("ShortDesc")
                newAtt4.Value = dt.Rows(i)("SHORT_DESC").ToString()
                Dim newAtt5 As XmlAttribute = doc.CreateAttribute("FlashDesc")
                newAtt5.Value = dt.Rows(i)("FLASH_DESC").ToString()
                Dim newAtt6 As XmlAttribute = doc.CreateAttribute("PhotoThumbNail")
                newAtt6.Value = "Uploads/PhotoThumbNail/" & dt.Rows(i)("FILE_NAME").ToString()
                visitor.Attributes.Append(newAtt)
                visitor.Attributes.Append(newAtt1)
                visitor.Attributes.Append(newAtt2)
                visitor.Attributes.Append(newAtt3)
                visitor.Attributes.Append(newAtt4)
                visitor.Attributes.Append(newAtt5)
                visitor.Attributes.Append(newAtt6)
                Dim s As String = doc.ChildNodes.Item(1).ChildNodes.Item(0).Name
                Dim s1 As String = doc.ChildNodes.Item(1).ChildNodes.Count
                'Dim s2 As String = doc.ChildNodes.Item(1).Name
                'Dim s3 As String = doc.ChildNodes.Item(3).Name
                'doc.ChildNodes.Item(2).AppendChild(visitor)
                doc.ChildNodes.Item(1).ChildNodes.Item(0).AppendChild(visitor)
                doc.Save(Server.MapPath(ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString() & "text.xml"))

            Next


        End Sub

        <WebMethod()> <System.Web.Script.Services.ScriptMethod()> _
     Public Shared Function GetUsers(ByVal prefixText As String, ByVal count As Integer) As String()

            Dim prmtr As Object = New Object(1) {}
            prmtr(0) = prefixText & ",Photos"
            Dim ds As DataSet = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_WPP_SEARCH"), prmtr(0))
            Dim dt As New DataTable()
            dt = ds.Tables(0)

            Dim items As New List(Of String)
            Dim i As Integer = 0
            For Each row In dt.Rows

                items.Add(row("Title").ToString())
                i = i + 1
            Next
            Return items.ToArray()
        End Function
        Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
            'Try
            BtnAdd.PostBackUrl = "AdminAddUpdatePhotos.aspx"
            Page.Form.DefaultButton = BtnSearchPhoto.UniqueID
            BtnDelete.Visible = True
            lblmessage.Text = ""
            Dim id As String
            id = Request.QueryString("id")
            If id = "1" Then
                PanelListVideo.Visible = True
                lblmessage.Text = "Record updated successfully !"
                bindphotoxml()
            End If

            If Not IsPostBack Then
                binddatagrid()
            End If
            'Catch ex As Exception

            'End Try
        End Sub

        Protected Sub BtnDelete_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnDelete.Click
            'Try
            Dim PHOTO_ID As String = ""
            For Each row As GridViewRow In GrdData.Rows
                Dim chk As CheckBox = DirectCast(row.FindControl("chkDataGrid"), CheckBox)
                If chk.Checked Then
                    PHOTO_ID = PHOTO_ID & GrdData.DataKeys(row.RowIndex).Value.ToString() & ","

                Else
                End If
            Next
            PHOTO_ID = PHOTO_ID.Substring(0, PHOTO_ID.Length - 1)
            ' Passing Array of IDs to Delete and Primary key name of table
            objPhoto.DeleteRecords(PHOTO_ID, "ID")
            lblmessage.Text = "Record deleted successfully !"
            binddatagrid()
            bindphotoxml()
            'Catch ex As Exception

            'End Try
        End Sub

        Protected Sub GrdData_PageIndexChanging(ByVal sender As Object, ByVal e As System.Web.UI.WebControls.GridViewPageEventArgs) Handles GrdData.PageIndexChanging
            GrdData.PageIndex = e.NewPageIndex
            binddatagrid()
        End Sub

        Protected Sub GrdData_RowCommand(ByVal sender As Object, ByVal e As System.Web.UI.WebControls.GridViewCommandEventArgs) Handles GrdData.RowCommand
            If (e.CommandName = "UpdateIsActive") Then
                Dim cmd As String = e.CommandArgument().ToString()
                Dim arr() As String = cmd.Split(",")
                Dim id As Integer = Convert.ToInt32(arr(0))
                ChangeStatus(id, arr(1))
            End If
        End Sub
        Protected Sub GrdData_Sorting(ByVal sender As Object, ByVal e As GridViewSortEventArgs)
            If PreviousSortExpression = e.SortExpression Then
                e.SortDirection = SortDirection.Descending
                PreviousSortExpression = Nothing
            Else
                PreviousSortExpression = e.SortExpression
            End If

            CurrentSortExpression = e.SortExpression

            If e.SortDirection = SortDirection.Ascending Then
                CurrentSortDirection = "ASC"
            Else
                CurrentSortDirection = "DESC"
            End If
            binddatagrid()
        End Sub
        Protected Sub GrdData_RowDataBound(ByVal sender As Object, ByVal e As System.Web.UI.WebControls.GridViewRowEventArgs) Handles GrdData.RowDataBound
            'Try
            If (e.Row.RowType = DataControlRowType.DataRow) Then
                Dim img As Image = CType(e.Row.FindControl("ImgPhoto"), Image)

                Dim lblVideoType As Label
                Dim objImage As ImageButton
                Dim s As String
                objImage = CType(e.Row.FindControl("imgActive"), Image)

                lblVideoType = CType(e.Row.FindControl("lblPhoto"), Label)
                Dim status As String

                status = DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE")
                If (status = "Y") Then
                    objImage.ImageUrl = "Images/Active.png"

                ElseIf (status = "N") Then
                    objImage.ImageUrl = "Images/Inactive.png"
                End If
                s = "~/Uploads/Photos/" & DataBinder.Eval(e.Row.DataItem, "FILE_NAME")
                objImage.CommandArgument = GrdData.DataKeys(e.Row.RowIndex).Value & "," & DataBinder.Eval(e.Row.DataItem, "IS_ACTIVE")

                Dim alternate As Image

                alternate = CType(e.Row.FindControl("alternate"), Image)
                Dim strfilename As String = DataBinder.Eval(e.Row.DataItem, "FILE_NAME").ToString()
                If (strfilename = "") Then


                    alternate.Visible = True
                    alternate.ImageUrl = "~/Admin/Images/notavailable.jpg"
                    alternate.Width = 100
                    alternate.Height = 65
                Else
                    img.ImageUrl = s
                    img.Width = 100
                    img.Height = 65
                End If


            End If
            'Catch ex As Exception

            'End Try
        End Sub
        Private Sub ChangeStatus(ByVal ID As Integer, ByVal stIsActive As String)
            'Call Common procedure to change status COMMON FUNCTION
            If ID <> Nothing Then
                If (stIsActive = "Y") Then
                    stIsActive = "N"
                ElseIf (stIsActive = "N") Then
                    stIsActive = "Y"
                End If
                objPhoto.changeactive(ID, "ID", stIsActive)
            End If
            binddatagrid()
            bindphotoxml()

        End Sub

        Protected Sub BtnSearchPhoto_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles BtnSearchPhoto.Click
            binddatagrid()
        End Sub

    End Class
End Namespace