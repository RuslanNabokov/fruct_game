	 <?php
//        mysql_connect ("localhost", "root","");//пишите свои настройки
//        mysql_select_db("test") or die (mysql_error());//и свою бд
//        mysql_query('SET character_set_database = utf8'); 
//        mysql_query ("SET NAMES 'utf8'");

//        error_reporting(E_ALL); 

//  user_login='".mysql_real_escape_string($_POST['login'])."'");

if (!empty($_SESSION['user_login'])){

        echo "Вы уже авторизованы как ".$_SESSION['user_login']  ;
        print <<< html
        <br/>  <a href="/"> На главную </a>
        html;
}else{














	$dbconn3 = pg_connect("host=localhost port=5432 dbname=game_center user=postgres");
        ini_set("display_errors", 1);
        $result = pg_query($dbconn3, "select * from public.users");

        if(isset($_POST['submit'])) {
        //проверяем, нет ли у нас пользователя с таким логином
        echo " sdsdd";
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
          <div class="form">
          <form class="form-horizontal" role="form" method="POST">
          <h3>Регистрация</h3>
          <div class="form-group">
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">

              <input name="login" class="form-control"  name="login"  placeholder="Логин"    type="text" ><br>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" type="password" class="form-control" placeholder="Пароль" name="password">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button name="submit" type="submit" class="btn btn-default btn-sm">Зарегистрироваться</button>
            </div>
          </div>  
          </form>
          </div><!-- form  -->


   html;
}
   ?>
