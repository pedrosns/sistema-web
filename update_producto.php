<?php
session_start();
include_once 'database.php';

if(isset($_GET['id'])) {
	$db = new Database();
	$db->conectar();

	$product_id = $_GET['id'];

	$product = $db->get_product($product_id);
} else {
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
	<?php 
	if(isset($_SESSION['message_product'])) {
		echo '<div class="alert alert-primary" role="alert">
				'.$_SESSION['message_product'].'
			</div>';
		unset($_SESSION['message_product']);
	}
	?>
	<form action="manager.php" method="POST">
		<input type="hidden" name="accion" value="update_producto">
		<?php
			echo '<input type="hidden" name="id" value="'.$product['id'].'"><br>';
		?>
		<label for="nombre">Nombre</label><br>
		<?php
			echo '<input type="text" name="nombre" value="'.$product['nombre'].'"><br>';
		?>
		<label for="descripcion">Descripcion</label><br>
		<?php
		echo '<textarea name="descripcion">'.$product['descripcion'].'</textarea><br>';
		?>

		<label for="costo">Costo</label><br>
		<?php
			echo '<input type="text" name="costo" value="'.$product['costo'].'"><br>';
		?>

		<label for="cantidad">Cantidad</label><br>
		<?php
			echo '<input type="text" name="cantidad" value="'.$product['cantidad'].'"><br>';
		?>
		<br>
		<input type="submit" class="btn btn-success" value="Guardar">
	</form>
</body>
</html>