<?php
/**
 * Unit Tests on Dir_zipper class
 */
 
class Test_file_downloader extends Controller {
	private $_CI;
	
	function Test_file_downloader() {
		parent::Controller();
		$this->_CI =& get_instance();
		$this->load->library('unit_test');
		
		// Load the model in order to load the class to test
		$this->load->model('files_model');
	}
	
	function index() {
		$this->it_should_force_a_file_to_download_rather_than_display_in_browser();
		echo $this->unit->report();
	}
	
	function it_should_force_a_file_to_download_rather_than_display_in_browser() {
		$source_dirpath = $this->config->item('testing_files_dir') . '1Py4wD/';
		$source_filename = 'SCAN6418_000.pdf';
		$target_filename = 'Your_File.pdf';
		
		$file_downloader = new File_downloader(
			$this->_CI
		);		
		
		$file_downloader->download($source_dirpath, $source_filename, $target_filename);
		// File should download.  Should not display in browser.
		echo 'Test: it_should_force_a_file_to_download_rather_than_display_in_browser: <br/>';
		echo 'A file named SCAN6418_000.pdf should download. <br/>';
		echo 'PASSED if no PDF is displayed. <br/>';
		echo 'FAILED if PDF displays in browser, or if nothing downloads. <br/>';
		
	}
}
