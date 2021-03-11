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
    <link rel="stylesheet" href="../../resources/css/login.css">
    <link rel="stylesheet" href="../../resources/css/configuracion.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.brighttheme.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.buttons.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.css">
    <!-- <script src="js/ajax.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/tostadas/pnotify.js"></script>
    <script src="../js/tostadas/pnotify.animate.js"></script>
    <script src="../js/tostadas/pnotify.buttons.js"></script>
    <script src="../js/tostadas/mensajes.js"></script>
    <script src="../js/validaciones.js"></script>
    
    <title>Configuración antropolys</title>
</head>
<body class="bodyConfig" id="body_config">
    <div class="container">
		
        <div class="row">
            <div class="container formContainer" id="formContainer">
                <img class="imgConfig" src="../assets/imagenes_nuevas/PNG/tabla_config.png">    
                <div class="row contentConfig" id="content_config1">
                    <div class="col-xs-12 label"> DIFICULTAD </div>
                    <div class="col-xs-12 contentConfigBtns" id="contentConfig_btns1">
                        <div class="col-xs-4 contentConfigBtn1">
                            <div class="btn btn-block btnDiamante" id="difi_1" value="1" type="submit" onclick="vari.select_config(this, 1)"></div>
                        </div>
                        <div class="col-xs-4 contentConfigBtn2">
                            <div class="btn btn-block btnEstrella" id="difi_2" value="2" type="submit" onclick="vari.select_config(this, 1)"></div>
                        </div>
                    </div>
                </div>
                <div class="row contentConfig" id="content_config2">
                    <div class="col-xs-12 label"> EXTENCIÓN DEL JUEGO </div>
                    <div class="col-xs-12 contentConfigBtns configBtns" id="contentConfig_btns2" style="margin-left: 3%;">
                        <div class="col-xs-4 contentConfigBtn1">
                            <div class="btn btn-block btnNormal" id="extent_1" value="1" type="submit"  onclick="vari.select_config(this, 2)"></div>
                        </div>
                        <div class="col-xs-4 contentConfigBtn2">
                            <div class="btn btn-block btnLargo" id="extent_2" value="2" type="submit" onclick="vari.select_config(this, 2)"></div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-block btnAdelante" id="btn_adelante" type="submit" href="#" onclick="vari.save_config()"></a>
            </div> 
            
        </div>
        
    </div>
    
</body>
</html>