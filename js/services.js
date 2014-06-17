'use script';

var pictureServices = angular.module('pictureServices', ['ngResource']);

pictureServices.factory('Bucket', ['$resource', 
	function($resource) 
	{
		return $resource('buckets.php', {}, 
			{
				query: { 
						method: 'GET', params:{}, isArray:true
					}
		});
	}]);

pictureServices.factory('BucketDetails', ['$resource', 
	function($resource) 
	{
		return $resource('bucket-details.php?bucket=:bucketName', {}, 
			{
				query: { 
						method: 'GET', params:{bucketName :'bucket'}, isArray:true
					}
		});
	}]);