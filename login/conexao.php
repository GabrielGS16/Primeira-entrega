<?php

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';
$port = 3309;

try {
    //conector com o banco de dados 
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8", $usuario, $senha);
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch (PDOException $e) {
    die("Falha ao conectar no banco de dados: " . $e->getMessage());
}