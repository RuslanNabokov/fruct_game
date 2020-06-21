<?php





if(empty($_SESSION['user_id'])){
echo "вы не авторизованы";
header("Location: /autorization");
}else{

echo "вы вышли из аккаунта " . $_SESSION['user_login'];


setcookie(session_name(), '', 0);
session_unset();

session_destroy();
header("Location: /autorization");
}



?>
