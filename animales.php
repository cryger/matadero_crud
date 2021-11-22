<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysqli_query("SELECT * FROM animal "); // mysql_query is deprecated
//$result = mysqli_query($mysqli, "SELECT  a.ani_id,a.ani_nombre,a.ani_color,a.ani_raza, a.ani__altura, a.ani_peso, a.ani_cli_id,c.cli_id FROM animal as a, cliente as c where a.cli_id = c.cli_id"); // using mysqli_query instead
$result = mysqli_query($mysqli, "SELECT * FROM animal ORDER BY ani_id DESC"); // using mysqli_query instead

//including the database connection file
// include_once("config.php");

if (isset($_POST['Submit'])) {
    $ani_id = mysqli_real_escape_string($mysqli, $_POST['ani_id$ani_id']);
    $ani_nombre = mysqli_real_escape_string($mysqli, $_POST['ani_nombre']);
    $ani_color = mysqli_real_escape_string($mysqli, $_POST['ani_color']);
    $ani_raza = mysqli_real_escape_string($mysqli, $_POST['ani_raza']);
    $ani_altura = mysqli_real_escape_string($mysqli, $_POST['ani_altura']);
    $ani_peso = mysqli_real_escape_string($mysqli, $_POST['ani_peso']);

    // checking empty fields
    if (empty($ani_id) || empty($ani_nombre) || empty($ani_color) || empty($ani_raza) || empty($ani_altura) || empty($ani_peso)) {

        if (empty($ani_id)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }

        if (empty($ani_nombre)) {
            echo "<font color='red'>Nombre field is empty.</font><br/>";
        }

        if (empty($ani_color)) {
            echo "<font color='red'>Apellido field is empty.</font><br/>";
        }
        if (empty($ani_raza)) {
            echo "<font color='red'>Correo field is empty.</font><br/>";
        }
        if (empty($ani_altura)) {
            echo "<font color='red'>Direccion field is empty.</font><br/>";
        }
        if (empty($ani_peso)) {
            echo "<font color='red'>Telefono field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty) 

        //insert data to database	
        $result = mysqli_query($mysqli, "INSERT INTO animal(ani_id,ani_nombre,ani_color,ani_raza,ani_altura,cli_telefono) VALUES('$ani_id','$ani_nombre','$ani_color','$ani_raza','$ani_altura','$ani_peso','')");
        var_dump($reesul);
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
    <title>LuigSa | Animales</title>

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
                            <h1>LISTADO DE ANIMALES</h1>
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
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered table-hover">
                                        <thead>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModalLong">
                                                Agregar Animal
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Agregar
                                                                Animal</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="animales.php">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="ani_id">ID</label>
                                                                            <input type="text" class="form-control"
                                                                                id="ani_id" aria-describedby="emailHelp"
                                                                                placeholder="Ingrese ID">

                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="ani_nombre">Nombre</label>
                                                                            <input type="text" class="form-control"
                                                                                id="ani_nombre"
                                                                                aria-describedby="emailHelp"
                                                                                placeholder="Ingrese Nombre">

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="ani_color">Color</label>
                                                                            <input type="text" class="form-control"
                                                                                id="ani_color"
                                                                                aria-describedby="emailHelp"
                                                                                placeholder="Ingrese Color">

                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="ani_raza">Raza</label>
                                                                            <input type="text" class="form-control"
                                                                                id="ani_raza"
                                                                                aria-describedby="emailHelp"
                                                                                placeholder="Ingrese ingrese raza">

                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="ani_altura">Altura</label>
                                                                            <input type="text" class="form-control"
                                                                                id="ani_altura"
                                                                                aria-describedby="emailHelp"
                                                                                placeholder="Ingrese Altura">

                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="ani_peso">Peso</label>
                                                                            <input type="text" class="form-control"
                                                                                id="ani_peso"
                                                                                aria-describedby="emailHelp"
                                                                                placeholder="Ingrese Peso">

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="ani_cli_id">Id Cliente</label>
                                                                            <input type="text" class="form-control"
                                                                                id="ani_cli_id"
                                                                                aria-describedby="emailHelp"
                                                                                placeholder="Ingrese Id CLiente">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">agregar</button>


                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cerrar</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">agregar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                </div>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>COLOR</th>
                                    <th>RAZA</th>
                                    <th>ALTURA</th>
                                    <th>PESO</th>
                                    <th>ID CLIENTE</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <?php
                                        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                                        while ($res = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $res['ani_id'] . "</td>";
                                            echo "<td>" . $res['ani_nombre'] . "</td>";
                                            echo "<td>" . $res['ani_color'] . "</td>";
                                            echo "<td>" . $res['ani_raza'] . "</td>";
                                            echo "<td>" . $res['ani_altura'] . "</td>";
                                            echo "<td>" . $res['ani_peso'] . "</td>";
                                            echo "<td>" . $res['ani_cli_id'] . "</td>";
                                            echo "<td><a class='btn btn-warning' href=\"edit_animal.php?ani_id=$res[ani_id]\">Edit</a> | <a class='btn btn-danger' href=\"delete_animal.php?ani_id=$res[ani_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                        }
                                        ?>
                                    </tr>
                                </tbody>


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