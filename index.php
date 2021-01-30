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
    <!-- <script src="js/ajax.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Login antropolys</title>
</head>
<body id="body_index">
    
    <div class="container">
		<img id="img_login" src="resources/assets/imagenes_nuevas/PNG/login_letrero.png"> 
        <div class="row">
            <div class="container" id="formContainer">
                
                <form method='post' class="form-signin text-center" id="login" role="form">
                    <label for="user">Usuario</label>
                    <div class="form-group" id="user_group">
                        <input type="text" class="form-control" name="user" id="user" required autofocus>
                        <img src="resources/assets/imagenes_nuevas/PNG/estrella.png" id="img_icon1">
                    </div>
                    <label for="pass">Clave</label>
                    <div class="form-group" id="celular_group">
                        <input type="password" class="form-control" name="pass" id="celular"  required>
                        <img src="resources/assets/imagenes_nuevas/PNG/reloj.png" id="img_icon2">
                    </div>
                    <a id="link_olvidoClave" href="#"><b>¿Olvidó su clave?</b></a>      
                    <br>
                    <button class="btn btn-block" type="submit" id="btn_entrar"></button>
                    <button class="btn btn-block" type="submit" id="btn_registro"></button>
                    
                </form>
                <img id="img_logo" src="resources/assets/imagenes_nuevas/PNG/Logo.png"> 
            </div> <!-- /container -->
            
        </div>
        <button class="btn btn-block" type="submit" id="btn_entrar1"></button>
        <button class="btn btn-block" type="submit" id="btn_registro1"></button>
    </div>
    
</body>
</html>