<?php 

class BaseController {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function get_db() {
		return $this->db;
	}
}


?>