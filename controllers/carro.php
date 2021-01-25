<?php
    class Carro extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->usuarios=[];
        }
        function render(){
            $usuarios=$this->model->carros();
            $this->view->usuarios=$usuarios;
            $this->view->render('carro/index');
        }
        function add($param=null){
       
            $matricula=$param[0];
            $costo=$param[1];
            $u=$_SESSION['user'];
           if($this->model->carro($matricula,$u,$costo)){
          
            $mensaje="Agregado a tu Wishlist";
            
           } else{
               $mensaje="Hubo un problema";
           }
           //$this->view->render('main/index');
           echo $mensaje;
           
        }
        function eliminarArt($param=null){
            $matricula=$param[0];
        if($this->model->delete($matricula)){
                //$this->view->mensaje="Alumno eliminado correctamente";
                $mensaje="Usuario eliminado correctamente";
            }else{
                //$this->view->mensaje="No se pudo eliminar el alumno";
                $mensaje="No se pudo eliminar el usuario";
            }
            //$this->render();
            //echo $mensaje; 
        }
    }

?>