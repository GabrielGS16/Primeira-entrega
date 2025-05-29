<?php

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';
$port = 3309;

$mysqli = new mysqli($host, $usuario, $senha, $database,$port);

if ($mysqli->connect_error) {
    die("Falha ao conectar no banco de dados: " . $mysqli->connect_error);
}
