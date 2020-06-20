<?php


   
class Controller_write_record extends Controller
{

	function action_index()
	{
		$dbconn3 = pg_connect("host=localhost port=5432 dbname=game_center user=postgres");

		 pg_query($dbconn3,"INSERT INTO public.records (user_id,record) values('".$_POST['user_id']."', '".$_POST['record']."')" );
        pg_query($dbconn3,"INSERT INTO public.records (user_id,record) values('".$_POST['user_id']."', '".$_POST['record']."')" );
 
// WHERE  user_id =  ".$_POST['user_id']."
		 $prev_record =  pg_query($dbconn3,"SELECT  MAX(record) FROM public.records  ");
		 echo json_encode(array('prev_record' =>   $prev_record,  ));
	}
}
