<?php 
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;
    use MF\Models\Provider;
    
    class ProviderController extends Action {

        public function index(){
            $this->render('index', 'layout_app');
        }

        public function save(){
            $provider = Container::getModel('Provider');
            $provider->__set('nome', $_POST['nome']);
            $provider->__set('id_status', 1);
            $provider->save();

            header('Location: /fornecedor');
        }
    }