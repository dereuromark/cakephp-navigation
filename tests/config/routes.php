<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

\Cake\Routing\Router::prefix('admin', function (RouteBuilder $routes) {
	$routes->plugin('Navigation', function (RouteBuilder $routes) {
		$routes->connect('/', ['controller' => 'Navigation', 'action' => 'index'], ['routeClass' => DashedRoute::class]);

		$routes->fallbacks(DashedRoute::class);
	});
});
