<?php 
include_once 'base_controller.php';

class UserController extends BaseController {

	public function login($datos) {}

	public function register($datos) {

		// Validar campos
		if($this->required($datos)) {
			echo "El formulario es invalido";
			return null;
		}

		// Validar password
		if($datos['password'] !== $datos['password_re']) {
			echo "El password no coincide";
			return null;
		}

		//  Validar username
		$validation_username = $this->get_db()->validate_unique('usuarios', 'username', $datos['username']);

		if($validation_username['registros'] > 0) {
			echo "El username ya esta en uso";
			return null;
		}

		//  Validar email
		$validation_email = $this->get_db()->validate_unique('usuarios', 'email', $datos['email']);

		if($validation_email['registros'] > 0) {
			echo "El email ya esta en uso";
			return null;
		}

		$data = [];
		$passwd = $datos['password'];
		$data['password'] = md5($passwd);
		$data['username'] = $datos['username'];
		$data['email'] = $datos['email'];

		$result = $this->get_db()->create_user($data);


		if($result) {
			echo "Usuario registrado";
		} else {
			echo "Error al registrar";
		}
	}

	public function required($data) {
		$required_fields = ['username', 'email', 'password'];

		$errors = 0;

		// Validar campos
		for ($i=0; $i < count($required_fields); $i++) { 
			$field = $required_fields[$i];

			$value = $data[$field];
			if(empty($value)) {
				$errors++;
			}
		}

		return $errors >= 1;
	}
}

?>