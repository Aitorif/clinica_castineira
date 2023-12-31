<?php
session_start();
include('../modelo/bd.php');
include('../modelo/functional.php');
comprobarLogin();

if(isset($_GET['id_factura'])){
    $bd = new Crud();
    $id = $_GET['id_factura'];
    $user_id = $_SESSION['user_id'];
    $listado = $bd->getFacturaById($id);
    if($_SESSION["trabajador"]== false && $listado["id_user"] != $_SESSION["user_id"]){
        header('Location: ../index.php');
        exit();
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/editor.css">

    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
-->  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../scripts/jquery.previstaDocumento.js"></script>
    <title>Clínica Logopédica Castiñeira</title>
</head>

 <body>
    <button id="imprimir" style="display: none">Imprimir</button>
    <div id="documento">
    <h1>Factura ID: <?=$id?><span style="position: absolute; right: 8px; font-size: 16px;"> Fecha: <?=$listado["fecha"]?></span></h1>
    
    <table style="max-width: 100%" id="formfactura">
        <tr>
            <td>Nombre del Cliente: <?=$listado["nombre"]?></td>
            <td>Apellidos del Cliente: <?=$listado["apellidos"]?></td>
        </tr>

        <tr>
            <td>Dirección del Cliente:  <?=$listado["direccion"]?></td>
            <td>DNI del Cliente:  <?=$listado["dni"]?></td>    
        </tr>
    </table>
    <h2>Detalle de la Factura</h2>
    <table style="max-width:600px" border="1">
        <tr>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
        </tr>
        <tr>
            <td><?=$listado["descripcion"]?></td>
            <td><?=$listado["cantidad"]?></td>
            <td><?=$listado["precioUnitario"]?>€</td>
        </tr>
        <!-- Puedes agregar más filas de productos aquí -->
    </table>
    <h3>Total de la Factura: <?=$listado["precioTotal"]?>€</h3>
    </div>

 </body>