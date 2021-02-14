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
    <link rel="icon" type="image/png" href="resources/assets/pix/favico.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="resources/css/login.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.brighttheme.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.buttons.css">
    <link rel="stylesheet" href="../../resources/css/tostadas/pnotify.css">
    <!-- <script src="js/ajax.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="resources/js/tostadas/pnotify.js"></script>
    <script src="resources/js/tostadas/pnotify.animate.js"></script>
    <script src="resources/js/tostadas/pnotify.buttons.js"></script>
    <script src="resources/js/tostadas/mensajes.js"></script>
    <script src="resources/js/registro.js""></script>

    <title>Login antropolys</title>
</head>
<body class="bodyIndex" id="body_index">
    
    <div class="container">
		<img class="imgLogin" id="img_login" src="resources/assets/imagenes_nuevas/PNG/login_letrero.png"> 
        <div class="row">
            <div class="container formContainer" id="formContainer">
                
                <form method='post' class="form-signin text-center" id="login" role="form">
                    <label for="user">Usuario</label>
                    <div class="form-group userGroup" id="user_group">
                        <input type="text" class="form-control user" name="user" id="user" required autofocus>
                        <img src="resources/assets/imagenes_nuevas/PNG/estrella.png" class="imgIcon1" id="img_icon1">
                    </div>
                    <label for="pass">Clave</label>
                    <div class="form-group celularGroup" id="celular_group">
                        <input type="password" class="form-control celular" name="pass" id="celular"  required>
                        <img src="resources/assets/imagenes_nuevas/PNG/reloj.png" class="imgIcon2" id="img_icon2">
                    </div>
                    <a class="linkOlvidoClave" id="link_olvidoClave" href="#"><b>¿Olvidó su clave?</b></a>      
                    <br>
                    <a class="btn btn-block btnEntrar" type="submit" id="btn_entrar" href="#" onclick="regi.ingresar()"></a>
                    <a class="btn btn-block btnRegistro" type="submit" id="btn_registro" href="resources/views/registro.php"></a>
                   
                </form>
                <div class="col-xs-12 imgLogo" id="img_logo"> </div>
            </div> <!-- /container -->
            
        </div>
        <div class="row">
            <div class="col-xs-12 contentBotones">
                <a class="btn btn-block btnEntrar1" type="submit" id="btn_entrar1" href="#" onclick="regi.ingresar()"></a>
                <a class="btn btn-block btnRegistro1" type="submit" id="btn_registro1" href="resources/views/registro.php"></a>
            </div>
        </div>
    </div>
    
</body>
</html>