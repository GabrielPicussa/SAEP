<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cadastro concluído com sucesso'); window.location.href = 'cadastro_usuario.php';</script>";
        } else {
            echo "Erro: " . $conn->error;
        }
    } else {
        echo "<script>alert('E-mail inválido');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
    <div class="header-content">
        <h2 class="title">Gerenciador de Tarefas</h2>
        <nav class="menu">
            <a href="cadastro_usuario.php">Cadastro de Usuários</a>
            <a href="cadastro_tarefa.php">Cadastro de Tarefas</a>
            <a href="gerenciamento_tarefas.php">Gerenciamento de Tarefas</a>
        </nav>
    </div>
</header>

<main>
    <h3>Cadastro de Usuários</h3>
    <form method="POST" action="cadastro_usuario.php">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <label>E-mail:</label>
        <input type="email" name="email" required>
        <button type="submit">Cadastrar</button>
    </form>
</main>

</body>
</html>
<?php
include('conexao.php'); // Inclui a conexão com o banco de dados

// Agora, você pode usar $conn para fazer consultas no banco de dados, como:

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    // Inserir os dados do usuário na tabela usuarios
    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro concluído com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

