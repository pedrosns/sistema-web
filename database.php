<?php

class Database {
	private $pdo;

	public function conectar() {
		try {
			$this->pdo = new PDO('mysql:host=127.0.0.1;dbname=restaurante', 'root', 'canaima');
		} catch (Exception $e) {
			echo $e;
		}
	}

	public function ejecutar($query) {
		$this->pdo->query($query)->execute();
	}

	public function get_date() {
		$sentencia = $this->pdo->prepare("SELECT NOW();");

		$sentencia->execute();

 		// Fetch para obtener el siguiente resultado de la consulta
		return $sentencia->fetch(PDO::FETCH_ASSOC);
	}

	public function get_empleados() {
		$sentencia = $this->pdo->prepare("SELECT * FROM empleados");

		$sentencia->execute();

		// fetchAll devuelve todos los resultados de la consulta
		return $sentencia->fetchAll(PDO::FETCH_ASSOC);
	}

	public function crear_producto($data) {
		$sentencia = $this->pdo->prepare("INSERT INTO productos (nombre, descripcion, costo, cantidad) VALUES (:nombre, :descripcion, :costo, :cantidad)");

		$sentencia->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
		$sentencia->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
		$sentencia->bindParam(':costo', $data['costo'], PDO::PARAM_STR);
		$sentencia->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_INT);

		return $sentencia->execute();
	}

	public function get_productos() {
		$sentencia = $this->pdo->prepare("SELECT * FROM productos");

		$sentencia->execute();

		// fetchAll devuelve todos los resultados de la consulta
		return $sentencia->fetchAll(PDO::FETCH_ASSOC);
	}

	
}

?>