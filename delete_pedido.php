<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$ped_id = $_GET['ped_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM pedido WHERE ped_id=$ped_id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");