<?php

	$test = 10;

	for ($i = 0; $i < 100; $i++) {
		$test += $i;
		echo $test;
		callA();
	}

	function callA() {
		$a = 10*10;
		$b = 20*20;
	}


	$a = 10*10;
	$b = 20*20;


	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	ini_set('log_errors_max_len', 0); // 0 = unlimited length
	ini_set('error_log', '/var/www/html/debugging/php_errors.log');

	callA();

?>