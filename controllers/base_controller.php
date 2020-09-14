<?php 
if (!session_id ()) {
	session_start();
}

include_once 'validador.php';
define('CREATE_PRODUCT', 'create_product');
define('UPDATE_PRODUCTO', 'update_producto');
define('DELETE_PRODUCTO', 'delete_producto');

class BaseController {
	private $db;
    public $validador;
	public function __construct($db) {
		$this->db = $db;
		$this->validador = new Validador();
	}

	public function get_db() {
		return $this->db;
	}

	public function goTo($route) {
		header('Location: '.$route);
	}

	// Validar si un usuario tiene el permiso
	// indicado
	public function has_permission($code) {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			$permissions = $this->db->get_permissions($user_id);

			for ($i=0; $i < count($permissions); $i++) { 
				if($permissions[$i]['codigo'] === $code) {
					return true;
				}
			}
			return false;
		} else {
			echo "User not logged";
		}
	}

	public function isAuthenticated() {
		return isset($_SESSION['user_id']);
	}
}


?>