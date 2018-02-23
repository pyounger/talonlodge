<?php
/**
 * Functions outside classes. All functions have single or two letters names or prefixed with '<samp>cpf_</samp>'
 *
 * @package CPF
 * @subpackage Utils
 */

/**
 * Wrapper around {@link Cpf_Core_Config}'s <samp>value()</samp> method to use outside controllers classes
 *
 * @param string $key Configuration parameter name
 * @return string Configuration parameter value
 */
function cpf_config($key)
{
	return Cpf_Core_Config::get_instance()->value($key);
}

/**
 * Shortcut for <samp>link()</samp> method of {@link Cpf_Core_Url_Router}.
 *
 * If first argument (rule name) is ommited the default rule is used
 *
 * @return string Generated link
 */
function cpf_link()
{
	$params = func_get_args();

	if (is_array($params[0]))
	{
		return Cpf_Core_Url_Router::get_instance()->link(CPF_URL_ROUTER_DEFAULT_RULE, $params[0]);
	}
	else
	{
		if (isset($params[0]))
		{
			return Cpf_Core_Url_Router::get_instance()->link(
					$params[0],
					isset($params[1]) && is_array($params[1]) ? $params[1] : array()
			);
		}
	}
}

/**
 * Debug function that print variable using <samp>print_r()</samp> and adds caller's information using <samp>debug_backtrace()</samp>
 *
 * @param mixed $var Variable to output
 * @param mixed $title Title [optional]
 * @return void
 */
function d($var, $title = NULL)
{
	$trace = debug_backtrace();
	$trace_string = sprintf('%s[%d], %s->%s()',
		isset($trace[0]['file']) ? $trace[0]['file'] : '[NO FILE]' ,
		isset($trace[0]['line']) ? $trace[0]['line'] : '[NO LINE]',
		isset($trace[1]['class'])? $trace[1]['class'] : '[NO CLASS]' ,
		isset($trace[1]['function'])? $trace[1]['function'] : '[NO FUNCTION]'
	);
	printf('<tt style="color:green">%s</tt><br />', $trace_string);
	if ($title != NULL)
	{
		printf('<tt style="color:blue">%s</tt>:<br />', $title);
	}
	echo('<pre style="text-align:left; font-size: 12px; margin:20px">');
	print_r($var);
	echo('</pre>');
}

/**
 * Debug function that print variable using <samp>var_dump()</samp> and adds caller's information using <samp>debug_backtrace()</samp>
 *
 * @param mixed $var Variable to output
 * @param mixed $title Title [optional]
 * @return void
 */
function dd($var, $title = '')
{
	$trace = debug_backtrace();
	$trace_string = sprintf('%s[%d], %s->%s()',
		isset($trace[0]['file']) ? $trace[0]['file'] : '[NO FILE]' ,
		isset($trace[0]['line']) ? $trace[0]['line'] : '[NO LINE]',
		isset($trace[1]['class'])? $trace[1]['class'] : '[NO CLASS]' ,
		isset($trace[1]['function'])? $trace[1]['function'] : '[NO FUNCTION]'
	);
	printf('<tt style="color:green">%s</tt><br />', $trace_string);
	if ($title != NULL)
	{
		printf('<tt style="color:blue">%s</tt>:<br />', $title);
	}
	echo('<pre style="text-align:left; font-size: 12px; margin:20px">');
	var_dump($var);
	echo('</pre>');
}

/**
 * Profiler function that output time to the page
 *
 * @param mixed $name Name of profiler's point
 * @return void
 */
function p($name)
{
	if (!CPF_PROFILER_ENABLED) return;
	echo "<!-- $name: " .  ((microtime(true) - CPF_START_TIME) * 1000) . " ms -->\n";
}

/**
 * Profiler function to output string
 *
 * @param mixed $text String to output
 * @return void
 */
function pp($text)
{
	if (!CPF_PROFILER_ENABLED) return;
	echo "<!-- \n $text \n -->\n";
}

