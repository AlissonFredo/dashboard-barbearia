<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class ServiceController extends Action {

        public function register(){
            session_start();

            if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
                $this->render('register', 'layout_app');
            } else {
                header('Location: /');
            }
        }

        public function list(){
            session_start();

            if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
                $service = Container::getModel('Service');
                $services = $service->getServices();
                @$this->view->dados = $services;
                $this->render('list', 'layout_app');
            } else {
                header('Location: /');
            }
        }

        public function save(){
            $service = Container::getModel('Service');
            $service->__set('nome', $_POST['nome']);
            $service->__set('valor', $_POST['valor']);
            $service->__set('comissao', $_POST['comissao']);
            $service->__set('id_status', 1);
            $result = $service->save();

            if($result) {
                header('Location: /servico/cadastrar?save=1');
            } else {
                header('Location: /servico/cadastrar?save=2');
            }
        }

        public function deletar(){
            $service = Container::getModel('Service');
            $service->__set('id', $_GET['id']);
            $result = $service->deletar();

            if($result) {
                header('Location: /servico/listar?deletar=1');
            } else {
                header('Location: /servico/listar?deletar=2');
            }


        }
    }