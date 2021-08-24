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

			/* URL TESTE 
			$routes['ListagemCategoria'] = array(
				'route' => '/categoria/listagem',
				'controller' => 'categoryController',
				'action' => 'listagem'
			);
			 URL TESTE */

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

			$routes['cadastrarColaborador'] = array(
				'route' => '/colaborador/cadastrar',
				'controller' => 'collaboratorController',
				'action' => 'cadastrar'
			);

			$routes['listarColaborador'] = array(
				'route' => '/colaborador/listar',
				'controller' => 'collaboratorController',
				'action' => 'listar'
			);

			$routes['saveColaborador'] = array(
				'route' => '/colaborador/cadastrar/save',
				'controller' => 'collaboratorController',
				'action' => 'save'
			);

			$routes['saveColaborador'] = array(
				'route' => '/colaborador/listar/deletar',
				'controller' => 'collaboratorController',
				'action' => 'deletar'
			);

			$this->setRoutes($routes);
		}
	}