<?php
require('Model/Conexion.php');
$con = new Conexion();
$Usuarios =$con->getUsers();
require('Vista/V_verUsuarios.php');

?>