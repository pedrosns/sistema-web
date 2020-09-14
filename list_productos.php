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
	<br/><br/>
	<div class="input-group flex-nowrap">
  		<div class="input-group-prepend">
    		<span class="input-group-text" id="addon-wrapping">@</span>
  		</div>
	  	<input type="text" class="form-control" placeholder="Busqueda.." aria-describedby="addon-wrapping">
	  	<button type="button" class="btn btn-success">Buscar</button>
	</div>
	<br/>
	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Descripcion</th>
	      <th scope="col">Costo</th>
	      <th scope="col">Cantidad</th>
	      <th scope="col">Acciones</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  	for ($i=0; $i < count($productos); $i++) {
	  		$url = 'update_producto.php?id='.$productos[$i]['id'];
	  		$url2 = 'manager.php?accion=delete_producto&id='.$productos[$i]['id'];
	  		echo '
	  		<tr>
		      <td>'.$productos[$i]['id'].'</td>
		      <td>'.$productos[$i]['nombre'].'</td>
		      <td>'.$productos[$i]['descripcion'].'</td>
		      <td>'.$productos[$i]['costo'].' $</td>
		      <td>'.$productos[$i]['cantidad'].'</td>
		      <td>
		      <a href="'.$url.'" class="btn btn-primary">Update</a>
		      <a href="'.$url2.'" class="btn btn-danger">Delete</a>
		      </td>
		    </tr>';
	  	}
	    ?>
	  </tbody>
	</table>
</body>
</html>
