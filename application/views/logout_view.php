<php
 session_start();


if (isset($_SESSION['user_id'])){
        echo htmlspecialchars($_SESSION['user_login'])." <br />"."Вы авторизованы <br />
        Т.е. мы проверили сессию и можем открыть доступ к определенным данным";
   } else {
        $login = '';
        //проверяем куку, может он уже заходил сюда
        if (isset($_COOKIE['CookieMy'])){
                $login = htmlspecialchars($_COOKIE['CookieMy']);
        }


$_SESSION['user_id'] = "";
$_SESSION['user_login'] = "";




setcookie(session_name(), '', 0);
session_unset();

session_destroy();
?>
