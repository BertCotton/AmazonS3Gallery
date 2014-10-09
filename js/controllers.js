'use strict';

var pictureControllers = angular.module('pictureControllers', []);

pictureControllers.controller('BucketCtrl', ['$scope', 'Bucket', 
	function($scope, Bucket) {
		$scope.buckets = Bucket.query();
	}]);

pictureControllers.controller('BucketDetailsCtrl', ['$scope', "$routeParams", 'BucketDetails', 
	function($scope, $routeParams, BucketDetails) {
		$scope.bucketName = $routeParams.name;
		$scope.prefixName = $routeParams.prefix;
		$scope.bucketDetails = BucketDetails.query({bucketName : $routeParams.name, prefixName : $routeParams.prefix});
	}]);