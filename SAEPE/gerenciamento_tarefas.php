<?php
include 'db_connection.php';

if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM tarefas WHERE id = $delete_id";
    $conn->query($sql);
}

if (isset($_POST['status_id']) && isset($_POST['status'])) {
    $status_id = $_POST['status_id'];
    $new_status = $_POST['status'];
    $sql = "UPDATE tarefas SET status = '$new_status' WHERE id = $status_id";
    $conn->query($sql);
}

$tarefas = $conn->query("SELECT t.id, t.descricao, t.setor, t.prioridade, t.status, u.nome as usuario_nome 
                         FROM tarefas t 
                         JOIN usuarios u ON t.usuario_id = u.id");
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Tarefas</title>
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
    <h3>Gerenciamento de Tarefas</h3>
    <div class="column">
        <h4>A Fazer</h4>
        <?php while ($tarefa = $tarefas->fetch_assoc()): ?>
            <?php if ($tarefa['status'] === 'a_fazer'): ?>
                <div class="task-card">
                    <h4><?= $tarefa['descricao'] ?></h4>
                    <p>Usuário: <?= $tarefa['usuario_nome'] ?></p>
                    <p>Setor: <?= $tarefa['setor'] ?></p>
                    <p>Prioridade: <?= $tarefa['prioridade'] ?></p>
                    <form method="POST" style="display:inline-block;">
                        <input type="hidden" name="delete_id" value="<?= $tarefa['id'] ?>">
                        <button class="delete" onclick="return confirm('Excluir tarefa?');">Excluir</button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</main>

</body>
</html>
