<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM venta ORDER BY ven_id DESC"); // using mysqli_query instead
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
                            <h1>LISTADO DE CLIENTES</h1>
                        </div>

                    </div>
                </div>
            </section>
            <!-- /SECTION TITLE -->

            <!-- MAIN CONTENT -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        DataTable with minimal features & hover style
                                    </h3>
                                </div>
                                <div class="col-sm-6">
                                    <a href="add.php" type="button" class="btn btn-success">Add New Data</a><br /><br />
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ID empleado</th>
                                                <th>Id Animal</th>
                                                <th>Id pedido</th>
                                                <th>Fecha de venta</th>
                                                <th>Descripcion</th>
                                                <th>SUbtotal de Venta</th>
                                                <th>Total de Venta</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <?php
                                                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                                                while ($res = mysqli_fetch_array($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $res['ven_id'] . "</td>";
                                                    echo "<td>" . $res['ven_empl_id'] . "</td>";
                                                    echo "<td>" . $res['ven_ani_id'] . "</td>";
                                                    echo "<td>" . $res['ven_ped_id'] . "</td>";
                                                    echo "<td>" . $res['ven_fecha_venta'] . "</td>";
                                                    echo "<td>" . $res['ven_descripcion'] . "</td>";
                                                    echo "<td>" . $res['ven_subtotal'] . "</td>";
                                                    echo "<td>" . $res['ven_total'] . "</td>";
                                                    echo "<td><a class='btn btn-warning' href=\"edit_venta.php?ven_id=$res[ven_id]\">Edit</a> | <a class='btn btn-danger' href=\"delete_venta.php?ven_id=$res[ven_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                                }
                                                ?>
                                            </tr>
                                        </tbody>

                                        <!-- <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>NOMBRE</th>
                                                <th>APELLIDO</th>
                                                <th>CORREO</th>
                                                <th>DIRECCION</th>
                                                <th>TELEFONO</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>



                                </div>

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /MAIN CONTENT -->
        </main>

        <!-- FOOTER -->
        <footer class="main-footer">
            <strong>Copyright ?? 2021
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
                [10, 25, 50, "All"]
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