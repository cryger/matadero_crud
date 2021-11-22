<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$ani_id = $_GET['ani_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM animal WHERE ani_id=$ani_id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");