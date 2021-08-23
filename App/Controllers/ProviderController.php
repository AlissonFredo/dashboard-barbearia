<?php 
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;
    use MF\Models\Provider;
    
    class ProviderController extends Action {

        public function index(){
            $provider = Container::getModel('Provider');
            $providers = $provider->getProviders();
            @$this->view->dados = $providers;
            $this->render('index', 'layout_app');
        }

        public function save(){
            $provider = Container::getModel('Provider');
            $provider->__set('nome', $_POST['nome']);
            $provider->__set('id_status', 1);
            $result = $provider->save();

            if($result) {
                header('Location: /fornecedor?save=1');
            } else {
                header('Location: /fornecedor?save=2');
            }

        }

        public function deletar(){
            $provider = Container::getModel('Provider');
            $provider->__set('id', $_GET['id']);
            $result = $provider->deletar();

            if($result){
                header('Location: /fornecedor?deletar=1');
            }else {
                header('Location: /fornecedor?deletar=2');
            }
        }
    }