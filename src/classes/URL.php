<?php defined('PHP_MICRO') or die();

define('SITE_BASE_URL', '');

class URL
{
	static function absolute($url)
	{
		return '/' . SITE_BASE_URL . $url;
	}

	static function relative($url, $appendSlash = true)
	{
		$finalURL = $_SERVER['REQUEST_URI'];

		if ($appendSlash) {
			$finalURL .= '/';
		}

		return $finalURL . $url;
	}
}

