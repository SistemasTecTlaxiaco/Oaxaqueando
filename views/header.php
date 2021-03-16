<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant ('URL'); ?>public/css/estilacho.css">
</head>
<body>
    <div id="header">
       <ul>
            <li><img src="Oaxaqueando.png" width="70px" height="70px"></li>
            <li><img src="iconos/117-buy.png" width="35px" height="35"></li>
            <li><a href="<?php echo constant ('URL'); ?>main">Inicio</a></li>
           <!-- <li><a href="<?php echo constant ('URL'); ?>nuevo">Nueva</a></li>-->
            <li><img src="iconos/060-shopping-bag.png" width="35px" height="35px"></li>
            <li><a href="<?php echo constant ('URL'); ?>consulta">Productos</a></li>
            <li><img src="iconos/032-question.png" width="35px" height="35px"></li>
            <li><a href="<?php echo constant ('URL'); ?>ayuda">Ayuda</a></li>
            <li><a href="<?php echo constant ('URL'); ?>lista">Carrito de compras</a></li>
            <li class="cerrar-sesion"><img src="iconos/093-right-arrow-5.png" width="35px" height="35px"></li>           
            <li class="cerrar-sesion"><a href="includes/logout.php">Cerrar sesion</a>
            </li>
        </ul>
    </div>
</body> 
</html>
