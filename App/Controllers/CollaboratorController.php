<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class CollaboratorController extends Action {

        public function cadastrar(){
            $this->render('register', 'layout_app');
        }
    }