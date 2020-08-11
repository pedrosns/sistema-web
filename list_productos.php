<?php
include_once './database.php';


$db = new Database();

$db->conectar();

$productos = $db->get_productos();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurante - Productos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
</head>
<body>
	<a href="index.php" class="btn btn-primary">Inicio</a>
	<a href="create_producto.php" class="btn btn-primary">Nuevo producto</a>
	<br/>
	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Descripcion</th>
	      <th scope="col">Costo</th>
	      <th scope="col">Cantidad</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  	for ($i=0; $i < count($productos); $i++) { 
	  		echo '
	  		<tr>
		      <td>'.$productos[$i]['id'].'</td>
		      <td>'.$productos[$i]['nombre'].'</td>
		      <td>'.$productos[$i]['descripcion'].'</td>
		      <td>'.$productos[$i]['costo'].' $</td>
		      <td>'.$productos[$i]['cantidad'].'</td>
		    </tr>';
	  	}
	    ?>
	  </tbody>
	</table>
</body>
</html>
