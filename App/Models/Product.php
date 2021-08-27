<?php 
    namespace App\Models;
    use MF\Model\Model;

    class Product extends Model {
	    const STATUS_ATIVO = 1;

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
            return $stmt->execute();
        }

        public function getProducts(){
            $query = 'SELECT    
                    p.id, 
                    p.nome, 
                    p.qtd, 
                    p.valor_compra, 
                    p.valor_venda, 
                    p.data_validade, 
                    p.comissao, 
                    f.nome AS id_fornecedor, 
                    c.nome AS id_categoria, 
                    s.nome AS id_status
                FROM produto AS p
                INNER JOIN status as s ON p.id_status = s.id
                INNER JOIN fornecedor AS f ON p.id_fornecedor = f.id
                INNER JOIN categoria AS c ON p.id_categoria = c.id
                ORDER BY p.id ASC';
            return $this->db->query($query)->fetchAll();
        }

        public function deletar(){
            $query = 'DELETE FROM produto WHERE id = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('id'));
            return $stmt->execute();
        }

        public function getProductsByCategory(){
            $query = 'SELECT c.nome, sum(p.qtd) AS total_produtos 
                FROM produto AS p 
                INNER JOIN categoria AS c ON p.id_categoria = c.id 
                GROUP BY c.nome;';
            return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function getProductsByProvider(){
            $query = 'SELECT f.nome, sum(p.qtd) AS total_produtos 
                FROM produto AS p
                INNER JOIN fornecedor AS f ON p.id_fornecedor = f.id
                GROUP BY f.nome;';
            return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        }
    }