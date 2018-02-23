function getXMLHTTP() 
{ //fuction to return the xml http object
	var xmlhttp=false;	
	try
	{
		xmlhttp=new XMLHttpRequest();
	}
	catch(e)	
	{		
		try
		{			
			xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e)
		{
			try
			{
                		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e1)
			{
				xmlhttp=false;
			}
		}
                }
	return xmlhttp;
	}
function getcommon(strURL,divname) 
	{
	
		
       var req = getXMLHTTP();
    
		if (req) 
		{
			req.onreadystatechange = function()
			 {
				if (req.readyState == 4)
				 {
                                  // only if "OK"
                                  if (req.status == 200)
					{	
document.getElementById(divname).innerHTML=req.responseText;						} 
					else
					{
alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}			
}

///////////////////////////////////////////////////////////////////

function displayaddinstitute()
{
	document.getElementById('tbladdinstitute').style.display="";
document.getElementById('tblviewinstitute').style.display="none";

}

function addtable()
{
	document.getElementById('tbladdinstitute').style.display="";
document.getElementById('tblviewinstitute').style.display="none";

}
function getselecteddate()
{
	return document.getElementById('selectdate').value;
}

//////////////////////////////////////////////////////////////

function fieldblankcat()
{
	document.formcat.field1.value="";
		document.formcat.field2.value="";
		for (var i=0; i < document.formcat.field2.length; i++)
   		{
   			if(document.formcat.field2[i].value==1)
			{
				document.formcat.field2[i].checked="checked";
    		}
   		}
 	displayaddinstitute();
}
////////////////////////////////////////////////////////////

function displayinstitute()
{	
	document.getElementById('tbladdinstitute').style.display="none";
document.getElementById('tblviewinstitute').style.display="";

}
////////////////////////////////////////////////////////////////

function confirm_deletecategory(id)
{
	if (confirm("Are you sure you want to delete the category?")==true)
	{
	location.href="viewcategory.php?task=del&id="+id;
	}
 	else
	{
         return false;
  	}
      return false;
}

function confirm_deletemessages(id)
{
	if (confirm("Are you sure you want to delete the message?")==true)
	{
	location.href="viewmessages.php?task=del&id="+id;
	}
 	else
	{
         return false;
  	}
      return false;
}

/////////////////////////////////////////////////////////////////

