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

}