<?php
class App_Controller_Frontend_Reservation extends App_Controller_Base_Frontend
{
    public $errors = array();

    public function action_default()
    {
     $web = $this->request->get('web');
     if($web == ""){
        $this->assign('web', 'notdata');
    }else{
        $this->assign('web', $web);
    }



    $pageid = 70;
    $slideshow = $this->outlet->from('App_Model_Gallery')->where('page_id = ?', array($pageid))->findOne();

    if (!is_null($slideshow))

    {
        $photos = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($slideshow->id))->orderBy('priority ASC')->find();

        $slideshow->photos = $photos;

    }


    $this->assign('web', $web);

    $this->assign('slideshow',$slideshow);


    $adults = $this->request->get('adults');
         $_SESSION["adults"] = $adults;
        $this->assign('adults',$adults);

        /*.........get date to send in calender widget........*/

        $start = $this->request->get('start');
         $_SESSION["start"] = $start;
         
        $this->assign('start',$start);

        $end = $this->request->get('end');
        $_SESSION["end"] = $end;
        $this->assign('end',$end);

}

public function action_update()
{
    $json = file_get_contents('http://www.magnusadventures.com/webservices/talonlodge/packages3.php');
    $json = sprintf('[%s]', $json);
    $json = json_decode($json, true);
        //d($json);

    if (count($json) > 0)
    {

        $this->outlet->query('DELETE FROM {App_Model_Package}');
        foreach ($json as $json_package)
        {
            $package = new App_Model_Package();
            foreach ($json_package as $jsp_key => $jsp_value)
            {
                if ($jsp_key == 'Package_Name')
                {
                    $package->slug = strtolower(str_replace(array(',', '.', '/','&'), array('','','-','and'), str_replace(' ', '-', App_Utils_Common::translit($jsp_value))));
                }
                if (in_array($jsp_key, array('Arrival_Start_Date', 'Arrival_End_Date')))
                {
                    $package->$jsp_key = new Datetime($jsp_value);
                }
                else
                {
                    $package->$jsp_key = $jsp_value;
                }
            }
            $this->outlet->save($package);
        }
           // print_r($package);
    }
        //exit;
}

