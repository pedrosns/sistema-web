<?php
include_once './database.php';


$db = new Database();

$db->conectar();

$empleados = $db->get_empleados();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurante</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
</head>
<body>
	<a href="index.php" class="btn btn-primary">Inicio</a>
	<a href="create_empleado.php" class="btn btn-primary">Nuevo empleado</a>
	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Apellidos</th>
	      <th scope="col">Cedula</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  	for ($i=0; $i < count($empleados); $i++) { 
	  		echo '
	  		<tr>
		      <td>'.$empleados[$i]['id'].'</td>
		      <td>'.$empleados[$i]['nombre'].'</td>
		      <td>'.$empleados[$i]['apellidos'].'</td>
		      <td>'.$empleados[$i]['cedula'].'</td>
		    </tr>';
	  	}
	    ?>
	  </tbody>
	</table>
</body>
</html>
