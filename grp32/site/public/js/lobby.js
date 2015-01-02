var socket = io.connect('http://192.168.117.137:8080');

var gameCreated;

main.controller('LobbyController', ['$scope', '$http', function($scope, $http) {

	$scope.nameFilter = 0;
	$scope.sizeFilter = 0;
	$scope.statusFilter = 0;
	$scope.botsFilter = 0;
	$scope.numPlayersOnLobby = 1;
	$scope.reverse = false;
	$scope.createGameStatus = "Create";
	$scope.noFullGame = false;

	/*--------GAME FILTERS-------*/
	$scope.filterByName = function () {
		if($scope.nameFilter == 0){
			$scope.reverse = false;
		}
		$scope.nameFilter = ($scope.nameFilter == 1 ? '2' : '1');
		if ($scope.nameFilter != 0){
			$scope.sizeFilter = 0;
			$scope.statusFilter = 0;
			$scope.botsFilter = 0;
		}
		$scope.reverse = !$scope.reverse;
	}

	$scope.filterBySize = function () {
		if($scope.sizeFilter == 0){
			$scope.reverse = false;
		}
		$scope.sizeFilter = ($scope.sizeFilter == 1 ? '2' : '1');
		if ($scope.sizeFilter != 0){
			$scope.nameFilter = 0;
			$scope.statusFilter = 0;
			$scope.botsFilter = 0;
		}
		$scope.reverse = !$scope.reverse;
	}

	$scope.filterByStatus = function () {
		if($scope.statusFilter == 0){
			$scope.reverse = false;
		}
		$scope.statusFilter = ($scope.statusFilter == 1 ? '2' : '1');
		if ($scope.statusFilter != 0){
			$scope.sizeFilter = 0;
			$scope.nameFilter = 0;
			$scope.botsFilter = 0;
		}
		$scope.reverse = !$scope.reverse;
	}

	$scope.filterByBots = function () {
		if($scope.botsFilter == 0){
			$scope.reverse = false;
		}
		$scope.botsFilter = ($scope.botsFilter == 1 ? '2' : '1');
		if ($scope.botsFilter != 0){
			$scope.sizeFilter = 0;
			$scope.statusFilter = 0;
			$scope.nameFilter = 0;
		}
		$scope.reverse = !$scope.reverse;
	}

	/*--------END OF GAME FILTERS-------*/


	socket.on('gameOthersJoin', function (usernames) {
		$scope.numPlayersOnLobby = usernames.length;
		$scope.playersOnLobby = usernames;
	});

	socket.on('gameMyJoin', function (usernames) {
		$scope.numPlayersOnLobby = usernames.length;
		$scope.playersOnLobby = usernames;
	});

	socket.on('gameStarted', function (gameId) {
		$scope.enterGameId = gameId;
		$scope.$apply();
	})

	$scope.$watch('numPlayersOnLobby', function(){
		setTotalPlayerSize();
		setTotalBotSize();
	});

	setTotalPlayerSize = function () {
		var j = $scope.players.length;
		while( j-- ) {
			if( $scope.players[j].name == $scope.numPlayersOnLobby ) break;
		}
		if (j == -1) {
			for (var i = $scope.players[0].name; i > 2; i--) {
				$scope.players.splice(0, 0, {name: i-1});
			}
		}else{
			$scope.players.splice(0, j);
		}
	}

	setTotalBotSize = function () {
		var j = $scope.bots[$scope.bots.length-1].name;
		while( j-- ) {
			if( $scope.bots[j].name == $scope.playerDefined.name-$scope.numPlayersOnLobby ) break;
		}
		if (j == -1) {
			for (var i = $scope.bots.length; i <= $scope.playerDefined.name-$scope.numPlayersOnLobby; i++) {
				$scope.bots.splice(i, 0, {name: i});
			}
		}else{
			$scope.bots.splice(j+1, $scope.bots[$scope.bots.length-1].name-j);
		}
	}

	$scope.players = [];
	for (var i = 2; i <= 10; i++) {
		$scope.players.push({name: i});
	}
	$scope.playerDefined = $scope.players[0];

	$scope.bots = [];
	for (var j = 0; j < $scope.playerDefined.name; j++) {
		$scope.bots.push({name: j});
	}
	$scope.botDefined = $scope.bots[0];


	$scope.redefineBots = function () {
		setTotalBotSize();
		$scope.botDefined = $scope.bots[0];
	}

	updateTotalPlayers = function (num) {
		var aux = 0;
		if ($scope.numPlayersOnLobby > 2) {
			aux = $scope.numPlayersOnLobby-2;
		}
		$scope.playerDefined = $scope.players[num-2-aux];
		setTotalBotSize();
	}

	updateTotalBots = function (num) {
		$scope.botDefined = $scope.bots[num];
	}

	$scope.gameCreator = function () {
		if ($scope.createGameStatus == "Create") {
			$scope.createGameStatus = "Start";
			if ($scope.gameName == null) {
				$scope.gameName = 'Unnamed Game';
			}
			$http.post('http://192.168.117.137/grp32/site/public/createGame', {'gameName': $scope.gameName, 'totalPlayersDefined': $scope.playerDefined.name, 'botsDefined': $scope.botDefined.name}).
			success(function(data, status, headers, config) {
				gameCreated = data;
				socket.emit('createGame', gameCreated, $scope.username);
			}).
			error(function(data, status, headers, config) {
				console.log("unable to set data");
			});
		}else{
			$http.post('http://192.168.117.137/grp32/site/public/startGame', {'id': gameCreated.id, 'players': $scope.playersOnLobby}).
			success(function(data, status, headers, config) {
				socket.emit('startGame', gameCreated.id);
			}).
			error(function(data, status, headers, config) {
				console.log("unable to set data");
			});
		}
	}

	updateCreatedGame = function() {
		if ($scope.createGameStatus == "Start") {
			$http.post('http://192.168.117.137/grp32/site/public/updateGame', {'id': gameCreated.id, 'totalPlayersDefined': $scope.playerDefined.name, 'botsDefined': $scope.botDefined.name}).
			success(function(data, status, headers, config) {
				socket.emit('updateGame', data);
			}).
			error(function(data, status, headers, config) {
				console.log("unable to update data");
			});
		}
	}

	$scope.destroyGame = function () {
		$scope.createGameStatus = "Create";
	}

	$scope.screenSelectedtoEnter = function (game) {
		$scope.screenSelected = "enter game";
		$scope.enteredGame = game;
		socket.emit('joinedGame', $scope.enteredGame.id, $scope.username);
	}

	$scope.exitGame = function () {
		socket.emit('exitGame', $scope.enteredGame.id, $scope.username);
	}

}]);

