<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍞 Painel do Funcionário</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>🍞 Painel do Funcionário - Gerenciar Produtos</h1>
        <nav>
            <a href="index.php">🏠 Ver Cardápio (Cliente)</a>
            <a href="painel_admin.php">📋 Gerenciar Produtos</a>
            <a href="create.php">➕ Adicionar Produto</a>
            <a href="read_usuarios.php">👥 Gerenciar Usuários</a>
        </nav>
    </header>

    <main>
        <section class="admin-panel">
            <h2>Gerenciar Produtos</h2>
            
            <?php
            $sql = "SELECT p.*, u.nome as nome_usuario FROM produtos p 
                    JOIN usuarios u ON p.id_usuario = u.id_usuario 
                    ORDER BY p.nome";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1' cellpadding='8' cellspacing='0'>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Responsável</th>
                        <th>Ações</th>
                    </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id_produto']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['descricao']}</td>
                            <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
                            <td>{$row['quantidade_estoque']}</td>
                            <td>{$row['nome_usuario']}</td>
                            <td>
                                <a href='update.php?id={$row['id_produto']}'>Editar</a> | 
                                <a href='delete.php?id={$row['id_produto']}' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                            </td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhum produto cadastrado.</p>";
            }
            ?>

            <div class="acoes-admin">
                <a href="create.php" class="btn-novo">➕ Adicionar Novo Produto</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Painel Administrativo - Padaria Bumba-meu-Pão</p>
    </footer>
</body>
</html>
