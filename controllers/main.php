<?php   

class Main extends Controller{
    function __construct(){
        parent::__construct();
        
        //echo "<p>Nuevo controlador main</P>";
    }
    function render(){
        $this->view->render('main/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el metodo saludo</p>";
    }
} 
?>