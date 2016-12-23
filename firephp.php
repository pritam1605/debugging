<?php


	require_once 'FirePHPCore/FirePHP.class.php';
  	ob_start();

  	$firephp = FirePHP::getInstance(TRUE);

  	$firephp->log('starting firephp', 'Pay Attention');
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

		global $firephp;
		$declared = 'variable';
		$firephp->log(xdebug_get_declared_vars(), 'xdebug_get_declared_vars');

		$firephp->info('Notice');
		trigger_error('Custom notice', E_USER_NOTICE);

		$firephp->warn('Warning');
		trigger_error('Custom warning', E_USER_WARNING);

		$firephp->error('Error');
		trigger_error('Custom error', E_USER_ERROR);
	}

	a('alpha');
?>