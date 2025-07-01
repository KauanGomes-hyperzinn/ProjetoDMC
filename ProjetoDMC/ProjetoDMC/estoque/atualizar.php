<?php
include 'conexao.php';

$produto = $_POST['produto'];
$deposito = $_POST['deposito'];
$quantidade = $_POST['quantidade'];
$data = $_POST['data'];

$sql = "INSERT INTO tb_estoque (qt_estoque, dt_estoque, cd_produto, cd_deposito)
        VALUES ('$quantidade', '$data', '$produto', '$deposito')";

$conn->query($sql);
header("Location: index.php");
?>
