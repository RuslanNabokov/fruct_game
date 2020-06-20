<?php

class Controller_logout  extends Controller
{

        function action_index()
        {       
                $this->view->generate('logout_view.php', 'template_game.php');
        }
}






