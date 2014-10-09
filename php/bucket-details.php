<?php
include 'common.php';
global $settings;
global $cache;

use Aws\S3\S3Client;

$client = S3Client::factory(array('key' => $settings['s3']['key'],'secret' => $settings['s3']['secret']));


$bucket = $_GET['bucket'];
$prefix = $_GET['prefix'];
$skipCache = $_GET['skipCache'];

header('Content-Type: application/json');
header('Content-language: en');
$key = "buckets-".$bucket;
if($prefix)
	$key .= "-prefix-".$prefix;
else
{
	$prefix = "";
}
$jsonBuckets = $cache->get($key);
if ($jsonBuckets != null)
{
	if(!$skipCache)
	{
		echo json_encode($jsonBuckets);
		return;
	}
}
$iteratorArray = array('Bucket' => $bucket);

if($prefix)
	$iteratorArray['Prefix'] = $prefix;

$iteratorArray['Delimiter'] ='/';

$iterator = $client->getIterator('ListObjects', $iteratorArray,  array(
        'return_prefixes' => true,
    ));

$jsonBuckets = array();
foreach ($iterator as $object) {
	$bucketItem = array();
	foreach ($object as $key => $value) {
		$bucketItem[$key] = $value;
	}
	if($bucketItem["Size"] == "0" && substr($bucketItem["Key"], -1) == "/")
		$bucketItem["Type"] = "directory";
	else
		$bucketItem["Type"] = "file";
	array_push($jsonBuckets, $bucketItem);

}
$cache->set($key, $jsonBuckets, 6000);

echo json_encode($jsonBuckets);

?>
