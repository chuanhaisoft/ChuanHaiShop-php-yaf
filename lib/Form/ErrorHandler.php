<?php
namespace Form;
/**
 * ErrorHandler file
 * 
 * @package YaFt
 * @author Xantios Krugor
 * @license BSD3
 * 
*/
	
/**
 * Just an quick and easy ErrorHandler
 */	
class ErrorHandler
{
	// Place to store the error's
	protected $errors = array();
	
	/**
	 * AddError
	 * 
	 * @param string Error Error Message to add
	 * @param string key if you want to group your errors you can add a key
	 * 
	 * @return void
	 */
	public function addError($error, $key=null) // Error = Msg, $key = groupkey
	{
		if($key)
		{
			$this->errors[$key][] = $error;
		}
		else
		{
			$this->errors[] = $error;
		}
	} 
	
	/**
	 * all
	 * 
	 * @param string key to group your error's
	 * 
	 * @return array 
	 */
	public function all($key=null)
	{
		return isset($this->errors[$key]) ? $this->errors[$key] : $this->errors;
	}
	
	/**
	 * hasErrors
	 * 
	 * Check if there are error's
	 * 
	 * @return bool
	 * 
	 */
	public function hasErrors()
	{
		return count($this->all()) ? true : false;
	}
	
	/**
	 * first
	 * 
	 * returns the first error available ( in group if key is defined)
	 * 
	 * @param string key again, to group error's
	 * @return string 
	 * 
	 */
	public function first($key)
	{
		// Grep all error's
		if($key) { $errors = $this->all(); } else { $errors = $this->all($key); }
		
		// and just throw back the first entry
		return $errors[0];
		
		// Nastique oneliner
		//return isset($this->all()[$key][0]) ? $this->all()[$key][0] : '';
	}
}
