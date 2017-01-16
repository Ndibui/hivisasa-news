var hivisasaApp = angular.module('hivisasaApp',['ngRoute','ngResource','ngSanitize']);

hivisasaApp.config(['$routeProvider', '$locationProvider', function($routeProvider,$locationProvider){

	$routeProvider
		.when('/',{
			templateUrl: 'views/home.html',
			controller: 'homeController'
		})
		.when('/:location',{
			templateUrl: 'views/home.html',
			controller: 'homeController'
		})
		.when('/location/:location/:category',{
			templateUrl: 'views/category.html',
			controller: 'categoryController'
		})
		.when('/article/:nid',{
			templateUrl: 'views/article.html',
			controller: 'articleController'
		})
		.otherwise({
			redirectTo: '/'
		});

	$locationProvider.html5Mode(true); //remove #

}]);