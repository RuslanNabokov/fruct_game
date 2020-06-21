<?php

class Controller_Del_record extends Controller
{

	function action_index()
	{	
			include 'application/models/model_record.php';
			$model_rec =  new Model_Record();

			$model_rec->del_record($_POST['record_id']);
	}
}
