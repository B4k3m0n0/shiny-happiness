<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>YAHTZEE - The Game</title>
		<link href="img/favicon.png" rel="shortcut icon">
		@include('layouts.style')
	</head>
	<body>
		<div class="nav-top" role="navigation">
			@yield('navbar')
		</div>

		@yield('leftbar')

		<div class="mainbody col-md-12">
			@yield('mainbody')
		</div>
		@yield('chat-room')
		
		@include('layouts.script')
		{{ HTML::script('http://192.168.117.137:8080/socket.io/socket.io.js') }}
		{{ HTML::script('js/node-chat-client.js') }}
	</body>
</html>