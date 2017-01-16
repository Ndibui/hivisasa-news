hivisasaApp.controller('articleController', ['$scope', '$http', 'NewsAPI','$routeParams','$sce', function($scope, $http, NewsAPI,$routeParams,$sce){
	
	$scope.imgBaseUrl = "http://static-hivisasa-com.s3-accelerate.amazonaws.com";
	$scope.nid = $routeParams.nid; 
	

	console.log($scope.nid);

	$scope.dateFormat = function(unf_date){
		var date = new Date(unf_date);
		return date.toString("MMMM dd, yyyy");
	}

	$scope.articleRqst = NewsAPI.article.get({nid: $scope.nid}, function(article){
		$scope.author = article.author;
		$scope.article = article.content;
		$scope.recentarticles = article.recent_articles;
		$scope.relatedarticles = article.related_articles;
		$scope.toparticles = article.top_articles;
		console.log(article);
	});

	$scope.handleHtmlTags = function(contentWithTags){
		return $sce.trustAsHtml(contentWithTags); //handle html tags
	}

}]);

