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

			/*
			$routes['ListagemCategoria'] = array(
				'route' => '/categoria/listagem',
				'controller' => 'categoryController',
				'action' => 'listagem'
			);
			*/

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

			$routes['saveServico'] = array(
				'route' => '/servico/save',
				'controller' => 'serviceController',
				'action' => 'save'
			);

			$routes['deletarServico'] = array(
				'route' => '/servico/deletar',
				'controller' => 'serviceController',
				'action' => 'deletar'
			);

			$routes['indexProduto'] = array(
				'route' => '/produto',
				'controller' => 'productController',
				'action' => 'index'
			);

			$routes['saveProduto'] = array(
				'route' => '/produto/save',
				'controller' => 'productController',
				'action' => 'save'
			);

			$routes['deletarProduto'] = array(
				'route' => '/produto/deletar',
				'controller' => 'productController',
				'action' => 'deletar'
			);

			$this->setRoutes($routes);
		}
	}