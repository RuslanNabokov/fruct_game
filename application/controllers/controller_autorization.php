<?php

class Controller_autorization  extends Controller
{

        function action_index()
        {       
                $this->view->generate('autorization_view.php', 'template_view.php');
        }
}

