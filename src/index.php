<?php
	error_reporting(E_ALL | E_STRICT);

	define('PHP_MICRO', true);

	/**
	 * This gets the base directory that MICRO is running in, as well as
	 * the directory where "core files" reside. It provides absolute
	 * paths, so that we don't need to worry about requiring files with
	 * relative paths - which can get messy and confusing in some cases.
	 */
	define('MICRO_BASE_DIR', dirname(__FILE__) . '/');
	define('MICRO_CORE_DIR', MICRO_BASE_DIR . 'core/');
	define('MICRO_CLASS_DIR', MICRO_BASE_DIR . 'classes/');

	/**
	 * If you don't like object names being represented backwards in the
	 * filesystem, you can set this to whichever value you'd like - and
	 * they wont be represented backwards.
	 *
	 * define('MICRO_AUTOLOADER_NO_REVERSE', null);
	 */

	// Initialize any files that MICRO depends on.
	require_once(MICRO_CORE_DIR . '/bootstrap.php');

	// Create our URL router.
	$router = new Router();

