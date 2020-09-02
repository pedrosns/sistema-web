<?php
session_start();
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
		echo '<div class="alert alert-success" role="alert">
				'.$_SESSION['message_product'].'
			</div>';
		unset($_SESSION['message_product']);
	}
	?>

	<form action="manager.php" method="POST">
		<input type="hidden" name="agregar" value="create_empleado">

		<label for="Nombre">Nombre</label><br>
		<input type="text" name="nombre"><br>
		<p style='color:red'><?=isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] :''; ?></p>


		<label for="apellidos">Apellidos</label><br>
        <input type="text" name="apellidos"><br>
		<p style='color:red'><?=isset($_SESSION['errores']['apellidos']) ? $_SESSION['errores']['apellidos'] :''; ?></p>


		<label for="cedula">Cedula</label><br>
		<input type="text" name="cedula"><br>
		<p style='color:red'><?=isset($_SESSION['errores']['cedula']) ? $_SESSION['errores']['cedula'] :''; ?></p>


		<br>
		<input type="submit" class="btn btn-success" value="Guardar">
		<?php unset($_SESSION['errores']);?>
    </form>
    
</body>
</html>