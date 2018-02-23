<?php

class App_Controller_Frontend_Testings extends App_Controller_Base_Frontend

{

	public function action_default()

	{

		if ($this->request->is_ajax)

		{

			$where = array();

			$ids = array();

			$ids_for_intersect = array();

			if (($meal = $this->request->post('meal')) !== FALSE && $meal > 0)

			{

				$temp = $this->outlet->query('SELECT testing_id FROM {App_Model_TestingsInCategory} WHERE category_id = ? AND testing_id > 0 AND testing_id IS NOT NULL', array($meal))->fetchAll(PDO::FETCH_COLUMN);

				if (count($temp) > 0)

					$ids_for_intersect[] = $temp;

			}

			if (($fish = $this->request->post('fish')) !== FALSE && $fish > 0)

			{

				$temp = $this->outlet->query('SELECT testing_id FROM {App_Model_TestingsInCategory} WHERE category_id = ? AND testing_id > 0 AND testing_id IS NOT NULL', array($fish))->fetchAll(PDO::FETCH_COLUMN);

				if (count($temp) > 0)

					$ids_for_intersect[] = $temp;

			}

			if (($technique = $this->request->post('technique')) !== FALSE && $technique > 0)

			{

				$temp = $this->outlet->query('SELECT testing_id FROM {App_Model_TestingsInCategory} WHERE category_id = ? AND testing_id > 0 AND testing_id IS NOT NULL', array($technique))->fetchAll(PDO::FETCH_COLUMN);

				if (count($temp) > 0)

					$ids_for_intersect[] = $temp;

			}

			if (($search = $this->request->post('search')) !== FALSE && !empty($search))

			{

				$search = $this->outlet->quote('%'.$search.'%');

				$where[] = sprintf('(title LIKE %1$s OR slug LIKE %1$s OR ingredients LIKE %1$s OR directions LIKE %1$s OR nutritional LIKE %1$s)', $search);

			}



			if (count($ids_for_intersect) > 1)

				$ids_r = call_user_func_array('array_intersect', $ids_for_intersect);

			else

				$ids_r = isset($ids_for_intersect[0]) ? $ids_for_intersect[0] : array();



			if (count($ids_for_intersect) > 0 && count($ids_r) == 0)

				$ids = array('-1');

			else

				$ids = $ids_r;



			if (count($ids) > 0)

			{

				$where[] = sprintf('id IN (%s)', implode(',', $ids));

			}



			if (count($where) > 0)

			{

				$where = implode(' AND ', $where);

			}

			else

			{

				$where = '1=1';

			}



			$testings = $this->outlet->from('App_Model_Testing')->where($where)->find();



			$this->assign('testings', $testings);

			$list = $this->view->fetch('frontend_testings.list.tpl');

			$this->view = new Cpf_Core_View_Text();

			$this->assign('list', $list);

		}

		else

		{

			if (!is_null($page = $this->outlet->from('App_Model_Page')->where('`type` = "component" AND `component` = "testings"')->findOne()))

			{

				// load page slideshow

				$slideshow = $this->load_page_slideshow($page);

				$this->assign('slideshow', $slideshow);

			}



			$this->_assign_categories();



			$testings = $this->outlet->from('App_Model_Testing')->find();

			$this->assign('testings', $testings);

		}

	}



	public function action_view()

	{

		if (

			($id = $this->request->param('id')) !== FALSE && 

			($slug = $this->request->param('slug')) !== FALSE &&

			!is_null($testing = $this->outlet->from('App_Model_Testing')->where('id = ?', array($id))->findOne())

			)

		{

			$this->assign('testing', $testing);



			$another_testing = $this->outlet->from('App_Model_Testing')->where('id != ?', array($id))->orderBy('RAND()')->findOne();

			$this->assign('another_testing', $another_testing);



			if (($print = $this->request->get('print')) !== FALSE)

			{

				define('_MPDF_PATH', sprintf('%sapp/libs/mpdf/', CPF_ROOT_DIR));

				include(_MPDF_PATH . "mpdf.php");



				$url = $this->router->link('frontend_testings_view', array('id' => $testing->id, 'slug' => $testing->slug, 'abs' => true));

				// To prevent anyone else using your script to create their PDF files

				if (!preg_match('/^'.str_replace(array('/', '.', '-'), array('\/', '\.', '\-'), CPF_ROOT_URL).'/', $url)) { die("Access denied"); }



				$this->assign('for_pdf', true);

				$html = $this->view->fetch('frontend_testings.item.tpl');

				

				$html = sprintf('<html><head><link type="text/css" href="%sasset-css-frontend.v38.css" rel="stylesheet" media="mpdf" />

					<style type="text/css">body { background: transparent; padding: 30px; } h1 { font-size: 36px; padding: 20px 10px; } table tr td { padding: 10px; } table.xh p { font-size: 14px; color: #a93102; } table p span { color: black;} h4 { padding: 10px 0; font-size: 24px; } table.yh tbody tr td p { font-size: 16px; line-height: 1.4em; } </style>

				</head><body>%s</body></html>', CPF_ROOT_URL, $html);

				//echo $html;exit;



				$mpdf = new mPDF(''); 

				$mpdf->CSSselectMedia = 'mpdf'; // assuming you used this in the document header

				$mpdf->WriteHTML($html);

				$mpdf->Output();

				exit;

			}

		}

		else

		{

			$this->give_404();

		}

	}



	private function _assign_categories()

	{

		$categories = $this->outlet->from('App_Model_TestingCategory')->orderBy('type ASC')->find();

		$result = array();

		foreach ($categories as $category)

		{

			if (!isset($result[$category->type]))

				$result[$category->type] = array();

			$result[$category->type][] = array('id' => $category->id, 'title' => $category->title);

		}

		foreach ($result as $key => $value)

		{

			$keyname = sprintf('%s_types', $key);

			$this->assign($keyname, $value);

		}

	}



}

?>