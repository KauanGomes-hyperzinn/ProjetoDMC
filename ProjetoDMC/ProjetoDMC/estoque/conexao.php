<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'bd_construcao';

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
