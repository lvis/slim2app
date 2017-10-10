<?php
//[Container: View - Twig]
$viewExtension = "twig";
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
	'charset' => 'utf-8',
	'cache' => $app->config('templates.path').'cache',
	'auto_reload' => true,
	'strict_variables' => false,
	'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());