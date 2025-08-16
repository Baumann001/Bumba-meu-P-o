<?php
include 'db.php';

// Validação simples do ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die("ID inválido!");
}

// Buscar o produto
$sql = "SELECT * FROM produtos WHERE id_produto = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!$row) {
    die("Produto não encontrado!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pegar os dados do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $preco = (float)$_POST['preco'];
    $quantidade = (int)$_POST['quantidade'];

    // Atualizar o produto
    $sql = "UPDATE produtos SET nome = '$nome', descricao = '$descricao', preco = $preco, quantidade_estoque = $quantidade WHERE id_produto = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso! 
        <a href='read.php'>Ver registros.</a>";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
    $conn->close();
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
</head>
<body>
    <h2>Atualizar Produto</h2>
    
    <form method="POST" action="update.php?id=<?php echo $id; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
        <br><br>
        
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required><?php echo $row['descricao']; ?></textarea>
        <br><br>
        
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" value="<?php echo $row['preco']; ?>" required>
        <br><br>
        
        <label for="quantidade">Quantidade em Estoque:</label>
        <input type="number" name="quantidade" value="<?php echo $row['quantidade_estoque']; ?>" required>
        <br><br>
        
        <input type="submit" value="Atualizar">
        <a href="read.php">Cancelar</a>
    </form>
</body>
</html>
