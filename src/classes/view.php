<?php

define('VIEW_BASE_DIR', MICRO_BASE_DIR . '/views');
define('VIEW_DEFAULT_NAME', 'index');
define('VIEW_DEFAULT_EXTENSION', '.php');

class View
{
	private $_name;

	public static function factory($name=VIEW_DEFAULT_NAME)
	{
		return new View($name);
	}

	public function __construct($name=VIEW_DEFAULT_EXTENSION)
	{
		$this->_name = $name;
	}

	public function get_view_path()
	{
		$name = $this->_name;
		$extension = strrchr($name, '.');

		if ($extension === false)
			$name .= VIEW_DEFAULT_EXTENSION;

		return VIEW_BASE_DIR . '/' . $name;
	}

	public function render($data=Array(), $print = true)
	{
		extract($data);

		// TODO: Can we catch this without output buffering?
		ob_start();
		require($this->get_view_path());
		$output = ob_get_contents();

		if ($print === true)
			ob_end_flush();
		else
			ob_end_clean();

		return $output;
	}
}

