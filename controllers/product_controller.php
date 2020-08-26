<?php 
session_start();
include_once 'base_controller.php';

class ProductController extends BaseController {
	public function create($data) {
		$exito = $this->get_db()->crear_producto($data);

		if($exito) {
			$_SESSION['message_product'] = "Producto agregado";
		} else {
			$_SESSION['message_product'] = "No se pudo guardar el producto";
		}

		$this->goTo('create_producto.php');
	}

	public function update($id, $datos) {
		$resultado = $this->get_db()->update_producto($id, $datos);
		if($resultado) {
			$_SESSION['message_product'] = "Se actualizo el producto";
		} else {
			$_SESSION['message_product'] = "Hubo un error";
		}

		$this->goTo('update_producto.php?id='.$id);
	}

	public function delete($id) {
		$resultado = $this->get_db()->delete_producto($id);
		if($resultado) {
			echo "se elemino <a href='list_productos.php'>Regresar</a>";
		}
	}
}

?>