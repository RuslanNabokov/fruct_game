<?php





//$name_gamer = $_SESSION['user_login'];
//$name_id = $_SESSION['user_id'];
if(empty($_SESSION['user_login'])){
header("Location: /autorization");
}else{

}



$name_gamer =$_SESSION['user_login'];
$name_id = $_SESSION['user_id'];


?>



 <h1 class="center" style="z-index: 99999"> Нажми Enter </h1>

    <canvas id="myCanvas" style="position:relative;" width="790" height="640">
     
    </canvas>








<script src="lib/victor-1.1.0/index.js"></script>

<script src =  "lib/CanvasInput-master/CanvasInput.min.js"></script>

<link rel="stylesheet" href="css/game.css">
<script type="text/javascript">

   (function() {




  window.name_gamer = '<?php  echo $name_gamer; ?>'; 
    window.id_gamer = '<?php  echo $name_id; ?>'; 
    var canvas = document.getElementById('myCanvas'),
            context = canvas.getContext('2d');

    // resize the canvas to fill browser window dynamically



 
})();




</script>


<script src="js/1.js"></script>
