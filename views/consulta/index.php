<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <link  rel = "stylesheet" href ="public/css/estilazo.css">

</head>
<body background="3409778.jpg">
<?php require 'views/header.php'; ?>
    <div id="contenedor">
    <form  id="tabla1" action="<?php echo constant('URL'); ?>consulta/buscarUsuario" method="POST" autocomplete="off">
    <h1 class="center">Seccion de consulta</h1>
        <input type="text" name="palabra" placeholder="Buscar">
        <input type="submit" value="Buscar">
    </form>
  
   <center>
    <table id="tconsulta">
        <thead id="thconsulta">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Costo</th>
                <th>Fotografia</th>
                <th>Wishlist</th>
                <th>Añadir al carrito</th>
            </tr>
        </thead>
        <tbody id="tbody-usuarios">
            <?php
                include_once 'models/usuario.php';
                foreach($this->usuarios as $row){
                    $usuario = new Usuario();
                    $usuario = $row;
            ?> 
            <tr id="fila-<?php echo $usuario->matricula; ?>" >
                <td><?php echo $usuario->matricula; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->a_paterno; ?></td>
                <td><?php echo $usuario->a_materno; ?></td>
                <td><img src="<?php echo URL.$usuario->archivo; ?>" width="100px" height="100px"></td>

                <td><a href="<?php echo constant ('URL'); ?>main"><img src="iconos/097-cart-10.png" width="50px" height="50px"></a></td>
            <!--<td><a href="<?php echo constant('URL').'consulta/eliminarUsuario/'.$usuario->matricula; ?>">Eliminar</a></td>-->
                <td><a href="<?php echo constant ('URL'); ?>main"><img src="iconos/112-cart-1.png" width="50px" height="50px"></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant ('URL'); ?>public/js/main.js"></script>
</body>
</html>
