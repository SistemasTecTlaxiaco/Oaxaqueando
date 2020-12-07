<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/estilazo.css">
</head>

<body background="3409778.jpg">
    <?php require 'views/header.php'; ?>
        <div clas="main" >
        <h1><center><font color="white" size="30">Seccion de ayuda</center></font></h1>
        </div>

    <center><img src="Oaxaqueando.png"></center>
    <table id="tayuda" cellpadding="100" cellspacing="30" border="0">
        <tr>
            <td>
                <p class="justify">
                    <font-family: Tahoma>Somos una empresa dedicada al comercio electronico de artesanias, como lo es ropa tipica, articulos decorativos
                        gastrononicos, entre otros con el unico objetivo de mas personas puedan tener a su alcanze la venta de estos articulos
                        asi como tambien mejorar las ganancias de nuestros artesanos, de esta forma ganamos todos.
                </p>
                </font-family>
            </td>
        </tr>
    </table>
    <center><img src="iconos/073-handshake.png" width="150" height="150"></center>
    <table id="tayuda" cellpadding="30" cellspacing="30" border="0">
        <tr>
            <th>¡Envio gratis!</th>
            <th>¡Hay devoluciones!</th>
        </tr>
        <tr>
            <td><center><img src="iconos/065-delivery-3.png" width="70" height="70"></center></td>
            <td><center><img src="iconos/031-payment-2.png" width="70" height="70"></center></td>
        </tr>
        <tr>
            <td><p class="justify"><font-family: Tahoma>Obten tu envio gratuito a partir de una compra de $599 o compra algunos de nuestros productos seleccionados.</p></td>
            <td><p class="justify"><font-family: Tahoma>¿No te gusta? ¿O no es lo que ordenaste? ¡Devuelvelo! No te preocupes por la seguridad de tu compra</p></td>
        </tr>
        <tr>
            <td><center>Conoce mas sobre este beneficio</center></td>
            <td><center>Conoce mas sobre la devolucion de tu compra</center></td>
        </tr>
    </table>
    <?php require 'views/footer.php'; ?>
</body>

</html>