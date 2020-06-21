
<?php

class Model_Record extends Model
{
	



	public function set_new_record($user_id, $record)
	{	
		$dbconn3 = pg_connect("host=localhost port=5432 dbname=game_center user=postgres");

//		 pg_query($dbconn3,"INSERT INTO public.records (user_id,record) values('".$_POST['user_id']."', '".$_POST['record']."')" );
        pg_query($dbconn3,"INSERT INTO public.records (user_id,record) values('".$_POST['user_id']."', '".$_POST['record']."')" );
 
// WHERE  user_id =  ".$_POST['user_id']."
		
		// Здесь мы просто сэмулируем реальные данные.
		
		return  
	}


	public function  get_best_record(){
		 $prev_record =  pg_query($dbconn3,"SELECT  MAX(record) FROM public.records  ");
		 return $prev_record
	}
}