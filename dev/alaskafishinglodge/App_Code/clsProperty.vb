Imports Microsoft.VisualBasic
Imports Microsoft.ApplicationBlocks.Data
Imports System.Data
Imports System.Data.SqlClient
Namespace CR


    Public Class clsProperty
#Region "Declarations"
        Private stUserPropertyId As Integer
        Private stUserPropertyName As String
        Private stIsActive As String

#End Region
#Region "Public Properties"
        Public Property UserPropertyId() As Integer
            Get
                Return stUserPropertyId
            End Get
            Set(ByVal value As Integer)
                stUserPropertyId = value
            End Set
        End Property
        Public Property UserPropertyName() As String
            Get
                Return stUserPropertyName
            End Get
            Set(ByVal value As String)
                stUserPropertyName = value

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
        Public Function AddupdateUserProperty() As String
            Dim objParameter(2) As SqlParameter
            objParameter(2) = New SqlParameter
            objParameter(0) = New SqlParameter("@PropertyName", UserPropertyName)
            objParameter(1) = New SqlParameter("@IsActive", IsActive)
            objParameter(2) = New SqlParameter("@Id", UserPropertyId)

            If UserPropertyId > 0 Then
                SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), CommandType.StoredProcedure, Utility.GetCommandPrefix("SP_ADDUPDATE_USER_Property"), objParameter)
                Return "Record Updated sucessfully"
            Else
                SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), CommandType.StoredProcedure, Utility.GetCommandPrefix("SP_ADDUPDATE_USER_Property"), objParameter)
                Return "Record Added Sucessfully"
            End If

        End Function
        Public Sub changeactive(ByVal ID As Integer, ByVal Pkname As String, ByVal ActiveProperty As String)
            Dim parm1 As Object() = New Object(3) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = ActiveProperty
            parm1(3) = "USER_Property"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_ACTIVE_INACTIVE"), parm1)
        End Sub
        Public Sub DeleteRecords(ByVal ID As String, ByVal Pkname As String)
            Dim parm1 As Object() = New Object(2) {}
            parm1(0) = Pkname
            parm1(1) = ID
            parm1(2) = "USER_Property"
            SqlHelper.ExecuteNonQuery(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_DELETE_RECORDS"), parm1)
        End Sub
        Public Function GetUserProperty(ByVal P_SearchString As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = UserPropertyId
            objParam(1) = P_SearchString
            objParam(2) = ""
            objParam(3) = "USER_Property"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
        Public Function GetPropertyDropDown(ByVal P_SearchString As String) As DataTable
            Dim objParam As Object() = New Object(3) {}
            Dim objDT As DataTable
            objParam(0) = UserPropertyId
            objParam(1) = P_SearchString
            objParam(2) = "Y"
            objParam(3) = "USER_Property"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_GET_LISTINGS"), objParam).Tables(0)
            Dim i As Integer = objDT.Rows.Count
            Return objDT
        End Function
        Public Function checkvalidAddUpdateUserProperty(ByVal UserProperty As String, ByVal ID As String) As DataTable

            If ID = Nothing Then
                ID = "0"
            End If

            Dim objParam As Object() = New Object(1) {}
            Dim objDT As DataTable
            objParam(0) = UserProperty
            objParam(1) = ID
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_USER_Property_FOR_CHECK"), objParam).Tables(0)
            Return objDT
        End Function
        Public Function chkValidDeleteProperty(ByVal ID As String) As DataTable
            Dim objParam As Object() = New Object(1) {}
            Dim objDT As DataTable
            objParam(0) = ID
            objParam(1) = "USER_Property"
            objDT = SqlHelper.ExecuteDataset(Utility.GetConnectionString(), Utility.GetCommandPrefix("SP_CHECK_VALID_DELETE"), objParam).Tables(0)
            Return objDT
        End Function
#End Region
    End Class
End Namespace