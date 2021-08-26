<?php 
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;
    use App\Models\Provider;
    
    class ProviderController extends Action {

        const SUCESSO = 1;
        const ERRO = 2;

        public function list(){

            if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
                $provider = Container::getModel('Provider');
                $providers = $provider->getProviders();
                @$this->view->dados = $providers;
                $this->render('list', 'layout_app');
            } else {
                header('Location: /');
            }
        }

        public function register(){

            if($_SESSION['nome'] != '' && $_SESSION['id'] != ''){
                $this->render('register', 'layout_app');
            } else {
                header('Location: /');
            }
        }

        public function save(){
            $provider = Container::getModel('Provider');
            $provider->__set('nome', $_POST['nome']);
            $provider->__set('id_status', Provider::STATUS_ATIVO);
            $result = $provider->save();

            if($result) {
                header('Location: /fornecedor/cadastrar?save='.self::SUCESSO.'');
            } else {
                header('Location: /fornecedor/cadastrar?save='.self::ERRO.'');
            }

        }

        public function deletar(){
            $provider = Container::getModel('Provider');
            $provider->__set('id', $_GET['id']);
            $result = $provider->deletar();

            if($result){
                header('Location: /fornecedor/listar?deletar='.self::SUCESSO.'');
            }else {
                header('Location: /fornecedor/listar?deletar='.self::ERRO.'');
            }
        }

        public function editar(){
            $provider = Container::getModel('Provider');
            $provider->__set('id', $_GET['id']);
            $result = $provider->getProvider();
            @$this->view->dados = $result;
			$this->render('register', 'layout_app');
        }

        public function atualizar(){
            $provider = Container::getModel('Provider');
            $provider->__set('id', $_POST['id']);
            $provider->__set('nome', $_POST['nome']);
            $result = $provider->atualizar();

            if($result){
				header('Location: /fornecedor/listar?edit='.self::SUCESSO.'');
            } else {
				header('Location: /fornecedor/listar?edit='.self::ERRO.'');
            }
        }
    }