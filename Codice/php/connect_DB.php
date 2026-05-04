<?php
$host = "localhost";
$user = "root";
$password = "";
$name = "wallet";
$port = 3306;

$conn = new mysqli($host, $user, $password, $name, $port);

if($conn->connect_error){
    echo "Errore nella connessione con il database";
}
?>