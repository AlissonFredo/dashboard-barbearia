<?php
    namespace App\Models;
    use MF\Model\Model;

    class Service extends Model {
	    const STATUS_ATIVO = 1;

        private $id;
        private $nome;
        private $valor;
        private $comissao;
        private $id_status;

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attributa, $value){
            $this->$attributa = $value;
        }

        public function save(){
            $query = 'INSERT INTO servico (nome, valor, comissao, id_status) VALUES (?, ?, ?, ?)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, strtoupper($this->__get('nome')));
            $stmt->bindValue(2, $this->__get('valor'));
            $stmt->bindValue(3, $this->__get('comissao'));
            $stmt->bindValue(4, $this->__get('id_status'));
            return $stmt->execute();
        }

        public function getServices(){
            $query = 'SELECT s.id, s.nome, s.valor, s.comissao, status.nome AS id_status
                FROM servico AS s
                INNER JOIN status ON s.id_status = status.id';
            return $this->db->query($query)->fetchAll();
        }

        public function deletar(){
            $query = 'DELETE FROM servico WHERE id = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('id'));
            return $stmt->execute();
        }

        public function getService(){
            $query = 'SELECT id, nome, valor, comissao FROM servico WHERE id = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('id'));
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        public function atualizar(){
            $query = 'UPDATE servico
                SET nome = ?, valor = ?, comissao = ?
                WHERE id = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, strtoupper($this->__get('nome')));
            $stmt->bindValue(2, $this->__get('valor'));
            $stmt->bindValue(3, $this->__get('comissao'));
            $stmt->bindValue(4, $this->__get('id'));
            return $stmt->execute();
        }
    }