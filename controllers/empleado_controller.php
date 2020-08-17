<?php 
include_once 'base_controller.php';

class EmpleadoController extends BaseController {
    public function update($id, $datos) {
		$resultado = $this->get_db()->update_empleado($id, $datos);
		if($resultado) {
			echo "se actualizo";
		}
	}
}

?>