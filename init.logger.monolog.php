<?php
//[Container: Logger - Monolog]
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
$app->container->singleton( 'log', function () use ( $app ) {
	$logger = new Logger( $app->getName() );
	$logger->pushProcessor( new UidProcessor() );
	$logger->pushHandler( new StreamHandler( __DIR__ . '/logs/app.log', Logger::DEBUG ) );

	return $logger;
} );