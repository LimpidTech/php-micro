<?php

		// TODO: Proper configuration subsystem
	define('VIEW_BASE_DIR', MICRO_BASE_DIR . '/views');
	define('VIEW_DEFAULT_NAME', 'index');
	define('VIEW_DEFAULT_EXTENSION', 'php');

	class View
	{
		private $name;
		private $extension;

		public static function factory($name=VIEW_DEFAULT_NAME, $extension=VIEW_DEFAULT_EXTENSION)
		{
			return new View($name, $extension);
		}

		public function __construct($name=VIEW_DEFAULT_EXTENSION, $extension=VIEW_DEFAULT_EXTENSION)
		{
			$this->name = $name;
			$this->extension = $extension;
		}

		public function get_view_path()
		{
			return VIEW_BASE_DIR . '/' . $this->name . '.' . $this->extension;
		}

		public function render($data=Array(), $print = true, $name=VIEW_DEFAULT_NAME, $extension=VIEW_DEFAULT_EXTENSION)
		{
			extract($data);

			// TODO: Can we catch this without output buffering?
			ob_start();
			require($this->get_view_path());
			$output = ob_get_contents();

			if ($print)
				ob_end_flush();
			else
				ob_end_clean();

			return $output;
		}
	}

