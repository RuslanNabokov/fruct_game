

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
      <th scope="col">Рекорд</th>
      <th scope="col">Роль</th>
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
$max =  $value['max'];
$role =  $value['role'];
$user_id =  $value['user_id'];
//$record =   $value['record'];
//$record_id =   $value['record_id'];



print <<< html
    <tr>
    <th scope="row">$num</th>
    <td>$login</td>
    <td>$max</td>

    
html; 

print <<< html
   <td>
    <select class="form-control" name="role">
     <option value="player">player</option>
     <option value="admin">admin</option>
    </select>
    </td>
html;


print <<< html
    <td  class= "hide">$user_id  </td>
    
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