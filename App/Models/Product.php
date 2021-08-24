<?php 
    namespace App\Models;
    use MF\Model\Model;

    class Product extends Model {
        private $id;
        private $nome;
        private $quantidade;
        private $valorCompra;
        private $valorVenda;
        private $dataValidade;
        private $comissao;
        private $idFornecedor;
        private $idCategoria;
        private $idStatus;

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function save(){
            $query = 'INSERT INTO 
                produto (nome, qtd, valor_compra, valor_venda, data_validade, comissao, id_fornecedor, id_categoria, id_status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('nome'));
            $stmt->bindValue(2, $this->__get('quantidade'));
            $stmt->bindValue(3, $this->__get('valorCompra'));
            $stmt->bindValue(4, $this->__get('valorVenda'));
            $stmt->bindValue(5, $this->__get('dataValidade'));
            $stmt->bindValue(6, $this->__get('comissao'));
            $stmt->bindValue(7, $this->__get('idFornecedor'));
            $stmt->bindValue(8, $this->__get('idCategoria'));
            $stmt->bindValue(9, $this->__get('idStatus'));

            $stmt->execute();
        }
    }