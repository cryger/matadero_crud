<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$ven_id = $_GET['ven_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM venta WHERE ven_id=$ven_id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");