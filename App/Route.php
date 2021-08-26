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

			$routes['autenticar'] = array(
				'route' => '/autenticar',
				'controller' => 'authenticateController',
				'action' => 'autenticar'
			);

			$routes['home'] = array(
				'route' => '/home',
				'controller' => 'indexController',
				'action' => 'home'
			);

			$routes['registerCategoria'] = array(
				'route' => '/categoria/cadastrar',
				'controller' => 'categoryController',
				'action' => 'register'
			);

			$routes['listCategoria'] = array(
				'route' => '/categoria/listar',
				'controller' => 'categoryController',
				'action' => 'list'
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

			$routes['editarCategory'] = array(
				'route' => '/categoria/listar/editar',
				'controller' => 'categoryController',
				'action' => 'editar'
			);

			$routes['updateCategory'] = array(
				'route' => '/categoria/listar/atualizar',
				'controller' => 'categoryController',
				'action' => 'atualizar'
			);

			$routes['registerFornecedor'] = array(
				'route' => '/fornecedor/cadastrar',
				'controller' => 'providerController',
				'action' => 'register'
			);

			$routes['listFornecedor'] = array(
				'route' => '/fornecedor/listar',
				'controller' => 'providerController',
				'action' => 'list'
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

			$routes['registerServico'] = array(
				'route' => '/servico/cadastrar',
				'controller' => 'serviceController',
				'action' => 'register'
			);

			$routes['listServico'] = array(
				'route' => '/servico/listar',
				'controller' => 'serviceController',
				'action' => 'list'
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

			$routes['registerProduto'] = array(
				'route' => '/produto/cadastrar',
				'controller' => 'productController',
				'action' => 'register'
			);

			$routes['listProduto'] = array(
				'route' => '/produto/listar',
				'controller' => 'productController',
				'action' => 'list'
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

			$routes['deletarColaborador'] = array(
				'route' => '/colaborador/listar/deletar',
				'controller' => 'collaboratorController',
				'action' => 'deletar'
			);

			$routes['sair'] = array(
				'route' => '/sair',
				'controller' => 'authenticateController',
				'action' => 'sair'
			);

			$this->setRoutes($routes);
		}
	}