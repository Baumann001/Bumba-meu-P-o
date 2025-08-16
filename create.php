<?php
include 'db.php';

// Buscar usuários para o dropdown
$usuarios_result = $conn->query("SELECT id_usuario, nome FROM usuarios ORDER BY nome");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se todos os campos foram enviados
    if (isset($_POST['nome'], $_POST['descricao'], $_POST['preco'], $_POST['quantidade_estoque'], $_POST['id_usuario'])) {
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
        $preco = floatval($_POST['preco']);
        $quantidade = intval($_POST['quantidade_estoque']);
        $id_usuario = intval($_POST['id_usuario']);

        // Validar valores
        if (empty($nome) || empty($descricao) || $preco < 0 || $quantidade < 0 || $id_usuario < 1) {
            echo "<div class='error'>Erro: Todos os campos são obrigatórios e valores devem ser positivos.</div>";
        } else {
            $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade_estoque, id_usuario) 
                    VALUES ('$nome', '$descricao', $preco, $quantidade, $id_usuario)";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='success'>Produto cadastrado com sucesso! <a href='painel_admin.php'>Ver produtos</a></div>";
            } else {
                echo "Erro: " . $conn->error;
            }
        }
    } else {
                echo "<div class='error'>Erro: Todos os campos são obrigatórios.</div>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>➕ Cadastrar Novo Produto</h1>
    </header>

    <main>
        <form method="POST" action="create.php">
            <label>Nome do Produto:</label>
            <input type="text" name="nome" required><br><br>

            <label>Descrição:</label>
            <textarea name="descricao" required></textarea><br><br>

            <label>Preço (R$):</label>
            <input type="number" step="0.01" name="preco" min="0" required><br><br>

            <label>Quantidade em Estoque:</label>
            <input type="number" name="quantidade_estoque" min="0" required><br><br>

            <label>ID do Usuário Responsável:</label>
            <select name="id_usuario" required>
                <option value="">Selecione um usuário</option>
                <?php
                if ($usuarios_result->num_rows > 0) {
                    while ($usuario = $usuarios_result->fetch_assoc()) {
                        echo "<option value='{$usuario['id_usuario']}'>{$usuario['nome']}</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum usuário cadastrado</option>";
                }
                ?>
            </select><br><br>

            <input type="submit" value="Cadastrar Produto">
        </form>
    </main>
</body>
</html>