main.controller('ItemController', ['$scope', '$timeout', function($scope, $timeout) {
	$scope.show = false;
	$scope.notFull = true;
	var timer;

	socket.on('getIsFull', function (fullLobbyList) {
		if (fullLobbyList.indexOf($scope.game.id*1) != -1) {
			$scope.notFull = false;
		}else{
			$scope.notFull = true;
		}
	});

	$scope.showIt = function () {
		timer = $timeout(function () {
			$scope.show = true;
		}, 200);
	};
	$scope.hideIt = function () {
		$timeout.cancel(timer);
		$scope.show = false;
	};

}]);

var positionBotSpecial = 0,
positionPlace = 0,
positionBot = 0,
positionUser = 0,
isFull = false;

main.controller('CreateGameController', ['$scope', function($scope) {
	$scope.username = "Waiting...";
	$scope.state = "waiting";
	$scope.bot = "Add Bot";

	$scope.placeUpdater = function (posPlace) {
		if ($scope.state != "remove" && $scope.playerDefined.name > 2) {
			positionPlace = posPlace;
			if ($scope.state == "bot") {
				updateTotalBots($scope.botDefined.name-1);
			}
			updateTotalPlayers($scope.playerDefined.name-1);
		}else if ($scope.state == "remove") {
			positionPlace = posPlace;
			updateTotalPlayers($scope.playerDefined.name+1);
		}
	}

	$scope.botUpdater = function (posBot) {
		if ($scope.state != "bot" && $scope.botDefined.name < $scope.playerDefined.name - 1) {
			positionBotSpecial = posBot;
			updateTotalBots($scope.botDefined.name+1);
		}else if ($scope.state == "bot") {
			positionBotSpecial = posBot;
			updateTotalBots($scope.botDefined.name-1);
		}
	}

	socket.on('gameMyJoin', function (usernames) {
		$scope.users = usernames;
	});

	socket.on('gameOthersJoin', function (usernames) {
		$scope.users = usernames;
	});

	setLobbyFull = function () {
		if (gameCreated != null) {
			if ($scope.users != null && $scope.users.length == $scope.playerDefined.name-$scope.botDefined.name && isFull == false) {
				isFull = true;
			}else{
				isFull = false;
			}
			socket.emit('setIsFull', gameCreated.id, isFull);
		}
	}

	$scope.$watch('users', function () {
		if (($scope.state == "waiting" || $scope.state == "user") && $scope.users != null && $scope.position <= $scope.users.length) {
			$scope.username = $scope.users[positionUser];
			$scope.state = "user";
			if ($scope.position == 1) {
				$scope.place = null;
			}else{
				$scope.place = "Kick";
			}
			positionUser++;
		}else if ($scope.state == "user") {
			$scope.state = "waiting";
			$scope.username = "Waiting...";
			$scope.place = "Remove";
		}
		if ($scope.position == 10) {
			setLobbyFull();
			positionUser = 0;
		}
	});

	$scope.$watch('playerDefined', function () {
		if ($scope.state != "user") {
			/*Faz ao modificar individualmente*/
			if ($scope.position == positionPlace) {
				if ($scope.state != "remove") {
					$scope.place = "Add";
					$scope.username = "Place Removed";
					$scope.bot = "Add Bot";
					$scope.state = "remove";
				}else{
					$scope.place = "Remove";
					$scope.username = "Waiting...";
					$scope.state = "waiting";
				}
				/*Faz ao abrir pagina e ao mudar no cabeçalho*/
			}else if(positionPlace == 0) {
				if ($scope.position > $scope.playerDefined.name) {
					$scope.place = "Add";
					$scope.username = "Place Removed";
					$scope.bot = "Add Bot";
					$scope.state = "remove";
				}else{
					$scope.place = "Remove";
					$scope.username = "Waiting...";
					$scope.state = "waiting";
				}
			}
		}
		if ($scope.position == 10) {
			positionPlace = 0;
			setLobbyFull();
		}
	});

	helperFunc = function (){
		if ($scope.createGameStatus == "Start") {
			return $scope.numPlayersOnLobby;
		}
		return 0;
	}

	$scope.$watch('botDefined', function () {
		if ($scope.state != "user") {
			/*Faz ao modificar individualmente*/
			if ($scope.position == positionBotSpecial) {
				if ($scope.state == "waiting") {
					$scope.bot = "Remove Bot";
					$scope.username = "Bot"+$scope.position;
					$scope.state = "bot";
				}else{
					$scope.bot = "Add Bot";
					$scope.place = "Remove";
					$scope.username = "Waiting...";
					$scope.state = "waiting";
				}
				/*Faz ao abrir pagina e ao mudar no cabeçalho*/
			}else if(positionBotSpecial == 0 && $scope.state != "remove") {
				if (positionBot < ($scope.playerDefined.name - helperFunc() - $scope.botDefined.name)) {
					$scope.bot = "Add Bot";
					$scope.place = "Remove";
					$scope.username = "Waiting...";
					$scope.state = "waiting";
					positionBot++;
				}else{
					$scope.bot = "Remove Bot";
					$scope.username = "Bot"+$scope.position;
					$scope.state = "bot";
				}
			}
		}
		if ($scope.position == 10) {
			positionBotSpecial = 0;
			positionBot = 0;
			updateCreatedGame();
			setLobbyFull();
		}
	});
}]);

main.controller('JoinGameController', ['$scope', function($scope) {

	socket.on('gameOthersJoin', function (usernames) {
		$scope.users = usernames;
		$scope.$apply();
	});

	socket.on('gameMyJoin', function (usernames, game) {
		$scope.users = usernames;
		$scope.game = game;
		$scope.$apply();
	});

	socket.on('gameUpdate', function (game) {
		$scope.game = game;
		$scope.$apply();
	});

	$scope.$watch('game', function () {
		if ($scope.game != null && $scope.state != "user") {
			if ($scope.position <= $scope.game.num_players) {
				$scope.state = "waiting";
				$scope.username = "Waiting...";
			}else if ($scope.position <= $scope.game.num_players*1+$scope.game.num_bots*1) {
				$scope.state = "bot";
				$scope.username = "Bot"+$scope.position;
			}else{
				$scope.state = "remove";
				$scope.username = "Place Removed";
			}
		}
	});

	$scope.$watch('users', function () {
		if ($scope.users != null) {
			if ($scope.position <= $scope.users.length) {
				$scope.state = "user";
				$scope.username = $scope.users[$scope.position-1];
			}else if ($scope.state == "user") {
				$scope.state = "waiting";
				$scope.username = "Waiting...";
			}
		}
	});
}]);