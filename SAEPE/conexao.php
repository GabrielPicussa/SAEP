<?php
$servername = "2. banco de dados"; // Nome do servidor, geralmente 'localhost' se estiver no seu computador local
$username = "root"; // Nome de usuário do MySQL, por padrão é 'root'
$password = ""; // A senha de acesso do MySQL, caso tenha, se não, deixe em branco
$dbname = "GerenciadorDeTarefas"; // Nome do seu banco de dados que você já criou

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação de conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 
?>
