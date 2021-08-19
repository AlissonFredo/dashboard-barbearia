<?php


namespace App\Controllers;

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

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

	public function categoria(){
		$this->render('categoria', 'layout_app');
	}

}


?>