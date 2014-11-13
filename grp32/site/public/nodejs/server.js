var server = require('/usr/local/lib/node_modules/socket.io').listen(8080).sockets;

console.log('\nServer started.');

var connectionCount = 0,
	usernames = [],
	sockets = [];

server.on('connection', function (socket) {

	socket.on('clientConnect', function (username) {
		connectionCount++;
		console.log(username + ' has connected. Number of connections: ' + connectionCount);
		if (sockets.indexOf(socket) === -1) {
			sockets.push(socket);
			usernames.push(username);
		}
		server.emit('users', usernames);
	});

	socket.on('disconnect', function () {
		connectionCount--;
		var remove = sockets.indexOf(socket);
		sockets.splice(remove, 1);
		console.log(usernames[remove] + ' has disconnect. Number of connections: ' + connectionCount);
		usernames.splice(remove, 1);
		server.emit('users', usernames);
	});

	socket.on('clientToServerMessage', function (data) {
		console.log('Message recived from ' + data.username + '. Content: ' + data.message);
		server.emit('serverToClientMessage', data);
	});
});