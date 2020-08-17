<?php
include_once 'database.php';

if(isset($_GET['id'])){
	$db = new Database();
	$db->conectar();

	$empleado_id = $_GET['id'];

	$empleado = $db->get_empleado($empleado_id);
}else{
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurante - Productos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
</head>
<body>
	<form action="manager.php" method="POST">
		<input type="hidden" name="agregar" value="update_empleado">
	<?php
			echo '<input type="hidden" name="id" value="'.$empleado['id'].'"><br>';
	?>

		<label for="Nombre">Nombre</label><br>
	<?php	
	echo '<input type="text" name="nombre" value="'.$empleado['nombre'].'"><br>';	
	?>
		<label for="apellidos">Apellidos</label><br>
    <?php	
	echo '<input type="text" name="apellidos" value="'.$empleado['apellidos'].'"><br>';	
	?>

		<label for="cedula">Cedula</label><br>
	<?php	
		echo '<input type="text" name="cedula" value="'.$empleado['cedula'].'"><br>';
	?>

		<br>
		<input type="submit" class="btn btn-success" value="Guardar">
	</form>
</body>
</html>