<?php
include 'db.php';

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Produtos</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nome']}</td>
                <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
                <td>{$row['quantidade']}</td>
                <td>
                    <form method='POST' action='update.php' style='display:inline;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit'>Editar</button>
                    </form>
                    <form method='POST' action='delete.php' style='display:inline;' onsubmit=\"return confirm('Tem certeza que deseja excluir?');\">
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit'>Excluir</button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum produto encontrado.</p>";
}

$conn->close();

echo "<br><a href='create.php'>Cadastrar novo Produto</a>";
?>
