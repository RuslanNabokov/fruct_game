<?php




class Controller_Main extends Controller
{

	function action_index()
	{	
	$template =  "main_view.php";
	$main = "template_game.php";

		$this->view->generate($template, $main);
	}
}
