<?php

/**
 * A controller to let me fool around.
 */
class Experiments extends Controller {

	function Experiments()
	{
		parent::Controller();	
	}
	
	function index()
	{
		echo 'Do something...';		
		//Nothing displays
	}
	
	function load_libs_twice() {
		$this->load->library(
			'Dir_zipper',
			array(
				'CI' => get_instance(),
				'directory' => '1Py4wD'
			)
		);
		echo $this->dir_zipper->get_zip_path() . "\r\n";
		$this->load->library(
			'Dir_zipper',
			array(
				'CI' => get_instance(),
				'directory' => 'abcd'
			)
		);
		echo $this->dir_zipper->get_zip_path() . "\r\n";
	}
	
	function apppath() {
		echo APPPATH;
	}
}

/* End of file experiment.php */
/* Location: ./system/application/controllers/experiment.php */