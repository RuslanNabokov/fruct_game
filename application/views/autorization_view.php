<?php
     //   mysql_connect ("localhost", "root","");//пишите свои настройки
      //  mysql_select_db("test") or die (mysql_error());//и свою бд
       // mysql_query('SET character_set_database = utf8'); 
     //   mysql_query ("SET NAMES 'utf8'");
	$dbconn3 = pg_connect("host=localhost port=5432 dbname=game_center user=postgres");

        error_reporting(E_ALL); 
        ini_set("display_errors", 1);
        session_start();//не забываем во всех файлах писать session_start
   if (isset($_POST['login']) && isset($_POST['password'])){
    //немного профильтруем логин
        $login =pg_escape_string(htmlspecialchars($_POST['login']));
    //хешируем пароль т.к. в базе именно хеш
        $password = trim($_POST['password']);
     // проверяем введенные данные
    $query = "SELECT user_id, user_login
            FROM public.users
            WHERE user_login = '$login' AND user_password = '$password'
            LIMIT 1";
    $sql = pg_query($query); 
    //or die(pg_last_error($query));
    // если такой пользователь есть
    if (pg_num_rows($sql) == 1) {
        $row = pg_fetch_assoc($sql);
                //ставим метку в сессии 
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_login'] = $row['user_login'];
                //ставим куки и время их хранения 10 дней
                setcookie("CookieMy", $row['user_login'], time()+60*60*24*10);
                
   }
    else {
        //если пользователя нет, то пусть пробует еще
                header("Location: mylogin.html"); 
    }
   }
   //проверяем сессию, если она есть, то значит уже авторизовались
   if (isset($_SESSION['user_id'])){
        echo htmlspecialchars($_SESSION['user_login'])." <br />"."Вы авторизованы <br />
        Т.е. мы проверили сессию и можем открыть доступ к определенным данным";
   } else {
        $login = '';
        //проверяем куку, может он уже заходил сюда
        if (isset($_COOKIE['CookieMy'])){
                $login = htmlspecialchars($_COOKIE['CookieMy']);
        }
        //простая формочка action="mylogin.html"
        print <<<      html
   <form  method="POST">
                Логин <input name="login" type="text" value = $login><br>
                Пароль <input name="password" type="password"><br>
                <input name="submit" type="submit" value="Войти">
        </form>
   html;

   }
   ?>
