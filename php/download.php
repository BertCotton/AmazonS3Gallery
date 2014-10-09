<?php
	
include 'common.php';
global $settings;

use Aws\S3\S3Client;

$client = S3Client::factory(array('key' => $settings['s3']['key'],'secret' => $settings['s3']['secret']));

$bucket = $_GET['bucket'];
$id = $_GET['id'];

$request = $client->get("{$bucket}/{$id}");

$signedUrl = $client->createPresignedUrl($request, "+10 minutes");

header("Location: $signedUrl");

?>
