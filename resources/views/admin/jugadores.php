<!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Jugadores</title>
        <link rel="icon" type="image/png" href="../../../resources/assets/pix/favico.png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta http-equiv="cache-control" content="no-cache"/>
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        
        <link rel="stylesheet" href="../../../resources/css/admin.css">
        <link rel="stylesheet" href="../../../resources/css/tostadas/pnotify.brighttheme.css">
        <link rel="stylesheet" href="../../../resources/css/tostadas/pnotify.buttons.css">
        <link rel="stylesheet" href="../../../resources/css/tostadas/pnotify.css">
        <link rel="stylesheet" href="../../../resources/css/datatables.css">

        <script src="../../js/tostadas/pnotify.js"></script>
        <script src="../../js/tostadas/pnotify.animate.js"></script>
        <script src="../../js/tostadas/pnotify.buttons.js"></script>
        <script src="../../js/tostadas/mensajes.js"></script>
        
        <script src="../../js/admin/admin.js"></script>
        <style>
            .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, 
            .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, 
            .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td,
            .table-bordered{
                border: 1px solid #8e3cbc;
            }
        </style>
        
    </head>
    
    <body  id="body_juego" onload="pre.list_jugadores()" class="hold-transition skin-blue sidebar-mini">
        <?php session_start();?>
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">A</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Antr??polys</b>Admin</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="../../assets/imagenes_nuevas/PNG/avatar_00.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Administrador</span>
                                </a>
                                
                            </li>
                            
                        </ul>
                    </div>
                   
                </nav>
                 
            </header>
            
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MEN?? NAVEGACI??N</li>
                        
                        <li class="preguntas">
                            <a href="preguntas.php">
                                <i class="fa fa-question-circle"></i> 
                                <span>PREGUNTAS</span>
                            </a>
                        </li>                     
                        <li class="jugadores active">
                            <a href="#">
                                <i class="fa fa-users"></i> 
                                <span>JUGADORES</span>
                            </a>
                        </li>
                        <li class="jugadores">
                            <a href="partidas.php">
                                <i class="fa fa-gamepad"></i> 
                                <span>PARTIDAS</span>
                            </a>
                        </li>
                        <li class="jugadores">
                            <a href="respuestas.php">
                                <i class="fa fa-tasks"></i> 
                                <span>RESPUESTAS</span>
                            </a>
                        </li>
                        <li class="jugadores">
                            <a href="https://antropolys.com/">
                                <i class="fa fa-reply-all"></i> 
                                <span>SALIR</span>
                            </a>
                        </li>
                        
                    </ul>
                </section>
                
            </aside>

            <?php
        session_start();
        
        if (array_key_exists('data_user_antropolys', $_SESSION) && $_SESSION['data_user_antropolys'] 
                && array_key_exists('rol', $_SESSION['data_user_antropolys']) && $_SESSION['data_user_antropolys']['rol'] == "administrador") {
            
            //echo '<button type="button" class="btn btn-success">Crear Juego</button>';
            ?>
            <div class="content-wrapper" id="vista_content">
                <br>
            <?php    echo '<h3>Hola Admin ' . $_SESSION['data_user_antropolys']['nombre'] . '</h3>';?>
                <div class="col-sm-12" id="content_question">
                    <h3>Jugadores</h3>
                    <table class="table table-striped table-bordered" id="jugadores">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Nacimiento</th>
                            <th scope="col">Jugados</th>
                            <th scope="col">Ganados</th>
                          </tr>
                        </thead>
                        <tbody id="list_preguntas">

                        </tbody>
                    </table>
                </div>

                
                    
            </div>
            <?php
            
        } else {
            echo '<h2>No tiene permisos de admin</h2>';
            header("Location: https://antropolys.com/index.php");
        }
        ?>

            
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- FastClick -->
        <script src="https://adminlte.io/themes/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
       
        <script src="../../js/datatables.min.js"></script>
        
    </body>

</html>
