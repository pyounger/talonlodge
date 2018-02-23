<?php
function getSites($mem_id){
	$rs1 = mysql_query("SELECT site_id, site_title FROM mem_sites WHERE mem_id=".$mem_id);
	if(mysql_num_rows($rs1)>0){
		while($row1=mysql_fetch_object($rs1)){
			$retValue[] = array('site_id'=>$row1->site_id, 'site_name'=>$row1->site_title); 
		}
	}
	else{
		$retValue = array();
	}
	return $retValue;
}

function getCountries(){
	$rs2 = mysql_query("SELECT countries_id, countries_name FROM countries");
	if(mysql_num_rows($rs2)>0){
		while($row2=mysql_fetch_object($rs2)){
			$retValue[] = array('country_id'=>$row2->countries_id, 'country_name'=>$row2->countries_name); 
		}
	}
	return $retValue;
}

?>

