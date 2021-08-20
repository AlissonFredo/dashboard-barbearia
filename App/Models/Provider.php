<?php 
    namespace App\Models;
    use MF\Model\Model;

    class Provider extends Model {

        private $id;
        private $nome;
        private $id_status;

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function save(){
            $query = 'INSERT INTO fornecedor (nome, id_status) VALUES (?, ?)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, strtoupper($this->__get('nome')));
            $stmt->bindValue(2, $this->__get('id_status'));
            $stmt->execute();
        }
    }