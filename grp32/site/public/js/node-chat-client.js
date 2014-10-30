angular.module('app', []).controller('ChatController', ['$scope', '$http', function($scope, $http) {

/*------------- NODE FUNCTIONS -------------*/

	$(document).ready(function () {

		$scope.messages = [];

		try {
			var socket = io.connect('http://192.168.117.137:8080');
		} catch(e) {
			console.log('Server is down');
		}

		$scope.submitMessages;

		$('.chat-text').on('keydown', function(event) {
		    if (event.keyCode == 13 && event.shiftKey == false){
				var chatMessage = { message: $scope.message };

				$http.post('storeMessage', chatMessage);
				socket.emit('newMessage');
				event.preventDefault();
				$scope.message = '';

		    }
		});

		socket.on('getMessage', function() {
			getMessage();
		});


/*------------- END NODE FUNCTIONS -------------*/

/*------------- ANGULAR FUNCTIONS -------------*/

		function getMessage () {	
			$http.get('getMessage').success(function(messages) {

				console.log(messages);
		    	$scope.messages.push(messages);

		    });
		}

		$scope.submitMessages = function() {
		    var chatMessage = { message: $scope.message };

			$http.post('storeMessage', chatMessage);

			socket.emit('newMessage');
		};

/*------------- END ANGULAR FUNCTIONS -------------*/
	});
}]);