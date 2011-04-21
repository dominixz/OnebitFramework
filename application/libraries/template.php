<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
    
    var $template_data = array();
    var $template_view = "default";

    function  __construct()
    {
        $this->CI =& get_instance();
    }

    function set($name, $value) {
            $this->template_data[$name] = $value;
    }
    
    function set_template($template_view)
    {
		$this->template_view = $template_view;
	}

    function load($template = '', $view = '' , $view_data = array(), $return = FALSE) {
            $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
            return $this->CI->load->view($template, $this->template_data, $return);
    }

    // load a default template 'template.php'
    function view($view = '' , $view_data = array(), $return = FALSE) {
            if($this->CI->config->item('template_view_cached'))
            {
            	$this->CI->output->cache($this->CI->config->item('template_time_cached'));
            }
            
            $this->CI->load->vars($view_data);
            if(!empty($this->template_data))
            {
            	$this->CI->load->vars($this->template_data);
            }
            $view_data['contents'] = $this->CI->load->view($view,'',TRUE);
            return $this->CI->load->view('templates/'.$this->template_view, $view_data, $return);
    }
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
