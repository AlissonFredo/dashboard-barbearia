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
			$this->render('home', 'layout_app');
		} else {
            header('Location: /');
		}
	}
}