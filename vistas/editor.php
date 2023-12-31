<?php
session_start();

include('../modelo/functional.php');
comprobarLogin();
comprobarTrabajador();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/editor.css">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Rich-Text-Editor-jQuery-RichText/src/richtext.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../Rich-Text-Editor-jQuery-RichText/src/jquery.richtext.js"></script>
    <script type="text/javascript" src="../scripts/jquery.editor.js"></script>
    <title>Clínica Logopédica Castiñeira</title>
</head>


<?php
        include('header.php');
        include('../modelo/bd.php');
?>
<main>
    <div id="editor">
        <form action="" method="post" id="formTexto">
        <?php 
            if(isset($_GET['id_document'])){
                $bd = new Crud();
                $id_document = $_GET['id_document'];
                $user_id = $_SESSION['user_id'];
                $listado = $bd->getDocById($id_document, $user_id);
                $documentoAntiguo = $listado['documento'];
                $titulo = $listado['titulo'];
                echo "<input type='hidden' name='id_document' value=$id_document>";
            }
            
        ?>
        <label for="titulo">Título del documento</label><input type="text" name="titulo" id="titulo">
        <textarea name="documento" class="content" id="editortxt"></textarea>
        <input type="hidden" name="userid" value="<?php echo $_SESSION["user_id"]; ?>" id="userid">
        <input type="submit" value="enviar" name="enviar" id="enviar">
        </form>
        <p id="resultado"></p>


    <?php
    if(isset ($_GET['id_document'])){
        $id_document = ($_GET['id_document']);
        echo "<script>
        let id_document = $id_document;
        let documento = '$documentoAntiguo'
            $('#editortxt').html(documento);
            $('#titulo').attr('value', '$titulo');
        </script>";
    }else{
        echo "<script>var id_document = null;</script>";
    } 
    ?>
    </main>

