/*ANGULAR*/
var socket = io.connect('http://192.168.117.137:8080');

main.controller('GameController', ['$scope', '$http', function($scope, $http) {

	var sides = ['rotateY(0deg)', 'rotateX(-90deg)', 'rotateY(90deg)', 'rotateY(-90deg)', 'rotateX(90deg)', 'rotateY(180deg)'];
	var horizontalVecPos = [];
	var verticalVecPos = [];
	var selectedDice = [];
	var newDice = [];
	var numsGot = [];
	var diceAdder = [];
	$scope.diceRolled = false;
	var newBoardData = [];
	var rerollPossible = true;
	$scope.boardSelectedBonus = {};
	$scope.namePlayers = [];
	$scope.playNumber = 0;
	$scope.boardDataByPlayer = {};

	$scope.isNotNull = function(index, namePlayer) {
		if ($scope.boardDataByPlayer[namePlayer][index] == null) {
			return false;
		}else{
			return true;
		}
	}

	$scope.$watch('listPlayers', function (){
		if ($scope.listPlayers != null) {
			$scope.namePlayers = $scope.listPlayers.split(";");
			$scope.namePlayers.pop();
			$scope.nextPlayer = $scope.namePlayers[0];
			for (var i = 0; i < $scope.namePlayers.length; i++) {
				$scope.boardDataByPlayer[$scope.namePlayers[i]] = [];
				$scope.boardSelectedBonus[$scope.namePlayers[i]] = [];
			}
		}
	});

	function getRandomInt(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}

	socket.on('gameDice', function (dice, board) {
		diceOnScreen();
		stopDice(dice, board);
	});

	$scope.rollDice = function () {
		if (rerollPossible && $scope.playNumber < 3) {
			rerollPossible = false;
			$scope.diceRolled = true;
			$scope.playNumber++;

			/*Get Dice From Server*/
			numsGot = [];
			for (var i = 0; i < selectedDice.length; i++) {
				numsGot.push(diceAdder[selectedDice[i]]);
			}
			$http.post('http://192.168.117.137/grp32/site/public/getDice', {'numberGot': numsGot, 'diceSelected': selectedDice, 'id': $scope.gameId}).
			success(function(data, status, headers, config) {
				diceAdder = [];
				newDice = data.diceGenerated;
				newBoardData = data.boardResult;
				auxNew = 0;

				for (var i = 0; i < 5; i++) {
					if (selectedDice.indexOf(i) != -1) {
						diceAdder.push(numsGot[selectedDice.indexOf(i)]);
					}else{
						diceAdder.push(newDice[auxNew]);
						auxNew++;
					}
				}

				socket.emit('sendDice', diceAdder, $scope.gameId, newBoardData);

				stopDice(diceAdder, newBoardData);
			}).
			error(function(data, status, headers, config) {
				console.log("unable to get data");
			});

			diceOnScreen();
			/*END*/
		}
	}

	socket.on('gameSelectedDice', function (i) {
		funcDiceSelected(i);
	});

	$scope.selected = function (i) {
		if ($scope.diceRolled && $scope.me == $scope.currentPlayer) {
			funcDiceSelected(i);
			socket.emit('sendSelectedDice', $scope.gameId, i);
		}
	}

	funcDiceSelected = function (i) {
		if (document.getElementsByClassName('space3d')[i].style.top != "350px"){
			document.getElementsByClassName('space3d')[i].style.top = 350+"px";
			document.getElementsByClassName('space3d')[i].style.left = 0+"px";
			selectedDice.push(i);
		}else{
			document.getElementsByClassName('space3d')[i].style.top = verticalVecPos[i]+"px";
			document.getElementsByClassName('space3d')[i].style.left = horizontalVecPos[i]+"px";
			selectedDice.splice(selectedDice.indexOf(i), 1);
		}
	}

	socket.on('gameSelectedBoard', function (i, currentPlayer) {
		$scope.boardSelectedBonus[$scope.currentPlayer][i] = $scope.boardDataByPlayer[$scope.currentPlayer][i];
		$scope.boardDataByPlayer[$scope.currentPlayer] = JSON.parse(JSON.stringify($scope.boardSelectedBonus[$scope.currentPlayer]));
		$scope.currentPlayer = currentPlayer;
		resetPlay();
		$scope.$apply();
	});

	$scope.selectBonus = function(i) {
		if ($scope.boardDataByPlayer[$scope.currentPlayer][i] != null && $scope.me == $scope.currentPlayer) {
			$scope.boardSelectedBonus[$scope.currentPlayer][i] = $scope.boardDataByPlayer[$scope.currentPlayer][i];
			$scope.boardDataByPlayer[$scope.currentPlayer] = JSON.parse(JSON.stringify($scope.boardSelectedBonus[$scope.currentPlayer]));

			$http.post('http://192.168.117.137/grp32/site/public/currentPlay', {'id': $scope.gameId, 'numRolls': $scope.playNumber, 'scoreType': i}).
			success(function(data, status, headers, config) {
				socket.emit('sendSelectedBoard', $scope.gameId, i, data.currentPlayer);
				$scope.currentPlayer = data.currentPlayer;
				resetPlay();
			}).
			error(function(data, status, headers, config) {
				console.log("unable to get data");
			});
			$scope.playNumber = 0;
		}
	}

	$scope.isBonusSelected = function(i, namePlayers) {
		return $scope.boardSelectedBonus[namePlayers][i] != null;
	}

	resetPlay = function () {
		$scope.diceRolled = false;
		selectedDice = [];
		resetDicePos();
		diceAdder = [];
	}

	diceOnScreen = function () {
		rotationTimer = setInterval(function() {
			for (var i = 0; i < 5; i++) {
				var rotationX = getRandomInt(-180, 180);
				var rotationY = getRandomInt(-180, 180);

				var cssRotation = "rotateX("+rotationX+"deg) rotateY("+rotationY+"deg)";

				if (selectedDice.indexOf(i) == -1) {
					document.getElementsByClassName('_3dbox')[i].style.transform = cssRotation;
				}
			}
		}, 200);

		var w = document.getElementsByClassName('table')[0].offsetWidth-80;
		horizontalVecPos = [];
		verticalVecPos = [];
		var horizontalPos = getRandomInt(145-w/2, w/2+75);
		horizontalVecPos.push(horizontalPos);
		while(horizontalVecPos.length < 5){
			horizontalPos = getRandomInt(145-w/2, w/2+75);
			for (var i = 0; i < horizontalVecPos.length; i++) {
				if (horizontalPos-60<horizontalVecPos[i]+(i*54) && horizontalPos+60>horizontalVecPos[i]+(i*54)) {
					break;
				}else if(i == horizontalVecPos.length-1){
					horizontalVecPos.push(horizontalPos-(horizontalVecPos.length*54));
					break;
				}
			}
		}

		for (var i = 0; i < horizontalVecPos.length; i++) {
			var verticalPos = getRandomInt(20, 280);
			verticalVecPos.push(verticalPos);
			if (selectedDice.indexOf(i) == -1) {
				document.getElementsByClassName('space3d')[i].style.top = verticalVecPos[i]+"px";
				document.getElementsByClassName('space3d')[i].style.left = horizontalVecPos[i]+"px";
			}
		}
	}

	resetDicePos = function () {
		for (var i = 0; i < horizontalVecPos.length; i++) {
			document.getElementsByClassName('space3d')[i].style.top = 350+"px";
			document.getElementsByClassName('space3d')[i].style.left = 0+"px";
		}
	}

	stopDice = function (dicePos, board) {
		setTimeout(function() {
			clearInterval(rotationTimer);
			for (var i = 0; i < 5; i++) {
				if (selectedDice.indexOf(i) == -1) {
					document.getElementsByClassName('_3dbox')[i].style.transform = sides[dicePos[i]-1];
				}
			}
			rerollPossible = true;
			for (var i = 0; i < board.length; i++) {
				if ($scope.boardSelectedBonus[$scope.currentPlayer][i] != null) {
					$scope.boardDataByPlayer[$scope.currentPlayer][i] = $scope.boardSelectedBonus[$scope.currentPlayer][i];
				}else{
					$scope.boardDataByPlayer[$scope.currentPlayer][i] = board[i];
				}
			}
			$scope.$apply();
		}, 1000);
	}

}]);

$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});