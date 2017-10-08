<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;

// --------------------------------------Register: Settings
$app->setName( 'SlimApp' );
// [Container:  View - PhpRenderer]
// $app->view( new Slim\Views\PhpRenderer() );
// [Container: Logger - Monolog]
$app->container->singleton( 'log', function () use ( $app ) {
	$logger = new Logger( $app->getName() );
	$logger->pushProcessor( new UidProcessor() );
	$logger->pushHandler( new StreamHandler( 'logs/app.log', Logger::DEBUG ) );

	return $logger;
} );
// --------------------------------------Register: Routes
$app->get( '/(:name)', function ( $name = "" ) use ( $app ) {
	$args = [];
	if ( empty( $name ) == false ) {
		$args['name'] = $name;
	}
	// Write Log Message
	$app->getLog()->info( "{$app->getName()} '/' route", $args );
	// Render View
	$app->render( 'index.phtml', $args );
} );