<!DOCTYPE html>
<html>
<head>
	<title>Restaurante - Productos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
</head>
<body>
	<form action="manager.php" method="POST">
		<input type="hidden" name="agregar" value="create_empleado">

		<label for="Nombre">Nombre</label><br>
		<input type="text" name="nombre"><br>

		<label for="apellidos">Apellidos</label><br>
        <input type="text" name="apellidos"><br>

		<label for="cedula">Cedula</label><br>
		<input type="text" name="cedula"><br>

		<br>
		<input type="submit" class="btn btn-success" value="Guardar">
    </form>
    
</body>
</html>