<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    use MF\Models\Provider;
	use App\Models\Categoria;

    class ProductController extends Action {

        private $indices = array('categorias', 'fornecedores');

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
                $categoria = Container::getModel('Categoria');
                $categorias = $categoria->getCategorias();

                $provider = Container::getModel('Provider');
                $providers = $provider->getProviders();

                $product = Container::getModel('Product');
                $products = $product->getProducts();

                $dados = [
                    'categorias' => $categorias,
                    'fornecedores' => $providers,
                    'produtos' => $products
                ];

                @$this->view->dados = $dados;
                $this->render('list', 'layout_app');
            } else {
                header('Location: /');
            }
        }

        public function save(){
            $product = Container::getModel('Product');
            $product->__set('nome', $_POST['nome']);
            $product->__set('valorCompra', $_POST['valor_compra']);
            $product->__set('valorVenda', $_POST['valor_venda']);
            $product->__set('comissao', $_POST['comissao']);
            $product->__set('quantidade', $_POST['quantidade']);
            $product->__set('idFornecedor', $_POST['fornecedor']);
            $product->__set('idCategoria', $_POST['categoria']);

            $data = implode("-",array_reverse(explode("/",$_POST['data_validade'])));
            $product->__set('dataValidade', $data);
            $product->__set('idStatus', 1);
            $result = $product->save();

            if($result){
                header('Location: /produto/cadastrar?save=1');
            } else {
                header('Location: /produto/cadastrar?save=2');
            }
        }

        public function deletar(){
            $product = Container::getModel('Product');
            $product->__set('id', $_GET['id']);
            $result = $product->deletar();

            if($result){
                header('Location: /produto/listar?deletar=1');
            } else {
                header('Location: /produto/listar?deletar=2');
            }
        }
    }