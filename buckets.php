<?php
include 'common.php';
global $settings;
global $cache;

use Aws\S3\S3Client;



$client = S3Client::factory(array(
		'key' => $settings['s3']['key'],
		'secret' => $settings['s3']['secret'],
		'region' => $settings['s3']['region']
	));

header('Content-Type: application/json');

$jsonBuckets = $cache->get("buckets");
if ($jsonBuckets != null)
{
	echo json_encode($jsonBuckets);
	return;

$buckets = $client->listBuckets();
$jsonBuckets = array();
 foreach ($buckets['Buckets'] as $bucket)
 {
 	$bucketData = array();
	foreach ($object as $key => $value) {
		$bucketData[$key] = $value;
	}
 	array_push($jsonBuckets, $bucketData);
 }
$cache->set("buckets", $jsonBuckets,6000);
echo json_encode($jsonBuckets);

?>
