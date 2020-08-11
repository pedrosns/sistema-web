<?php
include_once 'database.php';


if(isset($_POST['accion'])) {
	$db = new Database();

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
}
?>