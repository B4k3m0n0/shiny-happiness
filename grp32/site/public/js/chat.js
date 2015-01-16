main.controller('ChatController', ['$scope', function($scope) {
	var socket = io.connect('http://192.168.216.134:8080'),
		colorChosen = '#333';
		
	$scope.serverStatus = false;
	$scope.datas = [];
	$scope.palettes = [
		{'lines' : {
			'color1' : {'background-color' : '#00ff7f'}, 
			'color2' : {'background-color' : '#d2691e'}, 
			'color3' : {'background-color' : '#ff69b4'}, 
			'color4' : {'background-color' : '#ff7f51'}, 
			'color5' : {'background-color' : '#9bce32'}
		}}, 
		{'lines' : {
			'color6' : {'background-color' : '#008000'}, 
			'color7' : {'background-color' : '#719a29'}, 
			'color8' : {'background-color' : '#8a2ce2'}, 
			'color9' : {'background-color' : '#0417ab'}, 
			'color10' : {'background-color' : '#fa0000'}
		}}
	];


	/*Connections to server*/
	socket.on('connect', function() {
		socket.emit('connectToGameChat', $scope.gameId , $scope.username);
		$scope.serverStatus = true;
		console.log('Connected');
	});

	socket.on('disconnect', function() {
		$scope.serverStatus = false;
		console.log('Server is down');
	});

	socket.on('listChatUsers', function (listUsersInChat) {
		/*listUsersInChat = listUsersInChat.filter(function(elem, pos) {
			return listUsersInChat.indexOf(elem) == pos;
		});*/

		$scope.players = [];
		$scope.spectators = [];

		for(index in listUsersInChat) {
			if ($scope.playerSequence.indexOf(listUsersInChat[index]+';') != -1) {
				$scope.players.push(listUsersInChat[index]);
			}else{
				$scope.spectators.push(listUsersInChat[index]);
			}
		}
		$scope.$apply();
	});
	/*End connections to server*/

	/*Message Process*/
	$scope.submit = function() {
		common();
	};

	function common () {
		if ($scope.message != null && $scope.serverStatus) {
			var chatMessage = { 'message': $scope.message, 'username': $scope.username, 'colorChosen': colorChosen};
			socket.emit('clientToServerMessage', chatMessage, $scope.gameId);
			$scope.message = null;
		};
	}


	$scope.sendMessage = function (event) {
		if (event.keyCode === 13 && event.shiftKey === false){
			common();
			event.preventDefault();
	    }
	}

	function addZero(i) {
	    if (i < 10) {
	        i = "0" + i;
	    }
	    return i;
	}


	socket.on('serverToClientMessage', function (data) {
		var currentTime = new Date(),
			timer = addZero(currentTime.getHours()) + ':' + addZero(currentTime.getMinutes());
			newMessage = [
				{'time': timer, 'username': data.username, 'message': data.message, 'color': data.colorChosen}
			];

		$scope.$apply(function() {
			$scope.datas = $scope.datas.concat(newMessage);
		});
		
		var messageScroll = document.getElementById('messages');
		messageScroll.scrollTop = messageScroll.scrollHeight;
	});
	/*End Message Process*/

	$scope.colorPicked = function (item) {
		colorChosen = item['background-color'];
	};

	$scope.isActive = function(item) {
		return colorChosen === item['background-color'];
	};

	window.onclick = function() {
		if ($scope.showOptions && !$scope.overOptions && !$scope.overButton) {
			$scope.showOptions = !$scope.showOptions;
			$scope.$apply();
		}
	};

}]);