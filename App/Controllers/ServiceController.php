<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class ServiceController extends Action {

        public function index(){
            $this->render('index', 'layout_app');
        }
    }