<?php
/**
 * Pager helper for controller
 *
 * @package app-start
 * @subpackage Navigation
 */
class App_Local_Navigation_Pager
{
	/*
		Pager
	*/
	/**
	 * Count of pages for pager, default 0
	 * @var int
	 */
	public $pager_count = 0;

	/**
	 * Current page for pager, default 1
	 * @var int
	 */
	public $pager_current = 1;

	/**
	 * Size of one pager page, default 0
	 * @var int
	 */
	public $pager_size = 0;

	/**
	 * Total count of records for pager
	 * @var int
	 */
	public $pager_record_count = 1;

	/**
	 * Default delta value
	 * @var int
	 */
	public $pager_delta = 0;

	/**
	 * Enables or disables show full list in pager
	 * @var bool
	 */
	public $pager_full_list_enabled = false;

	/**
	 * Placeholder for replacement of page number in URL
	 * @var int
	 */
	public $pager_fake_page = 0;

	/*
		Order
	*/
	/**
	 * Order 'names' with associated entity fields.
	 * Example:
	 *
	 * <code>
	 * $orders = array(
	 * 	    'login' => 'App_Model_User', //default order first
	 *      'id' => 'App_Model_User', //field not specified, will be substituted as {App_Model_User.id}
	 *      'name' => '{App_Model_User.name} ***, {App_Model_User.login}', // complex sort
	 *		'group' => 'App_Model_Group.title' //field specified (for linked entities), will be substituted as {App_Model_Group.title}
	 * );
	 * </code>
	 *
	 * @var array
	 */
	public $orders = array();

	/**
	 * Current sort field 'name'
	 * @var string
	 */
	public $order_sort = '';

	/**
	 * Current sort order ('asc'/'desc'), default 'asc'
	 * @var string
	 */
	public $order_order = 'asc';

	/**
	 * Placeholder for replacement of sort field 'name' in URL
	 * @var string
	 */
	public $order_fake_sort = '';

	/**
	 * Placeholder for replacement of sort order (desc/asc) in URL
	 * @var string
	 */
	public $order_fake_order = '';

	/**
	* Instance of configuration class {@link Cpf_Core_Config}
	* @var Cpf_Core_Config
	*/
	protected $config;

	/**
	* Instance of HTTP-request class {@link Cpf_Core_Request}
	* @var Cpf_Core_Request
	*/
	protected $request;


	/**
	 * Class constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->config = Cpf_Core_Config::get_instance();

		$this->pager_size = $this->config->value('VIEW.SMARTY.PAGER.DEFAULT.PAGE_SIZE');
		$this->pager_delta = $this->config->value('VIEW.SMARTY.PAGER.DEFAULT.DELTA');
		$this->pager_fake_page = $this->config->value('VIEW.SMARTY.PAGER.FAKE_PAGE');
		$this->pager_full_list_enabled = $this->config->value('VIEW.SMARTY.PAGER.DEFAULT.FULL_LIST_ENABLED');
		$this->order_fake_sort = $this->config->value('VIEW.SMARTY.ORDER.FAKE_SORT');
		$this->order_fake_order = $this->config->value('VIEW.SMARTY.ORDER.FAKE_ORDER');
	}


	/**
	 * Get pager and sort values from request
	 *
	 * @param Cpf_Core_Request $request
	 * @return void
	 */
	public function process_request(Cpf_Core_Request $request)
	{
		$this->request = $request;

		// Order fields
		$orders = $this->config->value('VIEW.SMARTY.PAGER.ORDERS');
		$orders_key = sprintf($this->config->value('VIEW.SMARTY.PAGER.PAGER_ORDERS_KEY_FORMAT'), $this->request->controller, $this->request->action);

		$all_keys = array_keys($orders);

		foreach ($all_keys as $key)
		{
			if (strpos($key, $orders_key) !== FALSE)
			{
				$this->orders = $orders[$key];
				break;
			}
		}

		// Pager
		if (isset($this->request->params['page']))
		{
			if ($this->pager_full_list_enabled)
			{
				if (intval($this->request->params['page']) >= 0) // 0 = show all
				{
					$this->pager_current = intval($this->request->params['page']);
				}
			}
			else
			{
				if (intval($this->request->params['page']) > 1)
				{
					$this->pager_current = intval($this->request->params['page']);
				}
			}
		}

		if (isset($this->request->params['sort']) && isset($this->orders[$this->request->params['sort']]))
		{
			$this->order_sort = $this->request->params['sort'];
		}
		else
		{
			$this->order_sort = key($this->orders);
		}

		// order_sort
		if (isset($this->request->params['order']) && ($this->request->params['order'] == 'asc' || $this->request->params['order'] == 'desc'))
		{
			$this->order_order = $this->request->params['order'];
		}

	}

