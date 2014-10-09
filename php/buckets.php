<?php
error_reporting(E_ALL);

require 'vendor/autoload.php';
require_once('phpfastcache/phpfastcache.php');
//phpFastCache::setup("storage","auto");
$cache = phpFastCache("files");
$cache->option("path","/var/www/dev/AmazonS3PhotoGallery/cache");


if (!$settings = parse_ini_file("settings.ini", TRUE)) throw new exception('Unable to open ' . $file . '.');

    

use Aws\S3\S3Client;



$client = S3Client::factory(array(
		'key' => $settings['s3']['key'],
		'secret' => $settings['s3']['secret'],
		'region' => $settings['s3']['region']
	));





header('Content-Type: application/json');

$buckets = $cache->get("buckets");
if ($buckets == null)
{
	$buckets = $client->listBuckets();
	$cache->set("buckets", $buckets,6000);
} 
$jsonBuckets = array();
 foreach ($buckets['Buckets'] as $bucket)
 {
 	$bucketData = array();
 	$bucketData['Name'] = $bucket['Name'];
 	$bucketData['CreationDate'] = $bucket['CreationDate'];

 	array_push($jsonBuckets, $bucketData);
 }
echo json_encode($jsonBuckets);

?>
