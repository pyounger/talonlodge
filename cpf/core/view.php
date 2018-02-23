<?php
/**
 * Abstract base view class
 * 
 * @package CPF
 * @subpackage Core
 * @abstract
 */
abstract class Cpf_Core_View
{
	/**
	* HTTP-headers assigned to the view
 	* @var array	
	*/
	protected $headers;
				
	/**
	* Data assigned to the view
 	* @var array	
	*/
	protected $data;

	/**
	* Instance of configuration class {@link Cpf_Core_Config}
 	* @var Cpf_Core_Config
	*/		
	protected $config;
	
	/**
	* Turn off gzip for view completely
 	* @var array	
	*/
	protected $use_gzip = TRUE;

	/**
	 * Class constructor
	 * 
	 * @return void
	 */
	public function __construct()
	{
		$this->config = Cpf_Core_Config::get_instance();
	}
	
	/**
	 * Assigns HTTP-header to view
	 * 
	 * @param string $key Name of HTTP header
	 * @param string $value Value of HTTP header
	 * @return void
	 */
	public function assign_header($key, $value = '')
	{
		$this->headers[$key] = $value;
	}

	/**
	 * Assigns data to the view
	 * 
	 * @param string $key Key in collection for assigned data
	 * @param mixed $value Value of assigned data
	 * @return void
	 */
	public function assign($key, $value)
	{
		$this->data[$key] = $value;
	}

	/**
	 * Sends HTTP-headers assigned for this view using <samp>header()</samp>
	 * 
	 * @return void
	 */
	public function send_headers()
	{
		if (!empty($this->headers))
		{			
			foreach ($this->headers as $key=>$value)
			{
				if (empty($value))
				{
					header($key);
				}
				else
				{
					header(sprintf(CPF_HTTP_HEADER_FORMAT, $key, $value)); 
				}
			}
		}
	}

	/**
	 * Starts buffering and gzipping (if enabled)
	 * 
	 * @return void
	 */
	public function pre_render()
	{
		if ($this->use_gzip && $this->config->value('VIEW.GZIP.ENABLED') && $this->_gzipSupported())
		{
			ob_start("ob_gzhandler");
		}
		else
		{
			ob_start();
		}	                      	
	}

	/**
	 * Performs actual rendering of view to the client
	 * 
	 * @abstract
	 * @return void
	 */
	abstract public function render();

	/**
	 * Post-render hook. Flushes output buffer.
	 * 
	 * @return void
	 */
	public function post_render()
	{
		ob_end_flush();
	}

	/*
	 * Simple wrapper for methods below
	 *
	 * @return bool Returns TRUE if gzip supported
	 */
	private function _gzipSupported()	
	{
		$temp = $this->_getAcceptedEncoding();
		return ($temp[0] == 'gzip');
	}

	/**
	 * Returns client's accepted encoding
	 * Code taken from Minify (http://code.google.com/p/minify/)
	 *
	 * @return void bool If client supports gzip
	 */
	private function _getAcceptedEncoding()
	{
		 // @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html

		if (! isset($_SERVER['HTTP_ACCEPT_ENCODING'])
			|| $this->_isBuggyIe())
		{
			return array('', '');
		}
		$ae = $_SERVER['HTTP_ACCEPT_ENCODING'];
		// gzip checks (quick)
		if (0 === strpos($ae, 'gzip,')             // most browsers
			|| 0 === strpos($ae, 'deflate, gzip,') // opera
		) {
			return array('gzip', 'gzip');
		}
		// gzip checks (slow)
		if (preg_match(
				'@(?:^|,)\\s*((?:x-)?gzip)\\s*(?:$|,|;\\s*q=(?:0\\.|1))@'
				,$ae
				,$m)) {
			return array('gzip', $m[1]);
		}
	}

	/**
	 * Detect IE with buggy compression support (version earlier than 6 SP2)
	 * Code taken from Minify (http://code.google.com/p/minify/)
	 *
	 * @link http://code.google.com/p/minify/
	 * @return bool If client uses IE with buggy gzip support
	 */
	private function _isBuggyIe()
	{
		$ua = $_SERVER['HTTP_USER_AGENT'];
		// quick escape for non-IEs
		if (0 !== strpos($ua, 'Mozilla/4.0 (compatible; MSIE ')
			|| false !== strpos($ua, 'Opera')) {
			return false;
		}
		// no regex = faaast
		$version = (float)substr($ua, 30);
		return $this->config->value('VIEW.GZIP.FOR_IE6')
			? ($version < 6 || ($version == 6 && false === strpos($ua, 'SV1')))
			: ($version < 7);
	}
}
?>