<?php
/**
 * Interface for messengers
 * 
 * @package app-start
 * @subpackage Navigation
 */
interface App_Local_Navigation_IMessenger
{
	/**
	 * Adds message with status 'info'
	 * 
	 * @param string $text Text of the message
	 * @return void
	 */
	public function info($text);

	/**
	 * Adds message with status 'warning'
	 * 
	 * @param string $text Text of the message
	 * @return void
	 */	
	public function warning($text);

	/**
	 * Adds message with status 'error'
	 * 
	 * @param string $text Text of the message
	 * @return void
	 */		
	public function error($text);	 
}
?>