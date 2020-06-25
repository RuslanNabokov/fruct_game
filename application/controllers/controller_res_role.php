<?php



   
class Controller_res_role extends Controller
{

	function action_index()
	{

			include 'application/models/model_users.php';
       
        $rec  =  new Model_Users();  
 		$rec = $rec->set_role_user($_POST['user_id'],$_POST['role'] );
  //  data: {"role": role, "user_id": user_idd ,"user_id_owner": parseInt(user_id) } ,
 		//$rec = $rec_tab->set_new_record($_POST['user_id'], $_POST['record']);
		 echo json_encode('status:ok');
	}
}