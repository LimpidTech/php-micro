<?php defined('PHP_MICRO') or die();

class HomeController
{
	public function action_index()
	{
		View::factory('index')->render();
	}
}

