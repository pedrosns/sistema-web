<?php
include_once 'database.php';
include_once 'controllers/product_controller.php';


if(isset($_POST['accion'])) {
	$db = new Database();
	$db->conectar();

	$productController = new ProductController($db);

	$accion = $_POST['accion'];

	if($accion === 'create_producto') {
		$db->conectar();

		$producto = $_POST;

		$exito = $db->crear_producto($producto);

		if($exito) {
			echo "Producto agregado";
			echo '<a href="list_productos.php" class="btn btn-success">Volver</a>';
		} else {
			echo "No se pudo guardar el producto";
		}
	}

	if($accion === 'update_producto') {
		
		$productoId = $_POST['id'];
		$data = $_POST;

		$productController->update($productoId, $data);
	}
}
?>