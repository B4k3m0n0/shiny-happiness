<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Title</title>
		<!--CSS LINKS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href="./css/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="nav-top" role="navigation">
			@section('navbar')
			<!--Navbar Top-->
			@show
		</div>
		<div class="leftbar col-md-2">
			@section('leftbar')
			<!--Navbar Left-->
			@show
		</div>
		<div class="mainbody col-md-10">
			@section('mainbody')
			<!--Corpo Site-->
			@show
		</div>
		@section('chat-room')
		<!--Chat Room-->
		@show
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="./js/dynamic.js"></script>
		<script src="http://192.168.117.137:8080/socket.io/socket.io.js"></script>
		<script src="./js/node-chat-client.js"></script>
	</body>
</html>