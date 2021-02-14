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
    <link href="../../resources/css/aviso.css" rel="stylesheet" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Aviso antropolys</title>
</head>
<body class="bodyAviso" id="body_aviso">
    <?php
        $user = "Camilo_64";
        $dificultad = "estrella normal";
    ?>
    <div class="container aviso" >
        <img class="imgAviso" id="img_aviso" src="../../resources/assets/imagenes_nuevas/PNG/btn_juguemos.png">
        <div class="row">
            <div class="container formContainer" id="formContainer">
                <div class="col-xs-12 content_infoAviso" id="info_aviso">
                    <div class="row">
                        <div class="col-xs-12 textAviso" id="text_aviso">
                            <p>
                                El Usuario <?php echo "<span class=\"styleUser\">$user</span>"?> ha creado un juego con dificultad <?php echo $dificultad?> desea ingresar.
                            </p>
                        </div>
                    </div>
                    <div class="row contentBtns" id="content_btns">
                        <div class="col-xs-3"> <a class="btn btn-block btnNo" type="submit" id="btn_no" href=""></a> </div>
                        <div class="col-xs-3"> <a class="btn btn-block btnSi" type="submit" id="btn_si" href=""></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>