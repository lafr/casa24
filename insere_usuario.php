<?PHP
    include 'conecta.php';

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $ranking = $_POST['ranking'];

    $senha = md5($senha);

    $sql_novo = "insert into usuarios (nome, email, senha, ranking, ultimo_acesso, status) values ('$nome', '$email', '$senha', '$ranking', now(), '1')";

        $result_novo = $conn->query($sql_novo);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

    header("Location: usuarios.php");
?>