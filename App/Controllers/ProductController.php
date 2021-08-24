<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    use MF\Models\Provider;
	use App\Models\Categoria;

    class ProductController extends Action {

        private $indices = array('categorias', 'fornecedores');

        public function index(){
            $categoria = Container::getModel('Categoria');
			$categorias = $categoria->getCategorias();

            $provider = Container::getModel('Provider');
            $providers = $provider->getProviders();

            $dados = [
                'categorias' => $categorias,
                'fornecedores' => $providers
            ];

			@$this->view->dados = $dados;
            $this->render('index', 'layout_app');
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
            $product->save();
        }
    }