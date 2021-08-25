<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class ServiceController extends Action {

        const SUCESSO = 1;
        const ERRO = 2;

        public function register(){

            if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
                $this->render('register', 'layout_app');
            } else {
                header('Location: /');
            }
        }

        public function list(){

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
            $service->__set('id_status', Service::STATUS_ATIVO);
            $result = $service->save();

            if($result) {
                header('Location: /servico/cadastrar?save='.self::SUCESSO.'');
            } else {
                header('Location: /servico/cadastrar?save='.self::ERRO.'');
            }
        }

        public function deletar(){
            $service = Container::getModel('Service');
            $service->__set('id', $_GET['id']);
            $result = $service->deletar();

            if($result) {
                header('Location: /servico/listar?deletar='.self::SUCESSO.'');
            } else {
                header('Location: /servico/listar?deletar='.self::ERRO.'');
            }


        }
    }