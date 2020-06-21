<?php
class Connect
{




public function get_connect()

	 {
	 	$dbconn3 = pg_connect("host=localhost port=5432 dbname=game_center user=postgres");
	 	// Евген, Меня  тут функцию
	 	return $dbconn3;

	}


}

?>