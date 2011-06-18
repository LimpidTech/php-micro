<?php

$core_files = Array(
	'autoloader.php',
);

foreach ($core_files as $filename) {
	require_once(MICRO_CORE_DIR . $filename);
}

