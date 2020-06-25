<?php

include 'application/core/db_connect.php'; 

class Model_Users extends Model
{
		 public $dbconn3;



   function  __construct()
    {
     $cd =   new Connect();
     $this->dbconn3 = $cd->get_connect();

      } 







	public function get_all_users()
	{	

		$result =  pg_query($this->dbconn3,"SELECT u.user_login, MAX( r.record ), u.role, u.user_id  FROM public.records  AS r,    public.users AS u WHERE  u.user_id = r.user_id GROUP BY  u.user_id;");

		
		return  pg_fetch_all($result);
	}

	public function set_role_user($user_id, $role){
   		$result =  pg_query( $this->dbconn3, "UPDATE public.users  SET role = '".$role."' WHERE user_id = ".$user_id);
		return  pg_fetch_all($result);

	}


}
