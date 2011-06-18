<?php

function __autoload($className)
{
	/** Split each classname into segments which are separated at
	 * every occurance of a capital letter.
	 */
	$objectSegments = preg_split(
		'/([A-Z][^A-Z]+)/', $className, -1,
		PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE
	);

	if (!defined('MICRO_AUTOLOADER_NO_REVERSE')) {
		$objectSegments = array_reverse($objectSegments);
	}

	/**
	 * @TODO: Make these filenames a bit more configurable.
	 */
	$filename = implode($objectSegments, '/');
	$filename = MICRO_CLASS_DIR . $filename . '.php';

	if (file_exists($filename))
		require_once($filename);
	else
		throw new Exception("File does not exist: " . $filename);
}

