<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    use App\Models\Collaborator;

    class CollaboratorController extends Action {

        const SUCESSO = 1;
        const ERRO = 2;

        public function cadastrar(){

            if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
                $this->render('register', 'layout_app');
            } else {
                header('Location: /');
            }
        }

        public function listar(){

            if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
                $collaborator = Container::getModel('Collaborator');
                $collaborators = $collaborator->getCollaborators();
                @$this->view->dados = $collaborators;
                $this->render('list', 'layout_app');
            } else {
                header('Location: /');
            }
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
                header('Location: /colaborador/cadastrar?save='.self::SUCESSO.'');
            } else {
                header('Location: /colaborador/cadastrar?save='.self::ERRO.'');
            }
        }

        public function deletar(){
            $collaborator = Container::getModel('Collaborator');
            $collaborator->__set('id', $_GET['id']);
            $result = $collaborator->deletar();

            if($result){
                header('Location: /colaborador/listar?deletar='.self::SUCESSO.'');
            } else {
                header('Location: /colaborador/listar?deletar='.self::ERRO.'');
            }
        }

        public function editar(){
			header('Location: /colaborador/listar?desenvolvimento=1');
        }
    }