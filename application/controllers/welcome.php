<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		if(isset($_SERVER['HTTP_REFERER']) && in_array('install',explode("/",$_SERVER['HTTP_REFERER'])))
		{
			$this->load->helper('file');
			delete_files('install',true);
			@rmdir('install');
		}
		
		if(file_exists(APPPATH.'../install/index.php'))
		{
			$redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://".$_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $redir = str_replace('install/','',$redir);
			header( 'Location: ' . $redir . 'install' ) ;
		}
	}

	function index()
	{	
		$this->template->view('welcome/welcome_message');
	}
	
	function demo_pdf()
	{
 	    $this->load->library('Pdf');

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('My Title');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        
        $pdf->Write(5, 'Some sample text'));
        $pdf->Output('My-File-Name.pdf', 'I'); 

	}
	
	function info()
	{
		phpinfo();
	}
	
	/*
		function database()
	{
		$this->db->get('test');
	}
	
	function redis()
	{
		$this->redis->set("master","dominixz");
		echo $this->redis->get("master");
	}
	
	function cli()
	{
		if(isset($_SERVER['REQUEST_URI']))
		{
			echo "Please use commandline only.";
			exit;
		}
		
		echo "Hello World from Command-line";
	}
	
	function memcached()
	{
		if(class_exists("Memcached"))
		{
			echo "You have Memcached Install";
		}
		else
		{
			echo "You must install Memcached first";
		}
	}
	*/
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */