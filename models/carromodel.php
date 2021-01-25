<?php
    include_once 'models/usuario.php';
    class CarroModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function carros(){
            $items=[];
            $usuario=$_SESSION['user'];
                       
            try{
                $query=$this->db->connect()->query("SELECT deseos.id,matricula,usuarios.nombre,a_paterno,a_materno,archivo FROM usuarios INNER JOIN deseos ON rart=matricula INNER JOIN usuarios2 ON ruser='$usuario' GROUP BY matricula");

               while($row=$query->fetch()){
                   
                    $item=new Usuario();
                    $item->id=$row['id'];
                    $item->matricula=$row['matricula'];
                    $item->nombre=$row['nombre'];
                    $item->a_paterno=$row['a_paterno'];
                    $item->a_materno=$row['a_materno'];                    
                    //$item->telefono=$row['telefono'];
                    //$item->email=$row['email'];
                    $item->archivo=$row['archivo'];
                   

                    array_push($items, $item);
                }
                return $items;                
            }catch(PDOException $e){
                return [];
            }
        }
        public function carro($art,$user,$cost){
            try{
                $query=$this->db->connect()->prepare("INSERT INTO carro (RART,RUSER,COSTO) VALUES (:art,:us,:costo)");
                $query->execute([
                    'art'=>$art,
                    'us'=>$user,
                    'costo'=>$cost
                    ]);
                return true;
            }catch(PDOException $e){
                return false;
            }
            
        }
       
        }
    
?>