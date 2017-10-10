<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;

// --------------------------------------Register: Settings
$app->setName( 'Slim2App' );
$app->config( [
	'templates.path' => __DIR__ . '/templates/', //This config can be omitted because is default one
	'debug'          => false, // Debug is set to false to demonstrate custom error handling (Monolog)
] );
// [Container: View - Twig]
$viewExtension = "phtml";//Extension must be added on each View Class in display function as convention no configuration
require __DIR__."/init.twig.view.php";
// [Container: Logger - Monolog]
$app->container->singleton( 'log', function () use ( $app ) {
	$logger = new Logger( $app->getName() );
	$logger->pushProcessor( new UidProcessor() );
	$logger->pushHandler( new StreamHandler( __DIR__ . '/logs/app.log', Logger::DEBUG ) );

	return $logger;
} );
// --------------------------------------Register: Routes
$app->get( '/(:name)', function ( $name = "" ) use ( $app, $viewExtension ) {
	$args = [];
	if ( empty( $name ) == false ) {
		$args['name'] = $name;
	}
	// Write Log Message
	$app->getLog()->info( "Executed '/(:name)' route with attribute", $args );
	// Render View
	$app->render( "index.$viewExtension", $args );
} );