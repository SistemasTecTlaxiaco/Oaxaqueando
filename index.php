
<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();


    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($userForm=='litzy' && $passForm=='holi'){
        include_once 'vistas/home.php';
    }else{
        //echo "nombre de usuario y/o password incorrecto";
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        include_once 'vistas/login.php';
    }

?>
