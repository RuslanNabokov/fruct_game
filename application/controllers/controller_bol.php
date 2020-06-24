<?php

class Controller_bol extends Controller
{

	function action_index()
	{	
		$this->view->generate('bol_view.php', 'template_game.php');
	}
}
