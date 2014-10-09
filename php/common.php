<?php

error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once('phpfastcache/phpfastcache.php');

$cache = phpFastCache("files");
$cache->option("path","/var/www/dev/AmazonS3PhotoGallery/cache");


if (!$settings = parse_ini_file("settings.ini", TRUE)) 
	throw new exception('Unable to open ' . $file . '.');


?>