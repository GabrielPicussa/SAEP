<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST["usuario_id"];
    $descricao = $_POST["descricao"];
    $setor = $_POST["setor"];
    $prioridade = $_POST["prioridade"];
    $status = "a_fazer";

    $sql = "INSERT INTO tarefas (usuario_id, descricao, setor, prioridade, status) 
            VALUES ('$usuario_id', '$descricao', '$setor', '$prioridade', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cadastro de tarefa concluído com sucesso'); window.location.href = 'cadastro_tarefa.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$sql = "SELECT id, nome FROM usuarios";
$usuarios = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Tarefas</title>
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
    <h3>Cadastro de Tarefas</h3>
    <form method="POST" action="cadastro_tarefa.php">
        <label>Usuário:</label>
        <select name="usuario_id" required>
            <option value="">Selecione um usuário</option>
            <?php while ($usuario = $usuarios->fetch_assoc()): ?>
                <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
            <?php endwhile; ?>
        </select>
        
        <label>Descrição:</label>
        <input type="text" name="descricao" required>
        
        <label>Setor:</label>
        <input type="text" name="setor" required>
        
        <label>Prioridade:</label>
        <select name="prioridade" required>
            <option value="baixa">Baixa</option>
            <option value="media">Média</option>
            <option value="alta">Alta</option>
        </select>

        <button type="submit">Cadastrar Tarefa</button>
    </form>
</main>

</body>
</html>
