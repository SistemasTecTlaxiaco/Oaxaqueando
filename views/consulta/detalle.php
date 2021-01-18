<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>   
    <link  rel = "stylesheet" href ="public/css/elpincheestilo.css">
</head>
<body>
    <?php require 'views/header.php'; ?>
    
    <div id="main">
    <h1 class="center">Detalle de <?php echo $this->usuario->matricula; ?></h1></div>
    
    <div class="center"><?php echo $this->mensaje; ?></div>
    
    <form action="<?php echo constant('URL');?>consulta/actualizarUsuario" method="POST">
       
        <p>
            <label for="matricula">Matricula</label><br>
            <input type="text" name="matricula" disabled  value="<?php echo $this->usuario->matricula; ?>" required >
        </p>
        <p>
            <label for="username">Nombre del producto:</label><br>
            <input type="text" name="username"  value="<?php echo $this->usuario->username; ?>" requiered>
        </p>
        <p>
            <label for="pw">Contraseña</label><br>
            <input type="password" name="pw"  value="" requiered>
        </p>
        <p>
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre"  value="<?php echo $this->usuario->nombre; ?>" requiered>
        </p>
        <p>
            <label for="a_paterno">Apellido Paterno</label><br>
            <input type="text" name="a_paterno"  value="<?php echo $this->usuario->a_paterno; ?>" required>
        </p>
        <p>
            <label for="a_materno">Apellido Materno</label><br>
            <input type="text" name="a_materno"  value="<?php echo $this->usuario->a_materno; ?>" required>
        </p>
        <p>
            <label for="edad">Edad</label><br>
            <input type="number" name="edad"  value="<?php echo $this->usuario->edad; ?>" required>
        </p>
        <p>
            <label for="sexo">Sexo</label><br>
            <input type="text" name="sexo"  value="<?php echo $this->usuario->sexo; ?>" required>
        </p>
        <p>
            <label for="direccion">Direccion</label><br>
            <input type="text" name="direccion"  value="<?php echo $this->usuario->direccion; ?>" required>
        </p>
        <p>
            <label for="ciudad">Ciudad</label><br>
            <input type="text" name="ciudad"  value="<?php echo $this->usuario->ciudad; ?>" required>
        </p>
        <p>
            <label for="telefono">Telefono</label><br>
            <input type="text" name="telefono"  value="<?php echo $this->usuario->telefono; ?>" required>
        </p>
        <p>
            <label for="c_postal">Codigo Postal</label><br>
            <input type="text" name="c_postal"  value="<?php echo $this->usuario->c_postal; ?>" required>
        </p>
        <p>
            <label for="email">Email</label><br>
            <input type="email" name="email"  value="<?php echo $this->usuario->email; ?>" required>
        </p>
        
        <p>
        <input type="submit" value="Actualizar usuario">
        </p>
    
    </form>

    <?php require 'views/footer.php'; ?>
</body>
</html>
