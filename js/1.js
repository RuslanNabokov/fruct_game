window.onload = function (){ 


var width = $('#myCanvas').width()
	height =  $('#myCanvas').height()
cvs = document.getElementById("myCanvas");
ctx = cvs.getContext("2d");

var fructs = [{name: 'apple', img: 'img/img/apple_PNG12484.png'}, {name: 'limon', img: 'img/img/limon.png'}, {name: 'banan', img: 'img/img/banan.png', size: 40}, {name:'klubnika', img: 'img/img/fr.png', size: 40}, {name: "mango", img: 'img/img/mango1.png'}]  // массив с оюбьектами определяющими  фрукты

alert(window.name_gamer )
function randomc(max, min ){
		return Math.floor(Math.random() * (max - min )) + min;
	}

var x  = 0
class Fruct  { //  ##########################################################  класс генерирующий  игровые обьекты 
  constructor() {   // конструктор экземпляра класса 
  	this.obj = fructs[randomc(fructs.length, 0)];this.name = this.obj.name ;this.speed = randomc(150, 70)  / 15;
    this.fr = new Image();this.fr.src =  this.obj.img; this.widthc =  this.obj.size ||   47
    this.heightc = this.obj.size ||   47; this.positionX  =  randomc(width - 155,  4 );
    this.positionY = -15; this.vector = new Victor(this.positionX, this.positionY)
  }  
	} //  ##########################################################  класс генерирующий  игровые обьекты 

function menu(){ //  ##################################################################################### Рисуем меню
var Flag_m = true 
menu_img = new Image();
menu_img.src = "img/img/bc_munu.jpg";

	menu_img.onload = function() {
		ctx.drawImage(menu_img, 0, 0);
/*
var input =  new CanvasInput({
		  canvas: document.getElementById('myCanvas'),  //Создаем инпут в  канвасе 
		  fontSize: 18,
		  fontFamily: 'Andale Mono',
		  fontColor: 'blue',                   
		  fontWeight: '900',
		  width: 0,
		  padding: 0,
		  borderWidth: 0,
		  borderColor: '#00',
		  borderRadius: 0,
		  boxShadow: '1px 1px 0px #ff',
		  innerShadow: '0px 0px 5px rgba(0, 32, 12, 0.5)',
		  placeHolder: 'Писать сюда',
		  x: width/2 - 150,
		  y: height/2 - 20 ,
		});           //Создаем инпут в  канвасе 
 
*/


		ctx.font = '52px Arial';                             // Название
		ctx.fillStyle = '#556B2F';
		ctx.fillText('Фруктовый мир', width/2, height/2)   // Название
		ctx.font = '90px Times New Roman';    // Спрашиваем имя
		ctx.fillStyle = '#00f';
		ctx.fillText(' Ты готов?', width/2, height/2 + 130 ); // Спрашиваем имя
		ctx.font = '40px Times New Roman';   // Просим нажать enter
		ctx.fillStyle = '#4B0082';
		ctx.fillText('Нажми  enter',width/2, height/2 + 430);  // Просим нажать enter

	document.onkeydown = function checkKeycode(event)
	{
		var keycode;
		if(!event) var event = window.event;
		if (event.keyCode) keycode = event.keyCode; // для IE
		else if(event.which) keycode = event.which; // для всех браузеров
		if(keycode == 13 && Flag_m){                                      /// Если нажали enter  с провркой активности меню 
			s_game(); Flag_m = false; window.start = new Date().getTime();
		}
	}
	};



} 	//  #####################################################################################   Заканчиваем рисовать меню 
	
















var noscore = new Set()
function s_game(){
var  st_time = {}

var pause = false;
fruct_Search = '';
time = 55;
score = 0;
var time_bonus = randomc(1,time-7); // рандомно выбираем секунду на которой выпадет бонусный фрукт

var flag_bonus = false;
vec_score = new Victor(width -50 , height -50);  //  Используем модуль Victor  для работы с векторами
var timec // 
var  timerv  = function(a){m = Math.floor(a/60);s =  a % 60; var s_t = setInterval(function(){
if(pause ||  m + s == 0 ){
	  if( m + s == 0){
	  	clearInterval(this)
	  	clearInterval(b_f)
		clearInterval(minf)
/*	  	  $.ajax({
            type: "POST",
            url: 'write_record',
            data: $(this).serialize(),
            success: function(response)

            {
            	console.log(response)
                var jsonData = JSON.parse(response);
 
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                   alert(1)
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
*/



//ajax запрос  для  внесения рекорда  

	  }else{

	  }
}else{
if(flag_bonus){s=+20; flag_bonus = false}



if(m + s != 0){ if(s > 0){s--; timec = {'m':m, 's':s};
}else{

m--; s = 59;  timec = {'m':m, 's':s} }


 }else{ clearInterval(s_t); }  }}, 1000 )} // таймер 

timerv(time)

function pausef(){
	if(pause ){
		st_time = {'min_size': min_size, "time":time,  "timec":timec}
		clearInterval(b_f)
		clearInterval(minf)

	}else{
		min_size = st_time.min_size;
		time = st_time.time;
		var minf = setInterval(function(){min_size+=5;}, 1000);
		var b_f = setInterval(b_fruct,  5000) 
		var min_size = 0;
		draw()

	}
}
var fr = []
out  = []  // пойманые фрукты
function rX(a,b, r){  //  ##########################################################  Функция  для отслеживания столкновений  по x и y 
return  ((( a - b  < r && a - b > 0)  || (b - a < r && b - a > 0 ) ))
} //  ##########################################################  Функция  для отслеживания столкновений  по x и y 

cvs.onclick = function(e) {  //  ##########################################################  Функция  обробатывает действия мыши
  x = e.clientX - cvs.getBoundingClientRect().left; // 
  y = e.clientY - cvs.getBoundingClientRect().top;
	fr.forEach(function(item, i, arr) {

  	if  ( rX(item.positionX, x,  item.widthc) && rX(item.positionY, y,   item.widthc   ) ){
			  fr[i].speed = 0;
			/*  fr[i].vector =  new Victor(fr[i].positionX, fr[i].positionY)*/
              out.push(fr[i]);
			  fr[i] = new Fruct();

		}else{
			if (rX(width -5, x, 5) && rX(2, y, 5)){
				 pause = !pause;
				 pausef()
				 x = 0; y = 0;
			}

			 }
			})
}  //  ##########################################################  Функция  обробатывает действия мыши

function b_fruct(){  // ##########################################################  Функция  рандомно генерирует цель(фрукт)
			fruct_Search = new Fruct()
			fruct_Search.positionX = width -80
			fruct_Search.positionY = height - 90
			fruct_Search.widthc = 85
			fruct_Search.heightc = 85
			out = []
			min_size = 0
			return fruct_Search

}  // ##########################################################  Функция  рандомно генерирует цель(фрукт)

b_fruct()
var b_f = setInterval(b_fruct,  5000) 
var min_size = 0;
var minf = setInterval(function(){min_size+=5;}, 1000);
var timer = setInterval(
	function(){time--;		
	}, 1000);
// начало покадровой рисовки 

bonus = new Fruct(); bonus.widthc = 70;   bonus.heightc = 70; bonus.speed += 20; bonus.src  = fruct_Search.src; bonus.bonus = true;
set = new Set();
noscore  = new Set();


function draw() {

x++ // кадры

score = (set.size * 10) - (noscore.size * 10);
	ctx.clearRect(0, 0, width, height);

if (fruct_Search ){

	ctx.drawImage(fruct_Search.fr, fruct_Search.positionX + min_size, fruct_Search.positionY + min_size, fruct_Search.widthc - min_size, fruct_Search.heightc -min_size)
}


out.forEach(function(item, i, arr){

ctx.drawImage(item.fr, item.positionX, item.positionY, item.widthc, item.heightc )

pos =  new Victor(item.positionX, item.positionY ).mix(vec_score, 0.1)
if (item.obj != fruct_Search.obj){
	noscore.add(item)
	delete(out[i])
}else{	
	set.add(item)
	if (i > 5){              //  ЦЦ 
		item.positionX = pos.x + (i - 12)
		item.positionY = pos.y + 2
	

	}else{
	item.positionX = (pos.x + i) - 3
	item.positionY = pos.y
	

	} 
	    }

	});

// napolnenie karti 
while  (fr < 70){
	for (var i = 0 ; i <= 70; i++)
	{ 
				fr.push( new Fruct() )
	}
	}

		if (time == time_bonus){
			if (fr.length < 9){
				bonus.src = fruct_Search.src
				fr.push(bonus)

			}   // кидаем бонус на карту
	}
/*
	
 ctx.drawImage(fg, 0, cvs.height - fg.height);
 ctx.drawImage(bird, xPos, yPos);
*/

fr.forEach(function(item, i, arr) {  // #######################  функция предотвращения  столкновений  фруктов
		if (item.bonus){item.fr = fruct_Search.fr;}
		ctx.drawImage(item.fr, item.positionX, item.positionY, item.widthc, item.heightc )
		
		item.positionY += item.speed

		if (item.positionY > width - 100){
			 fr[i] = new Fruct()
		}
			fr.forEach(function(obj, i, arr){

			if (  obj.positionY > 30 &&  ( rX(obj.positionX, item.positionX, 50)  &&  rX(obj.positionY, item.positionY, 50))  ) {   
				if(obj.positionX - item.positionX > 0){
					obj.positionX += 0.9
					item.positionY -= 0.9

				}else{
						obj.positionX -= 0.9
					item.positionY += 0.9
				}
 				
			}else{}
		})
}); // #######################  функция предотвращения  столкновений  фруктов

 ctx.fillStyle = "red";
  ctx.font = "35px Verdana";
 ctx.fillText( timec.m + ':' + timec.s , width - 100 , 30);

 ctx.fillStyle = "grey";
  ctx.font = "24px Verdana";
 ctx.fillText("Счет: " + score, 10, cvs.height - 20);

 ctx.fillStyle = "blue";
  ctx.font = "24px Verdana";
 ctx.fillText(" " + 5 - min_size / 5 , width -80, cvs.height - 70);



 ctx.fillStyle = "black";
  ctx.font = "12px Verdana";
  let text = pause? 'продолжить' : 'пауза'
 ctx.fillText(text, width - 40, 20);






if(flag_bonus){
	flag_bonus = false
	time += 10
}

if (time != 0  && !pause){
	 requestAnimationFrame(draw);
}else{
	window.ende = new Date().getTime(); 

	  	  $.ajax({
            type: "POST",
            url: 'write_record',
            data: {"user_id": parseInt(window.id_gamer), "record": parseInt( score)},
            success: function(response)

            {
 
                
                 location.assign('/records')
           }
       });


	
}




}

 setTimeout(draw, 1000)
}
menu()


}




    $('.del').on('click', function(a){
              console.log(a)
      } )
