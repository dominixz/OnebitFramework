<?php

/**
 * Class for making simple HTTP requests. Basic cURL wrapper.
 * This version is designed for CodeIgniter usage as a library.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @license		MIT (see LICENSE file)
 * @author		Michael Mokrysz
 * @link		http://github.com/46Bit/HTTP_Request
 */
class Http_request
{
	const API_USER_AGENT = '46Bit Http_request/1.0';
	
	protected $_url,
			  $_getParams = array(),
			  $_postParams = array();
	
	/*
	 * Make a new request.
	 * Provide base URL as first parameter. 
	 */
	public function create ($url)
	{
		$this->_reset();
		$this->_url = $url;
		return $this;
	}
	
	/*
	 * Add a new GET parameter. 3rd argument is whether to urlencode the parameter or not.
	 */
	public function addGet ($key, $value, $urlEncode = TRUE)
	{
		$this->_getParams[$key] = ($urlEncode) ? rawurlencode($value) : $value;
		return $this;
	}
	
	/*
	 * Add a new POST parameter. 3rd argument is whether to urlencode the parameter or not.
	 */
	public function addPost ($key, $value, $urlEncode = TRUE)
	{
		$this->_postParams[$key] = ($urlEncode) ? rawurlencode($value) : $value;
		return $this;
	}
	
	/*
	 * Run request and return the data given by the site.
	 */
	public function execute ()
	{
		$ch = curl_init();
		
		/*
		 * Set URL from GET params.
		 */
		curl_setopt($ch, CURLOPT_URL, $this->_url . '?' . $this->_buildParams($this->_getParams));
		
		/*
		 * Bind POST data.
		 */
		if (count($this->_postParams) > 0)
		{
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $this->_buildParams($this->_postParams));
		}
		
		/*
		 * Misc. settings.
		 * See http://php.net/manual/en/function.curl-setopt.php
		 */
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 25);
		curl_setopt($ch, CURLOPT_USERAGENT, self::API_USER_AGENT);
		
		/*
		 * Execute cURL, get response, then kill it.
		 */
		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
	
	/*
	 * Run automatically by create(). Deletes old data.
	 */
	protected function _reset ()
	{
		$this->_url = NULL;
		$this->_getParams = array();
		$this->_postParams = array();
		return $this;
	}
	
	/*
	 * Custom function so as to not rawurlencode() (optional, see addGet() & addPost() methods).
	 */
	protected function _buildParams (array $params = array())
	{
		if (count($params) == 0)
		{
			return '';
		}
		
		$queryString = '';
		foreach ($params as $key => $value)
		{
			$queryString .= $key . '=' . $value . '&';
		}
		$queryString = rtrim($queryString, '&');
		return $queryString;
	}
}