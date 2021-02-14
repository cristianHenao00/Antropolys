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
    <script src="../js/registro.js"></script>
    <title>Registro antropolys</title>
</head>
<body class="bodyIndex" id="body_registro">
    <div class="container">
		
        <div class="row">
            <div class="container formContainer" id="formContainer">
                <form method='post' class="form-registro text-center" id="registro" role="form" action="prueba.php">
                    <div class="row">
                        <div clasS="col-xs-6">
                            <label class="label_" for="name" style="margin-left: 25px;">Nombre</label>
                            <div class="form-group nameUserGroup" id="nameUser_group">
                                <input type="text" class="form-control nameUser" name="name" id="nameUser" required autofocus>
                            </div>
                        </div>
                        <div clasS="col-xs-6 bloque">
                            <label class="label_" for="name1" style="margin-left: 28px;">Apellido</label>
                            <div class="form-group name1UserGroup" id="name1User_group">
                                <input type="text" class="form-control name1User" name="name1" id="name1User" required autofocus>
                            </div>
                        </div>
                    </div>
                    <label class="label_" for="email" style="margin-left: 30px;">Correo</label>
                    <div class="form-group emailUserGroup" id="emailUser_group">
                        <input type="text" class="form-control emailUser" name="email" id="emailUser" required autofocus>
                    </div>
                    <div class="row">
                        <div clasS="col-xs-6">
                            <label class="label_" for="pass" style="margin-left: 20px;">Clave</label>
                            <div class="form-group passNewGroup" id="passNew_group">
                                <input type="password" class="form-control passNew" name="pass" id="passNew"  required autofocus>
                            </div>
                        </div>
                        <div clasS="col-xs-6 bloque">
                            <label class="label_" for="pass" style="margin-left: 25px;">Confirmar</label>        
                            <div class="form-group passConfirmarGroup" id="passConfirmar_group">
                                <input type="password" class="form-control passConfirmar" name="passC" id="passConfirmar"  required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row contentInfo" id="content_info">
                        <div class="col-xs-6 content_infoCiudad" id="content_info_ciudad">
                            <label class="label_" for="ciudad" style="margin-left: 25px;">Ciudad</label>
                            <div class="form-group infoCiudadGroup" id="infoCiudad_group">
                                <input type="text" class="form-control ciudad" name="ciudad" id="ciudad"  required autofocus> 
                            </div>
                        </div>
                        <div class="col-xs-6 content_infoFecha" id="content_info_fecha">
                            <label class="label_" for="fecha">Nacimiento</label>
                            <div class="form-group infoFechaGroup" id="infoFecha_group">
                                <input type="date" class="form-control fecha" name="fecha" id="fecha"  required autofocus> 
                            </div>
                        </div>
                    </div>
                    <label for="genero" style="margin-top: 5px; margin-left: 30px;">Genero</label>
                    <div class="row form-group generoUserGroup" id="generoUser_group" style="position: relative; ;left: 10px;">
                        <div class="col-xs-6" style="position: relative; left: 60px;">
                            <div class="col-xs-6"> <input type="radio" class="form-control generoMUser" name="genero" id="generoMUser" value="M" required autofocus> </div>
                            <div class="col-xs-6 content_label"> <label> M </label> </div>
                        </div>
                        <div class="col-xs-6" style="position: relative; left: -15px;">
                            <div class="col-xs-6"> <input type="radio" class="form-control generoFUser" name="genero" id="generoFUser" value="F" required autofocus>  </div>
                            <div class="col-xs-6 content_label"> <label> F </label> </div>
                        </div>
                    </div>
                    <a class="btn btn-block btnRegistrarme" type="submit" id="btn_registrarme" href="#" onclick="regi.registrar();"></a>

                </form>
                <div class="col-xs-12 imgLogoR" id="img_logoR"></div>
            </div> 
            
        </div>
        
    </div>
    
</body>
</html>