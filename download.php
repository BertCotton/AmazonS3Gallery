<?php

	
require 'vendor/autoload.php';

use Aws\S3\S3Client;

    if (!$settings = parse_ini_file(settings.ini, TRUE)) throw new exception('Unable to open ' . $file . '.');

$client = S3Client::factory(array('key' => $settings['s3']['key'],'secret' => $settings['s3']['secret']));

$bucket = $_GET['bucket'];
$id = $_GET['id'];

$request = $client->get("{$bucket}/{$id}");

$signedUrl = $client->createPresignedUrl($request, "+10 minutes");

header("Location: $signedUrl");

?>
