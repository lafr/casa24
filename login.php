<?php
session_start();
include "conecta.php";

// Variável $usuario
$ver_usuario = $_POST['usuario'];
$ver_senha = md5($_POST['senha']);

// Verificar se o usuário existe
$sql = "SELECT * FROM usuarios WHERE nome = '$ver_usuario' and senha = '$ver_senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuário encontrado
    while($row = $result->fetch_assoc()) {
        $_SESSION['user_ranking'] = $row['ranking'];
        $_SESSION['user_nome'] = $row['nome'];
        $_SESSION['user_id_usuario'] = $row['id_usuario'];

        $sql_ultimo_acesso = "update usuarios set ultimo_acesso = now() where id_usuario = '$user_id_usuario'";
        $result_ultimo_acesso = $conn->query($sql_ultimo_acesso);

        header("Location: principal.php");
    }
} else {
    // Usuário não encontrado
    echo "Usuário ou senha inválidos.";
}
?>