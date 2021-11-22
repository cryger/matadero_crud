<?php
//including the database connection file
include_once("config.php");

if (isset($_POST['Submit'])) {
    $cli_id = mysqli_real_escape_string($mysqli, $_POST['cli_id']);
    $cli_nombre = mysqli_real_escape_string($mysqli, $_POST['cli_nombre']);
    $cli_apellido = mysqli_real_escape_string($mysqli, $_POST['cli_apellido']);
    $cli_correo = mysqli_real_escape_string($mysqli, $_POST['cli_correo']);
    $cli_direccion = mysqli_real_escape_string($mysqli, $_POST['cli_direccion']);
    $cli_telefono = mysqli_real_escape_string($mysqli, $_POST['cli_telefono']);

    // checking empty fields
    if (empty($cli_id) || empty($cli_nombre) || empty($cli_apellido) || empty($cli_correo) || empty($cli_direccion) || empty($cli_telefono)) {

        if (empty($cli_id)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }

        if (empty($cli_nombre)) {
            echo "<font color='red'>Nombre field is empty.</font><br/>";
        }

        if (empty($cli_apellido)) {
            echo "<font color='red'>Apellido field is empty.</font><br/>";
        }
        if (empty($cli_correo)) {
            echo "<font color='red'>Correo field is empty.</font><br/>";
        }
        if (empty($cli_direccion)) {
            echo "<font color='red'>Direccion field is empty.</font><br/>";
        }
        if (empty($cli_telefono)) {
            echo "<font color='red'>Telefono field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty) 

        //insert data to database	
        $result = mysqli_query($mysqli, "INSERT INTO cliente(cli_id,cli_nombre,cli_apellido,cli_correo,cli_direccion,cli_telefono) VALUES('$cli_id','$cli_nombre','$cli_apellido','$cli_correo','$cli_direccion','$cli_telefono')");

        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LuigSa</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />

    <!-- DataTables -->
    <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

    <!-- adminLTE -->
    <link rel="stylesheet" href="plugins/adminLTE/adminlte.min.css" />

    <!-- Custom css -->
    <link rel="stylesheet" href="main.css" />
</head>

<body class="sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
    <div class="wrapper _w">
        <!-- NAVBAR -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <div class="nav-item">
                <ul class="navbar-nav">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </ul>
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="./img/avatar2.png" class="user-image img-circle elevation-2" alt="User Image" />
                        <span class="d-none d-md-inline">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="./img/avatar2.png" class="img-circle elevation-2" alt="User Image" />

                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-body">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /NAVBAR -->

        <!-- SIDE_BAR -->
        <aside class="_sidebar main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="./index.html" class="brand-link">
                <img src="./img/AdminLTELogo.png" alt="LuigSa Logo" class="brand-image img-circle elevation-3"
                    style="opacity: 0.8" />
                <span class="brand-text font-weight-light">Luig<b>SA</b></span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!--  -->
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>INICIO</p>
                            </a>
                        </li>

                        <!--  -->
                        <li class="nav-item">
                            <a href="./clientes.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>CLIENTES</p>
                            </a>
                        </li>

                        <!--  -->
                        <li class="nav-item">
                            <a href="./animales.php" class="nav-link">
                                <i class="nav-icon fas fa-piggy-bank"></i>
                                <p>ANIMALES</p>
                            </a>
                        </li>

                        <!--  -->
                        <li class="nav-item">
                            <a href="./ventas.php" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>VENTAS</p>
                            </a>
                        </li>

                        <!--  -->
                        <li class="nav-item">
                            <a href="./pedidos.php" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>PEDIDOS</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- /SIDE_BAR -->

        <main class="content-wrapper">
            <!-- SECTION TITLE -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>INICIO</h1>
                        </div>
                        <div class="container">
                            <div class="form-control table table-bordered">
                                <div class="row">
                                    <label for="">AGREGAR CLIENTE</label>
                                </div>
                                <form action="add.php" method="post" name="form1">

                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" class="form-control" name="cli_id">
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="cli_nombre">
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input type="text" class="form-control" name="cli_apellido">
                                    </div>
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="text" class="form-control" name="cli_correo">
                                    </div>
                                    <div class="form-group">
                                        <label>Direccion</label>
                                        <input type="text" class="form-control" name="cli_direccion">
                                    </div>
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input type="text" class="form-control" name="cli_telefono">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-success" type="submit" name="Submit" value="Add">
                                    </div>

                                </form>

                            </div>



                        </div>
                    </div>
                </div>
            </section>
            <!-- /SECTION TITLE -->

            <!-- MAIN CONTENT -->
            <section class="content">
                <div class="container-fluid"></div>
                <!-- /.container-fluid -->
            </section>
            <!-- /MAIN CONTENT -->
        </main>

        <!-- FOOTER -->
        <footer class="main-footer">
            <strong>Copyright © 2021
                <a href="https://digitalcodegroup.com/">Digital Code Group - By Henry Garcia</a>.</strong>
            All rights reserved.
        </footer>
        <!-- /FOOTER -->
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="plugins/adminLTE/adminlte.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="./plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
    $(function() {
        $("#datatable").DataTable({
            paging: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"],
            ],
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
        });
    });
    </script>
</body>

</html>