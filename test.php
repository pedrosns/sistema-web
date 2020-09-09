test.php
<?php
/*
// Como manejar las reglas multiples

1) Leer las reglas para aplicar y guardarlas en una variable

// $str_validators = $rules[$field];

2) Separar los validadores y convertirlo en un array con explode

// $validators = explode('|', $str_validators);

3) Aplicar las validaciones pero tomando en cuenta el orden si alguna no se cumple, en su orden no seguir validando.

*/


$rules = [
 'campo1' => 'required|only_string|uppercase',
 'campo2' => 'required|only_int',
];

// foreach ($rules as $field => $str_validators) {
// 	$validators = explode('|', $str_validators);

// 	echo $field . PHP_EOL;
// 	print_r($validators);
// 	echo '-------------------------------'.PHP_EOL;

// 	$this->required();

// }


class Ejemplo {
	public function required()
	{
		echo "EJECUTO required".PHP_EOL;
	}
	public function only_string()
	{
		echo "EJECUTO  only_string".PHP_EOL;
	}

	public function only_int()
	{
		echo "EJECUTO  only_int".PHP_EOL;
	}

	public function validar() {
		$metodos = ['required', 'only_string', 'only_int'];

		for ($i=0; $i < count($metodos); $i++) {
			$this->{$metodos[$i]}();
		}
	}
}


// $e = new Ejemplo();


// $e->validar();




// Array 1

$datos = [
	[
		'nombre' => "israel",
		'apellido' => "lugo",
	],
	[
		'nombre' => "pedro",
		'apellido' => "66",
	],
];


// for ($i=0; $i < count($datos); $i++) {
// 	foreach ($datos[] as $key => $value) {
// 		echo "clave: ".$key." ". "Valor: ".$value.PHP_EOL;
// 	}
// }

// Array 2

$data = [
	'nombre' => "israel",
	'apellido' => "lugo",
];

// [nombre, apellido]
$keys = array_keys($data);

// $data['nombre']

for ($i=0; $i < count($keys); $i++) {
	$key = $keys[$i];
	echo "clave: ".$key." ". "Valor: ".$data[$key].PHP_EOL;
}
?>