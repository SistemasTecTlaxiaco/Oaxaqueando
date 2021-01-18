<?php
require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/view.php';
require_once 'libs/model.php';
require_once 'libs/app.php';

require_once 'config/config.php';

   include_once 'includes/user.php';
   include_once 'includes/user_session.php';

   $userSession=new UserSession();
   $user=new User();

   if(isset($_SESSION['user'])){
       //echo "Hay sesion";
       $user->setUser($userSession->getCurrentUser());
      // include_once 'views/main/index.php';
      $app= new App();
      
   }else if(isset($_POST['username']) && isset($_POST['password'])){
       //echo "Validacion de login";
      
       $userForm=$_POST['username'];
       $passForm=$_POST['password'];
       //echo hash("sha256", $passForm);
       if($user->userExists($userForm, hash("sha256", $passForm))){
           //echo "usuario validado";
          $userSession->setCurrentUser($userForm);
          $user->setUser($userForm); 
          //include_once 'views/main/index.php';
           $app= new App();
          
       }else{
           //echo "nombre de usuario y/o pasword incorrecto";
           $errorLogin= "Nombre de usuario y/o password es incorrecto";
           include_once 'views/login.php';

       }
   }else{
        //echo "Login";
        include_once 'views/login.php';
   }
   ?>