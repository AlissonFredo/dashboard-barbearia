<?php
    namespace App\Controllers;

    //os recursos do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;

    use App\Models\Collaborator;

    class AuthenticateController extends Action {

        public function autenticar(){
            $collaborator = Container::getModel('Collaborator');
            $collaborator->__set('email', $_POST['email']);
            $collaborator->__set('senha', md5($_POST['senha']));
            $collaborator->autenticar();

            if($collaborator->__get('id') != '' && $collaborator->__get('nomeCompleto')){
                $_SESSION['id'] = $collaborator->__get('id') ;
                $_SESSION['nome'] = $collaborator->__get('nomeCompleto');
                header('Location: /home');
            } else {
                header('Location: /');
            }
        }

        public function sair(){
            session_destroy();
            header('Location: /');
        }
    }