<?php
    $host = "ec2-35-153-12-59.compute-1.amazonaws.com";
    $user = "jmaqsngmqtrjhf";
    $password = "93792bfb920cc5690f4e2c3592d5c0b972ec76b961c90e97a2c5de0a1746d48a";
    $dbname = "d6g03u8h65dg58";
    $port = "5432";

    $strCnx = "host=$host port=$port dbname=$dbname user=$user password=$password";
    $conexion = pg_connect($strCnx) or die ("Error de conexion. " .pg_last_error());
    echo "Conexion exitosa<br>";
?>
