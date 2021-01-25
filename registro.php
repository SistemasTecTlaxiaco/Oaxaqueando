<?php

$username = $_POST['username'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];

require("connect_db.php");
$password = md5($password);
mysqli_query($link,"INSERT INTO usuarios2(id, username, nombre, apellidos, email, password) VALUES ('1', '$username', '$nombre', '$apellidos', '$password')");
mysqli_close($link);
echo 'Usuario registrado';

?>