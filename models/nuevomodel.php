<?php
    class NuevoModel extends Model{
        public function __construct(){
            parent::__construct();
        }
            public function insert($datos){
            try{
                $query = $this->db->connect()->prepare('INSERT INTO USUARIOS (MATRICULA, USERNAME, PW, NOMBRE, A_PATERNO, A_MATERNO, EDAD, SEXO, DIRECCION, CIUDAD, TELEFONO, C_POSTAL, EMAIL, ARCHIVO) VALUES(:matricula, :username, :pw, :nombre, :a_paterno, :a_materno, :edad, :sexo, :direccion, :ciudad, :telefono, :c_postal, :email, :archivo)');
                $query->execute(['matricula' => $datos['matricula'], 'username'=> $datos['username'],'pw'=> $datos['pw'], 'nombre'=> $datos['nombre'], 'a_paterno' => $datos['a_paterno'],
                 'a_materno' => $datos['a_materno'], 'edad' => $datos['edad'], 'sexo' => $datos['sexo'], 'direccion' => $datos['direccion'], 'ciudad' => $datos['ciudad'], 'telefono' => $datos['telefono'],
                  'c_postal' => $datos['c_postal'], 'email' => $datos['email'], 'archivo' => $datos['archivo']]);
                return true;
            }catch(PDOException $e){
                //echo "Ya existe esa matricula";
                return false;
            }
               
            }
        }
    
?>