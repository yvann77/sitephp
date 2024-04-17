<?php
$host = "localhost";  
$user = "root";  
$password = "root";
$database = "site";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_errno) {
    echo "Échec de la connexion à la base de données MySQL: " . $mysqli->connect_error;
    exit();
}
?>