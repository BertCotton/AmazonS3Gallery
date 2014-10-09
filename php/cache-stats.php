<?php

include("phpfastcache/phpfastcache.php");
phpFastCache::setup("storage","auto");
$cache = phpFastCache("files");
$cache->option("path","/var/www/dev/AmazonS3PhotoGallery/cache");

print_r($cache->stats());

?>

