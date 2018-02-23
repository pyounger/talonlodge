 /*****************************************************************************************************************
	Purpose:	Script file for common client side validation functions, required for front end validations
	Script:		Javascript	
******************************************************************************************************************/
/*----------------------------------------------------------------------------------------------------------------
	Function:	cmpare_datevalue(dtLow,dtHigh)
	Purpose:	function to compare two date values																 
	Inputs:		dtLow		string		parameter holding the smaller date value to compare					 
				dtHigh		string		parameter holding the larger date value to compare					 
	Returns:	true/false	boolean		parameter returning true or false for output value					 
 ---------------------------------------------------------------------------------------------------------------*/
function cmpare_datevalue(dtLow,dtHigh){
	var dtParm_Low=ChangeFormatDD2MM(dtLow)			//converting date format to mm/dd/yyyy
	var dtParm_High=ChangeFormatDD2MM(dtHigh)		//converting date format to mm/dd/yyyy
	
   	if (Date.parse(dtParm_Low) <= Date.parse(dtParm_High)) {
		return true;
	}
	else {
		alert("To Date Value Less Than From Date")
		return false
	}
}
function CompareValues(FormName,LabelName,FieldName){
	
	var FieldRef=eval("document." + FormName +"." + FieldName);
	var FieldValue=FieldRef.value
	FieldValue=LTrim(RTrim(FieldValue))
	var LabelRef=eval("document." + FormName +"." + LabelName);
	var LabelValue=LabelRef.value
	LabelValue=LTrim(RTrim(LabelValue))
	if(FieldValue!=LabelValue)
	{
	    return false
	}
	return true
	
}
function CheckUKPostCode(FormName,LabelName,FieldName){ //check postcode format is valid
	var FieldRef=eval("document." + FormName +"." + FieldName);
	var FieldValue=FieldRef.value
	FieldValue=LTrim(RTrim(FieldValue))
	
	
		//MsgRef.value = LabelName + " Must Be Entered!"
		eval("document." + FormName +"." + FieldName + ".focus()")
	
 test = FieldValue; size = test.length
 test = test.toUpperCase(); //Change to uppercase
 while (test.slice(0,1) == " ") //Strip leading spaces
  {test = test.substr(1,size-1);size = test.length
  }
 while(test.slice(size-1,size)== " ") //Strip trailing spaces
  {test = test.substr(0,size-1);size = test.length
  }
 FieldRef.value = test; //write back to form field
 if (size < 6 || size > 8){ //Code length rule
	alert(LabelName + " is not a valid postcode - wrong length.");  
  FieldRef.focus();
  return false;
  }
 if (!(isNaN(test.charAt(0)))){ //leftmost character must be alpha character rule
	alert(LabelName + " is not a valid postcode - cannot start with a number");
   FieldRef.focus();
   return false;
  }
 if (isNaN(test.charAt(size-3))){ //first character of inward code must be numeric rule
 alert(LabelName + " is not a valid postcode - alpha character in wrong position");   
   FieldRef.focus();
   return false;
  }
 if (!(isNaN(test.charAt(size-2)))){ //second character of inward code must be alpha rule
 alert(LabelName + " is not a valid postcode - number in wrong position");   
   FieldRef.focus();
   return false;
  }
 if (!(isNaN(test.charAt(size-1)))){ //third character of inward code must be alpha rule
 alert(LabelName + " is not a valid postcode - number in wrong position");
   
   FieldRef.focus();
   return false;
  }
 if (!(test.charAt(size-4) == " ")){//space in position length-3 rule
 alert(LabelName + " is not a valid postcode - no space or space in wrong position");
   
   FieldRef.focus();
   return false;
   }
 count1 = test.indexOf(" ");count2 = test.lastIndexOf(" ");
 if (count1 != count2){//only one space rule
 alert(LabelName + " is not a valid postcode - only one space allowed");   
   FieldRef.focus();
   return false;
  }

return true;
}
/*----------------------------------------------------------------------------------------------------------------
Function for check for dropdownListStatus
Function:	Check DropDownStatus(FieldValue,FieldName)
Purpose:	function to check if any item selected from dropdown or not
Inputs:		FormName 	string 		Parameter containing name of the form
LabelName	string 		Label of field on which validation is applied
FieldName 	string 		Name of field on which this validatuon is applied.
Returns:	true/false	boolean		Parameter returning true or false for output value
----------------------------------------------------------------------------------------------------------------*/
function CheckForDropdownListStatus(FormName, LabelName, FieldName, DropDownFieldValue) {
    var FieldRef = eval("document." + FormName + "." + FieldName);

    var FieldValue = FieldRef.value
    FieldValue = LTrim(RTrim(FieldValue))

    var MsgRef = eval("document." + FormName + ".txtMessage");


    if (FieldValue == DropDownFieldValue) {
        alert(LabelName + " must be Selected !");
        //MsgRef.value = LabelName + " Must Be Selected!"
        eval("document." + FormName + "." + FieldName + ".focus()")
        return false;
    }
    else {

        FieldRef.value = FieldValue
        return true;
    }
}

/*----------------------------------------------------------------------------------------------------------------
	Function:	ChangeFormatDD2MM(SuppliedDate)
	Purpose:	function chnages the date format from dd/mm/yyyy to mm/dd/yyyy
	Returns:	converted date
 ---------------------------------------------------------------------------------------------------------------*/
function ChangeFormatDD2MM(SuppliedDate)
{
	DateReversed = SuppliedDate;
	/* Getting Day Part*/
	if (SuppliedDate.charAt(1) == '/')
		DatePart = SuppliedDate.substring(0,1);
	else {
		if (SuppliedDate.charAt(2) == '/')	{
			DatePart = SuppliedDate.substring(0,2);
		}
	}

	/* Getting Month Part*/
	if (DatePart.length==2)	{	
		if (SuppliedDate.charAt(4) == '/') {   
			position=5;
			MonthPart = SuppliedDate.substring(3,4);
		}
		else {
			if (SuppliedDate.charAt(5) == '/') {	
				position=6;
				MonthPart = SuppliedDate.substring(3,5);
			}
		}
	}
	else {	
		if (SuppliedDate.charAt(4) == '/') {	
			position=5;
			MonthPart = SuppliedDate.substring(2,4);
		}
		else {
			if (SuppliedDate.charAt(3) == '/') {	 
				position=4;
				MonthPart = SuppliedDate.substring(2,3);
			}
		}
	}
		
	/* Getting Year Part*/
	YearPart=SuppliedDate.substring(position,SuppliedDate.length);
	DateReversed = MonthPart + "/" + DatePart + "/" + YearPart
	return DateReversed;
}
/*----------------------------------------------------------------------------------------------------------------
	Function:	AddListItem(strInputValue,strInputText,objFrmName,objSelFieldName)
	Purpose:	function to add new item in the list box
	Inputs:		strInputValue	string		parameter holding the value for option
			strInputText	string		parameter holding the display text for option
			objFrmName	string		parameter holding the name of the form
			objSelFieldName	string		parameter holding the name of selection that gets populated
	Returns:	true/false	boolean		parameter returning true or false for output value

 ---------------------------------------------------------------------------------------------------------------*/

function AddListItem(strInputValue,strInputText,objFrmName,objSelFieldName) {

	if(strInputValue.length > 0) {
		var OselRef=eval("document." + objFrmName + "." + objSelFieldName)
		var ONewOption=document.createElement("Option")
		OselRef.add(ONewOption)
		var OptRef=OselRef.item(OselRef.length-1)
		OptRef.text=strInputText
		OptRef.value=strInputValue
		return true;
	}
	else {
		alert("Please Update Value To Be Added In List")
		return false;
	}	
}


/*----------------------------------------------------------------------------------------------------------------
	Function:	RemoveListItem(objFrmName,objSelFieldName)
	Purpose:	function to add new item in the list box
	Inputs:		objFrmName	string		parameter holding the name of the form
			objSelFieldName	string		parameter holding the name of selection that gets populated
	Returns:	true/false	boolean		parameter returning true or false for output value
 ---------------------------------------------------------------------------------------------------------------*/
function RemoveListItem(objFrmName,objSelFieldName) {
	var LIndex=0
	var OselRef=eval("document." + objFrmName + "." + objSelFieldName)
	var OExistOption=document.createElement("Option")
	LIndex=OselRef.selectedIndex
	if (LIndex>=0) {
		OselRef.remove(LIndex)
		return true;
	}
	else{
		return false;
	}
   }


/*----------------------------------------------------------------------------------------------------------------
	Function:	object_changestate(frmName,objName,selMode)
	Purpose:	function to enable or disable html object
	Inputs:		frmName		string		parameter holding the form name of the html object
				objName		string		parameter holding the name of the html object
				selMode		string		parameter holding sigle character value e:enable, d:disable
	Returns:	-				
 ---------------------------------------------------------------------------------------------------------------*/
function object_changestate(frmName,objName,selMode) {
	var objSel=eval("document."+ frmName + "." + objName)
	if (selMode.toLowerCase()=="e") {
		objSel.disabled=false
	}
	if (selMode.toLowerCase()=="d") {
		objSel.disabled=true
	}
}


