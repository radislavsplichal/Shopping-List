<?php
$servername = "localhost";
$username = "shopper";
$password = "RwEPqQcnaPMeTnbx";
$dbname = "shoppinglistDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo '<div class="alert alert-danger" role="alert">'."Error: " . $sql . "<br>" . $conn->error;
} 
 echo '<div class="alert alert-success" role="alert">Spojení s databází bylo navázáno.</div>';

//$conn->close();
?>