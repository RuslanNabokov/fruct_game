

<?php

/*
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Рекорд</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
*/


$name_gamer =$_SESSION['user_login'];
$user_id = $_SESSION['user_id'];

print <<< html
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Результат</th>
    </tr>
  </thead>
  <tbody>

html 
?>
<?php



if ($data){
foreach ($data as $key => $value) {

    
$num =  $key + 1; 
$login =  $value['user_login'];
$record =   $value['record'];
$record_id =   $value['record_id'];



print <<< html
    <tr>
    <th scope="row">$num</th>
    <td>$login</td>
    <td>$record</td>
html;

if ($name_gamer == $login){ 

  echo "<td class='del'>Удалить </td>";
}else{
   echo " <td > </td>";
}

print <<< html

    <td  class= "hide"> $record_id </td>
    
    </tr> 
 
 <script>
 var user_id =  $user_id; 
 </script>

html;
}  
}else{ }

print <<< html
    </tbody> 
    </table>
    <style> 
    body{
      background-image: none;
    } 

    .hide{
     display: none
    }
    </style>



    html;

 



?>

<script src="js/records.js"></script>