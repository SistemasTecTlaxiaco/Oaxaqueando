<?php   
use  PHPMailer \ PHPMailer \ PHPMailer ;
use  PHPMailer \ PHPMailer \ Exception ;

require  'PHPMailer/Exception.php' ;
require  'PHPMailer/PHPMailer.php' ;
require  'PHPMailer/SMTP.php' ;

class Consulta extends Controller{
    public function __construct(){
        parent::__construct();
        $this->view->usuarios=[];
        //echo "<p>Nuevo controlador main</P>";
    }
    function render(){
        $usuarios=$this->model->get();
        $this->view->usuarios=$usuarios;
        $this->view->render('consulta/index');
    }
    function verUsuario($param=null){
        $idUsuario=$param[0];
        $usuario=$this->model->getById($idUsuario);

        //session_start();
        $_SESSION['id_verUsuario']=$usuario->matricula;
        $this->view->usuario=$usuario;
        $this->view->mensaje="";
        $this->view->render('consulta/detalle');
    }
    function buscarUsuario(){
        $usuarios=$this->model->buscar();
        $this->view->usuarios=$usuarios;
        $this->view->render('consulta/index');
    }

    function actualizarUsuario(){
        session_start();
        $matricula=$_SESSION['id_verUsuario'];
        $username=$_POST['username'];
        $pw=hash("sha256",$_POST['pw']);
        $nombre=$_POST['nombre'];
        $a_paterno=$_POST['a_paterno'];
        $a_materno=$_POST['a_materno'];
        $edad=$_POST['edad'];
        $sexo=$_POST['sexo'];
        $direccion=$_POST['direccion'];
        $ciudad=$_POST['ciudad'];
        $telefono=$_POST['telefono'];
        $c_postal=$_POST['c_postal'];
        $email=$_POST['email'];
       

        unset($_SESSION['id_verUsuario']);

        if($this->model->update(['matricula'=>$matricula, 'username'=>$username, 'pw'=>$pw, 'nombre'=>$nombre, 'a_paterno'=>$a_paterno,
        'a_materno'=>$a_materno, 'edad'=>$edad, 'sexo'=>$sexo, 'direccion'=>$direccion, 'ciudad'=>$ciudad,
        'telefono'=>$telefono, 'c_postal'=>$c_postal, 'email'=>$email])){
            $usuario=new Usuario();
            $usuario->matricula=$matricula;
            $usuario->username=$username;
            $usuario->pw=$pw;
            $usuario->nombre=$nombre;
            $usuario->a_paterno=$a_paterno;
            $usuario->a_materno=$a_materno;
            $usuario->edad=$edad;
            $usuario->sexo=$sexo;
            $usuario->direccion=$direccion;
            $usuario->ciudad=$ciudad;
            $usuario->telefono=$telefono;
            $usuario->c_postal=$c_postal;
            $usuario->email=$email;
          

            $this->view->usuario=$usuario;
            $this->view->mensaje="Usuario actualizado correctamente";
            $mail = new PHPMailer(true);
            try {

             $mail->SMTPDebug = 0;                      
             $mail->isSMTP();                                          
             $mail->Host       = 'smtp.gmail.com';                   
             $mail->SMTPAuth   = true;                                  
             $mail->Username   = 'mailermvc1@gmail.com';                    
             $mail->Password   = 'contrasena1';                              
             $mail->SMTPSecure = 'tls';        
             $mail->Port       = 587;                                   
             $mail->setFrom('mailermvc1@gmail.com', 'Administrador de datos');
             $mail->addAddress($_POST['email']);     
             $mail->isHTML(true);                                
             $mail->Subject = '¡Importantisimo! Nueva contraseña de acceso';
             $mail->Body    = 'Hola, esta es tu nueva contraseña de acceso normal: '.$_POST['pw'].' y esta tu contraseña cifrada: '.$pw;
   
             $mail->send();
              echo 'Se envio correctamente';
            } catch (Exception $e) {
              echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
            }
        }else{
            $this->view->mensaje="No se pudo actualizar el usuario";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarUsuario($param=null){
        $matricula=$param[0];
    if($this->model->delete($matricula)){
            //$this->view->mensaje="Alumno eliminado correctamente";
            $mensaje="Usuario eliminado correctamente";
        }else{
            //$this->view->mensaje="No se pudo eliminar el alumno";
            $mensaje="No se pudo eliminar el usuario";
        }
        //$this->render();
        echo $mensaje; 
    }
    

}
?>