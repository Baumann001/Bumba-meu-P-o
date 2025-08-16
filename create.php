<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
};
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>
    <form method="POST" action="create.php" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" min="0" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" min="0" required>

        

        <input type="submit" value="Cadastrar">
    </form>
    <a href="read.php">Ver produtos.</a>
</body>
</html>