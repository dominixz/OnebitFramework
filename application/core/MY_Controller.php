<?php
// require_once APPPATH."libraries/Predis.php";
class MY_Controller extends CI_Controller {
	
	// public $redis;
	
	function __construct() 
	{	
		parent::__construct();
		
		/*
		$this->redis = new Predis\Client(array(
		    'host' => '127.0.0.1', 
		    'port' => 6379, 
		));
		*/
	}
	
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */