<?PHP
    include 'conecta.php';

    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $ranking = $_POST['ranking'];

    $senha = md5($senha);

        $sql_editar = "update usuarios set nome = '$nome', email = '$email', senha = '$senha', ranking = '$ranking' where id_usuario = '$id_usuario'";
        $result_editar = $conn->query($sql_editar);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    header("Location: usuarios.php");
?>