/*----------------------------------------------------------------------------------------------------------------
	Function:	object_changestate(frmName,chk1Name,chk2Name,cmdPrint,selName)
	Purpose:	function to enable or disable html object
	Inputs:		frmName		string		parameter holding the form name of the html object
				chk1Name	string		parameter holding the name of first check box object
				chk2Name	string		parameter holding the name of second check box object
				cmdPrint	string		parameter holding the name of print report button
				selName		string		parameter holding the name of printer selection box
	Returns:	-				
 ---------------------------------------------------------------------------------------------------------------*/

function print_consent(frmName,chk1Name,chk2Name,cmdPrint,selName) {
	if ((eval("document."+ frmName + "." + chk1Name + ".checked")==true) && (eval("document."+ frmName + "." + chk2Name + ".checked")==true)) {
		var objSel=eval("document."+ frmName + "." + selName)
		var objPrint=eval("document."+ frmName + "." + cmdPrint)
		objSel.disabled=false
		objPrint.disabled=false
	}
	else{
		var objSel=eval("document."+ frmName + "." + selName)
		var objPrint=eval("document."+ frmName + "." + cmdPrint)
		objSel.disabled=true
		objPrint.disabled=true
	} 
}


/*----------------------------------------------------------------------------------------------------------------
	Function:	reload_page(strPagePath)
	Purpose:	function to reload the required page
	Inputs:		strPagePath	string		parameter holding the path and name of page to refresh
	Returns:	-
 ---------------------------------------------------------------------------------------------------------------*/
function reload_page(strPagePath)
 {
	window.location.href=strPagePath
}



/*----------------------------------------------------------------------------------------------------------------
	Function:	CheckNull(FieldValue,FieldName)
	Purpose:	function to Check Null Value
	Inputs:		FormName 	string 		Parameter containing name of the form
			LabelName	string 		Label of field on which validation is applied
			FieldName 	string 		Name of field on which this validatuon is applied.
	Returns:	true/false	boolean		Parameter returning true or false for output value
 ---------------------------------------------------------------------------------------------------------------*/
function CheckForNull(FormName,LabelName,FieldName){
	var FieldRef=eval("document." + FormName +"." + FieldName);
	var FieldValue=FieldRef.value
	FieldValue=LTrim(RTrim(FieldValue))
	var MsgRef = eval("document." + FormName +".txtMessage");
	var counter=0

	if(parseInt(FieldValue.length) < 1)	{ 
		alert(LabelName + " must be entered.");
		//MsgRef.value = LabelName + " Must Be Entered!"
		eval("document." + FormName +"." + FieldName + ".focus()")
		return false;
	}
	else{
		//Check Spaces in String 
		for (LintCount=0;LintCount<=parseInt(FieldValue.length);LintCount++)
		{
			//If Space Found
			if(FieldValue.charAt(LintCount)==' ')
			{
				counter=counter+1
			}
		}
		//If Total Number of Spaces Equal to Total Length of String Then Return False
		if(parseInt(counter)==parseInt(FieldValue.length))
		{
			alert(LabelName + " must be entered.");
			//MsgRef.value = LabelName + " Must Be Entered!"
			FieldRef.value=''
			eval("document." + FormName +"." + FieldName + ".focus()")
			return false;
		}
		else
		{
			
			FieldRef.value=FieldValue
			return true;
		}
	    }
}

function CheckForNullWithoutFocus(FormName,LabelName,FieldName){
	var FieldRef=eval("document." + FormName +"." + FieldName);
	var FieldValue=FieldRef.value
	FieldValue=LTrim(RTrim(FieldValue))
	var MsgRef = eval("document." + FormName +".txtMessage");
	var counter=0

	if(parseInt(FieldValue.length) < 1)	{ 
		alert(LabelName + " must be entered.");
		//MsgRef.value = LabelName + " Must Be Entered!"
		//eval("document." + FormName +"." + FieldName + ".focus()")
		return false;
	}
	else{
		//Check Spaces in String 
		for (LintCount=0;LintCount<=parseInt(FieldValue.length);LintCount++)
		{
			//If Space Found
			if(FieldValue.charAt(LintCount)==' ')
			{
				counter=counter+1
			}
		}
		//If Total Number of Spaces Equal to Total Length of String Then Return False
		if(parseInt(counter)==parseInt(FieldValue.length))
		{
			alert(LabelName + " must be entered.");
			//MsgRef.value = LabelName + " Must Be Entered!"
			FieldRef.value=''
			//eval("document." + FormName +"." + FieldName + ".focus()")
			return false;
		}
		else
		{
			
			FieldRef.value=FieldValue
			return true;
		}
	    }
}

/*----------------------------------------------------------------------------------------------------------------
	Function:	CheckIsNumber(FormName,LabelName,FieldName)
	Purpose:	For Checking Integer........for fields where only numerics are required
	Inputs:		FormName	string 		Parameter containing name of the form
				LabelName	string 		Parameter containing Label name to display in message
				FieldName	string 		Parameter containing Name of field for validatuon
	Returns:	true / false
-----------------------------------------------------------------------------------------------------------------*/
function CheckIsNumber(FormName,LabelName,FieldName) {
	var FieldRef=eval("document." + FormName +"." + FieldName);
	if(isNaN(FieldRef.value)) {
		alert (" Numeric values allowed in "+ LabelName +" Field");
		FieldRef.value="";
		if(FieldRef.style.display != "none")
			FieldRef.focus();
		return false;
	}
	else {
		return true;
	}
}


/*----------------------------------------------------------------------------------------------------------------
	Function:	open_childwin(strVirtualPath,intWidth,intHeight,strTitle)
	Purpose:	Function to open a new child window
	Inputs:		strVirtualPath	string		Parameter holding the virtual path of file to load
			intWidth	Integer		Parameter for pop up window width
			intHeight	Integer		Parameter for pop up window height
			strTitle	string		Parameter holding the title for child window
	Returns:	hndWin		boolean		Parameter returning handle to child window opened
 ---------------------------------------------------------------------------------------------------------------*/
function open_childwin(strVirtualPath,intWidth,intHeight,strTitle){
//	var LstrPath=strVirtualPath

	var strFormtString= "'toolbar=no,scrollbars=yes,height=" + intHeight + ",width=" + intWidth + ",top=100,left=100'"
	window.child=window.open('',"winPreview",strFormtString)
	window.child.document.open("text/html");
	window.child.document.writeln("<DIV STYLE='position:absolute;left:100;top:200;font-Family:Sans-Serif;font-Size:18pt;visibility:show;'><CENTER><IMG SRC='images/POPUP.GIF' alt='POPUP' border='0' align=bottom ><br><FONT COLOR='green'><B>Loading....</B></FONT></CENTER></DIV>")
	window.child.document.close();
	window.child.location.href=strVirtualPath
//	hndWin=window.open(LstrPath,"winPreview",strFormtString)
//	hndWin.document.title=strTitle
//	return hndWin
}

/*----------------------------------------------------------------------------------------------------------------
	Function:	OpenCalender(FORMNAME,FIELDNAME)
	Purpose:	function to open a calender
	Inputs:		FORMNAME	string		Parameter containing name of the form
			FIELDNAME	string		Parameter containing field name to set  text
	Returns:	-
 ---------------------------------------------------------------------------------------------------------------*/
function OpenCalender(FORMNAME,FIELDNAME) {
	if (!window.child || window.child.close) {
		window.child = window.open("","child","menubar=no,toolbar=0,resizable=no,scrollbars=no,status=0, alwaysraised=yes,titlebar=YES, height=250, width=300, top=100, left=500");
		window.child.document.open("text/html");
		window.child.document.writeln('<DIV STYLE="position:absolute;left:200;top:200;font-Family:Sans-Serif;font-Size:18pt;visibility:show;"><CENTER><IMG SRC="../images/POPUP.GIF" alt="POPUP" border="0" align=bottom ><br><FONT COLOR="green"><B>Loading....</B></FONT></CENTER></DIV>');
		window.child.document.close();
		window.child.focus();	
		window.child.location.href = "ASPCalendar.asp?FORMNAME="+FORMNAME+"&NAME="+FIELDNAME
	}
}



/*----------------------------------------------------------------------------------------------------------------
	Function:	CheckDate(FormName,FieldName)
	Purpose:	Used For Date Validations
	Inputs:		FormName	string		Parameter containing form name
			FieldName	string		Parameter containing field name
	Returns:	true/false	boolean		Parameter returning true or false for output value
 ---------------------------------------------------------------------------------------------------------------*/
