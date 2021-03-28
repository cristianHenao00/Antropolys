<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../resources/assets/pix/favico.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="../../resources/css/tableroLargo.css" rel="stylesheet" >
    <link href="../../resources/css/perfilUsuario.css" rel="stylesheet" >
    <link href="../../resources/css/avatar.css" rel="stylesheet" >
    <link href="../../resources/css/ganaste.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.brighttheme.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.buttons.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/jquery-confirm.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/tostadas/pnotify.js"></script>
    <script src="../js/tostadas/pnotify.animate.js"></script>
    <script src="../js/tostadas/pnotify.buttons.js"></script>
    <script src="../js/tostadas/mensajes.js"></script>
    <script src="../js/tostadas/jquery-confirm.js"></script>
    <script src="../js/avatar.js"></script>
    <script src="../js/juego.js"></script>
    <title>Tablero antropolys</title>
</head>

<?php
    session_start();//iniciando session 
    $nombre = $_SESSION['data_user_antropolys']['nombre'];
    $apellido = $_SESSION['data_user_antropolys']['apellido'];
    $fechaN = $_SESSION['data_user_antropolys']['fecha_nacimineto'];
    $ciudad = $_SESSION['data_user_antropolys']['ciudad'];
    $genero = $_SESSION['data_user_antropolys']['genero'];
    $correo = $_SESSION['data_user_antropolys']['email'];
    $img = $_SESSION['data_user_antropolys']['img']? 'avatar'.$_SESSION['data_user_antropolys']['img']: 'avatarPrincipal';

    $icono = ($genero == "M") ? "<i class='fa fa-mars genero'></i>" : "<i class='fa fa-venus genero'></i>";
    $usuario = json_encode($_SESSION['data_user_antropolys']);
    $eljuego = json_encode($_SESSION['data_game_antropolys']);
    echo "<script>
            var usuario = $usuario;
            var eljuego = $eljuego;
           </script>";
?>

