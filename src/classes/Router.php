<?php

class Router
{
	public $defaults = Array(
		'controller' => 'HomeController',
		'action' => 'index',
	);

	public function __construct($auto_resolve = true)
	{
		$this->base_uri = $_SERVER['REQUEST_URI'];

		$this->uri_segments = preg_split(
			'/\//',
			$this->base_uri,
			-1,
			PREG_SPLIT_NO_EMPTY
		);

		if ($auto_resolve) {
			$this->resolve();
		}
	}

	public function resolve ()
	{
		$segments = $this->uri_segments;

		if (sizeof($segments) > 0) {
			$controller_name = ucfirst($segments[0]) . 'Controller';
		} else {
			$controller_name = $this->defaults['controller'];
		}

		if (sizeof($segments) > 1) {
			$action = strtolower($segments[1]);
		} else {
			$action = $this->defaults['action'];
		}

		if (sizeof($segments) > 2) {
			$params = array_slice($segments, 2);
		} else {
			$params = Array();
		}

		// Instantiate our new controller.
		$controller = new $controller_name();

		call_user_func_array(Array($controller, 'action_' . $action), $params);
	}
}

