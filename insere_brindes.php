<?PHP
    include "conecta.php";

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO brindes (nome, descricao, qtd_inicial, qtd_atual) VALUES ('$nome', '$descricao', '$quantidade', '$quantidade')";
    $resultado = mysqli_query($conn, $sql);

    header("Location: brindes.php");
?>