public function action_view()
{
    /*................slide show.......................*/
    $pageid = 70;
    $slideshow = $this->outlet->from('App_Model_Gallery')->where('page_id = ?', array($pageid))->findOne();
    if (!is_null($slideshow))
    {
        $photos = $this->outlet->from('App_Model_Photo')->where('gallery_id = ?', array($slideshow->id))->orderBy('priority ASC')->find();
        $slideshow->photos = $photos;
    }

    $this->assign('slideshow',$slideshow);
    /*................slide show end....................*/

    /*.........Start packages table details(Parvez)....*/
        $PackageID = $this->request->get('pid');
        $PackageDetail = file_get_contents('http://www.magnusadventures.com/webservices/talonlodge/Packages_Details.php?pid='.$PackageID);
        $PackageDetail = sprintf('[%s]', $PackageDetail);
        $PackageDetail = json_decode($PackageDetail, true);
        $this->assign('PackageDetail', $PackageDetail);

        foreach ($PackageDetail as $value) {

            $sortArrayByRate[] = $value['rate_per_person'];
            asort($sortArrayByRate);
    
        }
        $getFirstElement = reset($sortArrayByRate);
        $getLastElement = end($sortArrayByRate);

        $this->assign('LowestRate', $getFirstElement);
        $this->assign('HighestRate', $getLastElement);

        //......... for previous icon button ..........
        $start = isset($_SESSION["start"]) ? $_SESSION["start"] : "05/01/2018";    
        $end = isset($_SESSION["end"]) ? $_SESSION["end"] : "09/30/2018";
        $sessadults = isset($_SESSION["adults"]) ? $_SESSION["adults"] : 6;  
        $this->assign('start', $start);
        $this->assign('end', $end);
        $this->assign('sessadults', $sessadults);
        //......... for previous icon button end .......
        //exit();

                /*.............for matterport url(Parvez)...........*/
                    $matterport = array(
                       array(
                            "Resource_ID" => 13,                 
                            "Resource_Name" => "Spruce 1",
                            "Matter_Port" => "https://my.matterport.com/show/?m=EgbkVaKAAqM"
                          ),

                        array(
                            "Resource_ID" => 14,                 
                            "Resource_Name" => "Spruce 2",
                            "Matter_Port" => "https://my.matterport.com/show/?m=jQ2j4EMZCH4"
                          ),

                        array(
                            "Resource_ID" => 15,                 
                            "Resource_Name" => "Spruce House",
                            "Matter_Port" => "https://my.matterport.com/show/?m=wXhQcWerQ51"
                          ),

                        array(
                            "Resource_ID" => 16,                 
                            "Resource_Name" => "Cedar 1",
                            "Matter_Port" => "https://my.matterport.com/show/?m=8CkM46J78iy"
                          ),

                        array(
                            "Resource_ID" => 17,                 
                            "Resource_Name" => "Cedar 2",
                            "Matter_Port" => "https://my.matterport.com/show/?m=7r83q7Ufn9P"
                          ),

                        array(
                            "Resource_ID" => 18,                 
                            "Resource_Name" => "Cedar House",
                            "Matter_Port" => "https://my.matterport.com/show/?m=vUZ1nhGshvB"
                          ),

                        array(
                            "Resource_ID" => 19,                 
                            "Resource_Name" => "Bluff House",
                            "Matter_Port" => "https://my.matterport.com/show/?m=BLzioRY5imR"
                          )

                       );

                    $this->assign('MatterPort', $matterport);
                /*.............end matterport url..................*/

             $PackageDetailByID = file_get_contents('http://www.magnusadventures.com/webservices/talonlodge/Packages_Details_ByID.php?pid='.$PackageID);
              $PackageDetailByID = sprintf('[%s]', $PackageDetailByID);
              $PackageDetailByID = json_decode($PackageDetailByID, true);
              foreach ($PackageDetailByID as $value) {
                //echo $value['Package_Includes']; 
                $Package_IncludesByID = explode(';', $value['Package_Includes']);
                $Package_DoesNot_IncludeByID = explode(';', $value['Package_DoesNot_Include']);
                $Package_Details = str_replace("Talon?s","Talon's",$value['Package_Details']);
              }
               $this->assign('Package_Details', $Package_Details);
              $this->assign('Package_IncludesByID', $Package_IncludesByID);
              $this->assign('Package_DoesNot_IncludeByID', $Package_DoesNot_IncludeByID);
              $this->assign('PackageDetailByID', $PackageDetailByID);
            //exit();

        /*............End packages table details..........*/
        $Resources = file_get_contents('http://www.magnusadventures.com/webservices/talonlodge/Resources.php');
        $Resources = sprintf('[%s]', $Resources);

        $Resources = json_decode($Resources, true);
        

        $this->assign('Resources', $Resources);
        $web = $this->request->get('web');
        $adults = $this->request->get('adults');
        $this->assign('web', $web);
        $this->assign('adults', $adults);


        if (($slug = $this->request->param('slug')) !== FALSE && !is_null($package = $this->outlet->from('App_Model_Package')->findOne()))
        {

            $package->Package_Includes = explode(';', $PackageDetailByID[0]['Package_Includes']);
            $package->Package_DoesNot_Include = explode(';', $PackageDetailByID[0]['Package_DoesNot_Include']);

            $Account_ID = $PackageDetailByID[0]['Account_ID'];
            $n = 0;

            foreach ($Resources as $key => $value) {



                   if($value['Account_Id'] == $Account_ID && $n == 0){



                if($value['Pms_Resource_Type_id'] == 1) {

                 $this->assign('Resource_Name',  $value['Resource_Name']);

             }else if($value['Pms_Resource_Type_id'] == 2) {

                 $this->assign('Resource_Name',  $value['Resource_Name']);

             }else if($value['Pms_Resource_Type_id'] == 3) {

                 $this->assign('Resource_Name',  $value['Resource_Name']);

             }else if($value['Pms_Resource_Type_id'] == 4) {

                 $this->assign('Resource_Name',  $value['Resource_Name']);

             }else if($value['Pms_Resource_Type_id'] == 5) {

                 $this->assign('Resource_Name',  $value['Resource_Name']);

             }else if($value['Pms_Resource_Type_id'] == 6) {

                 $this->assign('Resource_Name',  $value['Resource_Name']);

             }else if($value['Pms_Resource_Type_id'] == 7) {

                 $this->assign('Resource_Name',  $value['Resource_Name']);

             }else{

               $this->assign('Resource_Name', 'room'); 

           }

           $n++; 

       }

                

            }
            
            $this->assign('package', $package);

            
            $add = isset($_SESSION['reservation_adults']) ? $_SESSION['reservation_adults'] : $PackageDetailByID[0]['Package_Min_Adults'];
            $this->assign('bipin',$add);

            if (isset($_SESSION['reservation_adults']))
                $this->assign('reservation_adults', $_SESSION['reservation_adults']);

            if ($this->request->is_post)
            {
                $result = false;
                if ($this->_validate())
                {

                    if($PackageDetailByID[0]['Account_ID'] == 7){

                        $directory = "Talon Lodge & Spa - Alaska Fishing Resort";

                    }else{

                        $directory = "The Bluff House at Talon Lodge"; 
                    }


                    $url = 'http://www.magnusadventures.com/magnus/app/public/byoa/ma_Contact_Log_Inquiry_Edit.asp';
                    $post = array(
                        'directory_name' => $directory,
                        'directory_email' => 'phil@talonlodge.com',
                        'ocdTFaccount_id' => '7',
                        'package_name' => $PackageDetailByID[0]['Package_Name'],
                        'ocdTFpartner' => '',
                        'pms_package_id' => $PackageDetailByID[0]['Pms_Package_ID'],
                        'arrival_date' => $PackageDetailByID[0]['Arrival_Start_Date'],
                        'Num_Adults' => isset($_SESSION['adults']) ? $_SESSION['adults'] : $PackageDetailByID[0]['Package_Min_Adults'],
                        'UnitPrice' => $PackageDetailByID[0]['Adult_Cost'],
                        'lodge_phone' =>"800-536-1864",
                        'ocdTFFirst_Name' => $this->request->post('firstName'),
                        'ocdTFLast_Name' => $this->request->post('lastName'),
                        'ocdTFemail' => $this->request->post('email'),
                        'ocdTFphone' => $this->request->post('phone'),
                        'ocdTFcomments' => $this->request->post('comments'),

                        'ocdEditSave' => 'True',
                        'ocdEditSave.X' => '74',
                        'ocdEditSave.Y' => '13',
                        );
                    echo '<br/>name==>'.


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

                 /*.................added for Salesforce...........*/

                    $firstNamesf = $this->request->post('firstName');      
                    $lastNamesf = $this->request->post('lastName');     
                    $emailsf = $this->request->post('email');
                    $phonesf = $this->request->post('phone');
                    $commentsf = $this->request->post('comments');
                    $commentsf = str_replace(" ","%20",$commentsf);

                 $salesForceUrl = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF&first_name='.$firstNamesf.'&last_name='.$lastNamesf.'&email='.$emailsf.'&phone='.$phonesf.'&description='.$commentsf.'&00N5000000ASX1U=1&oid=00D300000000HQz&retURL=http://www.magnusadventures.com/ebrochure/thanks.aspx';

                    
                    /*.....................Salesforce End.............*/

                    $pos = strpos($response, '<h1>Object Moved</h1>');
                    $result = $pos !== false;
                    //$result = 1;
                    if ($result)
                    {
                        $params = array('slug' => $this->request->param('slug'), 'abs' => true);
                        $this->view = new Cpf_Core_View_Redirect(sprintf('?success=1&pid='.$PackageID));
                        $this->assign('bipin', 'success');   
                    }

                }
                else
                {
                    $this->assign('cpf_errors', $this->errors);
                }

                $chsf = curl_init();
                    curl_setopt($chsf, CURLOPT_URL, $salesForceUrl);
                    curl_setopt($chsf, CURLOPT_HEADER, 0);

                    curl_exec($chsf);
                    curl_close($chsf);

            }

            if (($success = $this->request->get('success')) !== FALSE)
                $this->assign('success', 1);

        }else{

       // echo "test2"; exit;
            $this->redirect('frontend_reservation');
        }


    }

    
    private function _validate()
    {
        foreach ($this->request->post as $k => $v)
        {
            $this->assign($k, $v);
        }

        if (($first_name = $this->request->post('firstName')) === FALSE || empty($first_name))
        {
            $this->errors[] = 'Please enter your First Name';
        }
        if (($last_name = $this->request->post('lastName')) === FALSE || empty($last_name))
        {
            $this->errors[] = 'Please enter your Last Name';
        }
        if (($phone = $this->request->post('phone')) === FALSE || empty($phone))
        {
            $this->errors[] = 'Please enter your phone number';
        }
        if (($email = $this->request->post('email')) === FALSE || empty($email))
        {
            $this->errors[] = 'Please enter your e-mail';
        }
        elseif (!App_Utils_Validation::is_valid_email($email))
        {
            $this->errors[] = 'Please enter a valid e-mail address';
        }
        // if (($phone = $this->request->post('phone')) === FALSE || empty($phone))
        // {
        //     $this->errors[] = '.';
        // }
        return count($this->errors) == 0;
    }

    

    

}
?>