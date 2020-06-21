

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
    <td class="del">Удалить </td>
    <td  class= "hide"> $record_id </td>
    
    </tr> 
 
html;
}
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