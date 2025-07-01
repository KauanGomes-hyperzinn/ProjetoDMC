<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM tb_estoque WHERE cd_estoque = $id";
$conn->query($sql);

header("Location: index.php");
?>
