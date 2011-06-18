<?php

$coreFiles = Array(
	'autoloader.php',
);

foreach ($coreFiles as $filename) {
	require_once(MICRO_CORE_DIR . $filename);
}

