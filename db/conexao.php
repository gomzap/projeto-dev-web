<?php
// Arquivo: /db/conexao.php

$host = 'localhost';
$dbname = 'gtech_db';
$usuario = 'root'; // Padrão do XAMPP/WAMP
$senha = '';       // Padrão do XAMPP/WAMP (vazio)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>