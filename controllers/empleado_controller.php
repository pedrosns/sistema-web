<?php 
if (!session_id ())
{
session_start();
	} 

include_once 'base_controller.php';

class EmpleadoController extends BaseController {
	public function create($data){
    

		$rules=[
			'nombre'=> 'only_string',
			'apellidos'=>'only_string',
			'cedula'=> 'only_number',
		];

		$errores=$this->validador->validate($data, $rules);

			if (count($errores)>0) {
				$tmp=[];
				
					foreach ($errores as $campo => $arraydeerrores) {
					$tmp[$campo]=join(',', $arraydeerrores);
					}

					$_SESSION['errores'] = $tmp;
			} else {
			$_SESSION['message_product'] = "Producto agregado";

			}
			
		$this->goTo('create_empleado.php');
		
	}
	public function update($id, $datos) {
		$resultado = $this->get_db()->update_empleado($id, $datos);
		if($resultado) {
			echo "se actualizo";
		}
	}

	public function delete($id){
		$resultado = $this->get_db()->delete_empleado($id);

		if($resultado){
			echo "el empleado se ha eliminado <a href='list_empleados.php'>Regresar</a>";
		}
	}
	
}

?>