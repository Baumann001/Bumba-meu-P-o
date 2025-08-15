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
    