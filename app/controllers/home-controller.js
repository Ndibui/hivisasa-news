hivisasaApp.controller('homeController', ['$scope', '$http', 'NewsAPI','$routeParams', function($scope, $http, NewsAPI,$routeParams){
	
	$scope.imgBaseUrl = "http://static-hivisasa-com.s3-accelerate.amazonaws.com";

	$scope.location = $routeParams.location; 
	$scope.currlocation = $scope.location; //location as viewed on browser

	if (typeof $scope.location === 'undefined') {
		$scope.location = "default"; 
		$scope.currlocation= "all";
	}
	if ($scope.location == "all") {
		$scope.location= "default"; 
	}


	$scope.topArticlesRqst = NewsAPI.topLocationArticles.get({location: $scope.location}, function(topArticles){
		$scope.articles = topArticles.articles;
		$scope.opinions = topArticles.tubonge;
	});

	$scope.dateFormat = function(unf_date){
		var date = new Date(unf_date);
		return date.toString("MMMM dd, yyyy");
	}

	$scope.setLocation = function(location){
		$scope.location = location;
		$scope.currlocation = location;
	}

	$scope.getCategory = function(pageuri){
		var category = "";
		var pg_arr = pageuri.split('/');
		if(pg_arr.length > 0){
			category = pg_arr[2];
		}
		return category;
	}

}]);

