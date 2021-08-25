<?php
    namespace App\Models;
    use MF\Model\Model;

    class Collaborator extends Model {

        private $id;
        private $nomeCompleto;
        private $telefone;
        private $cpf;
        private $email;
        private $senha;

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function __get($attribute){
            return $this->$attribute;
        }

        public function save(){
            $query = 'INSERT INTO colaborador
                (nome_completo, telefone, cpf, email, senha)
                VALUES (?, ?, ?, ?, ?)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('nomeCompleto'));
            $stmt->bindValue(2, $this->__get('telefone'));
            $stmt->bindValue(3, $this->__get('cpf'));
            $stmt->bindValue(4, $this->__get('email'));
            $stmt->bindValue(5, $this->__get('senha'));
            return $stmt->execute();
        }

        public function getCollaborators(){
            $query = 'SELECT id, nome_completo, telefone, cpf, email FROM colaborador';
            return $this->db->query($query)->fetchAll();
        }

        public function deletar(){
            $query = 'DELETE FROM colaborador WHERE id = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('id'));
            return $stmt->execute();
        }

        public function autenticar(){
            $query = 'SELECT id, nome_completo FROM colaborador WHERE email = ? AND senha = ?'; 
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('email'));
            $stmt->bindValue(2, $this->__get('senha'));
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if($result['nome_completo'] != '' && $result['id'] != ''){
                $this->__set('nomeCompleto', $result['nome_completo']);
                $this->__set('id', $result['id']);
            }
        }
    }
