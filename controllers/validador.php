<?php
class Validador{

    private $messages;
    public function __construct(){
        $this->messages=[
            'required'=> ':field debe ser requerido',
            'only_number'=> ':field solo admite numeros',
            'only_string' => ':field solo admite letras',
            'max_length'=> ':field debe incluir un maximo de :length caracteres',
            'min_length'=> ':field debe incluir un minimo de :length caracteres',
        ];


    }

    public function required($data){
        return empty($data) ;    
    }

    public function only_number($data){
        return !ctype_digit($data);
    }
    
    public function only_string($data){
       return !preg_match("/^[A-Za-z]+/" , $data);
    }
    public function max_length($data, $max_size){
        $size=strlen($data);
        if($size <= $max_size){
            return false;
        }else {
            return true;
        }
    }

    public function min_length($data, $min_size){
        $size=strlen($data);
        if ($size >= $min_size) {
            return false;
        }else {
            return true;
        }
    }
    //primer parametro datos segundo reglas

    //'nombre' => 'required', 'apellido' => 'required']


    public function validate($data, $rules=[]){
        $errors=[];
        foreach ($rules as $field => $str_validadores) {
             $validators = explode('|', $str_validadores);
             
                for ($i=0; $i <count($validators) ; $i++) { 
                    // ejemplo:maxlength:parametro
                    $validador= $validators[$i];

                    $hasparams=strpos($validador,':');
                    if ($hasparams != false) {
                        /*param_array trae un array de 2 valores,
                         donde la primera posicion es el nombre del validador y la segunda los parametros*/
                        $param_array=explode(':',$validador);
                        $param = $param_array[1];
                        $validador=$param_array[0];
                        $result=$this->{ $validador }($data[$field],$param);

                    }else {
                        $result=$this->{ $validators[$i] }($data[$field]);

                    }

                    

                    
                    if ($result) {
                        $message= $this->messages[$validador];
                        if ($validador== 'max_length' || $validador='min_length') {
                            $m= str_replace(':field', $field, $message);
                            $m= str_replace(':length', $param, $m);

                        }else {
                            $m= str_replace(':field', $field, $message);

                        }

                        if (array_key_exists($field,$errors)) {
                            array_push($errors[$field],$m);
                        }else{
                            $errors[$field]=[];
                            array_push($errors[$field],$m);
                            
                        }   
                            break;
                    }
                            
                    
                }

            /*if ($validador == 'required') {
                $result=$this->required($data[$field]);
                if ($result) {
                    $message= $this->messages[$validador];
                    $m= str_replace(':field', $field, $message);

                    if (array_key_exists($field,$errors)) {
                        array_push($errors[$field],$m);
                    }else{
                        $errors[$field]=[];
                        array_push($errors[$field],$m);

                    }
                    

                }
            }
            if ($validador == 'only_number') {
                $result=$this->only_number($data[$field]);
                if ($result) {
                    $message= $this->messages[$validador];
                   $m= str_replace(':field', $field, $message);
                   
                     if (array_key_exists($field,$errors)) {
                        
                        array_push($errors[$field],$m);
                    }else{
                        
                        $errors[$field]=[];
                        array_push($errors[$field],$m);

                        }
                }
            }
            
            if ($validador == 'only_string') {
                $result=$this->only_string($data[$field]);
                print_r($result);
                    if ($result) {
                        $message=$this->messages[$validador];
                        $m= str_replace(':field', $field , $message);

                            if (array_key_exists($field, $errors)) {
                                array_push($errors[$field], $m);
                            }else{
                                $errors[$field]=[];
                                array_push($errors[$field],$m);
                            }
                    }
                
            }
            */

        }
        return $errors;
    }

    /*public function validate_data($datos){
        $error=0;

        for ($i=0; $i <count($datos) ; $i++) { 
            $clave = $datos [$i];
            $valor = $datos [$clave];

            if (empty($valor)) {
                $error++;
            }
        }
        if ($error>0) {
            return true;
        }else{
            return false;
        }
    }

    public function validate_single_data($data){
        $error=0;
        if (empty($data)) {
            $error++;
        }
        if ($error>0) {
            return true;
        }else {
            return false;
        }
    }

    public function validate_nombre($nombre){
            if (!empty($nombre) && preg_match("/^[A-Za-z]+/" , $nombre)) {
                return true;
                $_SESSION['message_product']='nombre correcto';
            }else{
                return false;
                $_SESSION['message_product']='nombre incorrecto';
            }
    }

    public function validate_edad($edad){
        if ($edad <= 18) && preg_match("/^[0-9]+/", $edad)) 
        {
            $_SESSION['employed_message']= "eres menor de edad";
        }else{
            return true;
        }
    }

    public function recorrer_datos($data){
        $error=0;
        for ($i=0; $i <couny($data) ; $i++) { 
            $clave = $data[$i];
            if (empty($clave)) {
                $error++
            }
        }
        if($error>0){
            return true;
        }else{
            return false;
        }
    }

    public function validar_apellidos($apellidos){
        if (preg_match("/[A-Za-z]/", $apellidos)== 1) {
            return true;
        }else{
            return false;
        }
    }

    public function recorrer_empleados($datos){
        $campos=[];
        for ($i=0; $i <count($datos) ; $i++) { 
            array_push($campos , $i);
            
            $nombre = $clave['nombre'];
            $apellidos=$clave['apellidos'];

        }
    }

    public function */
}
?>