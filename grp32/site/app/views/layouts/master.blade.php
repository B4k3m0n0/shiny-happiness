<!DOCTYPE html>
<html ng-app="main">
<head>
	<meta charset="UTF-8">
	<title>YAHTZEE - The Game</title>
	<link href="img/favicon.png" rel="shortcut icon">
	@include('layouts.style')
</head>
<body ng-controller="MainController">
	<div class="nav-top" role="navigation">
		@yield('navbar')
	</div>

	<a class="fa left-button" ng-class="{'fa-minus col-md-offset-2 col-sm-offset-2 col-xs-offset-2': leftBar, 'fa-plus': !leftBar}" ng-click="leftBar = !leftBar"></a>
	<div class="leftbar col-md-2 col-sm-2 col-xs-2" ng-show="leftBar">
		@yield('leftbar')
	</div>

	<div class="mainbody" ng-class="{'col-md-12 col-sm-12 col-xs-12': !leftBar && !rightBar, 'col-md-10 col-sm-10 col-xs-10': leftBar && !rightBar, 'col-md-9 col-sm-9 col-xs-12': !leftBar && rightBar, 'col-md-7 col-sm-7 col-xs-10': leftBar && rightBar}">
		@yield('mainbody')
	</div>

	<a class="fa fa-minus hidden-xs right-button" ng-class="{'fa-minus col-md-3 col-sm-3': rightBar, 'fa-plus': !rightBar}" ng-click="rightBar = !rightBar"></a>
	<div class="rightbar col-md-3 col-sm-3 hidden-xs" ng-show="rightBar">
		@yield('rightbar')
	</div>

	{{ HTML::script('http://192.168.216.134:8080/socket.io/socket.io.js') }}
	@include('layouts.script')
</body>
</html>