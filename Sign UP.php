<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Regístrate - Formoid web forms</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" background="3409778.jpg">



<!-- Start Formoid form-->
<link rel="stylesheet" href="signup_files/formoid1/formoid-solid-orange.css" type="text/css" />
<script type="text/javascript" src="signup_files/formoid1/jquery.min.js"></script>

<br>
<?php
 
include('connect_db.php');
session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['username'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$password = $_POST['password'];
    $password_hash = hash("sha256",$password);
 
    $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO usuarios2(USERNAME,NOMBRE,APELLIDOS,EMAIL,PW) VALUES (:username,:nombre,:apellidos,:email,:password_hash)");
		$query->bindParam("username", $username, PDO::PARAM_STR);
		$query->bindParam("nombre", $nombre, PDO::PARAM_STR);
		$query->bindParam("apellidos", $apellidos, PDO::PARAM_STR);
		$query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Your registration was successful!</p>';
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}
 
?>

<form action="" enctype="multipart/form-data" class="formoid-solid-orange" style="background-color:#ffffff;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="POST"><div class="title"><h2><img src="iconos/009-team-1.png" width="30px" height="30px" >Regístrate</h2></div>

	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="username" required="required" placeholder="Nombre de usuario"/><span class="icon-place"></span></div></div>
	<div class="element-name"><label class="title"><span class="required">*</span></label><span class="nameFirst"><input placeholder=" Nombre" type="text" size="8" name="nombre" required="required"/><span class="icon-place"></span></span><span class="nameLast"><input placeholder=" Apellidos" type="text" size="14" name="apellidos" required="required"/><span class="icon-place"></span></span></div>
	<div class="element-password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="password" name="password" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
	<div class="element-email"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="email" name="email" value="" required="required" placeholder="Email"/><span class="icon-place"></span></div></div>
	<div class="submit"><input type="submit" name='register' value="Enviar"/></div></form>
	
	<!-- Stop Formoid form-->
	<p><br>
    <center><input type="button" style=" font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: bold;
  background-color:#0F9398;
  color: #ffffff;
  padding: 10px;
  border: none;
  width: 200px" onClick= "location.href='index.php';" value="Inicia Sesión"></center>

</body>
</html>
