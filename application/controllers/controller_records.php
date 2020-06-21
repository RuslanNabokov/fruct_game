<?php

class Controller_records extends Controller
{

        function action_index()
        {       
        	include 'application/models/model_record.php';
       
        $rec  =  new Model_record();
        $results  = $rec->get_all_results();

                $this->view->generate('records_view.php', 'template_game.php', $results);
        }
}






