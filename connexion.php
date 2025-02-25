
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_cafe";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
