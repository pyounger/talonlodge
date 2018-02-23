<?php
 if($_POST['lodge_account_ID'] == 7){

          $directory = "Talon Lodge & Spa - Alaska Fishing Resort";

    }else if($_POST['lodge_account_ID'] == 185){
           $directory = "The Bluff House at Talon Lodge"; 
        }

    $url = 'http://www.magnusadventures.com/magnus/app/public/byoa/ma_Contact_Log_Inquiry_Edit.asp';
    $post = array(
        
        'directory_name' => $directory, 
        'directory_email' => 'phil@talonlodge.com',
        'ocdTFaccount_id' => '7',
        'package_name' => $_POST['Package_Name'],
        'ocdTFpartner' => '',
        'pms_package_id' => $_POST['Pms_Package_ID'],
        'arrival_date' => $_POST['Arrival_Start_Date'],
        'Num_Adults' => $_POST['Num_Adults'],
        'UnitPrice' => $_POST['Adult_Cost'],
        'lodge_phone' =>"800-536-1864",
        'ocdTFFirst_Name' =>$_POST['firstName'],
        'ocdTFLast_Name' => $_POST['lastName'],
        'ocdTFemail' => $_POST['email'],
        'ocdTFphone' => $_POST['phone'],
        'ocdTFcomments' => $_POST['comments'],

        'acount_id' => $_POST['lodge_account_ID'],
        'ocdEditSave' => 'True',
        'ocdEditSave.X' => '74',
        'ocdEditSave.Y' => '13',
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    $post_string = array();
    foreach ($post as $key => $value)
        $post_string[] = sprintf('%s=%s', $key, urlencode($value));
    $post_string = implode('&', $post_string);
	$_SESSION["post_string"] =  $post_string;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec ($ch);
    curl_close ($ch);
    
    $pos = strpos($response, '<h1>Object Moved</h1>');
    $result = $pos !== false;
    if ($result)
    {

    }


?>