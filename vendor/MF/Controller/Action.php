<?php

namespace MF\Controller;

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

abstract class Action {

	protected $view;

	public function __construct() {
		$this->view = new \stdClass();
	}

	protected function render($view, $layout) {
		$this->view->page = $view;

		if(file_exists("".$layout.".phtml")) {
			require_once "".$layout.".phtml";
		} else {
			$this->content();
		}
	}

	protected function content() {
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));

		require_once "".$classAtual."/".$this->view->page.".phtml";
	}
}

?>