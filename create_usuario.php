<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se todos os campos foram enviados
    if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['telefone'], $_POST['endereco'], $_POST['data_contratacao'])) {
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha
        $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
        $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
        $data_contratacao = mysqli_real_escape_string($conn, $_POST['data_contratacao']);

        // Validar email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Erro: Email inválido.";
        } else {
            // Verificar se email já existe
            $check_email = "SELECT email FROM usuarios WHERE email = '$email'";
            $result = $conn->query($check_email);
            
            if ($result->num_rows > 0) {
                echo "Erro: Este email já está cadastrado.";
            } else {
                // Inserir novo usuário
                $sql = "INSERT INTO usuarios (nome, email, senha_hash, telefone, endereco, data_contratacao) 
                        VALUES ('$nome', '$email', '$senha', '$telefone', '$endereco', '$data_contratacao')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='success'>Usuário cadastrado com sucesso! <a href='read_usuarios.php'>Ver usuários</a></div>";
                } else {
                    echo "Erro: " . $conn->error;
                }
            }
        }
    } else {
        echo "Erro: Todos os campos são obrigatórios.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>➕ Cadastrar Novo Usuário</h1>
        <nav>
            <a href="read_usuarios.php">👥 Voltar à Lista</a>
            <a href="painel_admin.php">📋 Painel Administrativo</a>
        </nav>
    </header>

    <main>
        <form method="POST" action="create_usuario.php">
            <label>Nome:</label>
            <input type="text" name="nome" required><br><br>

            <label>Email:</label>
            <input type="email" name="email" required><br><br>

            <label>Senha:</label>
            <input type="password" name="senha" required><br><br>

            <label>Telefone:</label>
            <input type="text" name="telefone"><br><br>

            <label>Endereço:</label>
            <input type="text" name="endereco"><br><br>

            <label>Data de Contratação:</label>
            <input type="date" name="data_contratacao" required><br><br>

            <input type="submit" value="Cadastrar Usuário">
        </form>
    </main>
</body>
</html>
        <form method="POST" action="create_usuario.php">
            <label>Nome:</label>
            <input type="text" name="nome" required><br><br>

            <label>Email:</label>
            <input type="email" name="email" required><br><br>

            <label>Senha:</label>
            <input type="password" name="senha" required><br><br>

            <label>Telefone:</label>
            <input type="text" name="telefone"><br><br>

            <label>Endereço:</label>
            <input type="text" name="endereco"><br><br>

            <label>Data de Contratação:</label>
            <input type="date" name="data_contratacao" required><br><br>

            <input type="submit" value="Cadastrar Usuário">
        </form>
    </main>
</body>
</html>