function CheckDate(FormName,FieldName)
{	
	var j=0;
	var intCheck=0;
	var intDay=""; intMonth=""; intYear="";
	var ArrDate=new Array();
	var arrMonthDays = new Array(31,29,31,30,31,30,31,31,30,31,30,31);
	var strDate=eval("document." + FormName +"." + FieldName + ".value");
	var strlen=strDate.length;
	var strTempString=""
	var strTempDate=""
	//Concatinating 0 in begning in case value of lenght 1
	if((strlen >= 8) && (strlen <= 9))	{
		strDate=strDate+"/"
		for (var i=0; i<=strlen; i++) {
	      	if(!(strDate.charAt(i) == "/")) {
		  		strTempString=strTempString + strDate.charAt(i)
	     	}
			else {
				if (strTempString.length < 2) {
					strTempString="0" + strTempString
					if (strTempDate.length < 1) {strTempDate=strTempString }
					else {strTempDate=strTempDate + "/" + strTempString	}	
					strTempString=""
				}	
				else {
					if (strTempDate.length < 1) {strTempDate=strTempString}
					else {strTempDate=strTempDate + "/" + strTempString	}	
					strTempString=""
				}	
			}	
		}
		strDate=strTempDate
	}

	strlen=strDate.length;
	if((strlen >= 8) && (strlen <= 10))	{
		for (var i=0; i<=strlen; i++) {
	      		if(!(strDate.charAt(i) == "/")) {
		  			ArrDate[j]=strDate.charAt(i)
		  			j=j+1
	     		}
				else {
					intCheck=intCheck+1;
				}
	  	}
	  	
	  	//****Check For two '//' in the date enterd
	  	
	 	if(intCheck !=2) {  
	 		alert("Invalid Date Format")
			eval("document." + FormName +"." + FieldName + ".focus()");
			return false;
		}
		intMon=ArrDate[0] + ArrDate[1];
		intDay=ArrDate[2] + ArrDate[3];
		intYear=ArrDate[4] + ArrDate[5] + ArrDate[6] + ArrDate[7];
		if(isNaN(intDay)==false){
			if(isNaN(intMon)==false){
				if(isNaN(intYear)==false){
					//*****************Check for Zero in Days
					if(intDay=='00'){
						alert("Invalid Number Of Days");
						eval("document." + FormName +"." + FieldName + ".focus()");
						return false;
					}
					//*****************Check for Zero in Month
					if(intMon=='00'){
						alert("Invalid Number Of Months");
						eval("document." + FormName +"." + FieldName + ".focus()");
						return false;
					}
					if(intYear == "0000"){
						alert("Invalid Year");
						eval("document." + FormName +"." + FieldName + ".focus()");
						return false;	
					}
					if(parseInt(intYear.length) != 4){
						alert("Invalid Year");
						eval("document." + FormName +"." + FieldName + ".focus()");
						return false;	
					}
					//*****************Coparing months with days
					if(parseInt(intDay) > arrMonthDays[parseInt(intMon-1)]) {
	    				alert("Invalid Number Of Days");
	    				eval("document." + FormName +"." + FieldName + ".focus()");
						return false;
					}
					else {
	 					if(intMon > 12) {
		  					alert("Invalid Month")
							eval("document." + FormName +"." + FieldName + ".focus()");
							return false;
 						}
						else {
							if(intMon==2) {
								if(intYear%4==0 || intYear%400==0) {
									if(intDay>29) {
				  						alert("Day can't be greater than 29 in February for a leap year");
										eval("document." + FormName +"." + FieldName + ".focus()");
										return false;	
									}	
								}
			 					else{
									if(intDay>28){
				    					alert("Day can't be greater than 28 in February");
	           		   					eval("document." + FormName +"." + FieldName + ".focus()");
				    					return false;
									}
                 				}
							}
						}		
					}
				}
				else {
					alert("Character/s Not Allowed.");
					eval("document." + FormName +"." + FieldName + ".focus()");
					return false;	
				}		
			}
			else {
				alert("Character/s Not Allowed.");
				eval("document." + FormName +"." + FieldName + ".focus()");
				return false;	
			}	
		}
		else {
			alert("Character/s Not Allowed.");
			eval("document." + FormName +"." + FieldName + ".focus()");
			return false;	
		}	
	}
	else {
		alert("Invalid Date Format.");
		eval("document." + FormName +"." + FieldName + ".focus()");
		return false;	
	}
}

/*---------------------------------------------------------------------------------------------------------------
	Function:	MinMax(FormName,LabelName,FieldName,MinVal,MaxVal)
	Purpose:	function to check for minimum and maximum length of a  feild
	Inputs:		FormName	string	 	parameter holding the name of the form
			LabelName	string	 	parameter holding message display text
			FieldName	string	 	parameter holding the name of the text field
			MinVal		integer	 	parameter holding the minimum allowed length
			MaxVal		integer	 	parameter holding the maximum allowed length
	Returns:	true/false	boolean		parameter returning true or false for output value
--------------------------------------------------------------------------------------------------------------*/
function MinMax(FormName,LabelName,FieldName,MinVal,MaxVal)
{
	var FieldRef=eval("document." + FormName +"." + FieldName);
	var FieldValue=FieldRef.value
	if(FieldValue.length > parseInt(MaxVal))
	{
		alert(LabelName +" 's Length Can't Be Greater Than " + MaxVal);	
		if(FieldRef.style.display != "none")
		FieldRef.focus();
		return false;
	}
	else {
		if(FieldValue.length < parseInt(MinVal)) {	
			alert(LabelName +" Length Can't Be Less Than " + MinVal);
			if(FieldRef.style.display != "none")
			FieldRef.focus();
			return false;
		}
		else {
			return true;
		}
	}
}



/*----------------------------------------------------------------------------------------------------------------
	Function:	FormatListView(FieldValue,intMaxDisplayLength)
	Purpose:	Function to format a display string with required truncation or number of spaces
	Inputs:		FieldValue	  	string	The Value enterd in the field
			intMaxDisplayLength  	string	The Display Length of the value in the field
	Returns:	Formatted o/p string
 ---------------------------------------------------------------------------------------------------------------*/
function FormatListView(FieldValue,intMaxDisplayLength)
{
	var LoopCounter=0
	var strSpaceString=""
	var Vallength=0
	Vallength=FieldValue.length;
	strTruncatedValue=""

	if(Vallength >= intMaxDisplayLength) {
		strTruncatedValue=FieldValue.substr(0,intMaxDisplayLength);
		return strTruncatedValue
	}
	else {
		LoopCounter=15
		for(intCount=0;intCount<=LoopCounter;intCount++) {
			strSpaceString=strSpaceString+ " "
		}
		FieldValue=FieldValue+strSpaceString;
		return FieldValue;
	}
}

/*---------------------------------------------------------------------------------------------------------------
	Function:	MinMaxValue(FormName,LabelName,FieldName,MinVal,MaxVal)
	Purpose:	function to check for minimum and maximum value of a  feild
	Inputs:		FormName	string	 	parameter holding the name of the form
			LabelName	string	 	parameter holding message display text
			FieldName	string	 	parameter holding the name of the text field
			MinVal		integer	 	parameter holding the minimum allowed value
			MaxVal		integer	 	parameter holding the maximum allowed value
	Returns:	true/false	boolean		parameter returning true or false for output value
--------------------------------------------------------------------------------------------------------------*/

function MinMaxValue(FormName,LabelName,FieldName,MinVal,MaxVal){
	var FieldRef=eval("document." + FormName +"." + FieldName);
	var FieldValue=parseFloat(FieldRef.value)
	if(FieldValue > parseFloat(MaxVal))
	{
		alert(LabelName + " Value Can't Be Greater Than " + MaxVal);	
		if(FieldRef.style.display != "none")
		FieldRef.focus();
		return false;
	}
	else {
		if(FieldValue < parseFloat(MinVal)) {	
			alert(LabelName + " Value Can't Be Less Than " + MinVal);
			if(FieldRef.style.display != "none")
			FieldRef.focus();
			return false;
		}
		else {
			return true;
		}
	}
}

/*---------------------------------------------------------------------------------------------------------------
	Function:	MinMaxVal(FormName,LabelName,FieldName,MaxVal)
	Purpose:	Function to check for maximum value enterd
	Inputs:		FormName	string	 	parameter holding the name of the form
			LabelName	string	 	parameter holding message display text
			FieldName	string	 	parameter holding the name of the text field
			MaxVal		integer	 	parameter holding the maximum allowed Value
	Returns:	true/false	boolean		parameter returning true or false for output value
--------------------------------------------------------------------------------------------------------------*/
function MinMaxVal(FormName,LabelName,FieldName,MaxVal){
	var FlieldRef=eval("document." + FormName +"." + FieldName);
	if((parseFloat(FlieldRef.value) > parseFloat(MaxVal)) || (parseFloat(FlieldRef.value) < 0 )) {
		alert(LabelName +" Value Should Be Between 0 To " + MaxVal);
		if(FieldRef.style.display != "none")
		FlieldRef.focus();
		return false;
	}
	else {
		return true;
	}

}


