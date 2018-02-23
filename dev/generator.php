<?php
	error_reporting(E_ALL | E_STRICT); 
	ini_set("display_errors", TRUE);
	ini_set("log_errors", TRUE);

	function d($d) { echo '<pre>'; print_r($d); echo '</pre>'; }
	function t($string) { return $string; }
	function nl() { return "\r\n"; }
	function tab($n = 0) { return str_repeat("\t", $n); }

	define('CPF_APP_CONFIG_FOLDER', 'app/config/');

	require_once 'app/libs/outlet/Outlet.php';
	require_once 'app/libs/outlet/OutletProxyGenerator.php';
	require_once 'app/libs/debugpdo/debugpdo.php';
	require_once 'app/config/install.php';
	require_once 'app/config/outlet.php';

	class DBScan
	{
		public 
			$db,
			$config,
			$data,
			$associations;
		
		function __construct($config)
		{
			$this->config = $config;
			$this->db = $this->config['connection']['pdo'];
			$this->data = array();

			include 'app/config/outlet/tables_associations.php';		
			
			$this->associations	= array_merge($associations_custom, $associations_default);
		}

		function getData()
		{
			// get tables
			$sql = sprintf('SHOW TABLES FROM `%s`', $this->config['connection']['db']);
			$tables = $this->db->query($sql)->fetchAll(PDO::FETCH_COLUMN);
			
			// get fields
			foreach ($tables as $table)
			{
				if (substr($table, 0, 4) != 'sys_')
				{
					$this->data[$table] = array();
					$sql = sprintf('DESCRIBE `%s`', $table);
					$fields = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($fields as $field)
					{
						$this->data[$table][] = $field;
					}
				}
			}
		}
		
		function createTables()
		{
			$result = array();
			foreach ($this->data as $table => $fields)
			{
				$config = array();
				$config[] = tab() . 'array(';
				$config[] = tab(1) . sprintf("'table' => '%s',", $table);

				$config[] = tab(1) . $this->_addProperties($fields);
				$config[] = tab(1) . $this->_addAssociations($table, $fields);
				$config[] = tab(1) . $this->_addResources($fields, $table);
				$config[] = tab(1) . $this->_addHtmlFields($fields);
				$config[] = tab() . ')';
				
				$result[] = sprintf(
					"\$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['%s'] = %s;%s",
					$this->_getModelNameFromTable($table),
					implode(nl(), $config), 
					nl()
				);
			}
			$result = implode(nl(), $result);
			$this->_fwrite(sprintf('%soutlet/tables.php', CPF_APP_CONFIG_FOLDER), $result);
			return $result;
		}

		function createProxies()
		{
			Outlet::init($this->config);
			$gen = new OutletProxyGenerator(Outlet::getInstance()->getConfig());

			$result = $gen->generate();
			$this->_fwrite(sprintf('%s/outlet/proxy/outlet-proxies.php', CPF_APP_CONFIG_FOLDER), $result);
			return $result;
		}
	
		function createModels()
		{
			foreach ($this->data as $table => $fields)
			{
				$model = $this->_getModelName($table);
				$result = array();
				$result[] = sprintf('class App_Model_Common_%s extends App_Model_Base_Model', $model);
				$result[] = '{';
				$result[] = tab(1) . 'public';
				$tmp = array();
				foreach ($fields as $field)
				{
					$tmp[] = tab(2) . '$'. $this->_getFieldName($field);
				}
				$result[] = implode(','.nl(), $tmp).';';

				// associations
				$tmp = array();
				$tmp_methods = array();
				$model_name = $this->_getModelNameFromTable($table);
				if (in_array($model_name, array_keys($this->associations)))
				{
					$rows = $this->associations[$model_name];
					if (count($rows) > 0)
					{
						$result[] = nl() . tab(1) . 'public';
					}
					foreach ($rows as $row)
					{
						$row_model = $this->_removeModelName($row['model']);
						if ($row['relationship'] == 'one-to-many')
						{
							$row_model_pl = $this->_pluralize($row_model);
							$tmp[] = tab(2) . '$'. $row_model_pl;
							
							$tmp_methods[] = '';
							$tmp_methods[] = tab(1) . sprintf('function __construct()');
							$tmp_methods[] = tab(1) . '{';
							$tmp_methods[] = tab(2) . sprintf('parent::__construct();');
							$tmp_methods[] = tab(2) . sprintf('$this->%1$s = new Collection();', $row_model_pl);
							$tmp_methods[] = tab(1) . '}';
							$tmp_methods[] = '';
							$tmp_methods[] = tab(1) . sprintf('public function get%s()', $this->_pluralize($row['model']));
							$tmp_methods[] = tab(1) . '{';
							$tmp_methods[] = tab(2) . sprintf('return $this->%s;', $row_model_pl);
							$tmp_methods[] = tab(1) . '}';
							$tmp_methods[] = '';
							$tmp_methods[] = tab(1) . sprintf('public function set%1$s(Collection $%2$s)', $this->_pluralize($row['model']), $row_model_pl);
							$tmp_methods[] = tab(1) . '{';
							$tmp_methods[] = tab(2) . sprintf('$this->%1$s = $%1$s;', $row_model_pl);
							$tmp_methods[] = tab(1) . '}';							
							$tmp_methods[] = '';
							$tmp_methods[] = tab(1) . sprintf('public function add%1$s(%1$s $%2$s)', $row['model'], $row_model);
							$tmp_methods[] = tab(1) . '{';
							$tmp_methods[] = tab(2) . sprintf('$this->%1$s[] = $%2$s;', $row_model_pl, $row_model);
							$tmp_methods[] = tab(1) . '}';							
						}
						elseif ($row['relationship'] == 'many-to-one')
						{
							$tmp[] = tab(2) . '$'. $row_model;

							$tmp_methods[] = '';
							$tmp_methods[] = tab(1) . sprintf('public function get%s()', $row['model']);
							$tmp_methods[] = tab(1) . '{';
							$tmp_methods[] = tab(2) . sprintf('return $this->%s;', $row_model);
							$tmp_methods[] = tab(1) . '}';
							$tmp_methods[] = '';
							$tmp_methods[] = tab(1) . sprintf('public function set%1$s(%1$s $%2$s)', $row['model'], $row_model);
							$tmp_methods[] = tab(1) . '{';
							$tmp_methods[] = tab(2) . sprintf('$this->%1$s = $%1$s;', $row_model);
							$tmp_methods[] = tab(1) . '}';
						}
					}
				}
				if (count($tmp) > 0)
				{
					$result[] = implode(','.nl(), $tmp).';';				
					$result[] = implode(nl(), $tmp_methods);
				}
					
				$result[] = nl().tab(1).'public function validate(&$errors, $is_edit)';
				$result[] = tab(1).'{';
				$result[] = tab(1).'}';
				$result[] = '}';
				$result = implode(nl(), $result);
				$this->_fwrite(sprintf('app/model/common/%s.php', strtolower($model)), $result);
				
				$path = sprintf('app/model/%s.php', strtolower($model));
				@$f = fopen($path, 'r');
				if (!$f)
				{
					$result = array();
					$result[] = sprintf('class App_Model_%1$s extends App_Model_Common_%1$s', $model);
					$result[] = '{';
					$result[] = '}';
					$result = implode(nl(), $result);
					$this->_fwrite($path, $result);
				}
				else
				{
					fclose($f);
				}
			}
		}
				
        function createResources()
        {
            // need languages
            // need resources type
            // need resources path
            $path = 'app/resources/ru/tables/%s.php';
            foreach ($this->data as $table => $fields)
            {
                $url = sprintf($path, $table);
                @$f = fopen($url, 'r');
                if (!$f)
                {
                    $result = array();
                    $result[] = '$tr = array(';
                    $fields_list = array();
                    foreach ($fields as $field)
                    {
                        $fieldName = $this->_getFieldName($field);
                        $fields_list[] = sprintf("%s'%s' => ''", tab(1), $fieldName);
                    }
					$result[] = implode(','.nl(), $fields_list);
                    $result[] = ');';
                    $result = implode(nl(), $result);
                    $this->_fwrite($url, $result);
                }
                else
                {
                    fclose($f);
                }
            }
        }


		//
		//	Private methods
		//
		private function _addProperties($fields)
		{
			$tmp = array();
			foreach ($fields as $field)
			{
				$fieldName = $this->_getFieldName($field);
				$tmp[] = sprintf("%s'{$fieldName}' => array(%s)", tab(2), $this->_getOutletFieldDescription($field));
			}
			return sprintf("'props' => array(%s%s%s%s),", nl(), implode(sprintf(",%s", nl()), $tmp), nl(), tab(1));
		}

		private function _addAssociations($table, $fields)
		{
			$temp = array();
			$model = $this->_getModelNameFromTable($table);
			if (in_array($model, array_keys($this->associations)))
			{
				$rows = $this->associations[$model];
				foreach ($rows as $row)
				{
					// many-to-one and one-to-many
					$temp[] = sprintf("array('%s', '%s', array('key'=>'%s'))", $row['relationship'], $row['model'], $row['key']);
					// TODO: many-to-many
				}
			}
			return sprintf("'associations' => array(%s),", implode(',', $temp));
		}

		private function _addResources($fields, $table)
		{
			$tmp = array();
			foreach ($fields as $field)
			{
				$fieldName = $this->_getFieldName($field);
				$tmp[] = tab(2) . sprintf("'{$fieldName}' => t('tables.%s.%s')", $table, $fieldName);
			}
			return sprintf("'resources' => array(%s%s%s%s),", nl(), implode(sprintf(",%s", nl()), $tmp), nl(), tab(1));
		}

		private function _addHtmlFields($fields)
		{
			return sprintf("'html_fields' => array('text', 'content'),");
		}

		private function _getOutletFieldDescription($field)
		{
			$info = array($this->_quote($field['Field']));
			$info[] = $this->_quote($this->_mysqlTypeToOutletType($field['Type']));

			$optional = array();

			if ($this->_isPrimaryKey($field['Key'])) 
			{
				$optional[] = "'pk' => true";
			}

			if ($field['Extra'] == 'auto_increment')
			{
				$optional[] = "'autoIncrement' => true";
			}

			//d($field);
			if (isset($field['Default']) && (!empty($field['Default']) || $field['Default'] == 0))
			{
				$optional[] = sprintf("'default' => %s", $this->_quote(addcslashes($field['Default'], "'")));
			}

			if (!empty($optional))
			{
				$info[] = sprintf('array(%s)', implode(', ', $optional));
			}

			return implode(', ', $info);
		}
		
		private function _mysqlTypeToOutletType($mysql_type)
		{
			if ((strpos($mysql_type, 'int') !== false) || (strpos($mysql_type, 'bit') !== false))
			{
				$outlet_type = 'int';
			} 
			elseif ((strpos($mysql_type, 'varchar') !== false) or (strpos($mysql_type, 'enum') !== false))
			{
				$outlet_type = 'varchar';
			} 
			elseif ((strpos($mysql_type, 'text') !== false) or (strpos($mysql_type, 'longtext') !== false))
			{
				$outlet_type = 'text';
			} 
			else
			{
				$outlet_type = $mysql_type;
			}

			return $outlet_type;
		}

		private function _quote($string)
		{
			return sprintf("'%s'", $string);
		}
		
		private function _isPrimaryKey($key)
		{
			return $key == 'PRI';
		}
		
		private function _getFieldName($field)
		{
			return $this->_isPrimaryKey($field['Key']) ? 'id' : $field['Field'];
		}

		private function _makePhp($string)
		{
			return sprintf("<?php%s%s%s?>", nl(), $string, nl());
		}

		private function _fwrite($file, $string, $makePhp = true)
		{
			if ($makePhp)
				$string = $this->_makePhp($string);
			@$f = fopen($file, 'w');
			if ($f)
			{
				fprintf($f, '%s', $string);
				fclose($f);
				return true;
			}
			return false;
		}		
		
		private function _getModelNameFromTable($table)
		{
			return sprintf('App_Model_%s', $this->_getModelName($table));
		}

		private function _removeModelName($model)
		{
			return strtolower(str_replace('App_Model_', '', $model));
		}

        private function _tableNameToModelName($string)
        {
            $parts = explode('_', $string);
            $result = '';
            foreach ($parts as $part)
            {
                $result .= ucfirst($part);
            }
            //d($result);
            return $result;
        }

		private function _getModelName($string)
		{
			return ucwords($this->_singularize($this->_tableNameToModelName($string)));
		}
		
		private function _singularize($word)
		{
			$singularization = array(
				'/cookies$/i' 			=> 'cookie',
				'/moves$/i' 			=> 'move',
				'/sexes$/i' 			=> 'sex',
				'/children$/i' 			=> 'child',
				'/men$/i' 				=> 'man',
				'/feet$/i' 				=> 'foot',
				'/people$/i' 			=> 'person',
				'/taxa$/i' 				=> 'taxon',
				'/databases$/i'			=> 'database',
				'/(quiz)zes$/i' 		=> '\1',
				'/(matr|suff)ices$/i' 	=> '\1ix',
				'/(vert|ind)ices$/i'    => '\1ex',
				'/^(ox)en/i' 			=> '\1',
				'/(alias|status)es$/i' 	=> '\1',
				'/(tomato|hero|buffalo)es$/i'  => '\1',
				'/([octop|vir])i$/i' 	=> '\1us',
				'/(gen)era$/i'          => '\1us',
				'/(cris|ax|test)es$/i' 	=> '\1is',
				'/(shoe)s$/i' 			=> '\1',
				'/(o)es$/i' 			=> '\1',
				'/(bus)es$/i' 			=> '\1',
				'/([m|l])ice$/i' 		=> '\1ouse',
				'/(x|ch|ss|sh)es$/i' 	=> '\1',
				'/(m)ovies$/i' 			=> '\1ovie',
				'/(s)eries$/i' 			=> '\1eries',
				'/([^aeiouy]|qu)ies$/i' => '\1y',
				'/([lr])ves$/i' 		=> '\1f',
				'/(tive)s$/i' 			=> '\1',
				'/(hive)s$/i' 			=> '\1',
				'/([^f])ves$/i' 		=> '\1fe',
				'/(^analy)ses$/i' 		=> '\1sis',
				'/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\1\2sis',
				'/([ti]|addend)a$/i' 	=> '\1um',
				'/(alumn|formul)ae$/i'  => '$1a',
				'/(n)ews$/i' 			=> '\1ews',
				'/(.*)s$/i' 			=> '\1',
			);
			foreach ($singularization as $regexp => $replacement)
			{
				$matches = null;
				$singular = preg_replace($regexp, $replacement, $word, -1, $matches);
				if ($matches > 0) {
					return $singular;
				}
			}
			return $word;
		}

		private function _pluralize($word)
		{
			$pluralization = array(
				'/move$/i' 					=> 'moves',
				'/sex$/i' 					=> 'sexes',
				'/child$/i' 				=> 'children',
				'/man$/i' 					=> 'men',
				'/foot$/i' 					=> 'feet',
				'/person$/i' 				=> 'people',
				'/taxon$/i' 				=> 'taxa',
				'/(quiz)$/i' 				=> '$1zes',
				'/^(ox)$/i' 				=> '$1en',
				'/(m|l)ouse$/i' 			=> '$1ice',
				'/(matr|vert|ind|suff)ix|ex$/i'=> '$1ices',
				'/(x|ch|ss|sh)$/i' 			=> '$1es',
				'/([^aeiouy]|qu)y$/i' 		=> '$1ies',
				'/(?:([^f])fe|([lr])f)$/i' 	=> '$1$2ves',
				'/sis$/i' 					=> 'ses',
				'/([ti]|addend)um$/i' 		=> '$1a',
				'/(alumn|formul)a$/i'       => '$1ae',
				'/(buffal|tomat|her)o$/i' 	=> '$1oes',
				'/(bu)s$/i' 				=> '$1ses',
				'/(alias|status)$/i' 		=> '$1es',
				'/(octop|vir)us$/i' 		=> '$1i',
				'/(gen)us$/i'               => '$1era',
				'/(ax|test)is$/i'	 		=> '$1es',
				'/s$/i' 					=> 's',
				'/$/' 						=> 's',
			);

			foreach ($pluralization as $regexp => $replacement)
			{
				$matches = null;
				$singular = preg_replace($regexp, $replacement, $word, -1, $matches);
				if ($matches > 0) {
					return $singular;
				}
			}
			return $word;
		}
	}
		
	$scan = new DBScan($CPF_CONFIG['MODEL']['OUTLET']['CONFIG']);
	$scan->getData();
	$scan->createTables();
	$scan->createModels();
	$scan->createResources();
	//$scan->createProxies();
	exit;
?>