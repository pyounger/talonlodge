<?php
	error_reporting(E_ALL | E_STRICT); 
	ini_set("display_errors", TRUE);
	ini_set("log_errors", TRUE);

	function d($d) { echo '<pre>'; print_r($d); echo '</pre>'; }	
	
	class ResourceScan
	{
		public
			$ldq, 
			$rdq, 
			$cmd, 
			$extensions;

		public function __construct()
		{
			$this->ldq = preg_quote('{');
			$this->rdq = preg_quote('}');
			$this->cmd = preg_quote('t');
			$this->extensions = array('tpl');
		}

		function fs($str)
		{
			$str = stripslashes($str);
			$str = str_replace('"', '\"', $str);
			$str = str_replace("\n", '\n', $str);
			return $str;
		}

		public function do_file($file)
		{
			$content = @file_get_contents($file);

			if (empty($content)) {
				return;
			}

		// {t}...{/t} and plural
			preg_match_all(
					"/{$this->ldq}\s*({$this->cmd})\s*([^{$this->rdq}]*){$this->rdq}([^{$this->ldq}]*){$this->ldq}\/\\1{$this->rdq}/",
					$content,
					$matches
			);
					
			for ($i=0; $i < count($matches[0]); $i++) {
				// TODO: add line number
				echo "/* $file */\n"; // credit: Mike van Lammeren 2005-02-14
				
				if (preg_match('/plural\s*=\s*["\']?\s*(.[^\"\']*)\s*["\']?/', $matches[2][$i], $match)) {
					echo 'ngettext("'.fs($matches[3][$i]).'","'.fs($match[1]).'",x);'."\n";
				} else {
					echo 'gettext("'.fs($matches[3][$i]).'");'."\n";
				}

				echo "\n";
			}

		// t() function with single quotes
			preg_match_all(
				"/[^\w]t\('(.*?)'(?:.*?)\)/",
				$content,
				$matches_t
			);

			if (!empty($matches_t[1])) {
				foreach ($matches_t[1] as $temp) {
					echo "/* $file */\n";
					echo 'gettext("' . fs($temp) .'");'."\n";
					echo "\n";
				}
			}

		// t() function with double quotes
			preg_match_all(
				"/[^\w]t\(\"(.*?)\"(?:.*?)\)/",
				$content,
				$matches_t
			);

			if (!empty($matches_t[1])) {
				foreach ($matches_t[1] as $temp) {
					echo "/* $file */\n";
					echo 'gettext("' . fs($temp) .'");'."\n";
					echo "\n";
				}
			}

		// tn() function
			preg_match_all(
				"/[^\w]tn\('(.*?)'\,(?:\s+)?'(.*?)'\,(?:\s+)?(.*?)\)/",
				$content,
				$matches_tn, 
				PREG_SET_ORDER
			);

			foreach ($matches_tn as $temp) {
				echo "/* $file */\n";
				echo 'ngettext("'.fs($temp[1]).'","'.fs($temp[2]).'",x);'."\n";	
				echo "\n";
			}


		//	echo print_r($matches_tn);

		}

		// go through a directory
		public function do_dir($dir)
		{
			$d = dir($dir);

			while (false !== ($entry = $d->read())) {
				if ($entry == '.' || $entry == '..') {
					continue;
				}

				$entry = $dir.'/'.$entry;

				if (is_dir($entry)) { // if a directory, go through it
					$this->do_dir($entry);
				} else { // if file, parse only if extension is matched
					$pi = pathinfo($entry);
					
					if (isset($pi['extension']) && in_array($pi['extension'], $GLOBALS['extensions'])) {
						$this->do_file($entry);
					}
				}
			}

			$d->close();
		}

		public function run()
		{
			$dh  = opendir(dirname(__FILE__));
			d($dh);
			for ($ac=1; $ac < $_SERVER['argc']; $ac++) 
			{
				d($_SERVER['argv'][$ac]);
				// go through directory
				if (is_dir($_SERVER['argv'][$ac]))
				{
					$this->do_dir($_SERVER['argv'][$ac]);
				} 
				else // do file
				{ 
					$this->do_file($_SERVER['argv'][$ac]);
				}
			}
		}
	}
		
	$scan = new ResourceScan();
	$scan->run();
	/*
		- файлы - сверяем с xml - читаем из xml в память в массив
		- чтение файлов и запись в xml
		- чтение xml - массив
	*/
	exit;
?>