/**
 * Translate string using gettext, uses {@link Cpf_Core_Translate_Manager}
 *
 * @param mixed $variables The first parameter should be the string, all other -- parameters for vsprintf()
 * @return string Translated string
 */
function t()
{
	$params = func_get_args();
	$temp = Cpf_Core_Translate_Manager::get_instance()->t($params[0]);

	if (count($params) > 1)
	{
		$format = $params[0];
		unset($params[0]);
		$temp = vsprintf(Cpf_Core_Translate_Manager::get_instance()->t($format), $params);
	}

	return $temp;
}

/**
 * Translate string with plural forms, uses {@link Cpf_Core_Translate_Manager}
 *
 * @param mixed $variables Parameters are passed as array to {@link Cpf_Core_Translate_Manager} instance
 * @return string Translated string
 */
function tn()
{
	$params = func_get_args();
	return Cpf_Core_Translate_Manager::get_instance()->tn($params);
}

/**
 * Function to get class path, used in {@link __autoload()}
 *
 * @param mixed $class Name of class
 * @return string
 */
function cpf_class_path($class)
{
	$class_path = strtolower(str_replace('_', '/', $class));
	$class_path = sprintf(CPF_CLASS_FILE_NAME_FORMAT, $class_path);
	return $class_path;
}

/**
 * PHP's magic function to perform classes autoload
 *
 * @param mixed $class Name of class
 * @return void
 */
function cpf_autoload($class)
{
	// Check if this CPF or application class
	if (strpos($class, 'Cpf_') === 0 || strpos($class, 'App_') === 0)
	{
		require_once(cpf_class_path($class));
		return;
	}

	// Check if this a lib class
	$libs = $GLOBALS['CPF_AUTOLOAD_LIBS'];
	if (isset($libs[$class]))
	{
		include_once($libs[$class]);
		return;
	}
}


/**
 * Convert old-style PHP errors to exceptions. Function take into account <samp>error_reporting()</samp> level
 * and error level. Intended to use as callback for <samp>set_error_handler()</samp>
 *
 * @param mixed $severity Level of the error
 * @param mixed $message Error message
 * @param mixed $file_name Name of the file where error occured
 * @param mixed $line_number Number of line where error occured
 * @return void
 */
function cpf_error_handler($severity, $message, $file_name, $line_number)
{
	if (error_reporting() == 0)
	{
		return;
  	}

	if (error_reporting() & $severity)
	{
		throw new ErrorException($message, 0, $severity, $file_name, $line_number);
	}
}

/**
 * Prints friendly information about exception if <samp>display_errors</samp> enabled, otherwise redirects to default error page URL
 * Intended to use as callback for <samp>set_exception_handler()</samp>
 *
 * @param mixed $exception
 * @return void
 */
function cpf_exception_handler($exception)
{
	// We have to resend error to error log by hand
	if (ini_get('log_errors'))
	{
		error_log(sprintf("PHP Exception: %s, %s, %s, %s",
			$exception->getMessage(),
			$exception->getFile(),
			$exception->getLine(),
			$exception->getTraceAsString()
		));
	}

	if (!ini_get('display_errors'))
	{
		Cpf_Utils_Redirect::redirect(cpf_config('ERRORS.DEFAULT_ERROR_URL'));
	}

	printf('
		<div style="border: 1px solid gray; padding: 10px; margin: 10px">
			<h1 style="font-size: 25px">Exception: %s</h1>
			<h2 style="font-size: 20px">Information</h2>
			<p>
				<strong>File</strong>: %s<br />
				<strong>Line</strong>: %s<br />
			</p>
			<h2 style="font-size: 20px">Stack</h2>
			<pre>%s</pre>
		</div>
	',
	$exception->getMessage(),
	$exception->getFile(),
	$exception->getLine(),
	$exception->getTraceAsString());
	exit();
}
?>