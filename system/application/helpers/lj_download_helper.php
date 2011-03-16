<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2009, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Download Helpers
 *
 * Modified from the default /system/helpers/download_helper.php to allow
 * download of large files using PHP's readfile() mehtod
 */

// ------------------------------------------------------------------------




/**
 * Force Download
 *
 * Generates headers that force a download to happen
 *
 * @access	public
 * @param	string	filename
 * @return	void
 */	
if ( ! function_exists('force_download'))
{
	function force_download($filename = '', $filepath = '')
	{			
		if ($filename == '' OR $filepath == '')
		{
			return FALSE;
		}
		
		$medium_file_size = 10485760; // 10 MB
		
		$large_file_size = 41943040; // 80 MB		
		
		$filesize = filesize($filepath);
		
		if ($filesize > $large_file_size) {			
			// If file size is large, redirect to the file
			$CI =& get_instance();
			$absolute_filepath = $CI->config->item('base_url') . $filepath;

			$download_view_data = array(
				'filename' => $filename,
				'filepath' => $absolute_filepath,
				'filesize' => $filesize
			);
			$CI->load->view('header_view');
			$CI->load->view('download_view', $download_view_data);			
			$CI->load->view('footer_view');
			//header('Location: ' . $absolute_filepath);
			return;
		}

		// Try to determine if the filename includes a file extension.
		// We need it in order to set the MIME type
		if (FALSE === strpos($filename, '.'))
		{				
			$mime = '';			
		} else {	
			// Grab the file extension
			$x = explode('.', $filename);
			$extension = end($x);
	
			// Load the mime types
			@include(APPPATH.'config/mimes'.EXT);
		
			// Set a default mime if we can't find it
			if ( ! isset($mimes[$extension]))
			{
				$mime = 'application/octet-stream';
			}
			else
			{
				$mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
			}
		}
		
		// Generate the server headers
		
		if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
		{
    		header('Content-Description: File Transfer');
			if ($mime != '') { header('Content-Type: "'.$mime.'"'); }
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
		}
		else
		{
    		header('Content-Description: File Transfer');
			if ($mime != '') { header('Content-Type: "'.$mime.'"'); }
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header("Content-Transfer-Encoding: binary");
			header('Expires: 0');
			header('Pragma: no-cache');
		}
		// Determine file size:
		
		if ($filesize < $medium_file_size) {
			// If file size is small:
			$data = file_get_contents($filepath);
			header("Content-Length: ".strlen($data));
			exit($data);
		} else if ($filesize < $large_file_size) {
			// If file size is medium:
    		header('Content-Length: ' . filesize($filepath));
			readfile($filepath);
		}
	} // End of function
} // End of if


/* End of file lj_download_helper.php */
/* Location: ./system/application/helpers/lj_download_helper.php */