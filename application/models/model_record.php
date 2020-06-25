
<?php
include 'application/core/db_connect.php'; 

class Model_Record extends Model
{
	 

	 public $dbconn3;



   function  __construct()
    {
     $cd =   new Connect();
     $this->dbconn3 = $cd->get_connect();

      } 






	public function set_new_record($user_id, $record)
	{	
		

//		 pg_query($dbconn3,"INSERT INTO public.records (user_id,record) values('".$_POST['user_id']."', '".$_POST['record']."')" );
        pg_query($this->dbconn3,"INSERT INTO public.records (user_id,record) values('".$user_id."', '".$record."')" );
 
// WHERE  user_id =  ".$_POST['user_id']."
		
		// Здесь мы просто сэмулируем реальные данные.
		
		return;
	}


	public function  get_best_record(){
		

		 $prev_record =  pg_query($this->dbconn3,"SELECT  MAX(record) FROM public.records  ");
		 return $prev_record;
	}



	public function del_record($record_id,$user_id)
	{	
		

//		 pg_query($dbconn3,"INSERT INTO public.records (user_id,record) values('".$_POST['user_id']."', '".$_POST['record']."')" );
        pg_query($this->dbconn3,"DELETE   FROM public.records   WHERE  record_id = ".$record_id." AND  user_id = ".$user_id );
 
// WHERE  user_id =  ".$_POST['user_id']."
		
		// Здесь мы просто сэмулируем реальные данные.
		
		return;
	}





	public function  get_all_results(){
		$dbconn3 = pg_connect("host=localhost port=5432 dbname=game_center user=postgres");
 
		$query = "SELECT   u.user_login, r.record, r.record_id FROM  records as r, users as u WHERE r.user_id = u.user_id ORDER BY -r.record "    ;
		$res  = pg_query($this->dbconn3, $query );
		 return  pg_fetch_all($res);
	}
}

	 

