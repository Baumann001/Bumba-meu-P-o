<?php
include 'db.php';

$id = $_GET['id'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST[ 'quantidade'];

    $sql = "UPDATE produtos SET name ='$name',email ='$email' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='read.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit(); 
}

$sql = "SELECT * FROM produtos WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>

    <form method="POST" action="update.php?id=<?php echo $row['id'];?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome'];?>" required>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" value="<?php echo $row['preco'];?>" required>

        <label for="quantidade">Quantidade</label>
        <input type="text" name="quantidade" value="<?php echo $row['quantidade'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>
update.php
Exibindo update.php…
Atividade 4 - Introdução a CRUD em PHP
Ícaro Botelho
•
5 de ago. (editado: 7 de ago.)
100 pontos
Data de entrega: 7 de ago., 10:15
Bom dia, pessoal.

Rodar o código e montar o seu Code Review (CR) em um arquivo DOC's.

create.php
PHP

db.php
PHP

delete.php
PHP

read.php
PHP

update.php
PHP

database_setup.sql
SQL
Comentários da turma
