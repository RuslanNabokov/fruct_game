<?php

class Model_Users extends Model
{
	





	public function get_all_users()
	{	
		$dbconn3 = pg_connect("host=localhost port=5432 dbname=game_center user=postgres");

		$result =  pg_query($dbconn3,"SELECT user_name FROM public.users");


		
		return  pg_fetch_all($result)
	}

}
