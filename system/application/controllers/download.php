<?php

class Download extends Controller {
	
	function Download()
	{
		parent::Controller();
		$this->load->helper('lj_download');
		$this->load->helper('directory');
		$this->load->helper('lj_file');
	}
	
	function directory($timestamp) {
		$files = directory_map('files/' . $timestamp . '/');
		$num_files = count($files);
		$filename = $num_files . '_Files_from_Abbarch_' . $timestamp;
		//zip the files
		$shell_command = '/usr/bin/zip -j files/zip/' . $filename . ' files/' . $timestamp . '/*';
		exec($shell_command);
		
		// Send the zip file to the user
		$filepath = 'files/zip/' . $filename . '.zip';
		force_download($filename . '.zip', $filepath);
	}
	
	function file($timestamp, $index)
	{
		// Make a list of all files in the given timestamp directory
		$dir_file_info = get_dir_file_info('files/' . $timestamp . '/');  // Reads the specified directory and
																		  // builds an array containing the filenames,
																		  // filesize, dates, and permissions.
		$dir_file_info = $this->flip_diagonally($dir_file_info); // Transpose array;
		array_multisort($dir_file_info['date'], SORT_ASC, SORT_NUMERIC);
		//var_dump($dir_file_info);
		$files = $dir_file_info['date'];
		$i = 0;
		foreach ($files as $filename =>  $date) {
			if ($i == $index) {
				$filename_at_index = $filename;
				break;
			}
			$i++;
		}
		
		
		// Send the file at the given index to the user
		$filepath = 'files/' . $timestamp . '/' . $filename_at_index;
		//echo rawurlencode($filename_at_index);
		force_download($filename, $filepath);
	}
	
	// From http://stackoverflow.com/questions/797251/transposing-multidimensional-arrays-in-php
	private function flip_diagonally($arr) {
		$out = array();
		foreach ($arr as $key => $subarr) {
			foreach ($subarr as $subkey => $subvalue) {
					$out[$subkey][$key] = $subvalue;
			}
		}
		return $out;
	}
}

/* End of file download.php */
/* Location: ./system/application/controllers/download.php */