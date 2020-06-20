<?php


session_start();



$name_gamer = $_SESSION['user_login'];

$name_id = $_SESSION['user_id'];
if(empty($_SESSION['user_login'])){
header("Location: http://127.0.0.1/autorization");
}else{
  echo $_SESSION['user_login'];

}
  
?>


<div class="container-fluid">
    <canvas id="myCanvas" width="790" height="640"></canvas>

</div>





<link rel="stylesheet" href="css/style.css">

<script src="lib/victor-1.1.0/index.js"></script>

<script src =  "lib/CanvasInput-master/CanvasInput.min.js"></script>


<script type="text/javascript">

   (function() {

  window.name_gamer = '<?php  echo $name_gamer; ?>'; 
    window.id_gamer = '<?php  echo $name_id; ?>'; 
    var canvas = document.getElementById('myCanvas'),
            context = canvas.getContext('2d');

    // resize the canvas to fill browser window dynamically
    window.addEventListener('resize', resizeCanvas, false);

    function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            /**
             * Your drawings need to be inside this function otherwise they will be reset when 
             * you resize the browser window and the canvas goes will be cleared.
             */
            drawStuff(); 
    }
    resizeCanvas();

    function drawStuff() {
            // do your drawing stuff here
    }
})();




</script>


<script src="js/1.js"></script>
