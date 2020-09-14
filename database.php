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

	public function delete_empleado($id){
		$sentencia=$this->pdo->prepare("DELETE FROM empleados WHERE id=:id");
		$sentencia->bindParam(':id', $id, PDO::PARAM_STR);

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
		$sentencia = $this->pdo->prepare("INSERT INTO productos (nombre, descripcion, costo, cantidad, categoria_id) VALUES (:nombre, :descripcion, :costo, :cantidad, :categoria_id)");

		$sentencia->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
		$sentencia->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
		$sentencia->bindParam(':costo', $data['costo'], PDO::PARAM_STR);
		$sentencia->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_INT);
		$sentencia->bindParam(':categoria_id', $data['categoria_id'], PDO::PARAM_INT);

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

	public function create_user($data) {
		$sentencia = $this->pdo->prepare("INSERT INTO usuarios (username, email, password ) VALUES (:username, :email, :password)");

		$sentencia->bindParam(':username', $data['username'], PDO::PARAM_STR);
		$sentencia->bindParam(':email', $data['email'], PDO::PARAM_STR);
		$sentencia->bindParam(':password', $data['password'], PDO::PARAM_STR);
		return $sentencia->execute();
	}

	public function validate_unique($tabla, $campo, $valor) {
		$sentencia = $this->pdo->prepare("SELECT COUNT(*) AS registros FROM ".$tabla." WHERE ".$campo."=:valor");
		
		$sentencia->bindParam(':valor', $valor, PDO::PARAM_STR);

		$sentencia->execute();

		return $sentencia->fetch(PDO::FETCH_ASSOC);
	}

	public function login($username, $password) {
		// Validar que existe ese usuario con el username enviado
		$sentencia = $this->pdo->prepare("SELECT id, username, email FROM usuarios WHERE (username=:username OR email=:username) AND password=:password");
		
		$sentencia->bindParam(':username', $username, PDO::PARAM_STR);
		$sentencia->bindParam(':password', $password, PDO::PARAM_STR);
		$sentencia->execute();

		return $sentencia->fetch(PDO::FETCH_ASSOC);
	}
	

	public function get_permissions($user_id) {
		$sentencia = $this->pdo->prepare("SELECT 
			permisos.nombre,
			permisos.codigo
			FROM usuarios_permisos 
			INNER JOIN usuarios ON usuarios.id = usuarios_permisos.usuario_id
			INNER JOIN permisos ON permisos.id = usuarios_permisos.permiso_id
			WHERE usuarios.id = :user_id
		");
		
		$sentencia->bindParam(':user_id', $user_id, PDO::PARAM_INT);

		$sentencia->execute();

		return $sentencia->fetchAll(PDO::FETCH_ASSOC);
	}

	public function get_categories(){
		$sentencia= $this->pdo->prepare("SELECT 
		categorias.id,
		categorias.nombre
								 FROM categorias ");

		$sentencia->execute();

		return $sentencia->fetchAll(PDO::FETCH_ASSOC);						 
	}

	public function search_products($query) {
		
	}
}

?>