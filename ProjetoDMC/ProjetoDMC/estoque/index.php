<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Estoque</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Estoque</h1>

    <!-- FORMULÁRIO PARA INSERIR -->
    <form action="criar.php" method="POST" class="bg-white p-4 rounded shadow-md mb-6 max-w-3xl">
        <div class="grid grid-cols-2 gap-4">
            <input name="produto" class="border px-2 py-1 rounded" placeholder="Código do Produto" required>
            <input name="deposito" class="border px-2 py-1 rounded" placeholder="Código do Depósito" required>
            <input type="number" name="quantidade" class="border px-2 py-1 rounded" placeholder="Quantidade" required>
            <input type="date" name="data" class="border px-2 py-1 rounded" required>
        </div>
        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Adicionar Estoque</button>
    </form>

    <!-- TABELA DE ESTOQUE -->
    <table class="min-w-full bg-white border rounded shadow-md">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Código</th>
                <th class="px-4 py-2">Produto</th>
                <th class="px-4 py-2">Depósito</th>
                <th class="px-4 py-2">Quantidade</th>
                <th class="px-4 py-2">Data</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tb_estoque";
            $resultado = $conn->query($sql);

            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr class='border-t'>";
                echo "<td class='px-4 py-2'>{$linha['cd_estoque']}</td>";
                echo "<td class='px-4 py-2'>{$linha['cd_produto']}</td>";
                echo "<td class='px-4 py-2'>{$linha['cd_deposito']}</td>";
                echo "<td class='px-4 py-2'>{$linha['qt_estoque']}</td>";
                echo "<td class='px-4 py-2'>{$linha['dt_estoque']}</td>";
                echo "<td class='px-4 py-2'>
                        <a href='atualizar.php?id={$linha['cd_estoque']}' class='text-blue-600'>Editar</a> | 
                        <a href='deletar.php?id={$linha['cd_estoque']}' class='text-red-600'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