	/**
	 * Assigns pager and order values to view
	 *
	 * @param Cpf_Core_View $view Instance of view
	 * @return void
	 */
	public function process_view(Cpf_Core_View $view)
	{
		$view = $view;

		$this->pager_count = ceil($this->pager_record_count / $this->pager_size);

		// Ordering related
		$view->assign('cpf_order_sort', $this->order_sort);
		$view->assign('cpf_order_order', $this->order_order);
		$view->assign('cpf_order_fake_sort', $this->order_fake_sort);
		$view->assign('cpf_order_fake_order', $this->order_fake_order);
		$view->assign('cpf_order_orders', $this->orders);

		// Pager related
		$view->assign('cpf_pager_current', $this->pager_current);
		$view->assign('cpf_pager_count', $this->pager_count);
		$view->assign('cpf_pager_records_count', $this->pager_record_count);
		$view->assign('cpf_pager_size', $this->pager_size);
		$view->assign('cpf_pager_fake_page', $this->pager_fake_page);
		$view->assign('cpf_pager_delta', $this->pager_delta);
		$view->assign('cpf_pager_full_list_enabled', $this->pager_full_list_enabled);
	}

/*
	Paging helpers
*/
	/**
	 * Paging helper for {@link OutletQuery} constructed using 'fluent interface'
	 *
	 * @param OutletQuery $query
	 * @return mixed Result of the query
	 */
	public function outlet_paging(OutletQuery $query)
	{
		$offset = 0;
		$count = 0;
		$this->get_paging_params($offset, $count);
		$order_by = $this->get_order_by();

		return $query->offset($offset)
				->limit($count)
				->orderBy($order_by)
				->find($this->pager_record_count);
	}

	/**
	 * Paging helper for {@link PDOStatement}, two parameters should be defined in query:
	 * - :offset -- offset from the beginning of resultset
	 * - :count  -- page size
	 *
	 * @param PDOStatement $query
	 * @return PDOStatement Processed statement
	 */
/*
	public function outlet_pdo_paging(PDOStatement $query)
	{
		$offset = 0;
		$count = 0;
		$this->get_paging_params($offset, $count);

		$query->bindValue(':offset', $offset, PDO::PARAM_INT);
		$query->bindValue(':count', $count, PDO::PARAM_INT);
	}
*/

	public function outlet_pdo_paging($outlet, $query_string)
	{
		// Process ORDER BY
		$query_string = str_replace(':order_by', $this->get_order_by(), $query_string);
		$query = $outlet->prepare($query_string);

		// Process LIMIT
		$offset = 0;
		$count = 0;
		$this->get_paging_params($offset, $count);

		$query->bindValue(':offset', $offset, PDO::PARAM_INT);
		$query->bindValue(':count', $count, PDO::PARAM_INT);

		// Execute query
		$query->execute();
		$result = $query->fetchAll();

		// Count records
		$this->pager_record_count = $outlet->query('SELECT FOUND_ROWS()')->fetchColumn();

		return $result;
	}


	/**
	 * Returns ORDER BY expression
	 *
	 * @return string SQL expression for ORDER BY clause
	 */
	public function get_order_by()
	{
		$order_placeholder = $this->config->value('VIEW.SMARTY.ORDER.COMPLEX_ORDER_PLACEHOLDER');
		$current_order = $this->get_order_field($this->order_sort);
		$current_order_order = strtoupper($this->order_order);

		if (strpos($current_order, $order_placeholder) !== FALSE)
		{
			return str_replace($order_placeholder, $current_order_order, $current_order);
		}
		else
		{
			return $current_order . ' ' . $current_order_order;
		}
	}


/*
	Low-level functions (usually not called from outside)
*/
	/**
	 * Returns formatted in Outlet way field for sorting
	 *
	 * @param string $field Current sort field 'name'
	 * @return string Outlet-formatted sort expression
	 */
	public function get_order_field($field)
	{
		$order_placeholder = $this->config->value('VIEW.SMARTY.ORDER.COMPLEX_ORDER_PLACEHOLDER');

		if (isset($this->orders[$field]))
		{
			$temp = $this->orders[$field];
		}

		if (strpos($temp, $order_placeholder) !== FALSE)
		{
			return $temp;
		}

		if (strpos($temp, '.') === FALSE)
		{
			if (strpos($temp, 'App_Model_') !== FALSE)
			{
				return sprintf('{%s.%s}', $temp, $field);
			}
			else
			{
				return $field;
			}
		}
		else
		{
			return sprintf('{%s}', $temp);
		}
	}

	/**
	 * Function for supporting 'show all' in pager of show full list
	 *
	 * @param int $offset Offset for paging
	 * @param int $count Count for paging
	 * @return void
	 */
	protected function get_paging_params(&$offset, &$count)
	{
	   if ($this->pager_full_list_enabled && $this->pager_current == 0)
		{
			$offset = 0;
			$count = PHP_INT_MAX;
		}
		else
		{
			$offset = $this->pager_size * ($this->pager_current - 1);
			$count = $this->pager_size;
		}
	}
}
?>