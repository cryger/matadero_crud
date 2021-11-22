<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$cli_id = $_GET['cli_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM cliente WHERE cli_id=$cli_id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>