<?php 
include_once 'validador.php';
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
}


?>