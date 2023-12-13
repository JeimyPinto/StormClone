<?php

//Crear coneccion a la bbdd
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "gps";

//Crear coneccion
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar coneccion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
