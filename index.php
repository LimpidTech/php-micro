<?php
	error_reporting(E_ALL | E_STRICT);

	/**
	 * This gets the base directory that MICRO is running in, as well as
	 * the directory where "core files" reside. It provides absolute
	 * paths, so that we don't need to worry about requiring files with
	 * relative paths - which can get messy and confusing in some cases.
	 */
	define('MICRO_BASE_DIR', dirname($_SERVER['SCRIPT_FILENAME']) . '/');
	define('MICRO_CORE_DIR', MICRO_BASE_DIR . 'core/');
	define('MICRO_CLASS_DIR', MICRO_BASE_DIR . 'classes/');

	// Do any processing required for MICRO.
	require_once(MICRO_CORE_DIR . '/bootstrap.php');

	$obj = new SomeRandomObject();

