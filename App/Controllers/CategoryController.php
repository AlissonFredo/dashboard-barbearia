<?php
	namespace App\Controllers;

	//os recursos do miniframework
	use MF\Controller\Action;
	use MF\Model\Container;

	//os models
	use App\Models\Categoria;

	class CategoryController extends Action {

		const SUCESSO = 1;
        const ERRO = 2;

		public function list(){

			if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
				$categoria = Container::getModel('Categoria');
				$categorias = $categoria->getCategorias();
				@$this->view->dados = $categorias;
				$this->render('list', 'layout_app');
			} else {
				header('Location: /');
			}
		}

		public function register(){

			if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
				$this->render('register', 'layout_app');
			} else {
				header('Location: /');
			}
		}

		public function save(){
			$categoria = Container::getModel('Categoria');
			$categoria->__set('nome', $_POST['nome']);
			$categoria->__set('id_status', Categoria::STATUS_ATIVO);
			$result = $categoria->save();

			if($result) {
				header('Location: /categoria/cadastrar?save='.self::SUCESSO.'');
			} else {
				header('Location: /categoria/cadastrar?save='.self::ERRO.'');
			}
		}

		public function deletar(){
			$categoria = Container::getModel('Categoria');
			$categoria->__set('id', $_GET['del']);
			$result = $categoria->deletar();

			if($result == 1) {
				header('Location: /categoria/listar?delet='.self::SUCESSO.'');
			} else {
				header('Location: /categoria/listar?delet='.self::ERRO.'');
			}	
		}
	}