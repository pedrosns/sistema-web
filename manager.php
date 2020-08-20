<?php
include_once 'database.php';
include_once 'controllers/product_controller.php';
include_once 'controllers/empleado_controller.php';
include_once 'controllers/user_controller.php';

if(isset($_POST['accion']) || isset($_GET['accion'])) {
	$db = new Database();
	$db->conectar();

	$productController = new ProductController($db);
	$userController = new UserController($db);

	if(array_key_exists('accion', $_POST)) {
		$accion = $_POST['accion'];
	} else {
		$accion = $_GET['accion'];
	}

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

	if($accion === 'delete_producto') {
		$productoId = $_GET['id'];
		$productController->delete($productoId);
	}

	if($accion === 'register_user') {
		$datos = $_POST;
		$userController->register($datos);
	}
}

if (isset($_POST['agregar']) || isset($_GET['agregar'])){
	$db = new Database();
	$db->conectar();

	$empleado_controller = new EmpleadoController($db);
	
	if(array_key_exists('agregar', $_POST)) {
		$agregar = $_POST['agregar'];
	} else {
		$agregar = $_GET['agregar'];
	}
	

	if ($agregar === 'create_empleado'){
		$db->conectar();
		$empleado = $_POST;

		$exito = $db->create_empleado($empleado);

			if ($exito) {
				echo "el producto se ha agregado correctamente";
				echo '<a href="list_empleados.php" class="btn btn-success">Volver</a>';
			}else{
				print_r ($db->get_error());
			}
	
	}

	if ($agregar === 'update_empleado'){
		$empleadoId= $_POST['id'];
		$data = $_POST;

		$empleado_controller->update($empleadoId, $data);

	}

	if($agregar === 'delete_empleado') {
		$empleadoId = $_GET['id'];
		$empleado_controller->delete($empleadoId);
	}else{
		print_r($db->get_error());
	}
}



?>