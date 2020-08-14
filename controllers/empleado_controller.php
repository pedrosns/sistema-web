<?php 

class EmpleadoController {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

    
    public function update($id, $datos) {
		$resultado = $this->db->update_empleado($id, $datos);
		if($resultado) {
			echo "se actualizo";
		}
	}
}

?>