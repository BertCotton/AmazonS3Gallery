<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;

    if (!$settings = parse_ini_file(settings.ini, TRUE)) throw new exception('Unable to open ' . $file . '.');
$client = S3Client::factory(array('key' => $settings['s3']['key'],'secret' => $settings['s3']['secret']));


$bucket = $_GET['bucket'];
$iterator = $client->getIterator('ListObjects', array('Bucket' => $bucket));


header('Content-Type: application/json');

$jsonBuckets = array();
foreach ($iterator as $object) {
	$bucketItem = array();
	foreach ($object as $key => $value) {
		$bucketItem[$key] = $value;
	}
	array_push($jsonBuckets, $bucketItem);

}
echo json_encode($jsonBuckets);

?>
