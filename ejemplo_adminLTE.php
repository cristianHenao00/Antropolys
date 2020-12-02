<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Jugar</title>
        <link rel="icon" type="image/png" href="//danielasierra.com.co/img/logo_black.png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta http-equiv="cache-control" content="no-cache"/>
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/jquery-confirm.css">
    </head>
    <?php
        session_start();
        if(array_key_exists('data_user_bingo', $_SESSION) && $_SESSION['data_user_bingo'] 
                 && array_key_exists('rol', $_SESSION['data_user_bingo']) && $_SESSION['data_user_bingo']['rol'] == "jugador"){
            ?>
    <body  id="body_jugar" onload="c_ad_jugar.llenar_tabla();" class="hold-transition skin-blue sidebar-mini">
        <div id="overlay">
            <div id="text"  style="text-align: center;">Pere tantico</div>
        </div>
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">B</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">BINGO</span>
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
                                    <img src="https://www.holamascota.com/publicaciones/css/admin/img/user.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $_SESSION['data_user_bingo']['nombre']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="https://www.holamascota.com/publicaciones/css/admin/img/user.png" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $_SESSION['data_user_bingo']['nombre']; ?>
                                            <small><?php echo $_SESSION['data_user_bingo']['rol']; ?></small>
                                        </p>
                                    </li>

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="salir.php" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">Menú</li>
                        <li class="Jugando">
                            <a href="#">
                                <i class="fa fa-calculator"></i> <span>Jugando</span>
                            </a>
                        </li>
                        <li>
                            <a href="ranking.php">
                                <i class="fa fa-group"></i> <span>Mejores jugadores</span>
                            </a>
                        </li>
                        <li>
                            <a href="list_juegos.php">
                                <i class="fa fa-gamepad"></i> <span>Lista de juegos</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="vista_content">
                <audio id="sonido" controls autoplay style="display: none;">
                    <source type="audio/mpeg" src="song/notification.mp3">
                </audio>
                <!-- Content Header (Page header) -->
                <div class="container row">
                    <div class="col-sm-12">
                        <?php echo '<h3 id="h3_titulo">Hola '.$_SESSION['data_user_bingo']['nombre'].' </h3>';?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="num_generado" >0</div>
                    <div class="col-sm-6" id="" >
                        <table class="table table-bordered" id="tablero_principal">
                            <thead>
                                <tr>
                                    <th>B</th>
                                    <th>I</th>
                                    <th>N</th>
                                    <th>G</th>
                                    <th>O</th>
                                </tr>
                            </thead>
                            <tbody id="tabla1">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4" >
                        Ha salido
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th style="color: #269abc">B</th>
                                    <th style="color: #d58512">I</th>
                                    <th style="color: #828282">N</th>
                                    <th style="color: red">G</th>
                                    <th style="color: green">O</th>
                                </tr>
                            </thead>
                            <tbody id="table_lista_bingo">

                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="btn btn-danger"><a href="salir.php">Salir</a></button>
                <button type="button" class="btn btn-info"><a href="elegir.php">Nuevo juego</a></button>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.13
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
                reserved.
            </footer>

            
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- FastClick -->
        <script src="https://adminlte.io/themes/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
        <script src="js/jquery-confirm.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/redirect.js"></script>
        
        <script src="js/admin_jugar.js?n=0"></script>
        <script src="js/jugador.js?n=0"></script>
        
        <script>
            <?php 
            if($_POST && array_key_exists('b_carton', $_POST)){?>
                var b_carton = "<?php echo $_POST['b_carton']; ?>";
                var i_carton = "<?php echo $_POST['i_carton']; ?>";
                var n_carton = "<?php echo $_POST['n_carton']; ?>";
                var g_carton = "<?php echo $_POST['g_carton']; ?>";
                var o_carton = "<?php echo $_POST['o_carton']; ?>";
                var id_jugador = "<?php echo $_SESSION['data_user_bingo']['iduser']; ?>";
                jugador_a.llenar_tabla_jugar();
            <?php
            }
            ?>
                
        </script>
    </body>
    <?php
        }else{
            echo '<h2>No tiene permisos de jugador</h2>';
            header("Location: salir.php");
            exit;
        }
        ?>
</html>
