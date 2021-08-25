<?php
    namespace App\Models;
    use MF\Model\Model;

    class Login extends Model {

        private $email;
        private $senha;

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function logar(){
            $query = 'SELECT nome_completo FROM colaborador WHERE email = ? AND senha = ?'; 
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('email'));
            $stmt->bindValue(2, $this->__get('senha'));
            $stmt->execute();
            return $result = $stmt->fetchAll();
        }
    }