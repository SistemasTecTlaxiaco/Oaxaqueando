<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de compras</title>
    <link  rel = "stylesheet" href ="public/css/estilacho.css">

</head>
<body background="3409778.jpg">
<?php require 'views/header.php'; ?>
<?php 
      include_once 'includes/user.php';
      include_once 'includes/user_session.php';
   
     ?>
    <div id="contenedor">
   
    <h1 class="center">Carrito de compras</h1>

    <h1>Bienvenido <?php echo $_SESSION['user'];  ?></h1>
    <div id=respuesta class="center"></div>  
    
  
   <center>
    <table id="tconsulta">
        <thead id="thconsulta">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Costo</th>
                <th>Fotografia</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tbody id="tbody-usuarios">
            <?php
                include_once 'models/usuario.php';
                
                foreach($this->usuarios as $row){
                    $usuario = new Usuario();
                    $usuario = $row;
            ?> 
            <tr id="fila-<?php echo $usuario->id; ?>">
                <td><?php echo $usuario->matricula; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->a_paterno; ?></td>
                <td><?php echo $usuario->a_materno; ?></td>
                <td><img src="<?php echo URL.$usuario->archivo; ?>" width="100px" height="100px"></td>
                <td><button id="bdeseo" class="bEliminar2" data-id="<?php echo $usuario->id; ?>" >ELIMINAR</button></td>
            <!--<td><a href="<?php echo constant ('URL').'consulta/addart/'.$usuario->matricula;?>"><img src="iconos/097-cart-10.png" width="50px" height="50px"></a></td>-->
            <!--<td><a href="<?php echo constant('URL').'consulta/eliminarUsuario/'.$usuario->matricula; ?>">Eliminar</a></td>-->
                
                <?php 
                $total = $total+$usuario->a_materno;
                ?> 
                
            </tr>
            <?php } ?>
                 
        </tbody>
    </table>
       <div id=tbody-usuarios>
        <?php 
           echo "Total: ". $total;
         ?>
       </div>
    </div>
               
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant ('URL'); ?>public/js/tula2.js"></script>
</body>
</html>
