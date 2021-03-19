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
    <link href="../../resources/css/ganaste.css" rel="stylesheet" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Ganaste antropolys</title>
</head>
<body id="body_ganaste">

    <div class="container ganaste" >
        <img class="imgTerminado" src="../../resources/assets/imagenes_nuevas/PNG/tabla_terminado.png">
        <div class="container content_ganaste" id="contentGanaste">
            <div class="imgGanaste"></div>
            <div class="row" id="content_avatar">
                <div class="col-xs-1 segundo avatar0" id="">
                    <div class="numero imgSegundo"></div>
                    <div class="infoUsuario">
                        <div id="nombreUsuario2">Sandra</div>
                        <div class="apellido" id="apellidoUsuario2">Montoya</div>
                    </div>
                </div>
                <div class="col-xs-1 primero avatar0" id="">
                    <div class="numero imgPrimero"></div>
                    <div class="infoUsuario tmp">
                        <div id="nombreUsuario1">Sandra</div>
                        <div class="apellido" id="apellidoUsuario1">Montoya</div>
                    </div>
                </div>
                <div class="col-xs-1 tercero avatar0" id="">
                    <div class="numero imgTercero"></div>
                    <div class="infoUsuario">
                        <div id="nombreUsuario3">Sandra</div>
                        <div class="apellido" id="apellidoUsuario3">Montoya</div>
                    </div>
                </div> 
            </div>
            <div class="btn btnNuevoJuego" id="btn_nuevoJuego" type="submit" onclick="document.getElementById('modal_ganaste').classList.remove('in');""></div>
        </div>
    </div>

</body>
</html>