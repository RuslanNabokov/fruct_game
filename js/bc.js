window.onload = function (){ 


var cvs = document.getElementById("canvas");
var ctx = cvs.getContext("2d");

var bird = new Image();
var bg = new Image();
var fg = new Image();
var pipeUp = new Image();
var pipeBottom = new Image();
var mango = new Image();

mango.src = 'img/mango1.png'
bird.src = "img/bird.png";
bg.src = "img/bg.png";
fg.src = "img/fg.png";
pipeUp.src = "img/pipeUp.png";
pipeBottom.src = "img/pipeBottom.png";

// Звуковые файлы
var fly = new Audio();
var score_audio = new Audio();

fly.src = "audio/fly.mp3";
score_audio.src = "audio/score.mp3";

var gap = 170;

// action keyw 
document.addEventListener("keydown", moveUp);

function moveUp() {
 yPos -= 25;
 fly.play();
    bird.src = "img/bird_flip.png";
 setTimeout(upb, 1000);
}
function upb(){

    bird.src = "img/bird.png";
}
// Создание блоков
var pipe = [];

var bonush = [0, mango];


pipe[0] = {
 x : cvs.width,
 y : 0,
 bonus: bonush[1], 
  gap :  Math.floor(Math.random() * (300 - 150 ) + 150 )
}

var score = 0;
// Позиция птички
var xPos = 10;
var yPos = 150;
var grav = 1.5;

function draw() {




 ctx.drawImage(bg, 0, 0);
  
 for(var i = 0; i < pipe.length; i++) {   //cicl po pip


 ctx.drawImage(pipeUp, pipe[i].x, pipe[i].y);
 ctx.drawImage(pipeBottom, pipe[i].x, pipe[i].y + pipeUp.height + pipe[i].gap);
 ctx.drawImage( pipe[i].bonus, pipe[i].x, pipe[i].y  + pipe[i].gap + pipe[i].yb  , 25 , 25);
    


    function bonusRandom(){
    	return Math.floor(Math.random() * (100 - 7) + 7 )
    }

 pipe[i].x--;

 if(pipe[i].x == 125) {   // esli pipe ushel za pridel 
 pipe.push({
 x : cvs.width,
 y : Math.floor(Math.random() * pipeUp.height) - pipeUp.height,
 bonus:  bonush[1],
 xb: cvs.width,
 yb:   Math.floor(Math.random() * (180 - 90 ) + 90 ),
   gap :  Math.floor(Math.random() * (130 - 90 ) + 90 )

 });
 }


 // Отслеживание прикосновений



if ( xPos + bird.width >= pipe[i].x    &&  xPos <=  pipe[i].x + 5   && ( (yPos + bird.height >=   pipe[i].y  + pipe[i].gap  + pipe[i].yb) && (yPos  <=   pipe[i].y  + pipe[i].gap  + pipe[i].yb + 25)  )  ){

	pipe[i].yb += 1000
}






if((pipe[i].y + pipe[i].gap  + pipe[i].yb + 20 <= pipe[i].y + pipeUp.height)) 

 {
pipe[i].yb += 1000; // ubiraem mango kotoroe zashlo za gran

 }





 //bird and pipe 
 if(xPos + bird.width >= pipe[i].x
 && xPos <= pipe[i].x + pipeUp.width
 && (yPos <= pipe[i].y + pipeUp.height
 || yPos + bird.height >= pipe[i].y + pipeUp.height + pipe[i].gap ) || yPos + bird.height >= cvs.height - fg.height) {
 location.reload(); // Перезагрузка страницы
 }

 if(pipe[i].x == 5) {

 score++;
 score_audio.play();
 }
 }

 ctx.drawImage(fg, 0, cvs.height - fg.height);
 ctx.drawImage(bird, xPos, yPos);

 yPos += grav;

 ctx.fillStyle = "grey";
 ctx.font = "24px Verdana";
 ctx.fillText("Счет: " + score, 10, cvs.height - 20);

 requestAnimationFrame(draw);
}

pipeBottom.onload = draw;

}



