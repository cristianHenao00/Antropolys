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
    <link rel="stylesheet" href="../../resources/css/registro.css">
    <!-- <script src="js/ajax.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Registro antropolys</title>
</head>
<body id="body_registro">
    <div class="container">
		
        <div class="row">
            <div class="container" id="formContainer">
                <form method='post' class="form-registro text-center" id="registro" role="form">
                    <div class="row">
                        <div clasS="col-xs-6">
                            <label for="name">Nombre</label>
                            <div class="form-group" id="nameUser_group">
                                <input type="text" class="form-control" name="name" id="nameUser" required autofocus>
                            </div>
                        </div>
                        <div clasS="col-xs-6 bloque">
                            <label for="name1">Apellido</label>
                            <div class="form-group" id="name1User_group">
                                <input type="text" class="form-control" name="name1" id="name1User" required autofocus>
                            </div>
                        </div>
                    </div>
                    <label for="email">Correo</label>
                    <div class="form-group" id="emailUser_group">
                        <input type="text" class="form-control" name="email" id="emailUser" required autofocus>
                    </div>
                    <div class="row">
                        <div clasS="col-xs-6">
                            <label for="pass">Clave</label>
                            <div class="form-group" id="celularNew_group">
                                <input type="password" class="form-control" name="pass" id="celularNew"  required>
                            </div>
                        </div>
                        <div clasS="col-xs-6 bloque">
                            <label for="pass">Confirmar</label>        
                            <div class="form-group" id="celularConfirmar_group">
                                <input type="password" class="form-control" name="pass" id="celularConfirmar"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="content_info">
                        <div class="col-xs-6" id="content_info_ciudad">
                            <label for="ciudad">Ciudad</label>
                            <div class="form-group" id="infoCiudad_group">
                                <input type="text" class="form-control" name="ciudad" id="ciudad"  required> 
                            </div>
                        </div>
                        <div class="col-xs-6" id="content_info_edad">
                            <label for="edad">Edad</label>
                            <div class="form-group" id="infoEdad_group">
                                <input type="text" class="form-control" name="edad" id="edad"  required> 
                            </div>
                        </div>
                    </div>
                    <label for="genero" style="margin-top: 5px;">Genero</label>
                    <div class="row form-group" id="generoUser_group">
                        <div class="col-xs-6" style="position: relative; left: 60px;">
                            <div class="col-xs-6"> <input type="radio" class="form-control" name="genero" id="generoMUser" required autofocus>  </div>
                            <div class="col-xs-6 content_label"> <label> M </label> </div>
                        </div>
                        <div class="col-xs-6" style="position: relative; left: -15px;">
                            <div class="col-xs-6"> <input type="radio" class="form-control" name="genero" id="generoFUser" required autofocus>  </div>
                            <div class="col-xs-6 content_label"> <label> F </label> </div>
                        </div>
                    </div>

                    <button class="btn btn-block" type="submit" id="btn_registro"></button>
                </form>
                <img id="img_logo" src="../../resources/assets/imagenes_nuevas/PNG/Logo.png"> 
            </div> 
            
        </div>
        
    </div>
    
</body>
</html>