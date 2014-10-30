console.log('Hey!!');

var client = require('/usr/local/lib/node_modules/socket.io').listen(8080).sockets;


var connectionCount = 0;


client.on('connection', function(socket) {

	connectionCount++;
	console.log('Someone has connected!! With:'+connectionCount);

	socket.on('disconnect', function() {
		connectionCount--;
		console.log('Someone has disconnect!! With:'+connectionCount);
	});

	socket.on('newMessage', function() {
		client.emit('getMessage');
	});
});