<?php
/**
 * Unit Tests on lj_download_helper
 */
 
class Test_lj_download_helper extends Controller {
	
	function Test_lj_download_helper() {
		parent::Controller();
		$this->load->library('unit_test');
		$this->load->helper('lj_download');
	}
	
	function index() {
		$this->it_should_force_a_file_to_download_rather_than_display_in_browser();
	}
	
	function it_should_force_a_file_to_download_rather_than_display_in_browser() {
		force_download('files_for_testing/1Py4wD/SCAN6418_000.pdf');
		// File should download.  Should not display in browser.
		echo 'Test: it_should_force_a_file_to_download_rather_than_display_in_browser: <br/>';
		echo 'PASSED if no PDF is displayed. <br/>';
		echo 'FAILED if PDF displays in browser, or if nothing downloads. <br/>'; 
	}
}
