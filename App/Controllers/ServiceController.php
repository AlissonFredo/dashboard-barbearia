<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class ServiceController extends Action {

        public function index(){
            $service = Container::getModel('Service');
            $services = $service->getServices();
            @$this->view->dados = $services;
            $this->render('index', 'layout_app');
        }

        public function save(){
            $service = Container::getModel('Service');
            $service->__set('nome', $_POST['nome']);
            $service->__set('valor', $_POST['valor']);
            $service->__set('comissao', $_POST['comissao']);
            $service->__set('id_status', 1);
            $result = $service->save();

            if($result) {
                header('Location: /servico?save=1');
            } else {
                header('Location: /servico?save=2');
            }
        }

        public function deletar(){
            $service = Container::getModel('Service');
            $service->__set('id', $_GET['id']);
            $result = $service->deletar();

            if($result) {
                header('Location: /servico?deletar=1');
            } else {
                header('Location: /servico?deletar=2');
            }


        }
    }