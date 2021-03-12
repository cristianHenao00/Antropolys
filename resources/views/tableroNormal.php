<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../resources/assets/pix/favico.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--<link href="../../resources/css/tableroNormal.css" rel="stylesheet" >-->
    <link href="../../resources/css/tableroNormal.css" rel="stylesheet" >
    <link href="../../resources/css/perfilUsuario.css" rel="stylesheet" >
    <link href="../../resources/css/avatar.css" rel="stylesheet" >
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
    $img = $_SESSION['data_user_antropolys']['img']? 'avatar'.$_SESSION['data_user_antropolys']['img']: 'avatar0';

    $icono = ($genero == "M") ? "<i class='fa fa-mars genero'></i>" : "<i class='fa fa-venus genero'></i>";
    $usuario = json_encode($_SESSION['data_user_antropolys']);
    $eljuego = json_encode($_SESSION['data_game_antropolys']);
    echo "<script>
            var usuario = $usuario;
            var eljuego = $eljuego;
           </script>";
?>

<body class="bodyTablero" id="body_tablero"  onload="ju_ego.generate_turno();">
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
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-5.png">
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
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-14.png"> 
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
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-18.png">
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
                        <div class="posicion1 corto" id="posicion_40"> 
                            <img class="posicionRojo" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/rojo/botones_Conjunto-de-datos-40.png">
                            <div class="btnUser" id="btnPosicion_40" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion2 corto" id="posicion_39"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-39.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-39.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-39.png">
                            <div class="btnUser" id="btnPosicion_39" type="submit" onclick=""> </div>
                        </div>
                        <div class="posicion3 corto" id="posicion_38"> 
                            <img class="posicionGris" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/gris/botones_Conjunto-de-datos-9_Conjunto-de-datos-38.png"> 
                            <img class="posicionVerde" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/verde/botones_Conjunto-de-datos-9_Conjunto-de-datos-38.png">
                            <img class="posicionAzul" src="../../resources/assets/imagenes_nuevas/PNG/Botonera/Azul/botones_Conjunto-de-datos-38.png">
                            <div class="btnUser" id="btnPosicion_38" type="submit" onclick=""> </div>
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
                        <img class="opcion" src="../../resources/assets/Tablero-tajado/Mesa-de-trabajo22-100.jpg">
                    </div>
                    <div class="col-xs-2 imgStreet uno"> 
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
        
        <div class="perfilDados" id="dados">
            <div class="btn btnUsuario <?php echo $img ?>" id="btnUsuario" type="submit" data-toggle="collapse" data-target="#perfilUsuarioModal"  aria-expanded="true"> </div>
            <div class="btn btnDados" type="submit" id="btnDados" onclick="ju_ego.lanzar()"> </div>
            
            <div class="modal fade collapse" tabindex="-1" role="dialog" id="perfilUsuarioModal" aria-expanded="true" style="">
                <div class="content_modal">
                    <div class="container perfil" >
                        <img class="imgPerfil" id="img_perfil" src="../../resources/assets/imagenes_nuevas/PNG/cabecera_perfil_usuario.png">
                        <div class="btn btn-block btnCerrarPerfil" type="submit" id="btn_cerrarPerfil" onclick="document.getElementById('perfilUsuarioModal').classList.remove('in');"></div>
                        <div class="row">
                            <div class="container contentPerfil" id="content_perfil">
                                <div class="bloque">
                                    <div class="imgAvatar <?php echo $img ?>"></div>
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

        <div class="preguntas modal fade collapse" tabindex="-1" role="dialog" id="modal_pregunta" aria-expanded="true" style="">
           <div class="content_modal">
                <div class="container boxPreguntas" >
                    <div class="container box_preguntas" >
                        <div class="tituloPregunta" id="pregunta_titulo"> </div>
                        <div class="textoPregunta" id="pregunta_texto"> </div>
                        <div class="textoRespuesta" id="texto_respuesta"> </div>

                        <div class="row btnsModal" id="btns_modal">
                            <div class="btn btn-block" type="submit" id="btnPregunta" onclick="document.getElementById('modal_pregunta').classList.remove('in');"> </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</body>
</html>