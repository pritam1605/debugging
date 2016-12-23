<?php

	error_reporting(E_ALL);
	// ini_set('error_reporting', E_STRICT);

	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	ini_set('log_errors_max_len', 0); // 0 = unlimited length
	ini_set('error_log', '/var/www/html/debugging/php_errors.log');
	ini_set('html_errors', 1);

	$test = 10;

	for ($i = 0; $i < 10; $i++) {
		$test += $i;
	}

	echo $test;

	//echo $error->abc;

	$file=fopen("welcome.txt","r");

	// E_ERROR - run out of memory
	/*ini_set('memory_limit', '2048K');
	var_dump((object) range(0, 100000));
	require 'abc.php';*/

	register_shutdown_function(function() {
		echo '<pre>';
		print_r(error_get_last());
		print_r($_SERVER);
		var_dump(PHP_EOL);
	});

	function a($arg) {
		b('alpha');
	}

	function x() {
		c('beta');
	}

	function b($arg) {
		 x();
	}

	function c($arg) {
		d('gamma');
	}

	function d($arg) {
		echo '<pre>';
		print_r(debug_backtrace());
		echo '</pre>';

		$declared = 'variable';
		var_dump(xdebug_get_declared_vars());
		trigger_error('Custom notice', E_USER_NOTICE);
		trigger_error('Custom warning', E_USER_WARNING);
		trigger_error('Custom error', E_USER_ERROR);
	}

	for ($i = 0; $i < 50; $i++) {
		slow();
	}
	slower();

	a('alpha');

	// Custom error generating methods
	trigger_error('Custom notice', E_USER_NOTICE);
	trigger_error('Custom warning', E_USER_WARNING);
	trigger_error('Custom error', E_USER_ERROR);
	echo "won't be displayed";


	function slow() {
		for ($i = 0; $i < 100000; $i++) {}
	}


	function slower() {
		usleep(50000);
	}
?>