<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicia Sesión</title>
    <center><h1>Bienvenido</h1></center>
    <link rel="stylesheet" href="main.css">
</head>
<body background ="3409778.jpg">
    
    <form action="" method="POST">
       <?php

            if(isset($errorLogin)){
                echo $errorLogin;
            }

       ?>
        <h2>Iniciar sesión</h2>
        <p>Nombre de usuario: <br>
        <input type="text" name="username"></p>
        <p>Password: <br>
        <input type="password" name="password"></p>
        <p class="center"><input type="submit" value="Iniciar Sesión"></p>
    </form>
</body>
</html>