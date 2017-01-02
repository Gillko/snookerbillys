angular.module("snookerbillys", [])

.controller('mainCtrl', function($scope, $http){
	
	$http.get('http://localhost:8888/public/rankings_json')
		.then(function(res){
			$scope.rankings = res.data;
			$scope.predicate = 'ranking_rank';
		});
	$http.get('http://localhost:8888/public/weeks_json')
		.then(function(res){
			$scope.weeks = res.data;
			//$scope.predicate = 'week_name';
		});
	$http.get('http://localhost:8888/public/matches_json')
		.then(function(res){
			$scope.matches = res.data;
			//$scope.predicate = 'match_scorePlayerHome';
		});
	/*$http.get('http://localhost:8888/public/frames_json')
		.then(function(res){
			$scope.frames = res.data;
			//$scope.predicate = 'match_scorePlayerHome';
		});*/
	})
.filter('unique', function () {
   return function(collection, keyname) {
	  var output = [], 
		  keys = [];

	  angular.forEach(collection, function(item) {

		  var key = item[keyname];
		  if(keys.indexOf(key) === -1) {
			  keys.push(key);

			  output.push(item);
		  }
	  });
	  return output;
	};   
});