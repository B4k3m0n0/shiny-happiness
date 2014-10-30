<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <!--CSS LINKS-->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="./css/styles.css" rel="stylesheet">
        <style type="text/css">
           body {
  color: #333;
  padding: 20px;
  text-align: center;
  font-family: Arial;
}


/* 3D Cube */
.space3d {
  perspective: 1000px;
  width: 80px;
  height: 80px;
  text-align: center;
  display: inline-block;
}

._3dbox {
  display: inline-block;
  transition: all 0.85s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  text-align: center;
  position: relative;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d;
  transform: rotateX(-15deg) rotateY(15deg);
}

._3dface {
  overflow: hidden;
  position: absolute;
  border: 1px solid #888;
  background: #FFF;
  color: #333;
  line-height: 80px;
  opacity: 0.8;
}

._3dface--front {
  width: 80px;
  height: 80px;
  transform: translate3d(0, 0, 40px);
}

._3dface--top {
  width: 80px;
  height: 80px;
  transform: rotateX(90deg) translate3d(0, 0, 40px);
}

._3dface--bottom {
  width: 80px;
  height: 80px;
  transform: rotateX(-90deg) translate3d(0, 0, 40px);
}

._3dface--left {
  width: 80px;
  height: 80px;
  left: 50%;
  margin-left: -40px;
  transform: rotateY(-90deg) translate3d(0, 0, 40px);
}

._3dface--right {
  width: 80px;
  height: 80px;
  left: 50%;
  margin-left: -40px;
  transform: rotateY(90deg) translate3d(0, 0, 40px);
}

._3dface--back {
  width: 80px;
  height: 80px;
  transform: rotateY(180deg) translate3d(0, 0, 40px);
}
        </style>
    </head>
    <body>

<div class="space3d">
        
    
    <div class="_3dbox">
      <div class="_3dface _3dface--front">
        <span>1</span>
      </div>
      <div class="_3dface _3dface--back">
        <span>6</span>
      </div>
      <div class="_3dface _3dface--top">
        <span>2</span>
      </div>
      <div class="_3dface _3dface--bottom">
        <span>5</span>
      </div>
      <div class="_3dface _3dface--left">
        <span>3</span>
      </div>
      <div class="_3dface _3dface--right">
        <span>4</span>
      </div>
    </div>

</div>

<button class="stop">Stop</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script type="text/javascript">



var cubeTimer = setInterval(function() {

    var rotationX = getRandomInt(-180, 180);
    var rotationY = getRandomInt(-180, 180);

    /*console.log(rotationY);*/

    var cssRotation = 'rotateX('.concat(rotationX, 'deg) rotateY(', rotationY, 'deg)');

    /*console.log(cssRotation);*/

    $('._3dbox').css('transform', cssRotation);

}, 200);


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

$('.stop').click(function() {
    clearInterval(cubeTimer);
    var number = getRandomInt(0, 5);
    $('._3dbox').css('transform', sides[number]);
    console.log(number);
});

var sides = ["rotateY(0deg)", "rotateX(-90deg)", "rotateY(90deg)", "rotateY(-90deg)", "rotateX(90deg)", "rotateY(180deg)"];


</script>
    </body>
</html>