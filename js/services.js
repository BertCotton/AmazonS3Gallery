'use script';

var pictureServices = angular.module('pictureServices', ['ngResource']);

pictureServices.factory('Bucket', ['$resource', 
	function($resource) 
	{
		return $resource('/php/buckets.php', {}, 
			{
				query: { 
						method: 'GET', params:{}, isArray:true
					}
		});
	}]);

pictureServices.factory('BucketDetails', ['$resource', 
	function($resource) 
	{
		return $resource('/php/bucket-details.php?bucket=:bucketName&prefix=:prefixName', {}, 
			{
				query: { 
						method: 'GET', params:{bucketName :'bucket', prefixName: 'prefix'}, isArray:true
					}
		});
	}]);