<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*
 * File Retriever Class
 * 
 * @package     Attach-Large-Files-Server
 * @subpackage  Libraries
 * @author      Jiang Long
 * 
 * Forces a file to download rather than displaying in a browser.
 */
class File_downloader {
	private $_CI;

	/*
	 * Constructor
	 * 
	 * @param  object  The CodeIgniter object
	 */
    function File_downloader($params = array()) {
    	$this->_CI = $CI;  
    	$this->_CI->load->helper('download');  	
    }
    
    /*
     * Force download a given file on the server, pushes to the browser
     * with a given custom file name 
	 * @param  string  Path of the directory containing the file
	 * @param  string  Name of the file
	 * @param  string  How the file should be named when sending to browser
     */
    function download($source_dirpath, $source_filename, $target_filename) {
    	
    }
}
// END File Downloader Class

/* End of file File_downloader.php */
/* Location: ./system/libraries/File_downloader.php */