hivisasaApp.controller('categoryController', ['$scope', '$http', 'NewsAPI','$routeParams', function($scope, $http, NewsAPI, $routeParams){
	
	$scope.imgBaseUrl = "http://static-hivisasa-com.s3-accelerate.amazonaws.com";
	$scope.counties = ['All','National','Garissa','Kiambu','Kibera','Kisii','Kisumu','Machakos','Mombasa','Nakuru','Nyamira','Uasin-Gishu'];

	$scope.location = $routeParams.location;

	if($scope.location == "all" || (typeof $scope.currlocation === 'undefined')){
		$scope.location = "default"; 
		$scope.currlocation = "all"; 
	}else{
		$scope.currlocation = $scope.location;
	}

	$scope.category = $routeParams.category;
	
	$scope.latestCategoryArticlesRqst = NewsAPI.latestCategoryArticles.query({location: $scope.location, categoryname: $scope.category}, function(latestCatArticles){
		$scope.latestArticles = latestCatArticles;
	});

	$scope.dateFormat = function(unf_date){
		var date = new Date(unf_date);
		return date.toString("MMMM dd, yyyy");
	}

	$scope.getDate = function(unf_date){
		var date = new Date(unf_date);
		return date.toString("dd");
	}

	$scope.getMonth = function(unf_date){
		var date = new Date(unf_date);
		return date.toString("MMM");
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