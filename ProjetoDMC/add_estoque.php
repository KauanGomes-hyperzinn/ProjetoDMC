<?php
// add_estoque.php

// Configurações do banco
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "bd_construcao";

// Conexão com MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe dados do POST
$produto = $_POST['produto'];          // nome do produto
$marca = $_POST['marca'];              // marca do produto
$quantidade = (int)$_POST['quantidade'];
$deposito = $_POST['deposito'];        // nome do depósito
$data = $_POST['data'];                // data no formato 'YYYY-MM-DD'

// Primeiro, precisamos buscar o cd_produto e cd_deposito baseado no nome (suposição)
$sqlProduto = "SELECT cd_produto FROM tb_produto WHERE nm_produto = ? AND nm_marca_produto = ?";
$stmtProduto = $conn->prepare($sqlProduto);
$stmtProduto->bind_param("ss", $produto, $marca);
$stmtProduto->execute();
$resultProduto = $stmtProduto->get_result();

if ($resultProduto->num_rows == 0) {
    die("Produto não encontrado no banco.");
}

$produtoData = $resultProduto->fetch_assoc();
$cd_produto = $produtoData['cd_produto'];

// Buscar depósito
$sqlDeposito = "SELECT cd_deposito FROM tb_deposito WHERE nm_deposito = ?";
$stmtDeposito = $conn->prepare($sqlDeposito);
$stmtDeposito->bind_param("s", $deposito);
$stmtDeposito->execute();
$resultDeposito = $stmtDeposito->get_result();

if ($resultDeposito->num_rows == 0) {
    die("Depósito não encontrado no banco.");
}

$depositoData = $resultDeposito->fetch_assoc();
$cd_deposito = $depositoData['cd_deposito'];

// Agora, inserimos na tabela tb_estoque
$sqlInsert = "INSERT INTO tb_estoque (qt_estoque, dt_estoque, cd_produto, cd_deposito) VALUES (?, ?, ?, ?)";
$stmtInsert = $conn->prepare($sqlInsert);
$stmtInsert->bind_param("isii", $quantidade, $data, $cd_produto, $cd_deposito);

if ($stmtInsert->execute()) {
    echo "Estoque adicionado com sucesso!";
    // Redirecionar para dashboard ou estoque, por exemplo:
    header("Location: dashboard.php");
    exit;
} else {
    echo "Erro ao adicionar estoque: " . $conn->error;
}

$conn->close();
?>
