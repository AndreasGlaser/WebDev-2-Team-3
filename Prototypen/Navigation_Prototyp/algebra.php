<!DOCTYPE html>
<?php $this->title = 'Algebra';?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="display.css">
		<meta charset="UTF-8">
	</head>

	<body ng-app="myApp">

		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<h1>Math Royale</h1>
				</div>
				<div class="col-xs-9" >
					<left>
						<img src="logo_Math_Royale.png" class="img-rounded img-responsive" alt="School Image">
					</left>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-9">
					<div ng-view></div>
				</div>
				<div class="col-xs-2">
					<center>
						<h2>Advanced (Level 2)</h2>
					</center>
				</div>
				<div class="col-xs-1">
					<div class="progress blue">
						<span class="progress-left">
							<span class="progress-bar"></span>
						</span>
						<span class="progress-right">
							<span class="progress-bar"></span>
						</span>
						<div class="progress-value">50%</div>
					</div>
				</div>

				<div class="col-xs-1">
					<div class="progress yellow">
						<span class="progress-left">
							<span class="progress-bar"></span>
						</span>
						<span class="progress-right">
							<span class="progress-bar"></span>
						</span>
						<div class="progress-value">50%</div>
					</div>
				</div>

				<div class="col-xs-2">
					<center>
						<p id ="purple">Knowledgepoints 0</p>
						<p id ="blue">Collaborationpoints 0</p>
						<a href="" id="answerGiven">
							<span class="glyphicon glyphicon-bell gi-2x"></span>
							<span class="label label-info" ng-hide="!isAnswerGiven">new</span>
						</a>
						<a href="" id="newQuestions">
							<span class="glyphicon glyphicon-envelope gi-2x"></span>
							<span class="badge">{{newQuestionsCount}}</span>
						</a>
					</center>
				</div>
			</div>
		</div>

		<script>
			questionsCount = 10;
			knowledgePoints = 0;
			collaborationPoints = 0;
			userid = "<?= Yii::$app->user->identity->id ?>";
			var app = angular.module("myApp", ["ngRoute"]);
			app.config(function($routeProvider){
				$routeProvider
				.when("/", {
				templateUrl : "algebra.htm",
				controller: 'algebraCtrl'
				});
			});

			app.run(function($rootScope){
				$rootScope.newQuestionsCount = 5;
				$rootScope.isAnswerGiven = true;
			});
		</script>
		<script src="algebraCtrl.js"></script>

	</body>
</html>
