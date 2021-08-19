<?php

namespace App\Models;

use MF\Model\Model;

class Categoria extends Model {

	public function getCategorias() {
		
		$query = "SELECT id, nome FROM categoria";
		return $this->db->query($query)->fetchAll();
	}
}

?>