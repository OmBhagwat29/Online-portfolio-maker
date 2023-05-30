<?php

$username = "root";
$password = "";
$server = "localhost";
$db = "ome";

$con = mysqli_connect($server, $username, $password, $db);

if ($con) {
	// echo "Conneciton successfull";
}else{
	die("no connection". mysqli_connect_error());
}

?>