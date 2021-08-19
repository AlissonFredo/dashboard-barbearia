<?php


namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;


class IndexController extends Action {

	public function login() {
		$this->render('login', 'layout_login');
	}

	public function home() {
		$this->render('home', 'layout_app');
	}

}


?>