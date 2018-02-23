<%@ Page Title="Admin Add Images" Language="VB" MasterPageFile="MasterPage.master" AutoEventWireup="false" CodeFile="AdminAddImages.aspx.vb" Inherits="CR.Admin_AdminAddImages" ValidateRequest ="false" %>

<asp:Content ID="Content1" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">

    <style type="text/css">
.abc1
{
	vertical-align:text-top;
	vertical-align:top;
	text-align:top;
	 
}
</style>
<script type = "text/javascript">
        var counter = 0;
        function AddFileUpload() {
            var div = document.createElement('DIV');
            div.className = "abc1";
//            alert(div.style.border);
            div.innerHTML = '<b>Upload Image</b> :<input id="file' + counter + '" name = "file' + counter + '" type="file" />&nbsp;<b>Description</b> :&nbsp;<textarea rows="7" class="textbox" maxlength="1000" cols="20" id="txtDesc' + counter + '" name = "txtDesc' + counter + '" ></textarea><input id="Button' + counter + '" type="button" value="Remove" onclick = "RemoveFileUpload(this)" class="Button" />';
            document.getElementById("FileUploadContainer").appendChild(div);
            counter++;
        }
        function RemoveFileUpload(div)
        {
             document.getElementById("FileUploadContainer").removeChild(div.parentNode);
         }

         function PageLoad() {


             for (var x = 0; x <= 5; x++) {
                 var div = document.createElement('DIV');
                 div.innerHTML = '<input id="file' + x + '" name = "file' + x + '" type="file" /><input id="Button' + x + '" type="button" value="Remove" onclick = "RemoveFileUpload(this)" class="Button"/>';
                 document.getElementById("FileUploadContainer").appendChild(div);
             }
         }

         function CheckboxSelection() {
                       
             var LIntCtr;
             var LIntSelectedCheckBoxes = 0;

             for (LIntCtr = 0; LIntCtr < document.forms[0].elements.length; LIntCtr++) {
                 if ((document.forms[0].elements[LIntCtr].type == 'file') && (document.forms[0].elements[LIntCtr].name.indexOf('file') > -1)) {
                     if (document.forms[0].elements[LIntCtr].value != '') {
                         LIntSelectedCheckBoxes = parseInt(LIntSelectedCheckBoxes) + 1;
                     }
                 }
             }
             if (parseInt(LIntSelectedCheckBoxes) < 1) {
                 alert('At least 1 Image Must Be Browsed to Upload!');
                 return false;
             }
             else {
                 // return window.confirm('Do You Really Want To Delete The Selected Record(s) !');
             }
             document.getElementById("ctl00_ContentPlaceHolder1_lblloading").style.display = "";
             
         }

</script>
    
          <div  style="width:95%; margin:auto;" align="center" class="TableBorder">
            <div class="RowHeader"> 
                <asp:Label ID="lblHeader" runat="server" Text="Upload Bulk Images"></asp:Label>
                
            </div>
            <div style=" float:none">
                <table cellspacing="2"  cellpadding="0" border="0" align="center" width="100%">
                                <tr>
                                    <td align="center" nowrap colspan="2">
                                    </td>
                                </tr>
                                 <tr>
                                    <td colspan="2" align="center" valign="bottom">
                                    <asp:Label ID="lblloading" style=" display:none;" runat="server" class="TextLabel"  Text="Loading......" ></asp:Label>  
                                    </td>
                                    </tr>
                                    
                                   </table>
            </div>
            <div id = "FileUploadContainer" style="vertical-align:middle;float:none; ">
            </div>
            <div style="background-position:right;padding-left:566px;padding-top:5px;">
            <input id="Button3" type="button" value="Add More..." onclick = "AddFileUpload()" class="Button" />
            </div>
            
            <div style="background-position:center; padding-top:10px; padding-bottom:10px; color:Maroon;">
            <asp:Literal ID="ltrImageSize" runat="server"></asp:Literal>
            </div>
          
            
         
           <div style="float:none;padding:5px;"> 
                <asp:Button ID="btnUpload" runat="server" Text="Upload"  CssClass="Button" OnClientClick="return CheckboxSelection();" />
           </div> 
           </div>
                   
<script type="text/javascript" language="javascript">
    AddFileUpload()
function Button1_onclick() {

}

    </script>
</div>
</div>
</div>
    </div>
</asp:Content>

