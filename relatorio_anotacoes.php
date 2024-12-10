<!DOCTYPE html>
<html lang='pt-BR'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Casa Siga Bem</title>
<link rel='stylesheet' href='css/main.css'>
<link rel="icon" href="img/favicon.png" type="image/png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
    <body>

    <?php
        include "conecta.php";

        $sql_paradas = "SELECT * FROM paradas where fk_cliente < '1000' order by id_parada";
        $resultado_paradas = mysqli_query($conn, $sql_paradas);

        while ($row_parada = mysqli_fetch_array($resultado_paradas)) {

            $ver_cliente = mysqli_query($conn, "SELECT * FROM clientes where id_cliente = " . $row_parada['fk_cliente']);
            $row_cliente = mysqli_fetch_array($ver_cliente);

            $sql_anotacoes = "SELECT * FROM anotacoes where fk_parada = " . $row_parada['fk_cliente'];
            $resultado_anotacoes = mysqli_query($conn, $sql_anotacoes);
            $row_anotacoes = mysqli_fetch_array($resultado_anotacoes);

            $razao = $row_cliente['razao'];
            $descricao = $row_anotacoes['descricao'];

            echo $razao . "<br>";
            echo $descricao . "<br>";
        }
    ?>

    </body>
</html>