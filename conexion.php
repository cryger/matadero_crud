<?php
// 1. Conexion con el servidor y la base de datos
$conexion = new mysqli('localhost', 'root', '', 'matadero');
if ($conexion->connect_errno) {
    echo "ERROR al conectar con la DB.";
    exit;
}

// 2. isset() del boton login
if(isset($_POST['login'])){

    // 3. Variables $_POST[]
    $u = $_POST['usuario'];
    $c = $_POST['password']; // La función MD5() estará encriptando lo ingresado para comparar con lo guardado

    if($u == "" || $_POST['password'] == null){ // Validamos que ningún campo quede vacío
        echo "<script>alert('Error: usuario y/o clave vacios!!');</script>"; // Se utiliza Javascript dentro de PHP
    }else{
        // 4. Cadena de SQL
        $sql = "SELECT * FROM usuario WHERE usu_correo = '$u' AND usu_password = '$c'";

        // 5. Ejecuto cadena query()
        if(!$consulta = $conexion->query($sql)){
            echo "ERROR: no se pudo ejecutar la consulta!";
        }else{

            // 6. Cuento registros obtenidos del select. 
            // Como el nombre de usuario en la clave primaria no debería de haber mas de un registro con el mismo nombre.
            $filas = mysqli_num_rows($consulta);

            // 7. Comparo cantidad de registros encontrados
            if($filas == 0){
                echo "<script>alert('Error: usuario y/o clave incorrectos!!');</script>";
            }else{
                header('location:index.php'); // Si está todo correcto redirigimos a otra página
            }

        }
    }
}