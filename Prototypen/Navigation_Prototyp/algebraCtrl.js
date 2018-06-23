
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
				request.onreadystatechange = function() {
					 addQuestion(id);
				 }
				request.open("GET", url, false);
				request.send();
			}

			function addQuestion(id) {
				if (request.readyState == 4 && request.status == 200) {
					var div = document.createElement('div');
					div.id = id;
					div.className = "item";
					div.innerHTML = request.responseText;
					document.getElementById("carousel-inner").appendChild(div);
				}
			}

			var handler = function() {
				var active = document.getElementsByClassName("item active")[0];
				var id = active.id;
				var answer = active.querySelector('input[name = "optradio"]:checked');
				request = new XMLHttpRequest();
				var url= 'getAnswer.php?id='+id;
				request.onreadystatechange = function() {
					 showAnswer(id, answer);
				 }
				request.open("GET", url, true);
				request.send();
			};

			var check = document.getElementsByClassName("btn btn-success")[0];
			check.addEventListener("click", handler, false);

			function showAnswer(id, answer) {
				if (request.readyState == 4 && request.status == 200) {
					if (request.responseText==answer.nextSibling.textContent){
					 	answer.parentNode.parentNode.style="background-color:green;";
					}
					else {
						answer.parentNode.parentNode.style="background-color:red;";
					}
				}
			}
		});
	});
