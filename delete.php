<?php

include 'db.php';

// Verificar se o ID foi fornecido
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID não fornecido!");
}

$id = (int)$_GET['id'];

if ($id <= 0) {
    die("ID inválido!");
}

// Verificar se o produto existe antes de excluir
$sql = "SELECT * FROM produtos WHERE id_produto = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Produto não encontrado!");
}

// Excluir o produto
$sql = "DELETE FROM produtos WHERE id_produto = $id";

if ($conn->query($sql) === TRUE) {
    echo "Produto excluído com sucesso! 
        <a href='read.php'>Ver registros.</a>";
} else {
    echo "Erro ao excluir: " . $conn->error;
}
$conn->close();
exit();
