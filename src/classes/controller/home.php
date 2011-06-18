<?php

class HomeController
{
	public function action_index()
	{
		View::factory('index')->render();
	}
}

