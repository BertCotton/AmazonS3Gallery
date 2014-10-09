'use strict';

var pictureApp = angular.module('pictureApp', ['ngRoute', 'ui.bootstrap', 'pictureControllers', 'pictureFilters', 'pictureServices']);

pictureApp.config(['$routeProvider', 
		function($routeProvider)
		{
			$routeProvider.when('/buckets', 
					{ 
						templateUrl : 'partials/bucket-list.html', 
						controller: 'BucketCtrl'
					}).
			when('/buckets/:name', 
			{
				templateUrl: 'partials/bucket-details.html',
				controller: 'BucketDetailsCtrl'

			}).
			when('/buckets/:name/:prefix', 
			{
				templateUrl: 'partials/bucket-details.html',
				controller: 'BucketDetailsCtrl'

			})
			.
			otherwise({ 
				redirectTo: '/buckets'});
		}]);
	