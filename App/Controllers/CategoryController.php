<?php


namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

//os models
use App\Models\Categoria;

class CategoryController extends Action {


	public function categoria(){
		$categoria = Container::getModel('Categoria');
		$categorias = $categoria->getCategorias();
		@$this->view->dados = $categorias;
		$this->render('categoria', 'layout_app');
	}

	public function save(){
		$categoria = Container::getModel('Categoria');
		$categoria->__set('nome', $_POST['nome']);
		$categoria->__set('id_status', 1);
		$result = $categoria->save();
		//@$this->view->dados = $result;
		//$this->render('categoria', 'layout_app');

		header('Location: /categoria?sucess=1');
	}

}