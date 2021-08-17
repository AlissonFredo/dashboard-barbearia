<?php
    class CategoriaService {
        
        private $conexao;
        private $categoria;

        public function __construct(Conexao $conexao, CategoriaModel $categoria){
            $this->conexao = $conexao->conectar();
            $this->categoria = $categoria;
        }

        public function inserir(){
            $query = 'INSERT INTO categoria(nome, id_status) VALUES(?, ?)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->categoria->__get('nome'));
            $stmt->bindValue(2, $this->categoria->__get('id_status'));
            $stmt->execute();

        }
        
    }