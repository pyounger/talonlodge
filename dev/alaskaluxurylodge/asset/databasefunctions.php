<?php
include("databaseclass.php") ;
class database
{
       
    public $s123; 

function doselect($field,$tablename,$condition,$limit)
{
    $query='';
    if($condition!="")
    {
	$query=" where ".$condition;
    }
        if($limit!="")
    {
	$query=$query." limit ".$limit;
    }
  $select="select ".$field." from ".$tablename.$query ;
 $resource=mysql_query($select);
 return $resource;
}
function doselectassoc($field,$tablename,$condition,$limit)
{
    $query='';
    if($condition!="")
    {
	$query=" where ".$condition;
    }
        if($limit!="")
    {
	$query=$query." limit ".$limit;
    }
 $select="select ".$field." from ".$tablename.$query ;
 $resource=mysql_query($select);
 $result=mysql_fetch_assoc($resource);
 return $result;
}

function dodeletebycondition($tablename,$condition)
{
        if($condition!="")
    {
	$query=" where ".$condition;
    }
      
    $select="delete from ".$tablename.$query ;
 $resource=mysql_query($select);
}
function doalter($tablename,$fieldname,$rename)
{
 
  $select="alter table ".$tablename." change ".$fieldname." ".$rename." int(11)" ;
 $resource=mysql_query($select);
}

function dodeletebyid($tablename,$idname,$idvalue)
{
    $select="delete from ".$tablename." where ".$idname."=".$idvalue;
 $resource=mysql_query($select);
}
function doinsert($tablename,$arrayname)
{
 $result= $this->doseperatebykeyvalue($arrayname,"=",",");
  $select="insert into ".$tablename." set ".$result;
 $resource=mysql_query($select);
}
function doupdatebyid($tablename,$arrayname,$idname,$idvalue)
{
    $result= $this->doseperatebykeyvalue($arrayname,"=",",");
   $select="update ".$tablename." set ".$result." where ".$idname."=".$idvalue;
$resource=mysql_query($select);
}
function getmaxid($tablename,$idname)
{
  
  $select="select max(".$idname.") as maxid from ".$tablename;
 $resource=mysql_query($select);
 $maxidget=mysql_fetch_assoc($resource);
 return $maxidget['maxid'];
}
function doseperatebykeyvalue($arrayname,$equal,$seperatedby)
{
 $arraykey=array_keys($arrayname);
  $arrayvalue=array_values($arrayname);
  $result='';
  for($r=0;$r<count($arrayname);$r++)
  {
    if($r==count($arrayname)-1){$seperatedby="";}
 $result=$result.$arraykey[$r].$equal."'".$arrayvalue[$r]."'".$seperatedby;
 
  }
   
  return $result;
 //$resource=mysql_query($select);
}
function sendemail($to,$subject,$body,$from)
{
    
    

                                  
                                             
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From:'. $from . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$body,$headers);



    
    
}


}
?>