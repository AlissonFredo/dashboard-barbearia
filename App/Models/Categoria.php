<?php
namespace App\Models;
use MF\Model\Model;

class Categoria extends Model {
	const STATUS_ATIVO = 1;

	private $id;
	private $nome;
	private $id_status;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}

	public function getCategorias() {
		$query = "SELECT c.id, c.nome, status.nome AS id_status
			FROM categoria AS c
			INNER JOIN status ON c.id_status = status.id";
		return $this->db->query($query)->fetchAll();
	}

	public function save(){
		$query = 'INSERT INTO categoria(nome, id_status) VALUES(?,?)';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, strtoupper($this->__get('nome')));
		$stmt->bindValue(2, $this->__get('id_status'));
		return $stmt->execute();
	}

	public function deletar(){
		$query = 'DELETE FROM categoria WHERE id = ?';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, $this->__get('id'));
		$result = $stmt->execute();
		return $result;

	}

	public function getCategoria(){
		$query = 'SELECT id, nome FROM categoria WHERE id = ?';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, $this->__get('id'));
		$stmt->execute();
		$result = $stmt->fetch(\PDO::FETCH_ASSOC);
		return $result;
	}

	public function atualizar(){
		$query = 'UPDATE categoria SET nome = ? WHERE id = ?';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, strtoupper($this->__get('nome')));
		$stmt->bindValue(2, $this->__get('id'));
		return $stmt->execute();
	}
}

?>