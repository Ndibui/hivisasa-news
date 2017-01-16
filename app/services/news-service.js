hivisasaApp.factory('NewsAPI', function($resource){
	return {
		article: $resource('http://api.hivisasa.com/v1/articles/:nid',{nid: '@nid'}),
		topLocationArticles: $resource('http://api.hivisasa.com/v1/articles/county/:location/top',{location: '@location'}),
		latestLocationArticles: $resource('http://api.hivisasa.com/v1/articles/county/:location/page/:pagenumber',{location: '@location', pagenumber: '@pagenumber'}),
		latestCategoryArticles: $resource('http://api.hivisasa.com/articles/county/:location/category/:categoryname',{location: '@location', categoryname: '@categoryname'})
	};
});