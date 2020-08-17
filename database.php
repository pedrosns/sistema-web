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

	public function get_error(){
		return $this->pdo->errorInfo();
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

	//crear empleados en db 
	public function create_empleado($data){
        $sentencia = $this->pdo->prepare("INSERT INTO empleados (nombre, apellidos, cedula) VALUES (:nombre, :apellidos, :cedula)");

        $sentencia->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $sentencia->bindParam(':apellidos', $data['apellidos'], PDO::PARAM_STR);
        $sentencia->bindParam(':cedula', $data['cedula'], PDO::PARAM_INT);

        return $sentencia->execute();

	}
	// actualizar lista de empleados
	public function update_empleado($id, $data){
		$sentencia= $this->pdo->prepare("UPDATE empleados SET nombre=:nombre, apellidos=:apellidos, cedula=:cedula
		WHERE id=:id");

		$sentencia->bindParam(':id', $id, PDO::PARAM_INT);
		$sentencia->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
		$sentencia->bindParam(':apellidos', $data['apellidos'], PDO::PARAM_STR);
		$sentencia->bindParam(':cedula', $data['cedula'], PDO::PARAM_INT);

		return $sentencia->execute();
	}

	public function get_empleado($id){
		$sentencia = $this->pdo->prepare("SELECT * FROM empleados WHERE id=:id");

		$sentencia->bindParam('id' , $id , PDO::PARAM_INT);
		$sentencia->execute();

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

	public function update_producto($id, $data) {
		$sentencia = $this->pdo->prepare("UPDATE productos SET nombre=:nombre, descripcion=:descripcion, costo=:costo, cantidad=:cantidad
			WHERE id=:id
			");

		$sentencia->bindParam(':id', $id, PDO::PARAM_INT);
		$sentencia->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
		$sentencia->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
		$sentencia->bindParam(':costo', $data['costo'], PDO::PARAM_STR);
		$sentencia->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_INT);

		return $sentencia->execute();
	}

	public function delete_producto($id) {
		$sentencia = $this->pdo->prepare("DELETE FROM productos WHERE id=:id;");

		$sentencia->bindParam(':id', $id, PDO::PARAM_INT);

		return $sentencia->execute();
	}

	public function get_product($id) {
		$sentencia = $this->pdo->prepare("SELECT * FROM productos WHERE id=:id");

		$sentencia->bindParam(':id', $id, PDO::PARAM_INT);
		$sentencia->execute();

		return $sentencia->fetch(PDO::FETCH_ASSOC);
	}

	public function get_productos() {
		$sentencia = $this->pdo->prepare("SELECT * FROM productos");

		$sentencia->execute();

		// fetchAll devuelve todos los resultados de la consulta
		return $sentencia->fetchAll(PDO::FETCH_ASSOC);
	}

	
}

?>