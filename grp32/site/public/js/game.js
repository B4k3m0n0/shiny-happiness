/*ANGULAR*/
var socket = io.connect('http://192.168.216.134:8080');

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
			$http.post('http://192.168.216.134/grp32/site/public/getDice', {'numberGot': numsGot, 'diceSelected': selectedDice, 'id': $scope.gameId}).
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

	socket.on('gameSelectedBoard', function (i, currentPlayer, sum, bonus, totalScore) {
		setBonus(sum, bonus, totalScore);
		$scope.boardSelectedBonus[$scope.currentPlayer][i] = $scope.boardDataByPlayer[$scope.currentPlayer][i];
		$scope.boardDataByPlayer[$scope.currentPlayer] = JSON.parse(JSON.stringify($scope.boardSelectedBonus[$scope.currentPlayer]));
		$scope.currentPlayer = currentPlayer;
		resetPlay();
		$scope.$apply();
	});

	$scope.selectBonus = function(i, namePlayer) {
		if ($scope.boardDataByPlayer[$scope.currentPlayer][i] != null && $scope.me == namePlayer && $scope.boardSelectedBonus[$scope.currentPlayer][i] == null) {
			rerollPossible = false;
			console.log("enter");
			$scope.boardSelectedBonus[$scope.currentPlayer][i] = $scope.boardDataByPlayer[$scope.currentPlayer][i];
			$scope.boardDataByPlayer[$scope.currentPlayer] = JSON.parse(JSON.stringify($scope.boardSelectedBonus[$scope.currentPlayer]));

			$http.post('http://192.168.216.134/grp32/site/public/currentPlay', {'id': $scope.gameId, 'numRolls': $scope.playNumber, 'scoreType': i}).
			success(function(data, status, headers, config) {
				socket.emit('sendSelectedBoard', $scope.gameId, i, data.currentPlayer, data.sum, data.bonus, data.totalScore);
				setBonus(data.sum, data.bonus, data.totalScore);

				$scope.currentPlayer = data.currentPlayer;
				resetPlay();
			}).
			error(function(data, status, headers, config) {
				console.log("unable to get data");
			});
			$scope.playNumber = 0;
			rerollPossible = true;
		}
	}

	$scope.isBonusSelected = function(i, namePlayers) {
		return $scope.boardSelectedBonus[namePlayers][i] != null;
	}

	setBonus = function (sum, bonus, totalScore) {
		if (sum != null) {
			$scope.boardDataByPlayer[$scope.currentPlayer][6] = sum;
			$scope.boardSelectedBonus[$scope.currentPlayer][6] = sum;
			console.log("teste");
		}

		if (bonus != null) {
			$scope.boardDataByPlayer[$scope.currentPlayer][7] = bonus;
			$scope.boardSelectedBonus[$scope.currentPlayer][7] = bonus;
			console.log("teste2");
		}

		if (totalScore != null) {
			$scope.boardDataByPlayer[$scope.currentPlayer][15] = totalScore;
			$scope.boardSelectedBonus[$scope.currentPlayer][15] = totalScore;
			console.log("teste3");
		}
	}

	resetPlay = function () {
		$scope.diceRolled = false;
		selectedDice = [];
		resetAllDicePos();
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

	resetAllDicePos = function () {
		for (var i = 0; i < horizontalVecPos.length; i++) {
			resetDicePos(i);
		}
	}

	resetDicePos = function (i) {
		document.getElementsByClassName('space3d')[i].style.top = 350+"px";
		document.getElementsByClassName('space3d')[i].style.left = 0+"px";
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


	/*START GAME*/
	var numberRolls = null;
	var totalRolls = 0;
	$scope.$watch('numberRolls', function () {
		if ($scope.numberRolls != null) {
			numberRolls = $scope.numberRolls.split(";");
			numberRolls.pop();
			for (var i = 0; i < numberRolls.length; i++) {
				totalRolls += numberRolls[i]*1;
			}
			console.log(totalRolls);
		}
	});


	var diceValues;
	var diceSaved;

	$scope.$watch('diceValues', function () {
		if ($scope.diceValues != null) {
			diceValues = $scope.diceValues.split(";");
			diceValues.pop();
			diceValues.splice(0, totalRolls);
			console.log(diceValues);
		}
	});

	$scope.$watch('diceSaved', function () {
		if ($scope.diceSaved != null) {
			diceSaved = $scope.diceSaved.split(";");
			diceSaved.pop();
			diceSaved.splice(0, totalRolls);
			console.log(diceSaved);
			diceApplier(diceValues, diceSaved);
		}
	});

	diceApplier = function (listDice, listDiceSaved) {
		for (var i = 0; i < listDice.length; i++) {
			var listDiceVals = listDice[i].split(",");
			var listDiceSavedVals = listDiceSaved[i].split(",");
			var y = 0;
			for (var k = 0; k < listDiceVals.length; k++) {
				if (listDiceSavedVals.indexOf(y+"") == -1) {
					diceAdder[y] = listDiceVals[k]*1;
				}else{
					k--;
				}
				y++;
			}
			if (i == listDice.length-1) {
				for (var i = 0; i < listDiceSavedVals.length; i++) {
					selectedDice.push(listDiceSavedVals[i]*1);
				}
			}
		}
		console.log(selectedDice);
		console.log(diceAdder);
	}

	$scope.$watch('scores', function () {
		if ($scope.scores != null) {
			var scores = $scope.scores.split(";");
			scores.pop();
			var aux = 0;

			if (diceAdder.length > 0) {
				$http.post('http://192.168.216.134/grp32/site/public/getBoard', {'dice': diceAdder}).
				success(function(data, status, headers, config) {
					$scope.boardDataByPlayer[$scope.currentPlayer] = data.board;
					$scope.playNumber = data.rolls;
				}).
				error(function(data, status, headers, config) {
					console.log("unable to get data");
				});
			}

			console.log(scores);

			for (var i = 0; i < scores.length; i++) {
				if (aux == $scope.namePlayers.length) {
					aux = 0;
				}
				var points = scores[i].split(":");
				if (points[0] == 6 || points[0] == 7 || points[0] == 15) {
					if (aux == 0) {
						aux = $scope.namePlayers.length-1;
					}else{
						aux--;
					}
				}
				$scope.boardDataByPlayer[$scope.namePlayers[aux] ][points[0]] = points[1];
				$scope.boardSelectedBonus[$scope.namePlayers[aux] ][points[0]] = points[1];
				aux++;
			}
			console.log(diceAdder);

			if (diceValues.length == 0) {
				resetAllDicePos();
			}else if (selectedDice.length > 0) {
				for (var i = 0; i < selectedDice.length; i++) {
					document.getElementsByClassName('_3dbox')[selectedDice[i]].style.transform = sides[diceAdder[selectedDice[i]]-1];
					resetDicePos(selectedDice[i]);
				}
				diceOnScreen();
				stopDice(diceAdder, $scope.boardDataByPlayer);
			}else{
				diceOnScreen();
				stopDice(diceAdder, $scope.boardDataByPlayer);
			}
		}
	});

/*END START GAME*/

}]);

$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});