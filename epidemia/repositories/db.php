<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "epidemia";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}else {
    echo "<h1>Connected to database</h1>";
}

?>