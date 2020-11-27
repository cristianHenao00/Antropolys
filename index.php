<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="pix/favico.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="css/login.css" rel="stylesheet" >
        <script src="js/ajax.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Login antropolys</title>
        <style>
        </style>
    </head>
    <body id="body_index">
        
        <div class="container">
            <div class="row">
                <div class="container" id="formContainer">

                    <form method='post' class="form-signin" id="login" role="form">
                        <label for="user"><b>Usuario</b></label>
                        <input type="text" class="form-control" name="user" id="user" placeholder="user" required autofocus>
                        <label for="pass"><b>Clave</b></label>
                        <input type="password" class="form-control" name="pass" id="celular" placeholder="***" required>
                        <div class="col-sm-6" id="dados_login"></div>
                        <div class="col-sm-6" id="btn_login">
                            <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn_entrar">Entrar</button>
                        </div>
                    </form>
                </div> <!-- /container -->
            </div>
        </div>
        <?php

        if($_POST && array_key_exists('celular', $_POST)){
            $cel = $_POST['celular'];
            echo '<script> ajax_b.query_users('.$cel.');</script>';
            
        }
        // put your code here
        ?>
            
    </body>
</html>
