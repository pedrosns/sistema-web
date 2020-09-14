<?php
session_start();
include 'database.php';
$db= new Database();
$db->conectar();
$categorias= $db->get_categories();
$categorias_opciones='';

for ($i=0; $i <count($categorias) ; $i++) { 
	$categoria=$categorias[$i];
	
	
	$categorias_opciones= $categorias_opciones.'<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';

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
		echo '<div class="alert alert-success" role="alert">
				'.$_SESSION['message_product'].'
			</div>';
		unset($_SESSION['message_product']);
	}
	?>
	<form action="manager.php" method="POST">
		<input type="hidden" name="accion" value="create_producto">
		<input type="hidden" name="id" value="">

		

		<label for="Nombre">Nombre</label><br>
		<input type="text" name="nombre"><br>
		<p style='color:red'><?=isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] :''; ?></p>

		<label for="Descripcion">Descripcion</label><br>
		<textarea name="descripcion"></textarea><br>
		<p style='color:red'><?=isset($_SESSION['errores']['descripcion']) ? $_SESSION['errores']['descripcion'] :''; ?></p>

		<label for="costo">Costo</label><br>
		<input type="text" name="costo"><br>
		<p style='color:red'><?=isset($_SESSION['errores']['costo']) ? $_SESSION['errores']['costo'] :''; ?></p>

		<label for="cantidad">Cantidad</label><br>
		<input type="text" name="cantidad"><br>
		<p style='color:red'><?=isset($_SESSION['errores']['cantidad']) ? $_SESSION['errores']['cantidad'] :''; ?></p>

		<label for="categoria_id">Categorias</label><br>
		<select name="categoria_id" id="categoria_id"><?=$categorias_opciones?></select><br>
		

		<br>
		<input type="submit" class="btn btn-success" value="Guardar">
		<?php unset($_SESSION['errores']);?>

	</form>
</body>
</html>