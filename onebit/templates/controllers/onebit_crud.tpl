<?php
class {name} extends MY_Controller {

	function index()
	{
		$this->template->view("{lower_name}/index");
	}
	
	function show($id)
	{
		$this->template->view("{lower_name}/show");
	}
	
	function add()
	{
	   $this->template->view("{lower_name}/add");
	}
	
	function create()
	{
	
	}
	
	function edit($id)
	{
		$this->template->view("{lower_name}/edit");
	}
	
	function update()
	{
	
	}
	
	function delete($id)
	{
		$this->template->view("{lower_name}/delete");
	}
	
	function destroy()
	{
	
	}

}