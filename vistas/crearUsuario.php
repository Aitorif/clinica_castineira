<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/editor.css">
    <link rel="stylesheet" href="../estilos/login.css">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../scripts/jquery.crearUsuario.js"><script>
    <title>Clínica Logopédica Castiñeira</title>
</head>
<?php
        session_start();
        if(isset($_COOKIE["login"]) && $_COOKIE["login"] == "loged"){
            header('Location: ../index.php');
            exit();
        }
        include('header.php');
?>  
<main>
    <section id="main-container" class="flex-container">
        <div id="divLogUp">
            <h1>Registrar nuevo usuario</h1>
            <form action="../back/guardarUsuario.php" method="post">
                <label for="nombre">Nombre</label><input type="text" name="nombre" placeholder="Escribe tu nombre" required>
                <label for="apellidos">Apellidos</label><input type="text" name="apellidos" placeholder="Escribe tus apellidos" required>
                <label for="email">Email</label><input type="email" name="email" placeholder="Escribe tu email" required>
                <label for="tel">Teléfono</label><input type="tel" name="phone" placeholder="Escribe tu número de teléfono" required>
                <label for="direccion">Direccion</label><input type="text" name="direccion" placeholder="Escribe tu dirección" required>
                <label for="DNI">DNI</label><input type="text" name="DNI" placeholder="Escribe tu DNI" required>
                <label for="contraseña">Contraseña</label><input type="password" id="contraseña" name="contraseña" placeholder="Escribe tu contraseña" required><button id="showPassword"><i id="icon">Ver</i></button>
                <div class="flex-row"><input type="submit" name="enviar" id="logInButton"></div>
                <?php if(isset($result)){echo $result;} ?>
            </form> 
        </div>
    </section>
</main>