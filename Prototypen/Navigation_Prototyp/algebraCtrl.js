
app.controller('algebraCtrl', function($scope, $rootScope) {
	$scope.submit = function() {
		if($scope.answer == 'yes')
		$rootScope.knowlegdePoints++;
	}
});