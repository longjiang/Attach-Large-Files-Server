<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*
 * File Retriever Class
 * 
 * @package     Attach-Large-Files-Server
 * @subpackage  Libraries
 * @author      Jiang Long
 * 
 * Retrieves a directory.  Zips it.
 */
class Dir_zipper {
	private $_CI;
	private $_source_dirpath;
	private $_zip_dirpath;
	private $_zip_filename;
	
	// Find out how php private variable works ('_' prefix?)
	// Structure out this class
	// Construct a tester.
	
	/*
	 * Constructor
	 * 
	 * Takes an hash as parameters.  The hash has the following indexes:
	 * @param  object  The CodeIgniter object
	 * @param  string  Path of the directory to zip
	 * @param  string  Path of the directory to save the zip file
	 * @param  string  How the zip file should be named
	 */
    function Dir_zipper($CI, $source_dirpath, $zip_dirpath, $zip_filename)
    {
    	$this->_CI = $CI;
    	$this->_source_dirpath = $source_dirpath;
		$this->_zip_dirpath = $zip_dirpath;
		$this->_zip_filename = $zip_filename;
    }
    
    function zip() {
    	$this->_CI->load->library('zip');
		$this->_CI->zip->read_dir($this->_source_dirpath, FALSE);
		/* By default the Zip archive will place all directories listed in
		 * the first parameter inside the zip. If you want the tree preceding
		 * the target folder to be ignored you can pass FALSE (boolean) in
		 * the second parameter.
		 */
		$this->_CI->zip->archive($this->_zip_dirpath . $this->_zip_filename);
		$this->_CI->zip->clear_data();
    }
    
}
// END Directory Zipper class

/* End of file Dir_zipper.php */
/* Location: ./system/libraries/Dir_zipper.php */

