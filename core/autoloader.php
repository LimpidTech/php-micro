<?php

	function __autoload($class_name)
	{
		/** Split each classname into segments which are separated at
		 * every occurance of a capital letter.
		 */
		$object_segments = preg_split(
			'/([A-Z][^A-Z]+)/', $class_name, -1,
			PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE
		);

		if (!defined('MICRO_AUTOLOADER_NO_REVERSE'))
		{
			$object_segments = array_reverse($object_segments);
		}

		/**
		 * @TODO: Make these filenames a bit more configurable.
		 */
		$filename = implode($object_segments, '/');
		$filename = strtolower($filename);
		$filename = MICRO_CLASS_DIR . $filename . '.php';

		if (file_exists($filename))
			require_once($filename);
		else
			throw new Exception("File does not exist: " . $filename);
	}

