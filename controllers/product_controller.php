<?php 
session_start();
include_once 'base_controller.php';

class ProductController extends BaseController {
	public function create($data) {
		/*if (!$this->validador->validate_data($data)) {
			if(!$this->validate_types($data)){
				$exito = $this->get_db()->crear_producto($data);

				if($exito) {
					$_SESSION['message_product'] = "Producto agregado";
				} else {
					$_SESSION['message_product'] = "No se pudo guardar el producto";
				}
			}else{
				$_SESSION['message_product'] = "los tipos de datos no coinciden";
			}
			

			
		}else{
			$_SESSION['message_product'] = "Debe rellenar todos los datos del formulario";
		}*/
		$rules=[
			'nombre'=> 'required',
			'descripcion'=> 'required',
			'costo'=> 'only_number|required',
			'cantidad'=> 'only_number|required',
		];
		$errores = $this->validador->validate($data, $rules);		

		if (count($errores)>0) {
			// join funcion para unir elementos de un array por medio de un separador, 
			//el separador es el primer parametro
			$tmp=[];
			foreach ($errores as $campo => $arraydeerrores) {
				$tmp[$campo] = join(',', $arraydeerrores);

			}
			$_SESSION['errores'] = $tmp;

			//print_r($errores);
		}else{
			$_SESSION['message_product'] = "Producto agregado";
		}
		

		$this->goTo('create_producto.php');
	}

	public function update($id, $datos) {
		$resultado = $this->get_db()->update_producto($id, $datos);
		if($resultado) {
			$_SESSION['message_product'] = "Se actualizo el producto";
		} else {
			$_SESSION['message_product'] = "Hubo un error";
		}

		$this->goTo('update_producto.php?id='.$id);
	}

	public function delete($id) {
		$resultado = $this->get_db()->delete_producto($id);
		if($resultado) {
			echo "se elemino <a href='list_productos.php'>Regresar</a>";
		}
	}

	public function validate_require($datos){
		$campos=['nombre', 'descripcion','costo', 'cantidad'];
		$error=0;
		for ($i=0; $i <count($campos) ; $i++) { 
			$clave= $campos[$i];
			$valor = $datos[$clave];

			if (empty($valor)) {
				$error++;
			}
			
		}
		if ($error > 0) {
			return true;
		}else{
			return false;
		}
	}   

	public function validate_types($datos){
		$campos=['nombre'=> 'string', 'descripcion'=> 'string','costo'=> 'int', 'cantidad'=>'int'];
		$error=0;
		//nombre_campo es el nombre de nuestro campo en el array de datos que nos envian desde el formulario
		foreach ($campos as $nombre_campo => $tipo_campo) {
			if ($tipo_campo==='string') {

				if(!ctype_alpha($datos[$nombre_campo])){
					$error++;
				}
			}
			if($tipo_campo==='int'){
				if(!ctype_digit($datos[$nombre_campo])){
					$error++;
				}
			}
		}
		if ($error > 0) {
			return true;
		}else{
			return false;
		}
	}
}

?>