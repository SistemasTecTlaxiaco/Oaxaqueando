<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link  rel = "stylesheet" href ="public/css/main.css">
</head>
<body>
    <?php require 'views/header.php'; ?>
    
    <div id="main">
    <h1 class="center">Seccion de nuevo</h1></div>
    <div class="center"><?php echo $this->mensaje; ?></div>
    <form  action="<?php echo constant('URL');?>/nuevo/registrarUsuario" enctype="multipart/form-data" method="POST">
        <div>
        <div class = "center">
        <p>
            <label for="matricula">Matricula</label><br>
            <input type="text" name="matricula"  id="" required>
        </p>
        <p>
            <label for="username">Nombre de usuario</label><br>
            <input type="text" name="username" id="" requiered>
        </p>
        <p>
            <label for="pw">Contraseña</label><br>
            <input type="password" name="pw" id="" requiered>
        </p>
        <p>
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" id="" requiered>
        </p>
        <p>
            <label for="a_paterno">Apelido Paterno</label><br>
            <input type="text" name="a_paterno" id="" required>
        </p>
        <p>
            <label for="a_materno">Apellido Materno</label><br>
            <input type="text" name="a_materno" id="" required>
        </p>
        <p>
            <label for="edad">Edad</label><br>
            <input type="number" name="edad" id="" required>
        </p>
        <p>
            <label for="sexo">Sexo</label><br>
            <input type="text" name="sexo" id="" required>
        </p>
        <p>
            <label for="direccion">Direccion</label><br>
            <input type="text" name="direccion" id="" required>
        </p>
        <p>
            <label for="ciudad">Ciudad</label><br>
            <input type="text" name="ciudad" id="" required>
        </p>
        <p>
            <label for="telefono">Telefono</label><br>
            <input type="text" name="telefono" id="" required>
        </p>
        <p>
            <label for="c_postal">Codigo Postal</label><br>
            <input type="text" name="c_postal" id="" required>
        </p>
        <p>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" required>
        </p>
        <p>
            <label for="archivo">Fotografia</label><br>
            <input type="file" name="archivo" required>
        </p>
        <p>
        <input type="submit" name="submit" id="submit" value="Registrar nuevo Usuario">
        </p>
    </div>
    </div>
    </form>

    <?php require 'views/footer.php'; ?>
</body>
</html>
