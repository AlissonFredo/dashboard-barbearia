<?php 
    namespace App\Models;
    use MF\Model\Model;

    class Provider extends Model {
	    const STATUS_ATIVO = 1;

        private $id;
        private $nome;
        private $id_status;

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public static function getStatusAtivo()
        {
            return self::STATUS_ATIVO;
        }

        public function save(){
            $query = 'INSERT INTO fornecedor (nome, id_status) VALUES (?, ?)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, strtoupper($this->__get('nome')));
            $stmt->bindValue(2, $this->__get('id_status'));
            return $stmt->execute();
        }

        public function getProviders(){
            $query = 'SELECT f.id, f.nome, status.nome AS id_status
                FROM fornecedor AS f
                INNER JOIN status ON f.id_status = status.id';
            return $this->db->query($query)->fetchAll();
        }

        public function deletar(){
            $query = 'DELETE FROM fornecedor WHERE id = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('id'));
            return $stmt->execute();
        }

        public function getProvider(){
            $query = 'SELECT id, nome FROM fornecedor WHERE id = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('id'));
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        public function atualizar(){
            $query = 'UPDATE fornecedor SET nome = ? WHERE id = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, strtoupper($this->__get('nome')));
            $stmt->bindValue(2, $this->__get('id'));
            return $stmt->execute();
        }
    }