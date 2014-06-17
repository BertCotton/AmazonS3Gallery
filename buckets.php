<?php

    if (!$settings = parse_ini_file(settings.ini, TRUE)) throw new exception('Unable to open ' . $file . '.');

    
require 'vendor/autoload.php';

use Aws\S3\S3Client;



$client = S3Client::factory(array(
		'key' => $settings['s3']['key'],
		'secret' => $settings['s3']['secret'],
		'region' => $settings['s3']['region']
	));





header('Content-Type: application/json');

echo '[
{
"Name": "cottons",
"CreationDate": "2012-08-26T19:54:49.000Z"
},
{
"Name": "feedlot-server-pictures",
"CreationDate": "2013-10-15T02:00:18.000Z"
},
{
"Name": "treb-logs",
"CreationDate": "2012-08-16T14:46:20.000Z"
},
{
"Name": "treb-svn-backups",
"CreationDate": "2013-10-15T02:00:30.000Z"
}
]'

// $buckets = $client->listBuckets();
// $jsonBuckets = array();
// foreach ($buckets['Buckets'] as $bucket)
// {
// 	$bucketData = array();
// 	$bucketData['Name'] = $bucket['Name'];
// 	$bucketData['CreationDate'] = $bucket['CreationDate'];

// 	array_push($jsonBuckets, $bucketData);
// }
//echo json_encode($jsonBuckets);

?>
