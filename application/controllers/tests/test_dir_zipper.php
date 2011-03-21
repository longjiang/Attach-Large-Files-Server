<?php
/**
 * Unit Tests on Dir_zipper class
 */
 
class Test_dir_zipper extends Controller {
	private $_CI;
	
	function Test_dir_zipper() {
		parent::Controller();
		$this->_CI =& get_instance();
		$this->load->model('files_model');
		$this->load->library('unit_test');
	}
	
	function index() {
		$this->it_should_create_a_zip_file_from_a_directory();
		echo $this->unit->report();
	}
	
	function it_should_create_a_zip_file_from_a_directory() {
		$source_dirpath = $this->config->item('testing_files_dir') . '1Py4wD/';
		$zip_dirpath = $this->config->item('testing_files_zip_dir');
		$zip_filename = '1Py4wD.zip';
		
		$dir_zipper = new Dir_zipper(
			$this->_CI,
			$source_dirpath,
			$zip_dirpath,
			$zip_filename
		);
		$dir_zipper->zip();
		
		$this->unit->run(
			file_exists($zip_dirpath . $zip_filename),
			TRUE,
			'it_should_create_a_zip_file_from_a_directory'
		);
	}
}
