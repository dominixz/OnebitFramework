<?php
define('APP_VIEW_PATH','application/views/');
define('GENERATE_TEMPLATE_PATH',dirname(__FILE__).'/templates/');

function replace_data($data,$contents)
{
	foreach($data as $key=>$value)
	{
		$contents = str_replace("{".$key."}",$value,$contents);
	}
	return $contents;
}

function template_parse($template_path,$filename,$data)
{
	$real_template_path = GENERATE_TEMPLATE_PATH.$template_path.".tpl";
	
	$contents = read_file($real_template_path);
	$get_path = explode("/",$template_path);
	$get_path = $get_path[0];
	
	if(empty($contents))
	{
		echo "No contents\n";
		exit;
	}
	
	$write_path = "application/".$get_path."/".strtolower($filename).".php";
	
	if(write_file($write_path,replace_data($data,$contents),"wb"))
	{
		echo "Create controller at ".$write_path." Completed \n";
	}
	
	
}