function CompareDates(ADtLowerDate,AStrLowerDateLabel,ADtHigherDate,AStrHigherDateLabel,AChrMsgStatus){
   //var LDtLowerDate = ChangeFormatDD2MM(ADtLowerDate)	        //converting date format to mm/dd/yyyy
   //var LDtHigherDate = ChangeFormatDD2MM(ADtHigherDate)      //converting date format to mm/dd/yyyy
   var LStrAlertMessage

   if(AChrMsgStatus.toUpperCase() == 'L'){
	LStrAlertMessage = AStrLowerDateLabel + ' Must Not Exceed ' + AStrHigherDateLabel
   }
   else{
	LStrAlertMessage = AStrHigherDateLabel + ' Must Not Be Less Than ' + AStrLowerDateLabel
   	}
   	if (Date.parse(ADtLowerDate.value) <= Date.parse(ADtHigherDate.value)) {
	return true;
   }
   else {
//         alert(LStrAlertMessage)
       alert(Date.parse(ADtLowerDate))
       alert(Date.parse(ADtHigherDate))
       
	return false
	}
}

/*---------------------------------------------------------------------------------------------------------------
	Function:	ChkAll()
	Purpose:	Function to check and uncheck all the checkboxes
	Inputs:		AIntUbound      integer         parameter holding no. of checkboxes starting from 0
	Returns:	None
--------------------------------------------------------------------------------------------------------------*/
function ChkAll(AIntUbound){
	var iCtr
	var strVal
	var LIntUbound = parseInt(AIntUbound)+1

	if(document.forms(0).chkSelectAll.checked == false){
		for(iCtr=1;iCtr<=parseInt(LIntUbound);iCtr++){
			strVal = eval("document.forms(0).chkName" + iCtr)
			strVal.checked=false
		}
		return true;
	}
	else{
		if(document.forms(0).chkSelectAll.checked == true){
			for(iCtr=1;iCtr<=parseInt(LIntUbound);iCtr++){
				strVal = eval("document.forms(0).chkName" + iCtr)
				strVal.checked=true
			}
			return true;
		}				
	}
}


function ChkSelectAll(CheckBoxControl) {		
    if (CheckBoxControl.checked == true) {
       var i;

        for (i=0; i < document.forms[0].elements.length; i++) {
            if ((document.forms[0].elements[i].type == 'checkbox') && (document.forms[0].elements[i].name.indexOf('GrdData') > -1)) {					
				if (document.forms[0].elements[i].disabled==false)
				{
	                document.forms[0].elements[i].checked = true;
				}
            }
        }
    } 
    
    else {
        
        var i;
        
        for (i=0; i < document.forms[0].elements.length; i++) {
            
            if ((document.forms[0].elements[i].type == 'checkbox') && (document.forms[0].elements[i].name.indexOf('GrdData') > -1)) {
                
                document.forms[0].elements[i].checked = false;
            }
        }
    }
}

/*---------------------------------------------------------------------------------------------------------------
	Function:	RadioBtnOnClick()
	Purpose:	Function to close the LOV window and display the selected value in the textbox
	Inputs:		AStrFormName      	String         parameter holding form name
			AStrSelFieldName	String	       parameter holding field name
			AStrSelFieldValue	String	       parameter holding field value
	Returns:	None
--------------------------------------------------------------------------------------------------------------*/
function RadioBtnOnClick(AStrFormName,AStrSelFieldName,AStrSelFieldValue){
	var ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + AStrSelFieldName)
	ParentFieldRef.value = AStrSelFieldValue
	
	window.close()
	ParentFieldRef.focus()
}

/*---------------------------------------------------------------------------------------------------------------
	Function:	RadioBtnOnClick_Local()
	Purpose:	Function to close the LOV window and display the selected value in the textbox
	Inputs:		AStrFormName      	String         parameter holding form name
			AStrSelFieldName	String	       parameter holding field name
			AStrSelFieldValue	String	       parameter holding field value
			AChrDelim		String	       parameter holding delimiter
	Returns:	None
--------------------------------------------------------------------------------------------------------------*/

function RadioBtnOnClick_LOV(AStrFileName,AStrSelFieldValue,AChrStatus){
	document.location.href = AStrFileName + "?pageloadstatus=reload&fieldvalue=" + AStrSelFieldValue + "&lov_status=" + AChrStatus
}

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------
	Function:	openLOV()
	Purpose:	Function to open the LOV window and send the required inputs in the form of query string to be used by "ViewListOfValues()" function
	Inputs:		AIntSqlNo		Integer	       parameter holding SQL Key No
			AStrFormName      	String         parameter holding form name
			AStrSelFieldName	String	       parameter holding field name
			AStrSelFieldValue	String	       parameter holding field value
			AStrTitle		String	       parameter holding title of the Child window
	Returns:	None
-----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function openLOV(AIntSqlNo,AStrFormName,AStrSelFieldName,AStrSelFieldValue,AStrTitle){
	var LStrInput = "ASPLOV.asp?sqlno=" + AIntSqlNo + "&frmname=" + AStrFormName + "&fieldname=" + AStrSelFieldName + "&fieldvalue=" + FilterProcess(AStrSelFieldValue,'~')
	open_childwin(LStrInput,'600','525',AStrTitle)
}


function OnLOVSearchClick(AIntSqlNo,AStrFormName,AStrSelFieldName,AStrSelFieldValue,AStrSearchFieldName,AStrSearchFieldValue){
	var LStrFieldName
	var LStrFieldValue
	
	if(CheckForNull('frmLoanM','Search On','cmbSearch')==false) return false;
	
	if(CheckForNull('frmLoanM','Search Value','txtSearch')==true){
		if(AbortNonRequiredCharacters('frmLoanM','txtSearch','`~!@#$%^&*()+{};:,<>?|','Search Value Must Be Valid !')==false) return false;
	}
	else{
		return false;
	}
	
	if(parseInt(AStrSearchFieldName.length) < 1){
		LStrFieldName = document.frmLoanM.cmbSearch.value;
		LStrFieldValue = LTrim(RTrim(document.frmLoanM.txtSearch.value));
	}
	else{
		LStrFieldName = AStrSearchFieldName + "~" + document.frmLoanM.cmbSearch.value;
		LStrFieldValue = AStrSearchFieldValue + "~" + LTrim(RTrim(document.frmLoanM.txtSearch.value));
	}
	document.location.href = "ASPLOV.asp?search=ON&sqlno=" + AIntSqlNo + "&frmname=" + AStrFormName + "&fieldname=" + AStrSelFieldName + "&fieldvalue=" + FilterProcess(AStrSelFieldValue,'~') + "&searchfieldname=" + FilterProcess(LStrFieldName,'~|^') + "&searchfieldvalue=" + FilterProcess(LStrFieldValue,'~')
}


function OnLOVClearSearchClick(AIntSqlNo,AStrFormName,AStrSelFieldName,AStrSelFieldValue){
	document.location.href = "ASPLOV.asp?sqlno=" + AIntSqlNo + "&frmname=" + AStrFormName + "&fieldname=" + AStrSelFieldName + "&fieldvalue=" + FilterProcess(AStrSelFieldValue,'~')
}

function OnKeyDownLOVSearchClick(){
	if(event.keyCode == 13){
		return false;
	}
	else{
		return true;
	}
}

function OnViewLOVSearchClick(AIntSqlNo,AStrFileName,AStrFormName,AStrSelFieldName,AStrSelFieldValue,AStrSearchFieldName,AStrSearchFieldValue,AStrLOVStatus){
	var LStrFieldName
	var LStrFieldValue
	
	if(CheckForNull('frmLoanM','Search On','cmbSearch')==false) return false;
	
	if(CheckForNull('frmLoanM','Search Value','txtSearch')==true){
		if(AbortNonRequiredCharacters('frmLoanM','txtSearch','`~!@#$%^&*()+{};:,<>?|','Search Value Must Be Valid !')==false) return false;
	}
	else{
		return false;
	}

	if(parseInt(AStrSearchFieldName.length) < 1){
		LStrFieldName = document.frmLoanM.cmbSearch.value;
		LStrFieldValue = LTrim(RTrim(document.frmLoanM.txtSearch.value));
	}
	else{
		LStrFieldName = AStrSearchFieldName + "~" + document.frmLoanM.cmbSearch.value;
		LStrFieldValue = AStrSearchFieldValue + "~" + LTrim(RTrim(document.frmLoanM.txtSearch.value));
	}

	document.location.href = AStrFileName + "?search=ON&sqlno=" + AIntSqlNo + "&frmname=" + AStrFormName + "&fieldname=" + AStrSelFieldName + "&fieldvalue=" + FilterProcess(AStrSelFieldValue,'~') + "&searchfieldname=" + FilterProcess(LStrFieldName,"~|^") + "&searchfieldvalue=" + FilterProcess(LStrFieldValue,'~') + "&lov_status=" + AStrLOVStatus
}


function OnViewLOVClearSearchClick(AIntSqlNo,AStrFileName,AStrFormName,AStrSelFieldName,AStrSelFieldValue,AStrLOVStatus){
	document.location.href = AStrFileName + "?sqlno=" + AIntSqlNo + "&frmname=" + AStrFormName + "&fieldname=" + AStrSelFieldName + "&fieldvalue=" + FilterProcess(AStrSelFieldValue,'~') + "&lov_status=" + AStrLOVStatus
}

