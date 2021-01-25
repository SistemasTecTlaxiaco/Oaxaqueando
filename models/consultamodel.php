<?php
include_once 'models/usuario.php';
    class ConsultaModel extends Model{
        public function __construct(){
            parent::__construct();
        }
            public function get(){
                $items =[];

                try{
                    $query=$this->db->connect()->query("SELECT*FROM usuarios");

                    while($row=$query->fetch()){
                        $item=new Usuario();
                        $item->matricula=$row['matricula'];
                        $item->nombre=$row['nombre'];
                        $item->a_paterno=$row['a_paterno'];
                        $item->a_materno=$row['a_materno'];
                        $item->a_materno=$row['a_materno'];
                        $item->telefono=$row['telefono'];
                        $item->email=$row['email'];
                        $item->archivo= $row['archivo'];
                       

                        array_push($items, $item);
                    }
                    return $items;
                }catch(PDOException $e){
                    return [];
                }
            }

            public function getById($id){
                $item=new Usuario();
                $query=$this->db->connect()->prepare("SELECT * FROM usuarios WHERE matricula = :matricula");
                try{
                    $query->execute(['matricula'=>$id]);

                    while($row=$query->fetch()){
                        $item->matricula=$row['matricula'];
                        $item->username=$row['username'];
                        $item->pw=$row['pw'];
                        $item->nombre=$row['nombre'];
                        $item->a_paterno=$row['a_paterno'];
                        $item->a_materno=$row['a_materno'];
                        $item->edad=$row['edad'];
                        $item->sexo=$row['sexo'];
                        $item->direccion=$row['direccion'];
                        $item->ciudad=$row['ciudad'];
                        $item->telefono=$row['telefono'];
                        $item->c_postal=$row['c_postal'];
                        $item->email=$row['email'];
                     
                    }
                    return $item;
                }catch(PDOException $e){
                    return null;
                }
            }
            public function update($item){
                $query=$this->db->connect()->prepare("UPDATE usuarios SET username = :username, pw = :pw, nombre = :nombre, a_paterno = :a_paterno, a_materno = :a_materno,
                edad = :edad, sexo = :sexo, direccion = :direccion, ciudad = :ciudad, telefono = :telefono, c_postal = :c_postal, 
                email = :email WHERE matricula = :matricula");
                try{
                    $query->execute([
                        'matricula'=>$item['matricula'],
                        'username'=>$item['username'],
                        'pw'=>$item['pw'],
                        'nombre'=>$item['nombre'],
                        'a_paterno'=>$item['a_paterno'],
                        'a_materno'=>$item['a_materno'],
                        'edad'=>$item['edad'],
                        'sexo'=>$item['sexo'],
                        'direccion'=>$item['direccion'],
                        'ciudad'=>$item['ciudad'],
                        'telefono'=>$item['telefono'],
                        'c_postal'=>$item['c_postal'],
                        'email'=>$item['email']
                        
                    ]);
                    return true;
                }catch(PDOException $e){
                    return false;
                }
            }
            public function delete($id){
                $query=$this->db->connect()->prepare("DELETE FROM usuarios WHERE matricula = :id");
                try{
                    $query->execute([
                        'id'=>$id
                    ]);
                    return true;
                }catch(PDOException $e){
                    return false;
                }
            }
            public function deseo($art,$user){
                try{
                    $query=$this->db->connect()->prepare("INSERT INTO deseos (RART,RUSER) VALUES (:art,:us)");
                    $query->execute([
                        'art'=>$art,
                        'us'=>$user
                        ]);
                    return true;
                }catch(PDOException $e){
                    return false;
                }
                
            }
            public function buscar(){
                $items=[];
                $palabra=$_POST['palabra'];
                $mensaje="";

                
                try{
                    if($query=$this->db->connect()->query("SELECT * FROM usuarios WHERE nombre LIKE '%$palabra%'")){

                   while($row=$query->fetch()){
                       $mensaje="Usuario encontrado";
                        $item=new Usuario();
                        $item->matricula=$row['matricula'];
                        $item->nombre=$row['nombre'];
                        $item->a_paterno=$row['a_paterno'];
                        $item->a_materno=$row['a_materno'];
                        $item->a_materno=$row['a_materno'];
                        $item->telefono=$row['telefono'];
                        $item->email=$row['email'];
                        $item->archivo=$row['archivo'];
                       

                        array_push($items, $item);
                    }
                    return $items;
                    }else{
                        $mensaje="Usuario no encontrado";
                    }
                }catch(PDOException $e){
                    return null;
                }
            }
    
        public function listas(){
            $items=[];
            $usuario=$_SESSION['user'];
                       
            try{
                $query=$this->db->connect()->prepare("SELECT matricula,nombre,a_paterno,a_materno,archivo from usuarios inner join deseos on rart=matricula inner join usuarios2 on ruser=$usuario group by matricula");

               while($row=$query->fetch()){
                   
                    $item=new Usuario();
                    $item->matricula=$row['matricula'];
                    $item->nombre=$row['nombre'];
                    $item->a_paterno=$row['a_paterno'];
                    $item->a_materno=$row['a_materno'];
                    $item->a_materno=$row['a_materno'];
                    $item->telefono=$row['telefono'];
                    $item->email=$row['email'];
                    $item->archivo=$row['archivo'];
                   

                    array_push($items, $item);
                }
                return $items;                
            }catch(PDOException $e){
                return [];
            }
        }
    }
?>