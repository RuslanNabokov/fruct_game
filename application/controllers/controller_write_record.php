<?php

include 'application/models/model_record.php';


   
class Controller_write_record extends Controller
{

	function action_index()
	{
		
 		$rec_tab = new Model_Record();  
 		$rec = $rec_tab->set_new_record($_POST['user_id'], $_POST['record']);
//		 echo json_encode(array('prev_record' =>   '2' ));
	}
}
