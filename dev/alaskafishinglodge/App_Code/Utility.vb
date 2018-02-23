Imports System
Imports System.Data
Imports System.Configuration
Imports System.Web
Imports System.Web.Security
Imports System.Web.UI
Imports System.Web.UI.HtmlControls
Imports System.Web.UI.WebControls
Imports System.Web.UI.WebControls.WebParts
Imports Microsoft.ApplicationBlocks.Data
Imports System.Drawing.Image
Imports System.Drawing
'Imports System.Drawing.Imaging
Imports System.Drawing.Drawing2D
Imports System.Drawing.Imaging
Namespace CR

    Public Class Utility
        '
        ' TODO: Add constructor logic here
        '
        Public Sub New()
        End Sub
        Public Shared Function GetConnectionString() As String
            'string con = ConfigurationManager.ConnectionStrings["BNILOSVIN_CONN_STRING"].ToString();
            Dim con As String = ConfigurationManager.AppSettings("CR_CONSTR").ToString()
            Return con
        End Function
        Public Shared Function Getwebsite_name() As String
            'string con = ConfigurationManager.ConnectionStrings["BNILOSVIN_CONN_STRING"].ToString();
            Dim con As String = ConfigurationManager.AppSettings("website_name").ToString()
            Return con
        End Function
        Public Shared Function GetCategoryLevel() As String
            Return ConfigurationManager.AppSettings("CATEGORY_LEVEL").ToString()
        End Function
        Public Shared Function GetCommandPrefix(ByVal cmdName As String) As String
            Return ConfigurationManager.AppSettings("CR_COMMAND_PREFIX").ToString() & cmdName
        End Function
        Public Shared Function GetFckEditorSkinpath() As String
            Return ConfigurationManager.AppSettings("CR_FCKEDITOR_SKIN_PATH").ToString()
        End Function
        Public Shared Sub updatenoofvisit(ByVal pagenam As String)
            Try
                Dim objparm As Object() = New Object(1) {}
                objparm(0) = pagenam
                SqlHelper.ExecuteNonQuery(GetConnectionString(), GetCommandPrefix("SP_UPDATE_VISITOR_TRACK"), objparm(0))
            Catch ex As Exception

            End Try

        End Sub

        Public Shared Function StripHTMLTags(ByVal strHTML As String) As String
            'Strips the HTML tags from strHTML
            Dim objRegExp As Regex = New Regex("<(.|\n)+?>")
            Dim strOutPut As String
            '//objRegExp.Global = True
            '//objRegExp.Pattern = "<(.|\n)+?>"

            'Replace all HTML tag matches with the empty string
            strOutPut = objRegExp.Replace(strHTML, "")

            'Replace all < and > with &lt; and &gt;
            strOutPut = strOutPut.Replace("<", "&lt;")
            strOutPut = strOutPut.Replace(">", "&gt;")
            Return strOutPut
        End Function

        Public Shared Sub SetPagerButtonStates(ByVal gridView As GridView, ByVal gvPagerRow As GridViewRow, ByVal page As Page)
            Dim pageIndex As Int16 = gridView.PageIndex
            Dim pageCount As Int16 = gridView.PageCount
            Dim btnFirst As ImageButton = gvPagerRow.FindControl("btnFirst")
            Dim btnPrevious As ImageButton = gvPagerRow.FindControl("btnPrevious")
            Dim btnNext As ImageButton = gvPagerRow.FindControl("btnNext")
            Dim btnLast As ImageButton = gvPagerRow.FindControl("btnLast")
            If pageIndex <= 0 Then
                btnFirst.Enabled = False
                btnPrevious.Enabled = False
                btnFirst.ImageUrl = "images/d_srart.gif"
                btnPrevious.ImageUrl = "images/d_back.gif"
                btnPrevious.Style.Add("cursor", "default")
                btnFirst.Style.Add("cursor", "default")
            Else
                btnFirst.ImageUrl = "images/e_start.gif"
                btnPrevious.ImageUrl = "images/e_back.gif"
                btnFirst.Enabled = True
                btnPrevious.Enabled = True
                btnPrevious.Style.Add("cursor", "hand")
                btnFirst.Style.Add("cursor", "hand")
            End If
            ' = (pageIndex <> 0)
            If pageIndex >= (pageCount - 1) Then
                btnNext.Enabled = False
                btnLast.Enabled = False
                btnNext.ImageUrl = "images/d_next.gif"
                btnLast.ImageUrl = "images/d_end.gif"
                btnNext.Style.Add("cursor", "default")
                btnLast.Style.Add("cursor", "default")

            Else
                btnNext.ImageUrl = "images/e_next.gif"
                btnLast.ImageUrl = "images/e_end.gif"
                btnNext.Enabled = True
                btnLast.Enabled = True
                btnNext.Style.Add("cursor", "hand")
                btnLast.Style.Add("cursor", "hand")
            End If
        End Sub

        Public Shared Function ResizeImage(ByVal SourceImgName As String, ByVal Width As Integer, ByVal Height As Integer, ByVal ResizeImgName As String, ByVal strOutPath As String) As String
            Dim RetImageName As String = ""
            Try
                'create bitmaps
                Dim sourceHeight As Integer
                Dim sourceWidth As Integer
                Dim InputBitmap As System.Drawing.Image = System.Drawing.Image.FromFile(SourceImgName)
                Dim sourceX As Integer = 0
                Dim sourceY As Integer = 0
                Dim destX As Integer = 0
                Dim destY As Integer = 0
                Dim nPercent As Decimal = 0
                Dim nPercentW As Decimal = 0
                Dim nPercentH As Decimal = 0
                Dim strOutPath123 As String = strOutPath

                If strOutPath123.Contains("../Uploads/") Then
                    strOutPath123 = strOutPath123.Replace("../Uploads/", ConfigurationManager.AppSettings("CR_UPLOADS_PHYSICAL_PATH").ToString())
                End If

                Dim strOutputPath As String = strOutPath123
                HttpContext.Current.Cache.Remove(ResizeImgName)
                If HttpContext.Current.Cache(ResizeImgName) Is Nothing Then
                    sourceHeight = InputBitmap.Height
                    sourceWidth = InputBitmap.Width
                    nPercentW = (CDec(Width) / CDec(sourceWidth))
                    nPercentH = (CDec(Height) / CDec(sourceHeight))

                    'if we have to pad the height pad both the top and the bottom
                    'with the difference between the scaled height and the desired height
                    If (nPercentH < nPercentW) Then
                        nPercent = nPercentH
                        destX = CInt((Width - (sourceWidth * nPercent)) / 2)
                    Else
                        nPercent = nPercentW
                        destY = CInt((Height - (sourceHeight * nPercent)) / 2)
                    End If

                    Dim destWidth As Integer = CInt(sourceWidth * nPercent)
                    Dim destHeight As Integer = CInt(sourceHeight * nPercent)

                    Dim bmPhoto As Bitmap = New Bitmap(Width, Height)
                    bmPhoto.SetResolution(InputBitmap.HorizontalResolution, InputBitmap.VerticalResolution)

                    Dim grPhoto As Graphics = Graphics.FromImage(bmPhoto)
                    grPhoto.Clear(Color.White)
                    grPhoto.InterpolationMode = InterpolationMode.HighQualityBicubic

                    grPhoto.DrawImage(InputBitmap, New Rectangle(destX, destY, destWidth, destHeight), New Rectangle(sourceX, sourceY, sourceWidth, sourceHeight), GraphicsUnit.Pixel)
                    grPhoto.Dispose()
                    bmPhoto.Save(strOutputPath + ResizeImgName, System.Drawing.Imaging.ImageFormat.Jpeg)
                    HttpContext.Current.Cache.Insert(ResizeImgName, ResizeImgName)
                End If
                RetImageName = strOutPath + ResizeImgName
            Catch ex As Exception
                RetImageName = ""
            End Try
            Return RetImageName
        End Function
        Public Shared Function GenerateRandomCode() As String
            Dim Random As New Random
            Dim s As String = ""
            Dim i As Integer = 0
            For i = 0 To 3 Step 1
                s = String.Concat(s, Random.Next(10).ToString())
            Next
            Return s

        End Function
        Public Shared Function GenerateImage(ByVal Path As String, ByVal Img_Code As String, ByVal hight As Integer, ByVal width As Integer, ByVal outPath As String) As String
            Dim imgHeight As Integer = 0
            Dim imgWidth As Integer = 0
            Dim strValue As String = ""
            Dim strImgCode As String = Img_Code
            imgWidth = width
            imgHeight = hight
            'Dim originalImage As Bitmap = New Bitmap(Stream.InputStream)
            Dim originalImage As Bitmap = New Bitmap(Path)
            originalImage.Dispose()
            originalImage = New Bitmap(Path)
            Dim newWidth As Integer = imgWidth
            Dim newHeight As Integer = imgHeight
            Dim maxWidth As Integer = originalImage.Width
            Dim maxHeight As Integer = originalImage.Height
            Dim aspectRatio As Double = (CType(originalImage.Width, Double) / CType(originalImage.Height, Double))
            If ((aspectRatio <= 1) _
                        AndAlso (originalImage.Width > maxWidth)) Then
                newWidth = maxWidth
                newHeight = CType(Math.Round((newWidth / aspectRatio)), Integer)
            ElseIf ((aspectRatio > 1) _
                        AndAlso (originalImage.Height > maxHeight)) Then
                newHeight = maxHeight
                newWidth = CType(Math.Round((newHeight * aspectRatio)), Integer)
            End If
            Dim newImage As Bitmap = New Bitmap(originalImage, newWidth, newHeight)
            Dim g As Graphics = Graphics.FromImage(newImage)
            g.InterpolationMode = System.Drawing.Drawing2D.InterpolationMode.HighQualityBilinear
            g.SmoothingMode = SmoothingMode.HighQuality
            g.CompositingQuality = CompositingQuality.HighQuality
            g.DrawImage(originalImage, 0, 0, newImage.Width, newImage.Height)
            originalImage.Dispose()
            originalImage = newImage
            g.Dispose()
            'if (File.Exists(HttpContext.Current.Server.MapPath(Path)))
            '{
            '    File.Delete(Path);
            '}
            originalImage.Save(outPath, ImageFormat.Jpeg)
            Return "hi"
        End Function

    End Class


End Namespace
