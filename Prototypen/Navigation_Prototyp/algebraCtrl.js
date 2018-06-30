app.controller('algebraCtrl', function($scope, $rootScope) {

		$scope.$on('$viewContentLoaded', function(event) {
			for (i = 0; i<10;++i){
				getQuestion(i+1);
			}
			getKnowledgePoints();
			document.getElementById("1").className="item active";

			function getKnowledgePoints(){
				request = new XMLHttpRequest();
				var url= 'getKnowledgePoints.php?id='+userid;
				request.onreadystatechange = function() {
					 setKnowledgePoints();
				 }
				request.open("GET", url, false);
				request.send();
			}

			function setKnowledgePoints(){
				if (request.readyState == 4 && request.status == 200) {
					knowledgePoints = +request.responseText;
					document.getElementById("purple").textContent = "Knowledgepoints " + knowledgePoints;
				}
			}

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

			function showAnswer(id, answer) {
				if (request.readyState == 4 && request.status == 200) {
					if (request.responseText==answer.nextSibling.textContent){
						if (!(answer.parentNode.parentNode.style.backgroundColor == "green")){
							answer.parentNode.parentNode.style.backgroundColor="green";
							radios = document.getElementById(id).getElementsByClassName("form-check-input");
							for (i = 0; i < 4; ++i){
								radios[i].disabled=true;
							}
							knowledgePoints++;
							document.getElementById("purple").textContent = "Knowledgepoints " + knowledgePoints;
							request = new XMLHttpRequest();
							var url= 'setKnowledgePoints.php?knowledgePoints='+knowledgePoints+'&id='+userid;
							request.open("GET", url, false);
							request.send();
						}
					}
					else {
						answer.parentNode.parentNode.style.backgroundColor="red";
						radios = document.getElementById(id).getElementsByClassName("form-check-input");
						for (i = 0; i < 4; ++i){
							radios[i].disabled=true;
						}
					}
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

			var handler2 = function() {
				document.getElementById("carousel-inner").innerHTML="";
				bound = questionsCount + 10;
				for (questionsCount; questionsCount<bound;++questionsCount){
					getQuestion(questionsCount+1);
				}
				document.getElementById("" + (questionsCount-9)).className="item active";
				document.getElementsByClassName("active")[0].className="";
				document.getElementById("firstIndicator").className="active";
			}

			var handler3 = function() {
				alert("Question is sent to stream.");
				var active = document.getElementsByClassName("item active")[0];
				var id = active.id;
				request = new XMLHttpRequest();
				var url= 'appendToStream.php?id='+id+'&userid='+userid;
				request.open("GET", url, true);
				request.send();
			}

			var checkButton = document.getElementById("checkButton");
			var continueButton = document.getElementById("continueButton");
			var helpButton = document.getElementById("helpButton");
			var infoButton = document.getElementById("infoButton");
			var newQuestions = document.getElementById("newQuestions");
			var answerGiven = document.getElementById("answerGiven");
			continueButton.addEventListener("click", handler2, false);
			checkButton.addEventListener("click", handler, false);
			helpButton.addEventListener("click", handler3, false);

			var modal = document.getElementById('myModal');
			var modalImg = document.getElementById("img01");
			var captionText = document.getElementById("caption");
			infoButton.onclick = function(){
    		modal.style.display = "block";
    		modalImg.src = "info.png";
    		captionText.innerHTML = "";
			}
			newQuestions.onclick = function(){
				modal.style.display = "block";
    		modalImg.src = "newQuestions.png";
    		captionText.innerHTML = "";
			}
			answerGiven.onclick = function(){
				modal.style.display = "block";
    		modalImg.src = "answerGiven.png";
    		captionText.innerHTML = "";
			}
			var span = document.getElementsByClassName("close")[0];
			span.onclick = function() {
  			modal.style.display = "none";
			}
		});
	});
