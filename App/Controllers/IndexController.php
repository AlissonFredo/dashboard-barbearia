<?php
namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function login() {
		$this->render('login', 'layout_login');
	}

	public function home() {
		if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
			$product = Container::getModel('Product');
			@$this->view->productsByCategory = $product->getProductsByCategory();

			$product = Container::getModel('Product');
			@$this->view->productsByProvider = $product->getProductsByProvider();

			$this->render('home', 'layout_app');
		} else {
            header('Location: /');
		}
	}
}