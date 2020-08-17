<?php 
include_once 'base_controller.php';

class ProductController extends BaseController {

	public function update($id, $datos) {
		$resultado = $this->get_db()->update_producto($id, $datos);
		if($resultado) {
			echo "se actualizo";
		}
	}

	public function delete($id) {
		$resultado = $this->get_db()->delete_producto($id);
		if($resultado) {
			echo "se elemino <a href='list_productos.php'>Regresar</a>";
		}
	}
}

?>