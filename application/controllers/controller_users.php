<?php

class Controller_users extends Controller
{

        function action_index()
        {       
        	include 'application/models/model_users.php';
       
        $rec  =  new Model_users();
        $results  = $rec->get_all_users();
        //	print_r($results);
                $this->view->generate('users_view.php', 'template_game.php', $results);
        }
}





