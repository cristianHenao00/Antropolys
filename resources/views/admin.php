<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin antropolys</title>
        <link rel="icon" type="image/png" href="../../resources/assets/pix/favico.png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta http-equiv="cache-control" content="no-cache"/>
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        
        <link rel="stylesheet" href="../../resources/css/admin.css">
    </head>
    
    <body  id="body_juego" onload="" class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">A</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Antrópolys</b>Admin</span>
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
                                    <span class="hidden-xs">Administrador</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="https://www.holamascota.com/publicaciones/css/admin/img/user.png" class="img-circle" alt="User Image">
                                        <p>
                                           
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
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="https://www.holamascota.com/publicaciones/css/admin/img/user.png"" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Administrador</p>
                            <a href="#">
                                <i class="fa fa-circle text-success"></i> 
                                Online
                            </a>
                        </div>
                    </div>
                    
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENÚ NAVEGACIÓN</li>
                        <li class="preguntas">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> 
                                <span>PREGUNTAS</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                            </ul>
                        </li>
                        <li class="crear">
                            <a href="#">
                                <i class="fa fa-files-o"></i> 
                                <span>Crear</span>
                            </a>
                        </li>
                        <li class="modificar">
                            <a href="#">
                                <i class="fa fa-th"></i> 
                                <span>Modificar</span>
                            </a>
                        </li>
                        <li class="eliminar">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i> 
                                <span>Eliminar</span>
                            </a>
                        </li>
                        <li class="reportes">
                            <a href="#">
                                <i class="fa fa-laptop"></i> 
                                <span>REPORTES</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href=""><i class="fa fa-circle-o"></i> Juegos</a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> Respuestas</a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> Eliminar</a></li>
                            </ul>
                        </li>
                        <li class="jugadores">
                            <a href="#">
                                <i class="fa fa-edit"></i> 
                                <span>JUGADORES</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                            </ul>
                        </li>
                        <li class="reportes">
                            <a href="#">
                                <i class="fa fa-table"></i> 
                                <span>Ranking</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="vista_content">
                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        REPORTES <span>|</span>
                    </h1>
                </section>

                <div class="container row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active"><a href="#">Respuestas</a></li>
                            <li role="presentation"><a href="#">Juegos</a></li>
                        </ul>
                    </div>
                </div>
                
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
       
        
        <script>
         
                
        </script>
    </body>

</html>
