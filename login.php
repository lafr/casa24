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
        $_SESSION['ranking'] = $row['ranking'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['id_usuario'] = $row['id_usuario'];
        header("Location: principal.php");
    }
} else {
    // Usuário não encontrado
    echo "Usuário ou senha inválidos.";
}
?>