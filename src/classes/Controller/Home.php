<?php defined('PHP_MICRO') or die();

class HomeController extends Controller
{
	public function action_index()
	{
		View::factory('index')->render();
	}
}

