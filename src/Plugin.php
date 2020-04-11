<?php

namespace Navigation;

use Cake\Core\BasePlugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Route\DashedRoute;

class Plugin extends BasePlugin {

	/**
	 * @var bool
	 */
	protected $middlewareEnabled = false;

	/**
	 * @param \Cake\Routing\RouteBuilder $routes
	 *
	 * @return void
	 */
	public function routes($routes): void {
		$routes->prefix('admin', function (RouteBuilder $routes) {
			$routes->plugin('Navigation', function (RouteBuilder $routes) {
				$routes->connect('/', ['controller' => 'Navigation', 'action' => 'index'], ['routeClass' => DashedRoute::class]);

				$routes->fallbacks(DashedRoute::class);
			});
		});
	}

}
