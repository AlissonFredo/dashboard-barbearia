<?php
    namespace App\Models;
    use MF\Model\Model;

    class Service extends Model {

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
            $stmt->bindValue(1, $this->__get('nome'));
            $stmt->bindValue(2, $this->__get('valor'));
            $stmt->bindValue(3, $this->__get('comissao'));
            $stmt->bindValue(4, $this->__get('id_status'));
            return $stmt->execute();
        }
    }