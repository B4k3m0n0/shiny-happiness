angular.module('chat', []).controller('ChatController', ['$scope', '$http', function($scope, $http) {

/*------------- NODE FUNCTIONS -------------*/

	$(document).ready(function () {

		$scope.messages = [];
		var color = 'rgb(51,51,51)';
		var	socket = io.connect('http://192.168.117.137:8080');

		/*Connections to server*/
		socket.on('connect', function() {
			socket.emit('clientConnect', $scope.username);
		    console.log('Connected');
		});

		socket.on('disconnect', function() {
			console.log('Server is down');
		});
		/*End connections to server*/

		socket.on('users', function(usernamesConnected) {
			$('.chat-users-body ul').empty();
			$('.chat-users-body ul').append('<li class="type-user-span"><span>Spectator</span></li>');
			for (var i = 0; i < usernamesConnected.length; i++) {
				$('.chat-users-body ul').append('<li><span class="list-users-span">' + usernamesConnected[i] + '</span></li>');
			}
		});


		$scope.submit = function() {
			common();
		};

		function common () {
			var chatMessage = { message: $scope.message, username: $scope.username, textColor: color};
			socket.emit('clientToServerMessage', chatMessage);
		}


		$scope.sendMessage = function (event) {
			if (event.keyCode === 13 && event.shiftKey === false){
				common();
				event.preventDefault();
		    }
		}

		$('.colors').click(function () {
			color = $( this ).css( 'background-color' );
		});

		function addZero(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}


		socket.on('serverToClientMessage', function (data) {
			var currentTime = new Date(),
				time = addZero(currentTime.getHours()) + ':' + addZero(currentTime.getMinutes()),
				classType = null;

			/*Add Class open or closed timer*/
			if($('.checkbox label input').is(':checked')) {
		        classType = 'open';
		    }else{
		        classType = 'closed';
		    }

			$('.chat-body ul').append('<li><span class="chat-timer ' + classType + '">' + time + ' </span><span class="chat-username-span" style="color: ' + data.textColor +'">' + data.username + ': </span><span>' + data.message.replace(/\</g, '&lt') + '</span></li>');
			$('.chat-text').val('');
			$scope.message = null;
		});
/*------------- END NODE FUNCTIONS -------------*/

	});
}]);

angular.bootstrap(document.getElementById('chat'), ['chat']);