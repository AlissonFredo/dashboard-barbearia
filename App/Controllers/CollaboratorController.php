<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    use MF\Models\Collaborator;

    class CollaboratorController extends Action {

        public function cadastrar(){
            $this->render('register', 'layout_app');
        }

        public function save(){
            $collaborator = Container::getModel('Collaborator');
            $collaborator->__set('nomeCompleto', $_POST['nome']);
            $collaborator->__set('telefone', $_POST['telefone']);
            $collaborator->__set('cpf', $_POST['cpf']);
            $collaborator->__set('email', $_POST['email']);
            $collaborator->__set('senha',  md5($_POST['senha']));
            $result = $collaborator->save();

            if($result){
                header('Location: /colaborador/cadastrar?save=1');
            } else {
                header('Location: /colaborador/cadastrar?save=2');
            }
        }
    }