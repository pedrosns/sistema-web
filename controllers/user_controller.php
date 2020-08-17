<?php 
include 
class UserController extends BaseController {
	public function register($datos) {
		$data = [];
		$passwd = $datos['password'];

		$data['password'] = md5($passwd);
		$data['username'] = $datos['username'];
		$data['email'] = $datos['email'];

		$this->get_db()->create_user($data);
	}
}

?>