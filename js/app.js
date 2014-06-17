'use strict';

var pictureApp = angular.module('pictureApp', ['ngRoute', 'pictureControllers', 'pictureFilters', 'pictureServices', 'ui.bootstrap']);

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
			otherwise({ 
				redirectTo: '/buckets'});
		}]);
	