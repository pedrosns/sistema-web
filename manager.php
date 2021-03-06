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
	$empleadoController= new EmpleadoController($db);

	if(array_key_exists('accion', $_POST)) {
		$accion = $_POST['accion'];
	} else {
		$accion = $_GET['accion'];
	}

	if($accion === 'create_producto') {
		$productController->create($_POST);
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

	if($accion === 'login_user') {
		$datos = $_POST;
		$userController->login($datos);
	}

	if($accion == 'logout') {
		$userController->logout();
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
		$empleado_controller->create($_POST);
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