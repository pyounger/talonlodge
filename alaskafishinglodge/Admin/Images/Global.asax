<%@ import NameSpace="System.Data"%>
<Script Language="VBScript" Runat="Server">
    Sub Application_OnStart
       Application("TITLE") = "Welcome to Day Dream Decor Website"      
       Application("DDD_CONNECT_STRING") = "server=SQLA29.webcontrolcenter.com;database=ddd_database;uid=ddd_user;pwd=ddd_password;trusted_Connection=No;"
	   Application("IP_ADDRESS") = "216.119.106.140"
       Application("RUN_MODE") = "T"			'(T-->>Test Mode; L-->>Live Mode)
       Application("PAGE_SIZE") = 12			'No. of Records Per Page to be Displayed/
       Application("PAGES_IN_SLOT") = 5	
       Application("SHIPP_COST_TYPE")="O"		'(I -->>Item Wise; O -->> Full Order)
       
       Application("DDD_MAIL_TO") = "info@daydreamdecor.com"
       Application("DDD_MAIL_ID") = "info@daydreamdecor.com"
       'Application("DDD_MAIL_TO") = "gkaur@cogniter.com"
       'Application("DDD_MAIL_ID") = "gkaur@cogniter.com"
       Application("DDD_IMAGE_URL") = "http://63.134.213.202/Images/FullImage/"
       Application("DDD_IMAGE_PATH") = "\"
    End Sub    
    Sub Session_OnStart
        Dim LDtCurrentDate As DateTime
        LDtCurrentDate = DateTime.Now()
        Session("SYSDATE") = LDtCurrentDate.ToString("r")
        Session("INVALID_USER_COUNT") = 0
    End Sub    
    
     Sub Application_BeginRequest
		Try
			Dim ObjDataTableActualLinks As DataTable            		
			Dim LStrSelectStatement As String
			Dim ObjDataRowMatches() As DataRow
			Dim LStrReWriteLink As String
			Dim LStrQueryStringValue As String		
			Dim ObjHTTPContext As HttpContext = HttpContext.Current		
			Dim LStrRequestedURL As String = ObjHTTPContext.Request.Path.ToLower()	
			LStrQueryStringValue=(Request.Querystring).ToString		
			ObjDataTableActualLinks=GetActualLinks()					
			LStrSelectStatement="REWRITE_LINK='" & LStrRequestedURL & "'"						
			ObjDataRowMatches=ObjDataTableActualLinks.Select(LStrSelectStatement, lcase("ACTUAL_LINK"))	
			If ObjDataRowMatches.Length>0 Then						
				Dim ObjRegularExpression As Regex 
				ObjRegularExpression=new Regex("@page(\d+).aspx",RegexOptions.IgnoreCase)
				Dim ObjMatchCollection As MatchCollection = ObjRegularExpression.Matches(LStrRequestedURL)
				If ObjMatchCollection.Count < 1 Then							
					ObjHTTPContext.RewritePath(LStrRequestedURL)
				End If 	
				LStrReWriteLink=ObjDataRowMatches(0)("ACTUAL_LINK")			
				LStrReWriteLink=Request.ApplicationPath & LStrReWriteLink
				LStrReWriteLink=Replace(LStrReWriteLink,"//","/")						
				LStrReWriteLink=Replace(LStrReWriteLink,"~","&")			
				LStrReWriteLink=Right(LStrReWriteLink,Len(LStrReWriteLink)-1)			
				ObjHTTPContext.RewritePath(LStrReWriteLink)			
			End if		
		Catch
		End Try	
    End Sub    
    
    Function GetActualLinks()
		Try
			Dim ObjDataSetActualLinks As DataSet
			Dim ObjDataTableActualLinks As DataTable
			ObjDataTableActualLinks=Context.Cache("ACTUAL_LINK")		
			If ObjDataTableActualLinks Is Nothing Then
				ObjDataSetActualLinks=New DataSet			
				ObjDataSetActualLinks.ReadXML(Server.Mappath("RewriteLinks.xml"))
				ObjDataTableActualLinks=ObjDataSetActualLinks.Tables(0)
				Context.Cache.Insert("ACTUAL_LINK",ObjDataTableActualLinks,New CacheDependency(Server.Mappath("RewriteLinks.xml")))
			End If
			Return ObjDataTableActualLinks
		Catch
		End Try
    End Function        
</Script>
