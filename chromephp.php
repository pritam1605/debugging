<?php


	require_once 'chromephp/ChromePhp.php';
  	ob_start();


  	ChromePhp::log(__FILE__ . ':' . __LINE__, 'ChromePHP starting');	// because chromephp does not show line number anf file name
	error_reporting(E_ALL);


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

		$declared = 'variable';
		ChromePhp::log('xdebug_get_declared_vars', xdebug_get_declared_vars());

		// This groups the result of debug_backtrace into a collapsing group
		ChromePhp::groupCollapsed('Backtrace');
		ChromePhp::log(debug_backtrace());
		ChromePhp::groupEnd();

		ChromePhp::info('Notice');
		trigger_error('Custom notice', E_USER_NOTICE);

		ChromePhp::warn('Warning');
		trigger_error('Custom warning', E_USER_WARNING);

		ChromePhp::error('Error');
		trigger_error('Custom error', E_USER_ERROR);
	}

	a('alpha');
?>