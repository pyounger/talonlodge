<?php
class App_Controller_Frontend_Bluffhouse extends App_Controller_Base_Frontend
{
    public $errors = array();

	public function action_default()
	{
        if (($year = $this->request->get('year')) === FALSE)
        {
            $minDate = $this->outlet->query('SELECT MIN(`Arrival_Start_Date`) FROM {App_Model_Package}')->fetchColumn();
            $year = new DateTime($minDate);
            $year = $year->format('Y');
        }
        $this->assign('year', $year);

        $packages = array(
            'min' => new DateTime(),
            'max' => new DateTime(),
            'years' => array(),
            'list' => array()
        );

        // load years
        $dates = $this->outlet->query('SELECT `Arrival_Start_Date`,`Arrival_End_Date` FROM {App_Model_Package}')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dates as $dd)
        {
            $yr = new DateTime($dd['Arrival_Start_Date']);
            $yr = $yr->format('Y');
            if (!in_array($yr, $packages['years']))
                $packages['years'][] = $yr;

            $yr = new DateTime($dd['Arrival_End_Date']);
            $yr = $yr->format('Y');
            if (!in_array($yr, $packages['years']))
                $packages['years'][] = $yr;
        }
        sort($packages['years']);

        // load packages
        if (($start = $this->request->get('start')) !== FALSE && !empty($start))
        {
            $start = new DateTime($start);
            $start = $start->format('Y-m-d');
        }
        else
        {
            $start = sprintf('%d-01-01',$year);
        }

        if (($end = $this->request->get('end')) !== FALSE && !empty($end))
        {
            $end = new DateTime($end);
            $end = $end->format('Y-m-d');
        }
        else
        {
            $end = sprintf('%d-12-31',$year);
        }

        $where = sprintf('(`Arrival_Start_Date` >= "%1$s" AND `Arrival_Start_Date` <= "%2$s") OR (`Arrival_End_Date` >= "%1$s" AND `Arrival_End_Date` <= "%2$s")', $start, $end);
        if (($adults = $this->request->get('adults')) !== FALSE)
        {
            $where = sprintf('((`Arrival_Start_Date` >= "%1$s" AND `Arrival_Start_Date` <= "%2$s") OR (`Arrival_End_Date` >= "%1$s" AND `Arrival_End_Date` <= "%2$s")) AND  Package_Min_Adults <=%3$d AND  `Package_Max_People`*`Rooms_Available` >= %3$d '  , $start, $end, (int)$adults);
			$this->assign('adults', $adults);
			$_SESSION['reservation_adults'] = $adults;
        }

        $temp = $this->outlet->from('App_Model_Package')
                    ->where($where)
                    ->orderBy('Arrival_Start_Date ASC')
                    ->find();
       

		$dt_start = new DateTime($start);
		$dt_end = new DateTime($end);
        $this->assign('start', $dt_start->format('m/d/Y'));
        $this->assign('end', $dt_end->format('m/d/Y'));


        // bind data
        foreach ($temp as $k => $p)
        {
            $start = $p->Arrival_Start_Date;
            if ($start < $packages['min'])
                $packages['min'] = $start;

            $end = $p->Arrival_End_Date;
            if ($end > $packages['max'])
                $packages['max'] = $end;


            $packages['list'][] = $p;
        }

        $this->assign('packages', $packages);
	}

	public function action_update()
	{
		$json = file_get_contents('http://www.magnusadventures.com/webservices/talonlodge/packages.php');
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
						$package->slug = strtolower(str_replace(array(',', '.', '/'), array('','','-'), str_replace(' ', '-', App_Utils_Common::translit($jsp_value))));
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
        $Resources = file_get_contents('http://www.magnusadventures.com/webservices/talonlodge/Resources.php');
        $Resources = sprintf('[%s]', $Resources);
        $Resources = json_decode($Resources, true);

        $this->assign('Resources', $Resources);

       if (($slug = $this->request->param('slug')) !== FALSE && !is_null($package = $this->outlet->from('App_Model_Package')->where('slug=?', array($slug))->findOne()))
        {

           //echo "hello"; 
           //exit;

            $package->Package_Includes = explode(';', $package->Package_Includes);
            $package->Package_DoesNot_Include = explode(';', $package->Package_DoesNot_Include);
            
           $Account_ID = $package->Account_ID;
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

//echo "<pre>"; print_r($package); echo "</pre>";

			if (isset($_SESSION['reservation_adults']))
				$this->assign('reservation_adults', $_SESSION['reservation_adults']);
			
            if ($this->request->is_post)
            {
                $result = false;
                if ($this->_validate())
                {
                    $url = 'http://www.magnusadventures.com/magnus/app/public/byoa/ma_Contact_Log_Inquiry_Edit.asp';
                    $post = array(
                        'directory_name' => 'Talon Lodge & Spa - Alaska Fishing Lodge * Alaska Luxury Lodge * Alaska Fishing Trip * Alaska Lodge * Alaska Fishing Vacation *Alaska Salmon Fishing* Sitka AK',
                        'directory_email' => 'phil@talonlodge.com',
                        'ocdTFaccount_id' => '7',
                        'package_name' => $package->Package_Name,
                        'ocdTFpartner' => '',
                        'pms_package_id' => $package->Pms_Package_ID,
                        'arrival_date' => $package->Arrival_Start_Date->format('m/d/Y'),
                        'Num_Adults' => isset($_SESSION['reservation_adults']) ? $_SESSION['reservation_adults'] : $package->Package_Min_Adults,
                        'UnitPrice' => $package->Adult_Cost,

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
					
						//d($response); exit;
					
					// success 
					/*
					$url = 'http://www.magnusadventures.com/magnus/app/public/byoa/process_success.asp?byoa_account_id=7';
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec ($ch);
                    curl_close ($ch);
					d($response);
					exit;
					*/
                    $pos = strpos($response, '<h1>Object Moved</h1>');
                    $result = $pos !== false;
                    //$result = 1;
                    if ($result)
                    {
                        $params = array('slug' => $package->slug, 'abs' => true);
                        $this->view = new Cpf_Core_View_Redirect(sprintf('%s?success=1', $this->router->link('frontend_reservation_view', $params)));
                    }

                }
                else
                {
                    $this->assign('cpf_errors', $this->errors);
                }
            }
            if (($success = $this->request->get('success')) !== FALSE)
                $this->assign('success', 1);

        }
       else
       {
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
        if (($email = $this->request->post('email')) === FALSE || empty($email))
        {
            $this->errors[] = 'Please enter your e-mail';
        }
        elseif (!App_Utils_Validation::is_valid_email($email))
        {
            $this->errors[] = 'Please enter a valid e-mail address';
        }
        return count($this->errors) == 0;
    }

    

}
?>