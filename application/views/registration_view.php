	 <?php
//        mysql_connect ("localhost", "root","");//пишите свои настройки
//        mysql_select_db("test") or die (mysql_error());//и свою бд
//        mysql_query('SET character_set_database = utf8'); 
//        mysql_query ("SET NAMES 'utf8'");

//        error_reporting(E_ALL); 

//  user_login='".mysql_real_escape_string($_POST['login'])."'");

	$dbconn3 = pg_connect("host=localhost port=5432 dbname=game_center user=postgres");
        ini_set("display_errors", 1);
        $result = pg_query($dbconn3, "select * from public.users");

        if(isset($_POST['submit'])) {
        //проверяем, нет ли у нас пользователя с таким логином
        $query = pg_query($dbconn3,"SELECT COUNT(user_id)  FROM public.users WHERE user_login='".pg_escape_string($_POST['login'])."'");
        if(pg_fetch_result($query, 0) > 0)  {
                        $error = "Пользователь с таким логином уже есть";
        }
                        // Если нет, то добавляем нового пользователя
          if(!isset($error) )   {
                $login = pg_escape_string(trim(htmlspecialchars($_POST['login'])));
                // Убираем пробелы и хешируем пароль
                $password = trim($_POST['password']);  // md5(trim($_POST['password']));
              //  pg_query($dbconn3,"INSERT INTO  public.users (user_login, user_password) values('".$login."', '".$password."' ");

		pg_query($dbconn3,"INSERT INTO public.users (user_login, user_password) values('".$login."', '".$password."')" );
	//	die(pg_last_error($dbconn3)) ;
                echo 'Вы успешно зарегистрировались с логином - '.$login;
                exit();
        }  else   {
        // если есть такой логин, то говорим об этом
                 echo $error;
                }
        }
        //по умолчанию данные будут отправляться на этот же файл
        echo $result;
	print <<< html
        <form method="POST">
                Логин <input name="login" type="text"><br>
                Пароль <input name="password" type="password"><br>
                <input name="submit" type="submit" value="Зарегистрироваться">
        </form>
   html;
   ?>