function LOV_OnLoad(AStrPageLoadStatus,AStrFormName,AStrSelFieldName,AStrSelFieldValue,AChrDelim){
	if(AStrPageLoadStatus != ''){
		var ParentFieldRef
		var LArrSelFieldName = AStrSelFieldName.split(AChrDelim)
		var LArrSelFieldValue = AStrSelFieldValue.split(AChrDelim)

		if(LArrSelFieldName.length==LArrSelFieldValue.length){
			for(var LIntCtr=0;LIntCtr<LArrSelFieldName.length;LIntCtr++){
				ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + LArrSelFieldName[LIntCtr])
				ParentFieldRef.value = ''
				if(LIntCtr > 0) ParentFieldRef.readOnly=true
			}
			
			for(LIntCtr=0;LIntCtr<LArrSelFieldName.length;LIntCtr++){
				ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + LArrSelFieldName[LIntCtr])
				ParentFieldRef.value = LArrSelFieldValue[LIntCtr]
			}
		}
		ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + LArrSelFieldName[0])
		window.close()
		ParentFieldRef.focus()
	}
}


function LOVRadioBtn_OnClick(AStrFormName,AStrSelFieldName,AStrSelFieldValue,AChrDelim){
	var ParentFieldRef
	var LArrSelFieldName = AStrSelFieldName.split(AChrDelim)
	var LArrSelFieldValue = AStrSelFieldValue.split(AChrDelim)

	if(LArrSelFieldName.length==LArrSelFieldValue.length){		
		for(var LIntCtr=0;LIntCtr<LArrSelFieldName.length;LIntCtr++){
			ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + LArrSelFieldName[LIntCtr])
			ParentFieldRef.value = ''
			if(LIntCtr > 0) ParentFieldRef.readOnly=true
		}

		for(LIntCtr=0;LIntCtr<LArrSelFieldName.length;LIntCtr++){
			ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + LArrSelFieldName[LIntCtr])
			ParentFieldRef.value = LArrSelFieldValue[LIntCtr]
		}
	}
	ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + LArrSelFieldName[0])
	window.close()
	ParentFieldRef.focus()

}

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------
	Function:	submitPage()
	Purpose:	function to submit the page accordib=ng to generate or print condition
	Inputs:		strMode                 String	       parameter holding mode G(generate),or P(Print)
			StrFileName   	        String         parameter holding current file name
			
	Returns:	None
-----------------------------------------------------------------------------------------------------------------------------------------------------------------*/


function submitPage(strMode,strFilename) {
	var Path=strFilename + "?State=A&Mode=" + strMode
	document.forms[0].action=Path
}


//============================================= made by Ajinder============================================

/*----------------------------------------------------------------------------------------------------------------
	Function:	CheckIsText(FormName,LabelName,FieldName)
	Purpose:	For Checking Integer........for fields where only text is required
	Inputs:		FormName	string 		Parameter containing name of the form
				LabelName	string 		Parameter containing Label name to display in message
				FieldName	string 		Parameter containing Name of field for validatuon
	Returns:	true / false
-----------------------------------------------------------------------------------------------------------------*/
function CheckIsText(FormName,LabelName,FieldName) {
	var FieldRef=eval("document." + FormName +"." + FieldName);
	
	if(isNaN(FieldRef.value)) {
		return true;
	}
	else {
		alert (" Numeric values are not allowed in "+ LabelName +" Field");
		FieldRef.value="";
		FieldRef.focus();
		return false;


	}
}

/*---------------------------------------------------------------------------------------------------------------
	Function:	MinVal(FormName,LabelName,FieldName,MinVal)
	Purpose:	Function to check for maximum value enterd
	Inputs:		FormName	string	 	parameter holding the name of the form
			LabelName	string	 	parameter holding message display text
			FieldName	string	 	parameter holding the name of the text field
			MinVal		integer	 	parameter holding the minimum allowed Value
	Returns:	true/false	boolean		parameter returning true or false for output value
--------------------------------------------------------------------------------------------------------------*/
function MinVal(FormName,LabelName,FieldName,MinVal){
	var FlieldRef=eval("document." + FormName +"." + FieldName);
	if(parseFloat(FlieldRef.value) < MinVal ) {
		alert(LabelName + " Must Not Be Less Than " + MinVal);
		FlieldRef.value=""
		if(FlieldRef.style.display != "none")
			FlieldRef.focus();
		return false;
	}
	else {
		return true;
	}

}

/*----------------------------------------------------------------------------------------------------------------
	Function:	setStatus(FieldLength,FieldType,Example)
	Purpose:	function to display text in the status window of the browser
	Inputs:		FieldLength		string		Field length defining maximum value for the field
				FieldType		string		Field data type (Text, Number, Decimal)
				Example			string		Text describing small example value
 ---------------------------------------------------------------------------------------------------------------*/
	function setStatus(FieldLength,FieldType,Example) {
		window.status="LENGTH: " + FieldLength + "      TYPE: " + FieldType + "      Eg. " + Example
	}
	
/*----------------------------------------------------------------------------------------------------------------
	Function:	clearStatus(StatusText)
	Purpose:	function to clear text set in the status window
	Inputs:		StatusText		string		Replacement string to be set 
 ---------------------------------------------------------------------------------------------------------------*/
	function clearStatus(StatusText) {
		window.status=StatusText
	}

function LTrim(AStrInputString){
	var LIntCtr
	var LStrOutputString
	LStrOutputString = ""
	for(LIntCtr=0; LIntCtr < AStrInputString.length; LIntCtr++){
		if(AStrInputString.charAt(LIntCtr) != ' '){
			return AStrInputString.substring(LIntCtr);
		}
	}
	return LStrOutputString;
}
	
function RTrim(AStrInputString){
	var LIntCtr
	var LStrOutputString
	LStrOutputString = ""
	for(LIntCtr=AStrInputString.length -1; LIntCtr>=0; LIntCtr--){
		if(AStrInputString.charAt(LIntCtr) != ' '){
			return AStrInputString.substring(0,LIntCtr+1);
		}
	}
	return LStrOutputString;
}

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------
	Function:	FilterProcess()
	Purpose:	Returns an output string after filtering out invalid characters
	Inputs:		AStrInputString	               -   S : Input String from which invalid characters are to filtered out
			AStrAllowedSpecialCharacters   -   S : A String of Invalid Characters which are not to be filtered out from the Input String
 ------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function FilterProcess(AStrInputString,AStrAllowedSpecialCharacters){
	var LStrInvalidString
	var LStrFilteredInvalidString
	var LChrInputString
	var LStrOutputFilteredString
	var LIntCtr
	AStrInputString = LTrim(RTrim(AStrInputString))

	if(AStrAllowedSpecialCharacters.length > 0){
		LStrInvalidString = "`~!@#$%^&*?|'"
		LStrFilteredInvalidString = ""
		for(LIntCtr = 0; LIntCtr < LStrInvalidString.length; LIntCtr++){
			LChrInputString = LStrInvalidString.charAt(LIntCtr)
			if(AStrAllowedSpecialCharacters.indexOf(LChrInputString) == -1) LStrFilteredInvalidString = LStrFilteredInvalidString + LChrInputString
		}
		
		LStrOutputFilteredString = ""
		for(LIntCtr = 0; LIntCtr < AStrInputString.length; LIntCtr++){
			LChrInputString = AStrInputString.charAt(LIntCtr)
			if(LStrFilteredInvalidString.indexOf(LChrInputString) == -1) LStrOutputFilteredString = LStrOutputFilteredString + LChrInputString
		}	
	}
	else{
		LStrInvalidString = "`~!@#$%^&*?|'"
		LStrOutputFilteredString = ""
		for(LIntCtr = 0; LIntCtr < AStrInputString.length; LIntCtr++){
			LChrInputString = AStrInputString.charAt(LIntCtr)
			if(LStrInvalidString.indexOf(LChrInputString) == -1) LStrOutputFilteredString = LStrOutputFilteredString + LChrInputString
		}
	}
	return LStrOutputFilteredString;
}


/*----------------------------------------------------------------------------------------------------------------
	Function:	AbortNonRequiredCharacters()
	Purpose:	function to check for non-required characters in the text value
	Inputs:		AStrFormName	   string	 	parameter holding the name of the form			
			AStrTextFieldName  string	 	parameter holding the name of the text field			
			AStrInValidString  string  	        parameter holding the non-required string of characters
			AStrMessage 	   string	 	parameter holding message display text
	Returns:	true/false	boolean			parameter returning true or false for output value
 ---------------------------------------------------------------------------------------------------------------*/

	function AbortNonRequiredCharacters(AStrFormName,AStrTextFieldName,AStrInValidString,AStrMessage){
		var LIntCtr
		var LStrTextFieldRef
		var LStrTextFieldValue
		LStrTextFieldRef = eval("document." + AStrFormName + "." + AStrTextFieldName)
		LStrTextFieldValue = LStrTextFieldRef.value
		
		if (LStrTextFieldValue.indexOf("'") != -1 || LStrTextFieldValue.indexOf('"') != -1){
			alert(AStrMessage)
			LStrTextFieldRef.focus()
			return false;
		}
		
		for(LIntCtr=0; LIntCtr < LStrTextFieldValue.length; LIntCtr++){
			LChrTextFieldValue = LStrTextFieldValue.charAt(LIntCtr)
			if (AStrInValidString.indexOf(LChrTextFieldValue) != -1){
				alert(AStrMessage)
				LStrTextFieldRef.focus()
				return false;
			}
		}
		
		return true;
	}

