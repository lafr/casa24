<?PHP
    include "conecta.php";

    $id_brinde = $_POST['id_brinde'];
    $acao = $_POST['acao'];
    $qtd = $_POST['qtd'];

    if ($acao=="repor") {
        $sql_seleciona = "SELECT * FROM brindes WHERE id_brinde = '$id_brinde'";
        $resultado = mysqli_query($conn, $sql_seleciona);

        $registro = mysqli_fetch_array($resultado);
        $qtd_atual = $registro['qtd_atual'];
        
        $qtd_atual = $qtd_atual + $qtd;

        $sql_repor = "UPDATE brindes SET qtd_atual = '$qtd_atual' WHERE id_brinde = '$id_brinde'";
        $resultado = mysqli_query($conn, $sql_repor);

        $log_repor = "INSERT INTO repor_brindes(fk_brindes, qtd, data_repor) VALUES ('$id_brinde', '$qtd', now())";
        $resultado = mysqli_query($conn, $log_repor);

        header("Location: brindes.php"); 
    }

    if ($acao=="retirar") {
        $sql_seleciona = "SELECT * FROM brindes WHERE id_brinde = '$id_brinde'";
        $resultado = mysqli_query($conn, $sql_seleciona);

        $registro = mysqli_fetch_array($resultado);
        $qtd_atual = $registro['qtd_atual'];

        $qtd_atual = $qtd_atual - $qtd;

        $sql_retira = "UPDATE brindes SET qtd_atual = '$qtd_atual' WHERE id_brinde = '$id_brinde'";
        $resultado = mysqli_query($conn, $sql_retira);

        $log_retirar = "INSERT INTO retirar_brindes(fk_brindes, qtd, data_retirar) VALUES ('$id_brinde', '$qtd', now())";
        $resultado = mysqli_query($conn, $log_retirar);

        header("Location: brindes.php");
    }
?>