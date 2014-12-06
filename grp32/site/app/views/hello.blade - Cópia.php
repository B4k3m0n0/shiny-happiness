<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>YAHTZEE - The Game</title>
	<link href="./img/favicon.png" rel="shortcut icon">
	<link href="./css/hello.css" rel="stylesheet">
</head>
<body>
	<div class="welcome">
		<div class="space">
		    <div class="cube">
		      <div class="face front">
		        <span>1</span>
		      </div>
		      <div class="face back">
		        <span>6</span>
		      </div>
		      <div class="face top">
		        <span>2</span>
		      </div>
		      <div class="face bottom">
		        <span>5</span>
		      </div>
		      <div class="face left">
		        <span>3</span>
		      </div>
		      <div class="face right">
		        <span>4</span>
		      </div>
		    </div>
		</div>
		<a href="{{ URL::route('login') }}">
			<h1>YAHTZEE - The Game</h1>
		</a>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="./js/hello.js"></script>

</body>
</html>