function AbortNonRequiredCharactersForAdmin(AStrFormName,AStrTextFieldName,AStrInValidString,AStrMessage){
		var LIntCtr
		var LStrTextFieldRef
		var LStrTextFieldValue
		LStrTextFieldRef = eval("document." + AStrFormName + "." + AStrTextFieldName)
		LStrTextFieldValue = LStrTextFieldRef.value
		
		/*	if (LStrTextFieldValue.indexOf("'") != -1 || LStrTextFieldValue.indexOf('"') != -1){
			alert(AStrMessage)
			LStrTextFieldRef.focus()
			return false;
		}*/
		
		for(LIntCtr=0; LIntCtr < LStrTextFieldValue.length; LIntCtr++){
			LChrTextFieldValue = LStrTextFieldValue.charAt(LIntCtr)
			if (AStrInValidString.indexOf(LChrTextFieldValue) != -1){
				alert(AStrMessage)
				LStrTextFieldRef.focus()
				return false;
			}
		}
		
		return true;
	}

	function CheckEmail(AStrFormName,AStrTextFieldName){
		var LIntCtr
		var LStrTextFieldRef
		var LStrTextFieldValue
		var LStrSubTextFieldValue
		var LIntAtTheRatePosition
		var LIntDotPosition
		var LIntEmailLength
		var LIntSubEmailLength
		var LArrTextFieldValue
		
		LStrTextFieldRef = eval("document." + AStrFormName + "." + AStrTextFieldName)
		LStrTextFieldValue = LTrim(RTrim(LStrTextFieldRef.value));
		LIntEmailLength = LStrTextFieldValue.length;

		if(parseInt(LIntEmailLength) < 1){
			alert('Email Must Be Entered !');
			LStrTextFieldRef.focus();
			return false;
		}
		LIntAtTheRatePosition = LStrTextFieldValue.indexOf("@");
		if(parseInt(LIntAtTheRatePosition) < 1){
			alert('Email Must Be Valid !');
			LStrTextFieldRef.select();
			return false;
		}
		LArrTextFieldValue = LStrTextFieldValue.split("@");
		LStrSubTextFieldValue = LArrTextFieldValue[1];
		LIntSubEmailLength = LStrSubTextFieldValue.length;
		if(parseInt(LIntSubEmailLength) < 4){
			alert('Email Must Be Valid !');
			LStrTextFieldRef.select();
			return false;
		}
		LIntDotPosition = LStrSubTextFieldValue.indexOf(".")
		if(parseInt(LIntDotPosition) < 1){
			alert('Email Must Be Valid !');
			LStrTextFieldRef.select();
			return false;
		}
		return true;
	}				

/*----------------------------------------------------------------------------------------------------------------
	Function:	AbortInValidCharacters()
	Purpose:	function to disable the entry of invalid characters through keyboard
	Inputs:		AStrInValidString  string  	        parameter holding the invalid string of characters
	Returns:	true/false	boolean			parameter returning true or false for output value
 ---------------------------------------------------------------------------------------------------------------*/

	function AbortInValidCharacters(AStrInValidString){
		var LIntCtr
		var LIntAsciiCode

		for(LIntCtr=0; LIntCtr < AStrInValidString.length; LIntCtr++){
			LIntAsciiCode = parseInt(AStrInValidString.charCodeAt(LIntCtr))
			if(event.keyCode == LIntAsciiCode) return false;			    
		}
		if(event.keyCode == 34 || event.keyCode == 39 || event.keyCode == 92) return false;
					
		return true;
	}
	
	function AbortInValidCharactersWithoutQuote(AStrInValidString){
		var LIntCtr
		var LIntAsciiCode

		for(LIntCtr=0; LIntCtr < AStrInValidString.length; LIntCtr++){
			LIntAsciiCode = parseInt(AStrInValidString.charCodeAt(LIntCtr))
			if(event.keyCode == LIntAsciiCode) return false;			    
		}
		if(event.keyCode == 39 || event.keyCode == 92) return false;
					
		return true;
	}


/*--------------------------------------------------------------------------------------------------------------------------------------------------
	Function:	DateFormat()
	Purpose:	function to convert the date of the form of mm/dd/yyyy into the proper format i.e. dd/mm/yyyy and vice-verca
	Inputs:		ADtDate			-       Date : date in any format
			AChrStatus		-	S : converts into dd/mm/yyyy if it is "D" and into mm/dd/yyyy if it is "M"
	Returns:	Formatted Date in "dd/mm/yyyy" form if AChrStatus = "D" / "mm/dd/yyyy" form if AChrStatus = "M"
 ---------------------------------------------------------------------------------------------------------------------------------------------------*/

	function DateFormat(ADtDate,AChrStatus){
			return ADtDate
	}
/*----------------------------------------------------------------------------------------------------------------
	Function:	checkSpecialChar(StatusText)
	Purpose:	function to check for special characters in the text value
	Inputs:		StatusText		string		Replacement string to be set 
 ---------------------------------------------------------------------------------------------------------------*/
	function checkSpecialChar(StatusText) {
		if (!(StatusText.indexOf('#') == -1)) {
			return false;
		} //For checking #
		if(!(StatusText.indexOf('+')==-1)) {
			return false;
		} //For checking +
		if(!(StatusText.indexOf('*')==-1)) {
			return false;
		} //For checking *
		if(!(StatusText.indexOf('&')==-1)) {
			return false;
		} //For checking &
		if(!(StatusText.indexOf('=')==-1)) {
			return false;
		} //For checking =
		if(!(StatusText.indexOf('?')==-1)) {
			return false;
		} //For checking ?
		if(!(StatusText.indexOf('%')==-1)) {
			return false;
		} //For checking %
		if(!(StatusText.indexOf("'")==-1)) {
			return false;
		} //For checking '
		return true;
	}
/*----------------------------------------------------------------------------------------------------------------
	Function	:	CurrencyFormat(AStrFormName,AStrTextFieldName,AStrFormatParameter,AMaxValue)
	Purpose		:	Function to convert Amount into Comma Format and vice versa
	Inputs		:	AStrFormName 		String
				AStrTextFieldName	String
				AStrFormatParameter	String		'F' for Formatting the currency amount
									'U' for UnFormatting the currency amount
----------------------------------------------------------------------------------------------------------------*/
	function CurrencyFormat(AStrLabelName,AStrFormName,AStrTextFieldName,AStrFormatParameter,AMinValue,AMaxValue)
	{
		var LStrTextFieldRef
		var LStrTextFieldValue
		var FieldValue
		var LStrDecimalPart
		var i

		LStrTextFieldRef = eval("document." + AStrFormName + "." + AStrTextFieldName)
		LStrTextFieldValue = LStrTextFieldRef.value
		for(i=0; i < LStrTextFieldValue.length; i++){ 	
			LStrTextFieldValue=replaceComma(LStrTextFieldValue,' ');
		}
		
		/* Function called on the click of "Save" button */
		if(AStrFormatParameter.toUpperCase()=='S'){
	  		for(i=0; i < LStrTextFieldValue.length; i++){
				LStrTextFieldValue=replaceComma(LStrTextFieldValue,',');
			}
			if(isNaN(LStrTextFieldValue)){
				alert("Numeric values allowed in " + AStrLabelName + " Field !");
				LStrTextFieldRef.value="";
				LStrTextFieldRef.focus();
				return false;
	  		}
			FieldValue=parseFloat(LStrTextFieldValue)				
			if(FieldValue > parseFloat(AMaxValue)){	
				alert(AStrLabelName + " Value Can't Be Greater Than " + AMaxValue);
				LStrTextFieldRef.focus();
				return false;
			}
			if(FieldValue < parseFloat(AMinValue)){
				alert(AStrLabelName + " Value Can't Be Less Than " + AMinValue);
				LStrTextFieldRef.focus();
				return false;
			}
			return true;	
		}
		
		/* Function called for formatting the currency amount according to Indian standards */
		if(AStrFormatParameter.toUpperCase()=='F'){
	  		for(i=0; i < LStrTextFieldValue.length; i++){
				LStrTextFieldValue=replaceComma(LStrTextFieldValue,',');
			}
			if(LStrTextFieldValue.length==0){
				LStrTextFieldRef.value="";
				return true;
	  		}
			if(isNaN(LStrTextFieldValue)){
				return false;	
			}
			LStrTextFieldValue=(Math.round(LStrTextFieldValue*100)/100).toString()
	  		LstrDotPos=LStrTextFieldValue.indexOf(".")
	    		if(LstrDotPos==-1){
				LStrTextFieldValue=LStrTextFieldValue + ".00"
	    		}
			else{
				LStrDecimalPart = LStrTextFieldValue.substring(parseInt(LstrDotPos) + 1)
				if (LStrDecimalPart.length == 1){
					LStrTextFieldValue = LStrTextFieldValue + "0"
				}
			}
	   		var NumValue = LStrTextFieldValue.substring(0, LStrTextFieldValue.indexOf("."));
	  		for(i=0; i <= NumValue.length; i++){ 	
				NumValue=replaceComma(NumValue,' ');
			}
			if(NumValue.length==0){
				NumValue=0;
			}
	   		if(NumValue.length > 3){
	   			var tempStr = LStrTextFieldValue.substring(LStrTextFieldValue.indexOf("."),LStrTextFieldValue.length);
	   			tempStr = ","+ NumValue.substring((NumValue.length-3),NumValue.length) + tempStr
	   			var remStr= NumValue.length-3;
	   			var k=0;
	   			for (var i=1; i < remStr+1;i++){	   			
	     				tempStr = NumValue.charAt(remStr-i) + tempStr;
	     				if ((k == 2) && (i < remStr)){	     			
						tempStr = "," + tempStr;
						k = 0;
	     				}  
	     				k++;
         	 		}
				LStrTextFieldRef.value='$'+tempStr;
				return true;
	    		}
	    		else{
				LStrTextFieldRef.value='$'+LStrTextFieldValue;
				return true;
			}
		}	
		else{
	  		for(i=0; i < LStrTextFieldValue.length; i++){
				LStrTextFieldValue=replaceComma(LStrTextFieldValue,',');
			}
			LStrTextFieldRef.value=replaceComma(LStrTextFieldValue,'$');
			LStrTextFieldRef.select();
			return true;
	    	}
	}
