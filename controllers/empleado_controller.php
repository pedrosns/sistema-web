<?php 
include_once 'base_controller.php';

class EmpleadoController extends BaseController {
    public function update($id, $datos) {
		$resultado = $this->get_db()->update_empleado($id, $datos);
		if($resultado) {
			echo "se actualizo";
		}
	}

	public function delete($id){
		$resultado = $this->get_db()->delete_empleado($id);

		if($resultado){
			echo "el empleado se ha eliminado <a href='list_empleados.php'>Regresar</a>";
		}
	}
}

?>