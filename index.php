<?php
date_default_timezone_set( 'Europe/Bucharest' );
error_reporting( - 1 );// Report all PHP errors: -1, None: 0
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
if ( PHP_SAPI == 'cli-server' ) {
	// For built-in PHP Server, check if the request should be served as a static file
	$url  = parse_url( $_SERVER['REQUEST_URI'] );
	$file = __DIR__ . $url['path'];
	if ( is_file( $file ) ) {
		return false;
	}
}
require __DIR__.'/vendor/autoload.php';
$app = new Slim\Slim();
require __DIR__.'/init.php';
$app->run();