/*----------------------------------------------------------------------------------------------------------------
	function to Replace Comma's Called In LOOP
----------------------------------------------------------------------------------------------------------------*/
	function replaceComma(AStrTextFieldValue,strRepChar){
		RetValue=AStrTextFieldValue.replace(strRepChar,"");
		return RetValue;
	}


/*----------------------------------------------------------------------------------------------------------------
	function to Remove Currency Format to Normal
	Parameter 	AstrValue 	Input Value(In Currency Format)
	Return 		AstrValue	Value WithOut Comma's	
----------------------------------------------------------------------------------------------------------------*/
function RemoveCurrFormat(AstrValue)
{
	var intCount;
	for (intCount=0;intCount < AstrValue.length;intCount++){
		AstrValue=AstrValue.replace(",","");
		AstrValue=AstrValue.replace("$","");
	}
	return AstrValue;
}			
/*----------------------------------------------------------------------------------------------------------------
	LOCAL function To add villages as per Block In Loan Deferment
----------------------------------------------------------------------------------------------------------------*/
function LOVRadioBtn_OnClick_Local(AStrFormName,AStrSelFieldName,AStrSelFieldValue,AChrDelim,AStrVillageValue,AStrVillageName){
	var ParentFieldRef
	var LArrSelFieldName = AStrSelFieldName.split(AChrDelim)
	var LArrSelFieldValue = AStrSelFieldValue.split(AChrDelim)
	if(LArrSelFieldName.length==LArrSelFieldValue.length){		
		for(var LIntCtr=0;LIntCtr<LArrSelFieldName.length;LIntCtr++){
			ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + LArrSelFieldName[LIntCtr])
			ParentFieldRef.value = ''
			if(LIntCtr > 0) ParentFieldRef.readOnly=true
		}

		for(LIntCtr=0;LIntCtr<LArrSelFieldName.length;LIntCtr++){
			ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + LArrSelFieldName[LIntCtr])
			ParentFieldRef.value = LArrSelFieldValue[LIntCtr]
		}
		window.opener.document.frmLoanM.txtBlockVillageName.value = 	AStrVillageName;
		window.opener.document.frmLoanM.txtBlockVillageValue.value = 	AStrVillageValue;
	}
	ParentFieldRef = eval("window.opener.document." + AStrFormName + "." + LArrSelFieldName[0])
	window.close()
	ParentFieldRef.focus()

}

/*----------------------------------------------------------------------------------------------------------------
	LOCAL function To Check the Max Lenth and Set focus to next field
	By Devinder Kumar
	Dated 10th, Oct 2004.
----------------------------------------------------------------------------------------------------------------*/

function CheckMaxChar(LMaxLength,LVar,LVar1)
	{
		
		var LValue = eval("document.frmPage."+LVar).value;
		var LValueLength = LValue.length
		if (LValueLength == LMaxLength)
		{
			eval("document.frmPage."+LVar1).focus();
			eval("document.frmPage."+LVar1).select;	
		}
	}	

/*----------------------------------------------------------------------------------------------------------------
	Maturity Value of Investment of Recurring Deposit on Quarterly compounded Interest.
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	M =R [ (1+i)n – 1]
			--------------------    
			1- (1+i) -1/3 

	M = Maturity value 
	R = Monthly installment 
	n = Number of quarters 
	i = Rate of interest/400 
	ReturnType = "HTML/TEXT"
	Using toRound(figure)
	
	By Devinder Kumar
	Dated 22th, Oct 2004.
----------------------------------------------------------------------------------------------------------------*/
	
function CalculateMaturityValue(TxtInstalment,TxtInterest,DropQuarter,ReturnType)
{	
	
	var i=TxtInterest/400;
	var a=1+i;
	a=Math.pow(a,DropQuarter);
	a=a-1;
	a=TxtInstalment*a;
	var b=1+i;
	b=Math.pow(b,-1/3);
	b=1-b;
	var maturity=a/b;
	var interest=maturity-TxtInstalment*DropQuarter*3;
	if(ReturnType=="HTML"){
		return toRound(maturity)+" ( Total Deposit: "+toRound(TxtInstalment*DropQuarter*3)+" & Interest: "+toRound(interest)+")";
	}
	else
	{
		return toRound(maturity)+"~~"+toRound(TxtInstalment*DropQuarter*3)+"~~"+toRound(interest);
	}	
}

function toRound(figure)
{
   return NewCurrencyFormat(Math.round(figure*10000)* 0.0001,'F',0,15)
}	

function  ReturnYears(LValueMonths,ReturnType){
	var LNewValue = LValueMonths/12;
	LNewValue = LNewValue+".00"
	var LArr = LNewValue.split('.')
	if(ReturnType=="HTML"){
		return LArr[0]+" Years & "+ (LValueMonths - (LArr[0]*12))+" Months ";
	}
	else
	{
		return LArr[0]+"~~"+(LValueMonths - (LArr[0]*12))+" Months ";
	}
}

/*----------------------------------------------------------------------------------------------------------------
	New Refined Function for Changing Currency format of Passed value and return the value. 
	Function	:	NewCurrencyFormat(LStrTextFieldValue,AStrFormatParameter,AMinValue,AMaxValue)
	Purpose		:	Function to convert Amount into Comma Format and vice versa
	Inputs		:	AStrFormName 		String
				AStrTextFieldName	String
				AStrFormatParameter	String		'F' for Formatting the currency amount
									'U' for UnFormatting the currency amount
	By Devinder Kumar
	Dated 25th July 2004.
----------------------------------------------------------------------------------------------------------------*/


