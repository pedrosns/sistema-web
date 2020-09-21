<?php
include_once './database.php';


$db = new Database();

$db->conectar();
$productos=[];

if (isset($_GET['query']) && !empty($_GET['query'])) {

	$query= $_GET['query'];
	$productos= $db->search_products($query);
	
}else {
	$productos = $db->get_productos();
}

if (isset($_GET['filtro']) && isset($_GET['valor'])) {
	$filtro= $_GET['filtro'];
	$valor= $_GET['valor'];
	if ($filtro=='categoria') {
		$productos= $db->filter_by_category($valor);

	}
	if ($filtro=='cantidad') {
		if ($valor<=100) {
			
		}

		if ($valor>100) {
			
		}
		
		
	}
	
}


$categorias= $db->get_categories();
$categorias_opciones='';

for ($i=0; $i <count($categorias) ; $i++) { 
	$categoria=$categorias[$i];
	
	$link= "list_productos.php?filtro=categoria&valor={$categoria['id']}";
	$categorias_opciones= $categorias_opciones.'<a class="dropdown-item"  href= "'.$link.'">'.$categoria['nombre'].'</a>';

}


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
	<form method="GET" >
	<imput type="hidden"  name="search">
	<div class="input-group flex-nowrap">
  		<div class="input-group-prepend">
    		<span class="input-group-text" id="addon-wrapping">@</span>
  		</div>
	  	<input type="text" name="query" class="form-control" placeholder="Busqueda.." aria-describedby="addon-wrapping">
	  	<button type="submit" class="btn btn-success">Buscar</button>
	</div>
	</form>
	<div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	Categorias
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
   <?= $categorias_opciones?>
  </div>
</div>

<div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	Cantidad
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
  <a class="dropdown-item" href="list_productos.php?filtro=cantidad&valor=100">100</a>
  <a class="dropdown-item" href="list_productos.php?filtro=cantidad&valor=200">200</a>
  </div>
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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
