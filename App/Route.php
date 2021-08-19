<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['login'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'login'
		);

		$routes['home'] = array(
			'route' => '/home',
			'controller' => 'indexController',
			'action' => 'home'
		);

		$routes['categoria'] = array(
			'route' => '/categoria',
			'controller' => 'categoryController',
			'action' => 'categoria'
		);

		$this->setRoutes($routes);
	}

}

?>