<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $id_usuario = $_POST["id_usuario"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $data_contratacao = $_POST["data_contratacao"];
   
    $sql = " INSERT INTO usuarios (nome,email,senha_hash,telefone,endereco,data_contratacao) VALUE ('$nome','$email','$senha','$telefone','$endereco','$data_contratacao')";


    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();

}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>

    <form method="POST" action="create.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>
    