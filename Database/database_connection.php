<?php
$servername = "localhost:3306";
$username = "usu@AderenciaGre";
$password = "aderenciagrepassword";
$database = "aderencia_gre";

$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');
