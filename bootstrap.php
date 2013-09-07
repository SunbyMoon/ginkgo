<?php

// =============================================================================
// == Application constants ====================================================
// =============================================================================

// Directories
define('DIR_ROOT', '/mnt/data/ginkgo');
define('DIR_UPLOADS', DIR_ROOT . '/uploads');

// URLs
define('URL_ROOT', 'http://qb.cshl.edu/ginkgo');


// =============================================================================
// == Misc. configuration ======================================================
// =============================================================================

error_reporting(E_ALL);
session_start();


// =============================================================================
// == Helper functions =========================================================
// =============================================================================

// Generate random ID of arbitrary length
function generateID($length = 20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Return list of files uploaded by user (excluding . and ..)
function getMyFiles($userID, $ext = 'bed')
{
	$directory = DIR_UPLOADS . '/' . $userID . '/';
	//$files = array_diff(scandir($directory), array('..', '.'));
	$files = array_diff(glob($directory . '/*.' . $ext), array('..', '.'));
	
	$result = array();
	foreach($files as $file)
		if(pathinfo($filename, PATHINFO_EXTENSION) != $ext)
			$result[] = basename($file);
	return $result;
}

//
function sanitize(&$item, $key)
{
	$item = escapeshellarg($item);
}