<body class="bodyTablero" id="body_tablero" onload="ju_ego.generate_turno();">
    <div class="containerTablero">
        <div class="row tableroNormal" id="tablero_normal">
            <div class="tablero1">
                <div class="col-xs-12 content_img1">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo22-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical_1.png"> 
                        <div class="posicion" id="posicion_1"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-1.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-1.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-1.png">
                            <div class="btnUser" id="btnPosicion_1" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_2"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-2.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-2.png">
                            <img class="posicionAzul"  src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-2.png">
                            <div class="btnUser" id="btnPosicion_2" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_3"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-3.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-3.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-3.png">
                            <div class="btnUser" id="btnPosicion_3" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_4"> 
                            <img class="posicionGris"  src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-4.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-4.png">
                            <img class="posicionAzul"  src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-4.png">
                            <div class="btnUser" id="btnPosicion_4" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-4 img2"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo21-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet">
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical_1.png"> 
                        <div class="posicion4" id="posicion_5"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-5.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-5.png">
                            <img class="posicionAzul"  src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-5.png">
                            <div class="btnUser" id="btnPosicion_5" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion5" id="posicion_6"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-6.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-6.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-6.png">
                            <div class="btnUser" id="btnPosicion_6" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion6" id="posicion_7"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-7.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-7.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-7.png">
                            <div class="btnUser" id="btnPosicion_7" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion7" id="posicion_8"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-8.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-8.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-8.png">
                            <div class="btnUser" id="btnPosicion_8" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-2 img3"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo20-100.jpg"> </div>            
                </div>
                <div class="col-xs-12 content_imgStreetH"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH1"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img2">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg">
                        <div class="posicion" id="posicion_13"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-13.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-13.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-13.png"> 
                            <div class="btnUser" id="btnPosicion_13" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_12"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-12.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-12.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-12.png"> 
                            <div class="btnUser" id="btnPosicion_12" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_11"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-11.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-11.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-11.png"> 
                            <div class="btnUser" id="btnPosicion_11" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_10"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-10.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-10.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-10.png">
                            <div class="btnUser" id="btnPosicion_10" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion8" id="posicion_14"> 
                            <img class="posicionGris"  src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-14.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-14.png">
                            <img class="posicionAzul"  src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-14.png"> 
                            <div class="btnUser" id="btnPosicion_14" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-4 img2"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo28-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg">
                        <div class="posicion4" id="posicion_9"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-9.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-9.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-9.png"> 
                            <div class="btnUser" id="btnPosicion_9" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-2 img3"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo27-100.jpg"> </div>             
                </div>
                <div class="col-xs-12 content_imgStreetH2"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH3"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img3">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet">
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg">
                        <div class="posicion" id="posicion_15"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-15.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-15.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-15.png">  
                            <div class="btnUser" id="btnPosicion_15" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_16"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-16.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-16.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-16.png"> 
                            <div class="btnUser" id="btnPosicion_16" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_17"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-17.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-17.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-17.png"> 
                            <div class="btnUser" id="btnPosicion_17" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_18"> 
                            <img class="posicionGris"  src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-18.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-18.png">
                            <img class="posicionAzul"  src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-18.png">  
                            <div class="btnUser" id="btnPosicion_18" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-4 img2"> 
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo25-100.jpg">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo21-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg">
                        <div class="posicion4" id="posicion_19"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-19.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-19.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-19.png"> 
                            <div class="btnUser" id="btnPosicion_19" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion5" id="posicion_20"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-20.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-20.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-20.png"> 
                            <div class="btnUser" id="btnPosicion_20" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion6" id="posicion_21"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-21.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-21.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-21.png"> 
                            <div class="btnUser" id="btnPosicion_21" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion7" id="posicion_22"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-22.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-22.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-22.png">
                            <div class="btnUser" id="btnPosicion_22" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-2 img3">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo26-100.jpg">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo20-100.jpg">
                    </div>             
                </div>
            </div>
            <div class="tablero2">
                <div class="col-xs-12 content_imgStreetH"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH1"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img2">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg">
                        <div class="posicion" id="posicion_27"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-27.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-27.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-27.png">
                            <div class="btnUser" id="btnPosicion_27" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_26"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-26.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-26.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-26.png">
                            <div class="btnUser" id="btnPosicion_26" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_25"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-25.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-25.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-25.png">
                            <div class="btnUser" id="btnPosicion_25" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_24"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-24.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-24.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-24.png">
                            <div class="btnUser" id="btnPosicion_24" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion8" id="posicion_28"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-28.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-28.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-28.png">
                            <div class="btnUser" id="btnPosicion_28" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-4 img2"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo29-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg">
                        <div class="posicion4" id="posicion_23"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-23.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-23.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-23.png">
                            <div class="btnUser" id="btnPosicion_23" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-2 img3"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo30-100.jpg"> </div>             
                </div>
                <div class="col-xs-12 content_imgStreetH2"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH3"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img3">
                    <div class="col-xs-2 img1"> 
                        <div class="calle"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal1.png"> </div>
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg">
                        <div class="posicion" id="posicion_29"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-29.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-29.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-29.png">
                            <div class="btnUser" id="btnPosicion_29" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_30"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-30.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-30.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-30.png">
                            <div class="btnUser" id="btnPosicion_30" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_31"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-31.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-31.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-31.png">
                            <div class="btnUser" id="btnPosicion_31" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_32"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-32.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-32.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-32.png">
                            <div class="btnUser" id="btnPosicion_32" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-4 img2"> 
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo25-100.jpg">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo21-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg">
                        <div class="posicion4" id="posicion_33"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-33.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-33.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-33.png">
                            <div class="btnUser" id="btnPosicion_33" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion5" id="posicion_34"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-34.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-34.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-34.png">
                            <div class="btnUser" id="btnPosicion_34" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion6" id="posicion_35"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-35.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-35.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-35.png">
                            <div class="btnUser" id="btnPosicion_35" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion7" id="posicion_36"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-36.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-36.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-36.png">
                            <div class="btnUser" id="btnPosicion_36" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-2 img3">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo26-100.jpg">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo20-100.jpg">
                    </div>             
                </div>
            </div>
            <div class="tablero3">
                <div class="col-xs-12 content_imgStreetH"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH1"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img2">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg">
                        <div class="posicion" id="posicion_41"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-41.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-41.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-41.png">
                            <div class="btnUser" id="btnPosicion_41" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_40"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-40.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-40.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-40.png">
                            <div class="btnUser" id="btnPosicion_40" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_39"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-39.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-39.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-39.png">
                            <div class="btnUser" id="btnPosicion_39" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_38"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-38.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-38.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-38.png">
                            <div class="btnUser" id="btnPosicion_38" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion8" id="posicion_42"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-42.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-42.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-42.png">
                            <div class="btnUser" id="btnPosicion_42" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-4 img2"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo32-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg"> 
                        <div class="posicion4" id="posicion_37"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-37.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-37.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-37.png">
                            <div class="btnUser" id="btnPosicion_37" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-2 img3"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo31-100.jpg"> </div>             
                </div>
                <div class="col-xs-12 content_imgStreetH2"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH3"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img3">
                    <div class="col-xs-2 img1"> 
                        <div class="calle"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal1.png"> </div>
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg"> 
                    </div>
                    <div class="col-xs-4 img2"> 
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo25-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg"> 
                    </div>
                    <div class="col-xs-2 img3">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo26-100.jpg">
                    </div>             
                </div>
            </div>
                              
        </div>

        <div class="row tableroLargo" id="tablero_largo">
            <div class="tablero1">
                <div class="col-xs-12 content_img1">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo22-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical_1.png"> 
                        <div class="posicion" id="posicion_43"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-43.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-43.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-43.png">
                            <div class="btnUser" id="btnPosicion_43" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_44"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-44.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-44.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-44.png">
                            <div class="btnUser" id="btnPosicion_44" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_45"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-45.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-45.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-45.png">
                            <div class="btnUser" id="btnPosicion_45" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_46"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-46.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-46.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-46.png">
                            <div class="btnUser" id="btnPosicion_46" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-4 img2"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo21-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical_1.png"> 
                        <div class="posicion4" id="posicion_47"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-47.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-47.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-47.png">
                            <div class="btnUser" id="btnPosicion_47" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion5" id="posicion_48"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-48.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-48.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-48.png">
                            <div class="btnUser" id="btnPosicion_48" type="submit"  onclick=""> </div>
                        </div>
                        <div class="posicion6" id="posicion_49"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-49.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-49.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-49.png">
                            <div class="btnUser" id="btnPosicion_49" type="submit onclick=""> </div>
                        </div>
                        <div class="posicion7" id="posicion_50"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-50.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-50.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-50.png">
                            <div class="btnUser" id="btnPosicion_50" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-2 img3"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo20-100.jpg"> </div>            
                </div>
                <div class="col-xs-12 content_imgStreetH"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH1"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img2">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg"> 
                        <div class="posicion" id="posicion_55"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-55.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-55.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-55.png"> 
                            <div class="btnUser" id="btnPosicion_55" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_54"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-54.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-54.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-54.png"> 
                            <div class="btnUser" id="btnPosicion_54" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_53"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-53.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-53.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-53.png"> 
                            <div class="btnUser" id="btnPosicion_53" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_52"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-52.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-52.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-52.png">
                            <div class="btnUser" id="btnPosicion_52" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion8" id="posicion_56"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-56.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-56.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-56.png"> 
                            <div class="btnUser" id="btnPosicion_56" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-4 img2"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo33-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg"> 
                        <div class="posicion4" id="posicion_51"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-51.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-51.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-51.png"> 
                            <div class="btnUser" id="btnPosicion_51" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-2 img3"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo34-100.jpg"> </div>             
                </div>
                <div class="col-xs-12 content_imgStreetH2"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH3"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img3">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg"> 
                        <div class="posicion" id="posicion_57"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-57.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-57.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-57.png">  
                            <div class="btnUser" id="btnPosicion_57" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_58"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-58.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-58.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-58.png"> 
                            <div class="btnUser" id="btnPosicion_58" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_59"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-59.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-59.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-59.png"> 
                            <div class="btnUser" id="btnPosicion_59" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_60"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-60.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-60.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-60.png">  
                            <div class="btnUser" id="btnPosicion_60" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-4 img2"> 
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo25-100.jpg">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo21-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg"> 
                        <div class="posicion4" id="posicion_61"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-61.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-61.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-61.png"> 
                            <div class="btnUser" id="btnPosicion_61" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion5" id="posicion_62"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-62.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-62.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-62.png"> 
                            <div class="btnUser" id="btnPosicion_62" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion6" id="posicion_63"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-63.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-63.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-63.png"> 
                            <div class="btnUser" id="btnPosicion_63" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion7" id="posicion_64"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-64.png">
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-64.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-64.png">
                            <div class="btnUser" id="btnPosicion_64" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-2 img3">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo26-100.jpg">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo20-100.jpg">
                    </div>             
                </div>
            </div>
            <div class="tablero2">
                <div class="col-xs-12 content_imgStreetH"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH1"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img2">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg"> 
                        <div class="posicion" id="posicion_69"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-69.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-69.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-69.png">
                            <div class="btnUser" id="btnPosicion_69" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_68"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-68.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-68.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-68.png">
                            <div class="btnUser" id="btnPosicion_68" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_67"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-67.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-67.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-67.png">
                            <div class="btnUser" id="btnPosicion_67" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_66"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-66.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-66.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-66.png">
                            <div class="btnUser" id="btnPosicion_66" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion8" id="posicion_70"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-70.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-70.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-70.png">
                            <div class="btnUser" id="btnPosicion_70" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-4 img2"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo36-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg"> 
                        <div class="posicion4" id="posicion_65"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-65.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-65.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-65.png">
                            <div class="btnUser" id="btnPosicion_65" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-2 img3"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo35-100.jpg"> </div>             
                </div>
                <div class="col-xs-12 content_imgStreetH2"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH3"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img3">
                    <div class="col-xs-2 img1"> 
                        <div class="calle"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal1.png"> </div>
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg"> 
                        <div class="posicion" id="posicion_71"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-71.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-71.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-71.png">
                            <div class="btnUser" id="btnPosicion_71" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion1" id="posicion_72"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-72.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-72.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-72.png">
                            <div class="btnUser" id="btnPosicion_72" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2" id="posicion_73"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-73.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-73.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-73.png">
                            <div class="btnUser" id="btnPosicion_73" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3" id="posicion_74"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-74.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-74.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-74.png">
                            <div class="btnUser" id="btnPosicion_74" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-4 img2"> 
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo25-100.jpg">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo21-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical3.jpg"> 
                        <div class="posicion4" id="posicion_75"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-75.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-75.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-75.png">
                            <div class="btnUser" id="btnPosicion_75" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion5" id="posicion_76"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-76.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-76.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-76.png">
                            <div class="btnUser" id="btnPosicion_76" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion6" id="posicion_77"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-77.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-77.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-77.png">
                            <div class="btnUser" id="btnPosicion_77" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion7" id="posicion_78"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-78.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-78.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-78.png">
                            <div class="btnUser" id="btnPosicion_78" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-2 img3">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo26-100.jpg">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo20-100.jpg">
                    </div>             
                </div>
            </div>
            <div class="tablero3">
                <div class="col-xs-12 content_imgStreetH"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH1"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img2">
                    <div class="col-xs-2 img1"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo23-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg"> 
                    </div>
                    <div class="col-xs-4 img2"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo37-100.jpg"> </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical2.jpg"> 
                        <div class="posicion4" id="posicion_79"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-79.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-79.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-79.png">
                            <div class="btnUser" id="btnPosicion_79" type="submit" onclick=""> </div>
                        </div>
                    </div>
                    <div class="col-xs-2 img3"> <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo38-100.jpg"> </div>             
                </div>
                <div class="col-xs-12 content_imgStreetH2"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal2.jpg"> </div>
                <div class="col-xs-12 content_imgStreetH3"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal4.jpg"> </div>
                <div class="col-xs-12 content_img3">
                    <div class="col-xs-2 img1"> 
                        <div class="calle"> <img src="../../resources/assets/Tablero-tajado/calle-horizontal1.png"> </div>
                        <img class="opcion" src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo22-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet uno"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical_2.png">
                        <div class="posicion3" id="posicion_80"> 
                            <img class="posicionRojo" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/rojo/botones_Conjunto-de-datos-80.png"> 
                            <div class="btnUser" id="btnPosicion_80" type="submit" onclick=""> </div>
                        </div> 
                    </div>
                    <div class="col-xs-4 img2"> 
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo25-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet"> 
                        <img src="../../resources/assets/Tablero-tajado/calle-vertical_2.png"> 
                    </div>
                    <div class="col-xs-2 img3">
                        <img src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo26-100.jpg">
                    </div>             
                </div>
            </div>               
        </div>

        <div class="col-xs-12 imgSombra"></div>

        <div class="container perfilUsuario">
            <div class="container perfilDados" id="dados">
                <div class="btn btnUsuario <?php echo $img ?>" id="btnUsuario" type="submit" data-toggle="collapse" data-target="#perfilUsuarioModal"  aria-expanded="true"> </div>
                <div class="btn btnDados" type="submit" id="btnDados" onclick="ju_ego.lanzar()"> </div>
                <div class="imgReloj" id="relojUsuarioMi"> <div class="tiempoReloj" id="tiempoUsuarioMi"> 00 </div> </div>

                <div class="modal fade collapse" tabindex="-1" role="dialog" id="perfilUsuarioModal" aria-expanded="true" style="">
                    <div class="content_modal">
                        <div class="container perfil" >
                            <img class="imgPerfil" id="img_perfil" src="../../resources/assets/imagenes_nuevas/PNG/cabecera_perfil_usuario.png">
                            <div class="btn btn-block btnCerrarPerfil" type="submit" id="btn_cerrarPerfil" onclick="document.getElementById('perfilUsuarioModal').classList.remove('in');"></div>
                            <div class="row">
                                <div class="container contentPerfil" id="content_perfil">
                                    <div class="bloque">
                                        <div class="imgAvatar <?php echo $img ?>" ></div>
                                        <div class="btn avatar" type="submit" id="btn_avatar" data-toggle="collapse" data-target="#avatarModal"  aria-expanded="true" onclick="document.getElementById('perfilUsuarioModal').classList.remove('in');"> </div>
                                        
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
                    </div>
                </div>
                
                <div class="modal fade collapse" tabindex="-1" role="dialog" id="avatarModal" aria-expanded="true" style="">
                    <div class="content_modal">
                        <div class="container avatar" >
                            <img class="imgAvatarTitle" id="img_avatar" src="../../resources/assets/imagenes_nuevas/PNG/cabecera_avatars.png">
                            <div class="btn btn-block btnCerrarAvatar" type="submit" id="btn_cerrarAvatar" data-toggle="collapse" data-target="#perfilUsuarioModal"  aria-expanded="true" onclick="document.getElementById('avatarModal').classList.remove('in');"></div>
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
                                        <div class="btn actualizar" type="submit" id="actualizar"  onclick="ava.save_avatar()"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container perfilUsuarioOponente">
            <div class="containte perfilOponente" id="perfil_oponente">
                <div class="jugadorTurno" id="jugador_turno"> Jugador 1 </div>
                <div class="nombreOponente" id="nombre_oponente"> Sandra </div>
                <div class="ApellidoOponente" id="apellido_oponente"> Montoya </div>
                <div class="imgReloj" id="relojUsuario"> <div class="tiempoReloj" id="tiempoUsuario"> 60 </div> </div>
            </div>
        </div>

        <div class="preguntas modal fade collapse" tabindex="-1" role="dialog" id="modal_pregunta" aria-expanded="true" style="">
           <div class="content_modal">
                <div class="container boxPreguntas" >
                    <div class="container box_preguntas" >
                        <div class="tituloPregunta" id="pregunta_titulo"> </div>
                        <div class="textoPregunta" id="pregunta_texto"> </div>
                        <img class="imgPregunta" id="imgPregunta" src="" style="display: none;">
                        <div class="textoRespuesta" id="texto_respuesta"> </div>
                        <div class="row btnsModal" id="btns_modal">
                            <div class="btn btn-block" type="submit" id="btnPregunta" onclick="document.getElementById('modal_pregunta').classList.remove('in');"> </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>

        <div class="ganaste modal fade collapse" tabindex="-1" role="dialog" id="modal_ganaste" aria-expanded="true" style="">
           <div class="content_modal">
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
           </div>
        </div>

        <div class="juguemos modal fade collapse" tabindex="-1" role="dialog" id="modal_juguemos" aria-expanded="true" style="">
           <div class="content_modal">
                <div class="container juguemos" >
                    <div class="container content_juguemos" id="contentJuguemos">
                        <div class="imgJuguemos"></div>
                        <div class="txtJuguemos" id="txt_juguemos"> Tu turno es 03 </div>                        
                    </div>
                </div>
           </div>
        </div>

    </div>
</body>
</html>