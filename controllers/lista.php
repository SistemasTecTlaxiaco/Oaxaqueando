<?php
    class Lista extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->usuarios=[];
        }
        function render(){
            $usuarios=$this->model->listas();
            $this->view->usuarios=$usuarios;
            $this->view->render('lista/index');
        }
        function addart($param=null){
       
            $matricula=$param[0];
            $u=$_SESSION['user'];
           if($this->model->deseo($matricula,$u)){
          
            $mensaje="Agregado a tu Wishlist";
            
           } else{
               $mensaje="Hubo un problema";
           }
           //$this->view->render('main/index');
           echo $mensaje;
           
        }
        function eliminarDeseo($param=null){
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