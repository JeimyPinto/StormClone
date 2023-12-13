<?php

//Crear coneccion
$conn = new mysqli('localhost', 'root', '', 'gps');

//verificar conexion a la base de datos
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
