<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../resources/assets/pix/favico.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="../../resources/css/perfilUsuario.css" rel="stylesheet" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Perfil antropolys</title>
</head>

<?php
    session_start();//iniciando session 
    $nombre = $_SESSION['data_user_antropolys']['nombre'];
    $apellido = $_SESSION['data_user_antropolys']['apellido'];
    $fechaN = $_SESSION['data_user_antropolys']['fecha_nacimineto'];
    $ciudad = $_SESSION['data_user_antropolys']['ciudad'];
    $genero = $_SESSION['data_user_antropolys']['genero'];
    $correo = $_SESSION['data_user_antropolys']['correo'];

    $icono = ($genero == "M") ? "<i class='fa fa-mars genero'></i>" : "<i class='fa fa-venus genero'></i>";
?>

<body class="bodyPerfil" id="body_perfil">
    <div class="container perfil" >
        <img class="imgPerfil" id="img_perfil" src="../../resources/assets/imagenes_nuevas/PNG/cabecera_perfil_usuario.png">
        <div class="btn btn-block btnCerrarPerfil" type="submit" id="btn_cerrarPerfil"></div>
        <div class="row">
            <div class="container contentPerfil" id="content_perfil">
                <div class="bloque">
                    <div class="imgAvatar"></div>
                    <a class="btn avatar" type="submit" id="btn_avatar" href="../../resources/views/avatar.php"> </a>
                    
                    <div class="info">
                        <div class="nombre" id="nombre"> <?php echo $nombre?> </div>
                        <div class="apellido" id="apellido"> <?php echo $apellido?> </div>
                        <div class="fecha" id="fecha"> <?php echo $fechaN?> </div>
                        <div class="ciudad" id="ciudad"> <?php echo $ciudad ?> <?php echo $icono ?> </div>
                        <div class="correo" id="correo"> <?php echo $correo?> </div>
                    </div>
                    <div class="btn actualizarClave" type="submit" id="actualizar_clave"></div>
                </div>
                
                <div class="bloque1">
                    <div class="labelActualizar"> actualizar </div>
                    <div class="btn actualizar" type="submit" id="actualizar"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>