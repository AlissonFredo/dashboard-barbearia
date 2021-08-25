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

	public function logar(){
		$login = Container::getModel('Login');
		$login->__set('email', $_POST['email']);
		$login->__set('senha', md5($_POST['senha']));
		$result = $login->logar();

		if(!empty($result)){
			//echo 'logar usuario';
            header('Location: /home');

		} else {
			//echo 'não logar usuario';
            header('Location: /');
		}
	}

	public function home() {
		$this->render('home', 'layout_app');
	}

}


?>