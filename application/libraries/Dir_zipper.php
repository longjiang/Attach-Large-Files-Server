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
	var $CI;
	// Find out how php private variable works ('_' prefix?)
	// Structure out this class
	// Construct a tester.
	
	/*
	 * Constructor
	 * 
	 * Takes an hash as parameters.  The hash has the following indexes:
	 *   'CI':         object  The CodeIgniter object
	 *   'directory':  string  Name of the directory the file resides
	 * @param  array  
	 */
    function Dir_zipper($params = array())
    {
    	
    }
    
    function get_zip_file_path() {
    	
    }
}
// END Directory Zipper class

/* End of file Dir_zipper.php */
/* Location: ./system/libraries/Dir_zipper.php */

