var previous = 0,
	sides = ['rotateY(0deg)', 'rotateX(-90deg)', 'rotateY(90deg)', 'rotateY(-90deg)', 'rotateX(90deg)', 'rotateY(180deg)'];

function getRandomInt (min, max) {
  var num = Math.floor(Math.random() * (max - min + 1)) + min;

  while(num == previous){
    num = Math.floor(Math.random() * (max - min + 1)) + min;
  }

  previous = num;
  return num;
}

var cubeTimer = setInterval(function() {
  var number = getRandomInt(0, 5);
  document.getElementsByClassName('cube')[0].style.transform = sides[number];
}, 1500);