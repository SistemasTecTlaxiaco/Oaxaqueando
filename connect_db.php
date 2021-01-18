<?php

define('USER', 'up1bqfux0eibfreq');
define('PASSWORD', 'Oe4HhihpfWtMz8oLw7DZ');
define('HOST', 'bdyzcfehrcomfhksbhmx-mysql.services.clever-cloud.com');
define('DATABASE', 'bdyzcfehrcomfhksbhmx');
    
    
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>