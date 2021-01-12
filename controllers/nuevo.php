<?php   
use  PHPMailer \ PHPMailer \ PHPMailer ;
use  PHPMailer \ PHPMailer \ Exception ;

require  'PHPMailer/Exception.php' ;
require  'PHPMailer/PHPMailer.php' ;
require  'PHPMailer/SMTP.php' ;

class Nuevo extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje ="";
        //echo "<p>Nuevo controlador main</P>";
    }
    function render(){
        $this->view->render('nuevo/index');
    }

    function registrarUsuario(){
            $directorio="uploads/";
            $archivo=$directorio.basename($_FILES["archivo"]["name"]);
            $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
            $checarSiImagen = getimagesize($_FILES["archivo"]["tmp_name"]);
            if($checarSiImagen != false){       
            $size = $_FILES["archivo"]["size"];
                if($size > 500000){
                    $mensaje= "El archivo tiene que ser menor a 500kb";
                }else{            
                    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){               
                        if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo)){                        
                            $mensaje= "El archivo se subió correctamente";                       
							
							$matricula= filter_input(INPUT_POST,'matricula',FILTER_SANITIZE_STRING); 
							$username= filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);  
							$pw=hash("sha256",filter_input(INPUT_POST,'pw',FILTER_SANITIZE_STRING)); 
							$nombre= filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_STRING); 
							$a_paterno= filter_input(INPUT_POST,'a_paterno',FILTER_SANITIZE_STRING); 
							$a_materno= filter_input(INPUT_POST,'a_materno',FILTER_SANITIZE_STRING); 
							$edad= filter_input(INPUT_POST,'edad',FILTER_SANITIZE_NUMBER_INT);
							$sexo= filter_input(INPUT_POST,'sexo',FILTER_SANITIZE_STRING);  
							$direccion= filter_input(INPUT_POST,'direccion',FILTER_SANITIZE_STRING); 
							$ciudad= filter_input(INPUT_POST,'ciudad',FILTER_SANITIZE_STRING);  
							$telefono= filter_input(INPUT_POST,'telefono',FILTER_SANITIZE_STRING);  
							$c_postal= filter_input(INPUT_POST,'c_postal',FILTER_SANITIZE_STRING);  
							$email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL); 						
							$nemail='Litzy';
							
							 if($this->model->insert(['matricula'=>$matricula, 'username'=>$username, 'pw'=>$pw, 'nombre'=>$nombre, 'a_paterno'=>$a_paterno,
							'a_materno'=>$a_materno, 'edad'=>$edad, 'sexo'=>$sexo, 'direccion'=>$direccion, 'ciudad'=>$ciudad,
							'telefono'=>$telefono, 'c_postal'=>$c_postal, 'email'=>$email, 'archivo'=>$archivo])){
							$mensaje= "Nuevo usuario creado";
							
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
								 $mail->addAddress($email);     
								 $mail->isHTML(true);                                
								 $mail->Subject = 'Importantisimo';
								 $mail->Body    = 'Hola, esta es tu contraseña de acceso normal: '.$_POST['pw'].' y esta tu contraseña cifrada: '.$pw;
					   
								 $mail->send();
								  //echo 'Se envio correctamente';
							} catch (Exception $e) {
								  echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
							}
							   
							}else{
							   $mensaje= "La matricula ya existe";
							}
							
                        }else{
                            $mensaje= "Hubo un error en la subida del archivo";
                        }
                    }else{
                        $mensaje= "Solo se admiten archivos jpg/jpeg";
                    }  
                }
            }else{
                $mensaje= "El documento no es una imagen";
            }
			 $this->view->mensaje=$mensaje;
			 $this->render();
         
    }

}
?>