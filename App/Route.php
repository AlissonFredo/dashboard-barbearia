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

			$routes['saveCategory'] = array(
				'route' => '/saveCategory',
				'controller' => 'categoryController',
				'action' => 'save'
			);

			$routes['deleteCategory'] = array(
				'route' => '/deleteCategory',
				'controller' => 'categoryController',
				'action' => 'deletar'
			);

			$routes['indexFornecedor'] = array(
				'route' => '/fornecedor',
				'controller' => 'providerController',
				'action' => 'index'
			);

			$routes['saveFornecedor'] = array(
				'route' => '/fornecedor/save',
				'controller' => 'providerController',
				'action' => 'save'
			);

			$routes['deleteFornecedor'] = array(
				'route' => '/fornecedor/deletar',
				'controller' => 'providerController',
				'action' => 'deletar'
			);

			$routes['indexServico'] = array(
				'route' => '/servico',
				'controller' => 'serviceController',
				'action' => 'index'
			);

			$this->setRoutes($routes);
		}
	}