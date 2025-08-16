<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍞 Cardápio da Padaria - Cliente</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>🍞 Cardápio da Padaria Bumba-meu-Pão</h1>
        <p>Cliente - Escolha seus produtos favoritos</p>
    </header>

    <main>
        <section class="cardapio-cliente">
            <?php
            $sql = "SELECT * FROM produtos WHERE quantidade_estoque > 0 ORDER BY nome";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='produtos-grid'>";
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="produto-card-cliente">
                        <h3><?php echo htmlspecialchars($row['nome']); ?></h3>
                        <p class="descricao"><?php echo htmlspecialchars($row['descricao']); ?></p>
                        <p class="preco">R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></p>
                        <p class="estoque">Disponível: <?php echo $row['quantidade_estoque']; ?> unidades</p>
                        <button class="btn-adicionar" onclick="adicionarCarrinho(<?php echo $row['id_produto']; ?>)">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                    <?php
                }
                echo "</div>";
            } else {
                echo "<p class='mensagem-vazio'>Nenhum produto disponível no momento.</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>💡 Para gerenciar produtos, acesse a <a href="painel_admin.php">área do funcionário</a></p>
    </footer>

    <script>
        function adicionarCarrinho(idProduto) {
            alert('Produto adicionado ao carrinho! (Funcionalidade em desenvolvimento)');
        }
    </script>
</body>
</html>
