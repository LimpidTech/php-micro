<?php defined('PHP_MICRO') or die();

class Router
{
	public $defaults = Array(
		'controller' => 'HomeController',
		'action' => 'index',
	);

	public function __construct($autoResolve = true)
	{
		$this->baseURI = $_SERVER['REQUEST_URI'];

		$this->uriSegments = preg_split(
			'/\//',
			$this->baseURI,
			-1,
			PREG_SPLIT_NO_EMPTY
		);

		if ($autoResolve) {
			$this->resolve();
		}
	}

	public function resolve ()
	{
		$segments = $this->uriSegments;

		if (sizeof($segments) > 0) {
			$controllerName = ucfirst($segments[0]) . 'Controller';
		} else {
			$controllerName = $this->defaults['controller'];
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
		$controller = new $controllerName();

		call_user_func_array(Array($controller, 'action_' . $action), $params);
	}
}

