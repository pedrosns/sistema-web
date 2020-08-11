<?php 

class ProductController {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function update($id, $datos) {
		$resultado = $this->db->update_producto($id, $datos);
		if($resultado) {
			echo "se actualizo";
		}
	}
}

?>