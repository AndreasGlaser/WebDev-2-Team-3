
app.controller('algebraCtrl', function($scope, $rootScope) {
	$scope.submit = function() {
		if($scope.answer == 'yes')
		$rootScope.knowlegdePoints++;
	}
		$scope.$on('$viewContentLoaded', function(event) {
			for (i = 0; i<10;++i){
				getQuestion(i+1);
			}
			document.getElementById("1").className="item active";

			function getQuestion(id) {
				request = new XMLHttpRequest();
				var url= 'getQuestion.php?id='+id;
				console.log(url);
				request.onreadystatechange = function() {
					 addQuestion(id);
				 }
				request.open("GET", url, false);
				request.send();
				console.log(request.responseURL);
			}

			function addQuestion(id) {
				console.log(request.readyState);
				console.log(request.status);
				if (request.readyState == 4 && request.status == 200) {
					var div = document.createElement('div');
					div.id = id;
					div.className = "item";
					div.innerHTML = request.responseText;
					document.getElementById("carousel-inner").appendChild(div);
				}
			}
		});
	});
