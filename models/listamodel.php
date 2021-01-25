<?php
    include_once 'models/usuario.php';
    class ListaModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function listas(){
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
        public function delete($id){
            $query=$this->db->connect()->prepare("DELETE FROM deseos WHERE id = :id");
            try{
                $query->execute([
                    'id'=>$id
                ]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
        }
    
?>