<?php
    class Conexao {
        private $host = 'localhost';
        private $dbname = 'barbearia';
        private $user = 'root';
        private $pass = '47717310';

        public function conectar(){
            try {
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                return $conexao;
            } catch (PDOException $error) {
                echo '<p>'.$error->getMessege().'</p>';
            }
        }
    }