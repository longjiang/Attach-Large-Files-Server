<?php

require_once('classes/dir_zipper.php');
require_once('classes/file_downloader.php');
require_once('classes/file_retriever.php');
require_once('classes/file_size.php');
class Files_model extends Model 
{
    function Files_model() 
    {
        parent::Model();        
    }
}