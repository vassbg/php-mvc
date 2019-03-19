<?php
/**
 *  MAIN CONFIGURATION
 */

/**
 *  DEV MODE
 */
error_reporting(E_ALL);
//error_reporting(0);


/**
 *	URL CONST
 */

define('URL_PUBLIC_FOLDER', '/Public/');


/*
 *	ПЪТ до изгледите
 */
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'App/Views' . DIRECTORY_SEPARATOR);


/*
 * БАЗА ДАННИ
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');
