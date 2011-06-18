<?php

define('SITE_BASE_URL', '');

class URL
{
	static function absolute($url)
	{
		return '/' . SITE_BASE_URL . $url;
	}

	static function relative($url, $append_slash = true)
	{
		$final_url = $_SERVER['REQUEST_URI'];

		if ($append_slash)
		{
			$final_url .= '/';
		}

		return $final_url . $url;
	}
}

