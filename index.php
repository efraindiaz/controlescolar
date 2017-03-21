<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        html, body
            {
                height: 100%;
            }
            #wrapper{
                height: 100%;
            }
            #page-wrapper{
                min-height: 100%;
            }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Control Escolar</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <!-- GESTIONAR CICLO ESCOLAR -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Gestionar Ciclo Escolar <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Agregar ciclo escolar</a>
                            </li>
                            <li>
                                <a href="#">Editar ciclo escolar</a>
                            </li>
                        </ul>
                    </li>
                    <!-- FIN GESTIONAR CICLO ESCOLAR -->

                     <!-- GESTIONAR PERIODO CUATRIMESTRAL-->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#opc-GPerCua"><i class="fa fa-fw fa-arrows-v"></i> Gestionar Periodo <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="opc-GPerCua" class="collapse">
                            <li>
                                <a id="" href="javascript:;">Alta Periodo</a>
                            </li>
                            <li>
                                <a href="#">Editar Periodo</a>
                            </li>
                            <li>
                                <a href="">Asignar Materias</a>
                            </li>
                        </ul>
                    </li> 
                    <!-- FIN PERIODO CUATRIMESTRAL-->     

                    <!-- GESTIONAR -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#opc-GP"><i class="fa fa-fw fa-arrows-v"></i> Gestionar Alumno <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="opc-GP" class="collapse">
                            <li>
                                <a href="#">Inscripcion</a>
                            </li>
                            <li>
                                <a href="#">Reinscripcion</a>
                            </li>
                            <li>
                                <a href="">Editar Alumno</a>
                            </li>
                        </ul>
                    </li> 
                    <!-- FIN -->
                    <!-- GESTIONAR -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#opc-EJ"><i class="fa fa-fw fa-arrows-v"></i> Ejemplo <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="opc-EJ" class="collapse">
                            <li>
                                <a id="formulario" href="javascript:;">Formulario</a>
                            </li>
                            <li>
                                <a id="busqueda" href="javascript:;">Busqueda</a>
                            </li>                            
                        </ul>
                    </li> 
                    <!-- FIN -->                       
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div id="render" class="container-fluid">

                <p>Page wrapper contenido</p>
                <?php require_once('controller/ControladorIndex.php'); ?>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>

    <script src="public/js/ajax.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="public/js/plugins/morris/raphael.min.js"></script>
    <script src="public/js/plugins/morris/morris.min.js"></script>
    <script src="public/js/plugins/morris/morris-data.js"></script>

</body>

</html>