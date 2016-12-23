angular.module("snookerbillys", [])

.controller('mainCtrl', function($scope, $http){
	
	$http.get('http://localhost:8888/public/rankings_json')
		.then(function(res){
			$scope.json = res.data;
			$scope.predicate = 'ranking_rank';
		});
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