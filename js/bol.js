var canvas = document.getElementById("myCanvas");

var ctx = canvas.getContext("2d");
var ballRadius = 10;
var x = canvas.width/2;
var y = canvas.height-30;
var dx = 0;
var dy = 10;

function drawBall() {
    ctx.beginPath();
    ctx.arc(x, y, ballRadius, 0, Math.PI*2);
    ctx.fillStyle = "#0095DD";
    ctx.fill();
    ctx.closePath();
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawBall();
    
    if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
        dx = -dx;
    }
    if(y + dy > canvas.height-ballRadius || y + dy < ballRadius) {
        dy = -dy;
    }
      
    x += dx;
    y += dy;
        
        console.log(y)
}

function rX(a,b, r){  //  ##########################################################  Функция  для отслеживания столкновений  по x и y 
return  ((( a - b  < r && a - b > 0)  || (b - a < r && b - a > 0 ) ))
} //  ##########################################################  Функция  для отслеживания столкновений  по x и y 


 canvas.onclick = function(e) {  //  ##########################################################  Функция  обробатывает действия мыши
  x_ = e.clientX - canvas.getBoundingClientRect().left; // 
  y_ = e.clientY - canvas.getBoundingClientRect().top;
  if  ( rX(x, x_, ballRadius) && rX(y, y_,ballRadius) ){
        
  }else{
    console.log( x)
  }

             }

setInterval(draw, 10);

