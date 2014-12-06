<!DOCTYPE html>
<html ng-app="dice">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<!--CSS LINKS-->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="./css/styles.css" rel="stylesheet">
	<style type="text/css">
	body {
		color: #333;
		padding: 20px;
		text-align: center;
		font-family: Arial;
	}

	.launchSpace {
		height: 250px;
	}

	/* 3D Cube */
	.space3d {
		position: relative;
		top: 180px;
		perspective: 1000px;
		width: 50px;
		height: 50px;
		text-align: center;
		display: inline-block;
	}

	._3dbox {
		display: inline-block;
		transition: all 0.85s cubic-bezier(0.175, 0.885, 0.32, 1.275);
		text-align: center;
		position: relative;
		width: 100%;
		height: 100%;
		transform-style: preserve-3d;
		/*transform: rotateX(-15deg) rotateY(15deg);*/
	}

	._3dface {
		overflow: hidden;
		position: absolute;
		border: 1px solid #888;
		background: #FFF;
		color: #333;
		line-height: 50px;
		opacity: 0.8;
	}

	._3dface--front {
		width: 50px;
		height: 50px;
		transform: translate3d(0, 0, 25px);
	}

	._3dface--top {
		width: 50px;
		height: 50px;
		transform: rotateX(90deg) translate3d(0, 0, 25px);
	}

	._3dface--bottom {
		width: 50px;
		height: 50px;
		transform: rotateX(-90deg) translate3d(0, 0, 25px);
	}

	._3dface--left {
		width: 50px;
		height: 50px;
		left: 50%;
		margin-left: -25px;
		transform: rotateY(-90deg) translate3d(0, 0, 25px);
	}

	._3dface--right {
		width: 50px;
		height: 50px;
		left: 50%;
		margin-left: -25px;
		transform: rotateY(90deg) translate3d(0, 0, 25px);
	}

	._3dface--back {
		width: 50px;
		height: 50px;
		transform: rotateY(180deg) translate3d(0, 0, 25px);
	}
	</style>
</head>
<body ng-controller="DiceController">

	<div class="launchSpace">

		<div class="space3d">

			<div class="_3dbox">
				<div class="_3dface _3dface--front">
					<span>1</span>
				</div>
				<div class="_3dface _3dface--back">
					<span>6</span>
				</div>
				<div class="_3dface _3dface--top">
					<span>2</span>
				</div>
				<div class="_3dface _3dface--bottom">
					<span>5</span>
				</div>
				<div class="_3dface _3dface--left">
					<span>3</span>
				</div>
				<div class="_3dface _3dface--right">
					<span>4</span>
				</div>
			</div>

		</div>
		<div class="space3d">

			<div class="_3dbox">
				<div class="_3dface _3dface--front">
					<span>1</span>
				</div>
				<div class="_3dface _3dface--back">
					<span>6</span>
				</div>
				<div class="_3dface _3dface--top">
					<span>2</span>
				</div>
				<div class="_3dface _3dface--bottom">
					<span>5</span>
				</div>
				<div class="_3dface _3dface--left">
					<span>3</span>
				</div>
				<div class="_3dface _3dface--right">
					<span>4</span>
				</div>
			</div>

		</div>
		<div class="space3d">

			<div class="_3dbox">
				<div class="_3dface _3dface--front">
					<span>1</span>
				</div>
				<div class="_3dface _3dface--back">
					<span>6</span>
				</div>
				<div class="_3dface _3dface--top">
					<span>2</span>
				</div>
				<div class="_3dface _3dface--bottom">
					<span>5</span>
				</div>
				<div class="_3dface _3dface--left">
					<span>3</span>
				</div>
				<div class="_3dface _3dface--right">
					<span>4</span>
				</div>
			</div>

		</div>
		<div class="space3d">

			<div class="_3dbox">
				<div class="_3dface _3dface--front">
					<span>1</span>
				</div>
				<div class="_3dface _3dface--back">
					<span>6</span>
				</div>
				<div class="_3dface _3dface--top">
					<span>2</span>
				</div>
				<div class="_3dface _3dface--bottom">
					<span>5</span>
				</div>
				<div class="_3dface _3dface--left">
					<span>3</span>
				</div>
				<div class="_3dface _3dface--right">
					<span>4</span>
				</div>
			</div>

		</div>
		<div class="space3d">

			<div class="_3dbox">
				<div class="_3dface _3dface--front">
					<span>1</span>
				</div>
				<div class="_3dface _3dface--back">
					<span>6</span>
				</div>
				<div class="_3dface _3dface--top">
					<span>2</span>
				</div>
				<div class="_3dface _3dface--bottom">
					<span>5</span>
				</div>
				<div class="_3dface _3dface--left">
					<span>3</span>
				</div>
				<div class="_3dface _3dface--right">
					<span>4</span>
				</div>
			</div>

		</div>

	</div>


	<button class="launch" ng-click="getDices()">Launch</button>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.4/angular.min.js"></script>

	<script type="text/javascript">

	var cubeTimer;

	$('.launch').click(function() {
		cubeTimer = setInterval(function() {

			for (var i = 0; i < 5; i++) {
				var rotationX = getRandomInt(-180, 180);
				var rotationY = getRandomInt(-180, 180);

				var cssRotation = 'rotateX('.concat(rotationX, 'deg) rotateY(', rotationY, 'deg)');

				document.getElementsByClassName('_3dbox')[i].style.transform = cssRotation;
			}

		}, 200);

		/*moviment bot to top*/

		$('.space3d').animate({
			top: "20px"
		}, 2000);

		setTimeout(setDice, 2000);
	});

	var sides = ['rotateY(0deg)', 'rotateX(-90deg)', 'rotateY(90deg)', 'rotateY(-90deg)', 'rotateX(90deg)', 'rotateY(180deg)'],
		dices;

	function setDice () {
		clearInterval(cubeTimer);
		for (var i = 0; i < 5; i++) {
			document.getElementsByClassName('_3dbox')[i].style.transform = sides[dices[i]-1];
		};
	}

	function getRandomInt(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}

	$('.stop').click(function() {
		clearInterval(cubeTimer);
		var number = getRandomInt(0, 5);
		$('._3dbox').css('transform', sides[number]);
		console.log(number);
	});

	var sides = ["rotateY(0deg)", "rotateX(-90deg)", "rotateY(90deg)", "rotateY(-90deg)", "rotateX(90deg)", "rotateY(180deg)"];



	/*ANGULAR*/
	angular.module('dice', []).controller('DiceController', ['$scope', '$http', function($scope, $http) {

		$scope.getDices = function ()
		{
			$http.get('http://192.168.117.137/grp32/site/public/randoms').
			success(function(data, status, headers, config) {
				dices = data;
			}).
			error(function(data, status, headers, config) {
				console.log("unable to get data");
			});
		};

	}]);


	</script>
</body>
</html>