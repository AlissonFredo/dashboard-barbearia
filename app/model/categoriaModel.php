<?php
    class CategoriaModel {

        private $id;
        private $nome;
        private $id_status;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }