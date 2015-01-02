var server = require('/usr/local/lib/node_modules/socket.io').listen(8080).sockets;

console.log('Server started.');

var socketUsername = {};

var gameRooms = {};
var gamesToUpdate = {};
var fullServers = [];

/*Chat*/
var gameChatRooms = {};

server.on('connection', function (socket) {

	/*Chat*/
	socket.on('connectToGameChat', function (gameID, username) {
		socketUsername[socket.id] = {'gameID': gameID, 'username': username};
		socket.join('Game-'+gameID);
		if (gameChatRooms.hasOwnProperty(gameID)) {
			gameChatRooms[gameID].push(username);
		}else{
			var gameChatRoomUsers = [];
			gameChatRoomUsers.push(username);
			gameChatRooms[gameID] = gameChatRoomUsers;
		}
		server.in('Game-'+gameID).emit('listChatUsers', gameChatRooms[gameID]);
	});

	socket.on('clientToServerMessage', function (dataMessage, gameID) {
		console.log('Message recived from ' + dataMessage.username + '. Content: ' + dataMessage.message);
		server.in('Game-'+gameID).emit('serverToClientMessage', dataMessage);
	});
	/*End Chat*/

	/*Global*/
	socket.on('disconnect', function (){
		if (socketUsername.hasOwnProperty(socket.id)) {
			var username = socketUsername[socket.id].username;
			var gameID = socketUsername[socket.id].gameID;
			var index = gameChatRooms[gameID].indexOf(username);
			gameChatRooms[gameID].splice(index, 1);
			delete socketUsername[socket.id];
			socket.leave('Game-'+gameID);

			server.in('Game-'+gameID).emit('listChatUsers', gameChatRooms[gameID]);
		}
	});
	/*End Global*/

	/*Lobby*/
	socket.on('createGame', function (game, username){
		var usersInRoom = [];
		socket.join(game.id);
		gameRooms[game.id] = usersInRoom;
		usersInRoom.push(username);
		gamesToUpdate[game.id] = game;
		socket.emit('gameMyJoin', usersInRoom);
	});

	socket.on('updateGame', function (game){
		gamesToUpdate[game.id] = game;
		socket.broadcast.to(game.id).emit('gameUpdate', game);
	});

	socket.on('joinedGame', function (gameID, username) {
		gameRooms[gameID].push(username);
		socket.emit('gameMyJoin', gameRooms[gameID], gamesToUpdate[gameID]);
		socket.broadcast.to(gameID).emit('gameOthersJoin', gameRooms[gameID]);
	});

	socket.on('exitGame', function (gameID, username) {
		socket.leave(gameID);
		var index = gameRooms[gameID].indexOf(username);
		if (index != -1) {
			gameRooms[gameID].splice(index, 1);
		}
		socket.emit('gameMyJoin', gameRooms[gameID], gamesToUpdate[gameID]);
		socket.broadcast.to(gameID).emit('gameOthersJoin', gameRooms[gameID]);
	});

	socket.on('setIsFull', function (gameID, state) {
		if (state == true) {
			fullServers.push(gameID);
		}else{
			var index = fullServers.indexOf(gameID);
			if (index != -1) {
				fullServers.splice(index, 1);
			}
		}
		server.emit('getIsFull', fullServers);
	});

	socket.on('startGame', function (gameID) {
		server.in(gameID).emit('gameStarted', gameID);
	});



	/*Game data exchange*/

	socket.on('sendDice', function (dice, gameID, board) {
		socket.broadcast.to('Game-'+gameID).emit('gameDice', dice, board);
	});

	socket.on('sendSelectedDice', function (gameID, selectedDice){
		socket.broadcast.to('Game-'+gameID).emit('gameSelectedDice', selectedDice);
	});

	socket.on('sendSelectedBoard', function (gameID, selectedDice, currentPlayer){
		socket.broadcast.to('Game-'+gameID).emit('gameSelectedBoard', selectedDice, currentPlayer);
	});

	/*End Game data exchange*/
});