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
    <link href="../../resources/css/avatar.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.brighttheme.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.buttons.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/tostadas/pnotify.js"></script>
    <script src="../js/tostadas/pnotify.animate.js"></script>
    <script src="../js/tostadas/pnotify.buttons.js"></script>
    <script src="../js/tostadas/mensajes.js"></script>
    <script src="../js/avatar.js"></script>
    <title>Avatar antropolys</title>
</head>
<body class="bodyAvatar" id="body_avatar">

    <div class="container avatar" >
        <img class="imgAvatarTitle" id="img_avatar" src="../../resources/assets/imagenes_nuevas/PNG/cabecera_avatars.png">
        <button class="btn btn-block btnCerrarAvatar" type="submit" id="btn_cerrarAvatar"></button>
        <div class="row">
            <div class="container contentAvatar" id="content_avatar">
                <div class="bloque">
                    <div class="col-xs-12" id="bloqueAvatar">
                        <div class="btn avatar1" type="submit" id="avatar_1" onclick="ava.select_avatar(this)"> </div>
                        <div class="btn avatar2" type="submit" id="avatar_2" onclick="ava.select_avatar(this)" style="margin-left:10px; margin-right:10px;"> </div>
                        <div class="btn avatar3" type="submit" id="avatar_3" onclick="ava.select_avatar(this)"> </div>
                        <div class="btn avatar4" type="submit" id="avatar_4" onclick="ava.select_avatar(this)"> </div>
                        <div class="btn avatar5" type="submit" id="avatar_5" onclick="ava.select_avatar(this)" style="margin-left:10px; margin-right:10px;"> </div>
                        <div class="btn avatar6" type="submit" id="avatar_6" onclick="ava.select_avatar(this)"> </div>
                    </div>
                </div>
                <div class="bloque1">
                    <div class="labelActualizar"> actualizar </div>
                    <button class="btn actualizar" type="submit" id="actualizar" onclick="ava.save_avatar()"> </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>