function NewCurrencyFormat(LStrTextFieldValue,AStrFormatParameter,AMinValue,AMaxValue)
	{
		var LStrTextFieldValue
		var FieldValue
		var LStrDecimalPart
		var i
		for(i=0; i < LStrTextFieldValue.length; i++){ 	
			LStrTextFieldValue=replaceComma(LStrTextFieldValue,' ');
		}
		
		/* Function called on the click of "Save" button */
		if(AStrFormatParameter.toUpperCase()=='S'){
	  		for(i=0; i < LStrTextFieldValue.length; i++){
				LStrTextFieldValue=replaceComma(LStrTextFieldValue,',');
			}
			if(isNaN(LStrTextFieldValue)){
				alert("Numeric values allowed in " + AStrLabelName + " Field !");
				return false;
	  		}
			FieldValue=parseFloat(LStrTextFieldValue)				
			if(FieldValue > parseFloat(AMaxValue)){	
				alert(AStrLabelName + " Value Can't Be Greater Than " + AMaxValue);
				return false;
			}
			if(FieldValue < parseFloat(AMinValue)){
				alert(AStrLabelName + " Value Can't Be Less Than " + AMinValue);
				return false;
			}
			return true;	
		}
		
		/* Function called for formatting the currency amount according to Indian standards */
		if(AStrFormatParameter.toUpperCase()=='F'){
	  		for(i=0; i < LStrTextFieldValue.length; i++){
				LStrTextFieldValue=replaceComma(LStrTextFieldValue,',');
			}
			if(LStrTextFieldValue.length==0){
				return true;
	  		}
			if(isNaN(LStrTextFieldValue)){
				return false;	
			}
			LStrTextFieldValue=(Math.round(LStrTextFieldValue*100)/100).toString()
	  		LstrDotPos=LStrTextFieldValue.indexOf(".")
	    		if(LstrDotPos==-1){
				LStrTextFieldValue=LStrTextFieldValue + ".00"
	    		}
			else{
				LStrDecimalPart = LStrTextFieldValue.substring(parseInt(LstrDotPos) + 1)
				if (LStrDecimalPart.length == 1){
					LStrTextFieldValue = LStrTextFieldValue + "0"
				}
			}
	   		var NumValue = LStrTextFieldValue.substring(0, LStrTextFieldValue.indexOf("."));
	  		for(i=0; i <= NumValue.length; i++){ 	
				NumValue=replaceComma(NumValue,' ');
			}
			if(NumValue.length==0){
				NumValue=0;
			}
	   		if(NumValue.length > 3){
	   			var tempStr = LStrTextFieldValue.substring(LStrTextFieldValue.indexOf("."),LStrTextFieldValue.length);
	   			tempStr = ","+ NumValue.substring((NumValue.length-3),NumValue.length) + tempStr
	   			var remStr= NumValue.length-3;
	   			var k=0;
	   			for (var i=1; i < remStr+1;i++){	   			
	     				tempStr = NumValue.charAt(remStr-i) + tempStr;
	     				if ((k == 2) && (i < remStr)){	     			
						tempStr = "," + tempStr;
						k = 0;
	     				}  
	     				k++;
         	 		}
				
				return '$'+tempStr;
	    		}
	    		else{
				
				return '$'+LStrTextFieldValue;
			}
		}	
		else{
	  		for(i=0; i < LStrTextFieldValue.length; i++){
				LStrTextFieldValue=replaceComma(LStrTextFieldValue,',');
			}
			return replaceComma(LStrTextFieldValue,'$');
	    	}
	}
	
		function CheckboxSelection(){
		
				var LIntCtr;
				var LIntSelectedCheckBoxes=0;
				
				for (LIntCtr=0; LIntCtr < document.forms[0].elements.length; LIntCtr++) {
					if ((document.forms[0].elements[LIntCtr].type == 'checkbox') && (document.forms[0].elements[LIntCtr].name.indexOf('chkDataGrid') > -1)) {
						if(document.forms[0].elements[LIntCtr].checked == true){
							LIntSelectedCheckBoxes = parseInt(LIntSelectedCheckBoxes) + 1;
						}
					}
				}
				if(parseInt(LIntSelectedCheckBoxes)==0){
					alert('Record(s) Must Be Selected For Deletion !');
					return false;
				}
				else{
					return window.confirm('Do You Really Want To Delete The Selected Record(s) !');
				}
			}
			function CheckboxSelectiongallery() {

			    var LIntCtr;
			    var LIntSelectedCheckBoxes = 0;

			    for (LIntCtr = 0; LIntCtr < document.forms[0].elements.length; LIntCtr++) {
			        if ((document.forms[0].elements[LIntCtr].type == 'checkbox') && (document.forms[0].elements[LIntCtr].name.indexOf('chkDataGrid') > -1)) {
			            if (document.forms[0].elements[LIntCtr].checked == true) {
			                LIntSelectedCheckBoxes = parseInt(LIntSelectedCheckBoxes) + 1;
			            }
			        }
			    }
			    if (parseInt(LIntSelectedCheckBoxes) == 0) {
			        alert('Record(s) Must Be Selected For publish gallery or presentation !');
			        return false;
			    }
			    else {
			        return window.confirm('Do You Really Want To gallery For Selected Record(s) !');
			    }
			   }
			   function CheckboxSelectionlahaina() {

			   	var LIntCtr;
			   	var LIntSelectedCheckBoxes = 0;

			   	for (LIntCtr = 0; LIntCtr < document.forms[0].elements.length; LIntCtr++) {
			   		if ((document.forms[0].elements[LIntCtr].type == 'checkbox') && (document.forms[0].elements[LIntCtr].name.indexOf('chkDataGrid') > -1)) {
			   			if (document.forms[0].elements[LIntCtr].checked == true) {
			   				LIntSelectedCheckBoxes = parseInt(LIntSelectedCheckBoxes) + 1;
			   			}
			   		}
			   	}
			   	if (parseInt(LIntSelectedCheckBoxes) == 0) {
			   		alert('Record(s) Must Be Selected For publish  presentation !');
			   		return false;
			   	}
			   	else {
			   		return window.confirm('Do You Really Want To publish  presentation For Selected Record(s) !');
			   	}
			   }
			   function CheckboxSelectionlahainaroom() {

			   	var LIntCtr;
			   	var LIntSelectedCheckBoxes = 0;

			   	for (LIntCtr = 0; LIntCtr < document.forms[0].elements.length; LIntCtr++) {
			   		if ((document.forms[0].elements[LIntCtr].type == 'checkbox') && (document.forms[0].elements[LIntCtr].name.indexOf('chkDataGrid1') > -1)) {
			   			if (document.forms[0].elements[LIntCtr].checked == true) {
			   				LIntSelectedCheckBoxes = parseInt(LIntSelectedCheckBoxes) + 1;
			   			}
			   		}
			   	}
			   	if (parseInt(LIntSelectedCheckBoxes) == 0) {
			   		alert('Record(s) Must Be Selected For publish  rooms  presentation !');
			   		return false;
			   	}
			   	else {
			   		return window.confirm('Do You Really Want To publish  rooms  presentation For Selected Record(s) !');
			   	}
			   }
			function CheckboxSelectiongallery123() {

			    var LIntCtr;
			    var LIntSelectedCheckBoxes = 0;

			    for (LIntCtr = 0; LIntCtr < document.forms[0].elements.length; LIntCtr++) {
			        if ((document.forms[0].elements[LIntCtr].type == 'checkbox') && (document.forms[0].elements[LIntCtr].name.indexOf('chkDataGrid') > -1)) {
			            if (document.forms[0].elements[LIntCtr].checked == true) {
			                LIntSelectedCheckBoxes = parseInt(LIntSelectedCheckBoxes) + 1;
			            }
			        }
			    }
			    if (parseInt(LIntSelectedCheckBoxes) == 0) {
			        alert('Record(s) Must Be Selected For publish video gallery !');
			        return false;
			    }
			    else {
			        return window.confirm('Do You Really Want To publish video  gallery For Selected Record(s) !');
			    }
			}
			function CheckboxSelectionForUpdate(){
		
				var LIntCtr;
				var LIntSelectedCheckBoxes=0;
				
				for (LIntCtr=0; LIntCtr < document.forms[0].elements.length; LIntCtr++) {
					if ((document.forms[0].elements[LIntCtr].type == 'checkbox') && (document.forms[0].elements[LIntCtr].name.indexOf('chkDataGrid') > -1)) {
						if(document.forms[0].elements[LIntCtr].checked == true){
							LIntSelectedCheckBoxes = parseInt(LIntSelectedCheckBoxes) + 1;
						}
					}
				}
				if(parseInt(LIntSelectedCheckBoxes)==0){
					alert('Record Must Be Selected For Update !');
					return false;
				}
				else{
					return window.confirm('Do You Really Want To Update The Select Record !');
				}
			}
			
			
			
			function add()
			{
					return window.confirm('You Are Going To Add This Submission! Continue? ');
			
			}
			function decline()
			{
					return window.confirm('Do You Really Want To remove member from Watch List ');
					
			
			}
				function Flag()
			{
					return window.confirm('You are Going to Flag this Response! Continue? ');
			
			}
			function flagreview()
			{
					return window.confirm('You are Going to Flag this Review! Continue?');
			
			}
			function DeleteImage()
			{
					return window.confirm('Are you sure you want to delete this image!');
			
			}
			
			//This is for fck editor for null check
			function Checkfckfornull(FormName,LabelName)
			{
			
			var EditorInstance = FCKeditorAPI.GetInstance(FormName); 
            var contents = EditorInstance.GetXHTML(true); 
     
            //message is name of field to be validate
     
            if(contents=="")
            {
           
            alert(LabelName);
            EditorInstance.EditorDocument.body.focus();
            return false;
            }

        }

        function CheckboxReset() {

            var LIntCtr;
            var LIntSelectedCheckBoxes = 0;

            for (LIntCtr = 0; LIntCtr < document.forms[0].elements.length; LIntCtr++) {
                if ((document.forms[0].elements[LIntCtr].type == 'checkbox') && (document.forms[0].elements[LIntCtr].name.indexOf('chkDataGrid') > -1)) {
                    if (document.forms[0].elements[LIntCtr].checked == true) {
                        LIntSelectedCheckBoxes = parseInt(LIntSelectedCheckBoxes) + 1;
                    }
                }
            }
            if (parseInt(LIntSelectedCheckBoxes) == 0) {
                alert('Record(s) Must Be Selected For Reset !');
                return false;
            }
            else {
                return window.confirm('Do You Really Want To Reset The Selected Record(s) !');
            }
        }