<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbase="cactidatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbase);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>